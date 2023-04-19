<?php

require_once __DIR__ . "/../Controller/Controller.php";

use Controller\DataController;

$data_query = new DataController();
var_dump($data_query->query());
