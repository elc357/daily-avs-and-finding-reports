<?php

namespace App {

    class Router
    {

        private static array $routes = [];

        public static function add(
            string $method,
            string $path,
            string $controller,
            string $function,
            string $add_value = "",
            array $middleware = [],
        ): void {
            self::$routes[] = [
                'method' => $method,
                'path' => $path,
                'controller' => $controller,
                'function' => $function,
                'add_value' => $add_value,
                'middleware' => $middleware
            ];
        }

        public static function run(): void
        {

            $path = "/";
            if (isset($_SERVER["PATH_INFO"])) {
                $path = $_SERVER["PATH_INFO"];
            }
            $method = $_SERVER["REQUEST_METHOD"];

            foreach (self::$routes as $route) {
                // if ($path == $route['path'] && $method == $route['method']) {

                if ($path == $route['path'] && $method == $route['method']) {
                    // echo "CONTROLLER : " . $route['controller'] . ", FUNCTION : " . $route['function'];

                    // call middleware
                    foreach ($route['middleware'] as $middleware) {
                        $instance = new $middleware;
                        $instance->before();
                    }

                    $function = $route["function"];

                    $controller = new $route["controller"];

                    if ($route['function'] == "avs" or $route['function'] == "mcc") {
                        $controller->$function($route['add_value']);
                    } else {
                        $controller->$function();
                    }

                    return;
                }
            }

            http_response_code(404);
            // echo "CONTROLLER NOT FOUND" . PHP_EOL;
            // View::render("not-found-file/not-found", $model = []);
            require __DIR__ . "/../../Public/not-found.php";
        }
    }
}
