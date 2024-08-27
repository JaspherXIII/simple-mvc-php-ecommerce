<?php

namespace App\Model;

use App\Core\Model;

class Order
{
    public static function createOrder($userId, $name, $address, $city, $state, $zip, $paymentMethod)
    {
        $db = Model::getDB();

        // Start transaction
        $db->beginTransaction();

        try {
            // Insert order details
            $sql = "INSERT INTO orders (user_id, name, address, city, state, zip, payment_method) 
                    VALUES (:user_id, :name, :address, :city, :state, :zip, :payment_method)";
            $parameters = [
                ':user_id' => $userId,
                ':name' => $name,
                ':address' => $address,
                ':city' => $city,
                ':state' => $state,
                ':zip' => $zip,
                ':payment_method' => $paymentMethod
            ];
            $query = $db->prepare($sql);
            $query->execute($parameters);

            // Get the last inserted order ID
            $orderId = $db->lastInsertId();

            // Insert order items
            $carts = Cart::getAllCarts($userId);
            foreach ($carts as $cart) {
                $sql = "INSERT INTO order_items (order_id, product_id, quantity) 
                        VALUES (:order_id, :product_id, :quantity)";
                $parameters = [
                    ':order_id' => $orderId,
                    ':product_id' => $cart->product_id,
                    ':quantity' => $cart->quantity
                ];
                $query = $db->prepare($sql);
                $query->execute($parameters);
            }

            // Commit transaction
            $db->commit();

            return $orderId;
        } catch (\Exception $e) {
            // Rollback transaction on error
            $db->rollBack();
            return false;
        }
    }

    public static function getOrderById($orderId)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM orders WHERE id = :order_id";
        $query = $db->prepare($sql);
        $query->execute([':order_id' => $orderId]);
        return $query->fetch();
    }

    public static function getOrderItems($orderId)
    {
        $db = Model::getDB();
        $sql = "SELECT oi.*, p.name as product_name FROM order_items oi
                INNER JOIN products p ON oi.product_id = p.id
                WHERE oi.order_id = :order_id";
        $query = $db->prepare($sql);
        $query->execute([':order_id' => $orderId]);
        return $query->fetchAll();
    }

    public static function getAllOrders()
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM orders ORDER BY id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getAllOrderItems()
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM order_items ORDER BY id";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getOrderItembyID($id)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM order_items WHERE id = :id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':id' => $id];
        $query->execute($parameters);

        return array($query->fetch());
    }

    public static function edit($post)
    {
        extract($post);
        $db = Model::getDB();
        $sql = "UPDATE order_items SET status=:status WHERE id=:id";
        $parameters = [':id' => $id, ':status' => $status];
        $query = $db->prepare($sql);
        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMyOrders($userId)
    {
        $db = Model::getDB();
        $sql = "SELECT oi.* 
                FROM order_items oi
                INNER JOIN orders o ON oi.order_id = o.id
                WHERE o.user_id = :user_id
                ORDER BY oi.id";
        $query = $db->prepare($sql);
        $parameters = [':user_id' => $userId];
        $query->execute($parameters);
        return $query->fetchAll();
    }
}
