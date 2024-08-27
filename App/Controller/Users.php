<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;

class Users
{
    public function index()
    {
        $users = User::getAllUsers();
        View::render('Users/index', $users);
    }

    public function add()
    {
        View::render('Users/add');
        if (isset($_POST['add'])) {
            $result = User::add($_POST);
            if ($result) {
                header('Location: ' . url . 'Users');
                exit();
            }
        }
    }

    public function edit($id = null)
    {
        $user = User::getUserByID($id);

        if ($user) {
            $user = ['user' => $user];
        }

        if (isset($_POST['edit'])) {
            $result = User::edit($_POST);
            if ($result) {
                header('Location: ' . url . 'Home');
                exit();
            }
        }

        View::render('Users/edit', $user);
    }


    public function delete($id = null)
    {
        if ($id !== null) {
            $result = User::delete($id);
            if ($result) {
                header('Location: ' . url . 'Users');
                exit();
            }
        }
    }

    public function register()
    {
        View::render('Users/register');
        if (isset($_POST['register'])) {
            $result = User::add($_POST);
            if ($result) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['register_success'] = 'Registration successful. Please log in.';
                header('Location: ' . url . 'Users/login');
                exit();
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['register_error'] = 'Registration failed. Username already exists.';
                header('Location: ' . url . 'Users/register');
                exit();
            }
        }
    }



    public function login()
    {
        View::render('Users/login');
        if (isset($_POST['login'])) {
            $user = User::login($_POST);
            if (!empty($user)) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['id'] = $user->id;
                $_SESSION['user'] = $user;
                if ($user->role === 'user') {
                    header('Location: ' . url . 'Home');
                } elseif ($user->role === 'administrator') {
                    header('Location: ' . url . 'Products');
                }
                exit();
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['login_error'] = 'Invalid username or password';
                header('Location: ' . url . 'Users/login');
                exit();
            }
        }
    }


    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ' . url . 'Users/login');
        exit();
    }
}
