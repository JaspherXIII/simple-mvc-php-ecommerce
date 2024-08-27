<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Cart;
use App\Model\Order;
use App\Model\Product;

class Carts
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $carts = Cart::getAllCarts($userId);
            $products = Product::getAllProducts();
            View::render('Carts/index', ['carts' => $carts, 'products' => $products]);
        } else {
            header('Location: ' . url . 'Users/login'); 
            exit();
        }
    }

    public function addToCart($productId = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }

        if (isset($_SESSION['id']) && $productId !== null) {
            $userId = $_SESSION['id'];
            Cart::addToCart($productId, $userId);
            header('Location: ' . url . 'Carts');
            exit();
        } else {
            header('Location: ' . url);
            exit();
        }
    }

    public function removeFromCart($productId = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }

        if (isset($_SESSION['id']) && $productId !== null) {
            $userId = $_SESSION['id'];
            Cart::removeFromCart($productId, $userId);
            header('Location: ' . url . 'Carts');
            exit();
        } else {
            header('Location: ' . url);
            exit();
        }
    }

    public function clearCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            Cart::clearCart($userId);
            header('Location: ' . url . 'Carts');
            exit();
        } else {
            header('Location: ' . url);
            exit();
        }
    }

    public function checkout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $carts = Cart::getAllCarts($userId);
            $products = Product::getAllProducts();
            View::render('Carts/checkout', ['carts' => $carts, 'products' => $products]);
        } else {
            header('Location: ' . url . 'Users/login');
            exit();
        }
    }

    public function processCheckout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];

            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $paymentMethod = $_POST['payment_method'];
            $orderId = Order::createOrder($userId, $name, $address, $city, $state, $zip, $paymentMethod);

            if ($orderId) {
                Cart::clearCart($userId);
                header('Location: ' . url . 'Orders/myOrder');
            } else {
                View::render('Carts/checkout_failure');
            }
        } else {
            header('Location: ' . url . 'Users/login');
            exit();
        }
    }
}
?>