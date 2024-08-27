<?php

namespace App\Model;

use App\Core\Model;

class Product
{
    public static function getAllProducts()
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM products ORDER BY name";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getProductbyID($id)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':id' => $id];
        $query->execute($parameters);

        return array($query->fetch());
    }

    public static function getProductsByCategory($category_id)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM products WHERE category_id = :category_id ORDER BY name";
        $query = $db->prepare($sql);
        $parameters = [':category_id' => $category_id];
        $query->execute($parameters);
        return $query->fetchAll();
    }


    public static function add($post)
    {
        extract($post);

        $picture = $_FILES['picture']['name'];
        $picture_tmp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($picture_tmp, "uploads/" . $picture);

        $db = Model::getDB();
        $sql = "INSERT INTO products (name, description, picture, price, category_id) VALUES (:name, :description, :picture, :price, :category_id)";
        $parameters = [':name' => $name, ':description' => $description, ':picture' => "uploads/" . $picture, ':price' => $price, ':category_id' => $category_id];
        $query = $db->prepare($sql);

        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }

    public static function edit($post)
    {
        extract($post);


        if ($_FILES['picture']['name'] != '') {
            $picture = $_FILES['picture']['name'];
            $picture_tmp = $_FILES['picture']['tmp_name'];
            move_uploaded_file($picture_tmp, "uploads/" . $picture);
        } else {
            $picture = $old_picture; 
        }

        $db = Model::getDB();
        $sql = "UPDATE products SET name=:name, description=:description, picture=:picture, price=:price, category_id=:category_id WHERE id=:id";
        $parameters = [':id' => $id, ':name' => $name, ':description' => $description, ':picture' => "uploads/" . $picture, ':price' => $price, ':category_id' => $category_id];
        $query = $db->prepare($sql);

        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }


    public static function delete($id)
    {
        $db = Model::getDB();
        $sql = "DELETE FROM products WHERE id=:id";
        $parameters = array(':id' => $id);
        $query = $db->prepare($sql);
        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }
}
