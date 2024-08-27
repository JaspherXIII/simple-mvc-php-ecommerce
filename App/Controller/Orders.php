<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Category;
use App\Model\Product;
use App\Model\Cart;
use App\Model\Order;

class Orders
{
    public function index()
    {
        $orderitems = Order::getAllOrderItems();
        $orders = Order::getAllOrders();
        $products = Product::getAllProducts();
        View::render('Orders/index', ['orderitems' => $orderitems, 'products' => $products, 'orders' => $orders]);
    }

    public function edit($id = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['edit'])) {
            $result = Order::edit($_POST);
            if ($result) {
                header('Location: ' . url . 'Orders');
                exit();
            }
        }

        $orderitems = Order::getOrderItembyID($id);
        View::render('Orders/edit', ['orderitems' => $orderitems]);
    }

    public function myOrder()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $orderitems = Order::getMyOrders($userId);
            $orders = Order::getAllOrders();
            $products = Product::getAllProducts();
            View::render('Orders/myOrder', ['orderitems' => $orderitems, 'products' => $products, 'orders' => $orders]);
        } else {
            header('Location: ' . url . 'Users/login'); 
            exit();
        }
    }

    public function view($id = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $order = Order::getOrderById($id); // Get the order details
        $orderitems = Order::getOrderItembyID($id);
        $orders = Order::getAllOrders();
        $products = Product::getAllProducts();
        View::render('Orders/view', ['order' => $order, 'orderitems' => $orderitems, 'products' => $products, 'orders' => $orders]);
    }
}
