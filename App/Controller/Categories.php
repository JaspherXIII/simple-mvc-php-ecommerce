<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Category;

class Categories
{
    public function index()
    {
        $categories = Category::getAllCategories();
        View::render('Categories/index', $categories);
    }

    public function add()
    {
        if (isset($_POST['add'])) {
            $result = Category::add($_POST);
            if ($result) {
                header('location:' . url . 'Categories');
                exit();
            }
        }
        View::render('Categories/add');
    }

    public function edit($id = null)
    {
        if (isset($_POST['edit'])) {
            $result = Category::edit($_POST);
            if ($result) {
                header('location: ' . url . 'Categories');
                exit();
            }
        }
        $category = Category::getCategoryByID($id);
        View::render('Categories/edit', $category);
    }

    public function delete($id = null)
    {
        if (!is_null($id)) {
            $result = Category::delete($id);
            if ($result) {
                header('location:' . url . 'Categories');
                exit();
            }
        }
    }
}

?>
