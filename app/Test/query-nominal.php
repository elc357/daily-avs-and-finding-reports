<?php

require __DIR__ . "/../Helper/Database.php";

use Helper\Database;

$connection_nominal = Database::getConnection();
$sql_nominal = "select * from avs_mcc_7";
$statement_nominal = $connection_nominal->prepare($sql_nominal);
$statement_nominal->execute();

var_dump($statement_nominal);
