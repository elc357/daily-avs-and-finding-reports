<?php

require_once __DIR__ . "/Middleware.php";

use Middleware\Middleware;

class ActiveMiddleware implements Middleware
{
    function before(): void
    {
        if ($_SESSION['time'] - time() <= -1800 && $_SESSION['user'] != "Administrator") { // (-1800)30 menit auto logout
            session_destroy();
            header("Location: /login");
            exit();
        }
    }
}
