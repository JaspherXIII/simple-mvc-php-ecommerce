<?php

namespace App\Model;

use App\Core\Model;

class Cart
{
    public static function addToCart($productId, $userId = null)
    {
        $db = Model::getDB();
        
        // Check if the product is already in the cart for this user
        $sql = "SELECT * FROM carts WHERE user_id = :user_id AND product_id = :product_id";
        $parameters = [':user_id' => $userId, ':product_id' => $productId];
        $query = $db->prepare($sql);
        $query->execute($parameters);
        $cartItem = $query->fetch();

        if ($cartItem) {
            // Update the quantity if the product is already in the cart
            $sql = "UPDATE carts SET quantity = quantity + 1 WHERE user_id = :user_id AND product_id = :product_id";
        } else {
            // Insert a new row if the product is not in the cart
            $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES (:user_id, :product_id, 1)";
        }

        $query = $db->prepare($sql);
        return $query->execute($parameters);
    }

    public static function getAllCarts($userId)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM carts WHERE user_id = :user_id ORDER BY id";
        $query = $db->prepare($sql);
        $parameters = [':user_id' => $userId];
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public static function removeFromCart($productId, $userId = null)
    {
        $db = Model::getDB();
        $sql = "DELETE FROM carts WHERE user_id = :user_id AND product_id = :product_id";
        $parameters = [':user_id' => $userId, ':product_id' => $productId];
        $query = $db->prepare($sql);

        return $query->execute($parameters);
    }

    public static function clearCart($userId)
    {
        $db = Model::getDB();
        $sql = "DELETE FROM carts WHERE user_id = :user_id";
        $parameters = [':user_id' => $userId];
        $query = $db->prepare($sql);

        return $query->execute($parameters);
    }

    public static function getOrderItems($orderId)
    {
        $db = Model::getDB();
        $sql = "SELECT oi.quantity, oi.price, oi.quantity * oi.price AS subtotal, p.name AS product_name
                FROM order_items oi
                JOIN products p ON oi.product_id = p.id
                WHERE oi.order_id = :order_id";
        $query = $db->prepare($sql);
        $query->execute([':order_id' => $orderId]);
        return $query->fetchAll();
    }
}
