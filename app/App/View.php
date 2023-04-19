<?php

namespace App {

    class View
    {
        public static function render(string $path, $model = [])
        {
            require __DIR__ . "/../View/" . $path . ".php";
        }

        public static function renderFormAvs()
        {
        }
    }
}
