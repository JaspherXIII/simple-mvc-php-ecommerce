<?php
namespace App\Controller;

use App\Core\View;
use App\Model\Product;

class Home
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $products = Product::getAllProducts();
        
        View::render('Home/index', ['products' => $products]);
    }

    public function about()
    {
        
        View::render('Home/about');
    }

    public function contact()
    {
        
        View::render('Home/contact');
    }
}
