<?php

namespace App\Model;

use App\Core\Model;

class User
{
    public static function getAllUsers()
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM users";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public static function getUserByID($id)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':id' => $id];
        $query->execute($parameters);
        return $query->fetch();
    }

    public static function getUserByUsername($username)
    {
        $db = Model::getDB();
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':username' => $username];
        $query->execute($parameters);
        return $query->fetch();
    }

    public static function add($post)
    {
        extract($post);
        $db = Model::getDB();

        // Check if the username already exists
        $existingUser = self::getUserByUsername($username);
        if ($existingUser) {
            return false; // Username already exists
        }

        $sql = "INSERT INTO users (username, password, role, created, modified) VALUES (:username, :password, :role, :created, :modified)";
        $parameters = [
            ':username' => $username,
            ':password' => md5($password),
            ':role' => $role,
            ':created' => date('Y-m-d h:i'),
            ':modified' => date('Y-m-d h:i')
        ];
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
        $sql = "UPDATE users SET username = :username, password = :password, role = :role, modified = :modified WHERE id = :id";
        $parameters = [
            ':id' => $id,
            ':username' => $username,
            ':password' => md5($password),
            ':role' => $role,
            ':modified' => date('Y-m-d h:i')
        ];
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
        $sql = "DELETE FROM users WHERE id = :id";
        $parameters = array(':id' => $id);
        $query = $db->prepare($sql);
        if ($query->execute($parameters)) {
            return true;
        } else {
            return false;
        }
    }

    public static function login($post)
    {
        extract($post);
        $db = Model::getDB();
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = [':username' => $username, ':password' => md5($password)];
        $query->execute($parameters);
        return $query->fetch();
    }
}
