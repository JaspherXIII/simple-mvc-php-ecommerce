<?php
namespace App\Model;

use App\Core\Model;

class Category
{
    public static function getAllCategories()
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM categories ORDER BY name";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getCategorybyID($id)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM categories WHERE id = :id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':id' => $id];
        $query->execute($parameters);

        return array($query->fetch());
    }


    public static function add($post)
    {
        extract($post);
        $db = Model::getDB();
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $parameters = [':name' => $name];
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
        $db = Model::getDB();
        $sql = "UPDATE categories SET name=:name WHERE id=:id";
        $parameters = [':id' => $id, ':name' => $name];
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
        $sql = "DELETE FROM categories WHERE id=:id";
        $parameters = [':id' => $id];
        $query = $db->prepare($sql);
        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }
}
