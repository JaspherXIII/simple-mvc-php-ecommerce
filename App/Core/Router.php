<?php

namespace App\Core;

class Router
{
    private $controller = null;
    private $action = null;
    private $params = [];

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->splitUrl();
        $this->dispatch();
        $this->getController();
    }

    public function getController()
    {
        return $this->controller;
    }

    private function splitUrl()
    {
        $url = $_SERVER['QUERY_STRING'];
        if (isset($url)) {
            $url = trim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->action = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->params = array_values($url);
        }
    }

    public function dispatch()
    {
        if (!isset($_SESSION['id']) && $this->controller !== 'Users' && $this->action !== 'register') {
            $this->controller = 'App\Controller\Users';
            $this->controller = new $this->controller;
            $this->controller->login();
        } else {
            if (!$this->controller) {
                $this->controller = 'App\Controller\Home';
                $this->controller = new $this->controller;
                $this->controller->index();
            } else {
                $this->controller = 'App\Controller' . DIRECTORY_SEPARATOR . $this->controller;
                if (class_exists($this->controller)) {
                    $this->controller = new $this->controller();
                    if (is_callable([$this->controller, $this->action])) {
                        if (!empty($this->params)) {
                            call_user_func_array([$this->controller, $this->action], $this->params);
                        } else {
                            $this->controller->{$this->action}();
                        }
                    } else {
                        if (strlen($this->action) == 0) {
                            $this->controller->index();
                        } else {
                            echo "Method not found";
                        }
                    }
                } else {
                    echo "Class not found";
                }
            }
        }
    }
}
