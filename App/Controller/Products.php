<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Category;
use App\Model\Product;
use App\Model\Cart;

class Products
{
    public function index()
    {
        $products = Product::getAllProducts();
        $categories = Category::getAllCategories();
        View::render('Products/index', ['products' => $products, 'categories' => $categories]);
    }



    public function add()
    {
        $categories = Category::getAllCategories();
        if (isset($_POST['add'])) {
            $result = Product::add($_POST);
            if ($result) {
                header('location:' . url . 'Products');
                exit();
            }
        }
        View::render('Products/add', ['categories' => $categories]);
    }


    public function edit($id = null)
    {
        if (isset($_POST['edit'])) {
            $result = Product::edit($_POST);
            if ($result) {
                header('location: ' . url . 'Products');
                exit();
            }
        }
        $products = Product::getProductByID($id);
        $categories = Category::getAllCategories();
        View::render('Products/edit', ['products' => $products, 'categories' => $categories]);
    }

    public function delete($id = null)
    {
        if (!$id == null) {
            $result = Product::delete($id);
            if ($result) {
                header('location:' . url . 'Products');
            }
        }
    }

    public function addToCart($id = null)
    {
        if ($id !== null) {
            if (isset($_SESSION['id'])) {
                $userId = $_SESSION['id'];

                $result = Cart::addToCart($id, $userId);

                if ($result) {
                    header('location:' . url . 'Home');
                } else {
                }
            } else {
                header('location:' . url . 'Users/login');
            }
        }
    }
}
