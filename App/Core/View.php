<?php
namespace App\Core;

class View
{
    public static function render($view, $args = [])
    {
        $head = app . "View/Template/Head.php";
        $footer = app . "View/Template/Footer.php";
        $file = app . "View/$view".".php";
        
        if (isset($_SESSION['id'])) {
            require $head;
        }
        
        // Convert stdClass to array if necessary
        if ($args instanceof \stdClass) {
            $args = (array)$args;
        }

        extract($args);
        
        if (is_readable($file)) {
            require $file;
        } else {
            echo("$file not found");
        }
        
        if (isset($_SESSION['id'])) {
            require $footer;
        }
    }
}
