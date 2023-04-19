<?php

require_once __DIR__ . "/Middleware.php";

use Middleware\Middleware;

class AuthMiddleware implements Middleware
{
    function before(): void
    {
        // session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
        }
    }
}

class SpvUpMiddleware implements Middleware
{
    function before(): void
    {
        if ($_SESSION['user'] == "Rosiman" || $_SESSION['user'] == "Tedy" || $_SESSION['user'] == "Guest") {
            header("Location: /notallowed");
            exit();
        }
    }
}


// class loginTrue implements Middleware
// {
//     function before(): void
//     {
//         if (isset($_SESSION['user'])) {
//             echo "ISSET";
//         }
//     }
// }
