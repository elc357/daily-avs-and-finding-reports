<?php

class Helper
{
    static function getConnection(): \PDO
    {

        $db = "MCC_PM3";
        $host = "localhost";
        $port = "3306";
        $username = "root";
        $password = "1234";

        return new PDO("mysql:host=$host:$port;dbname=$db", $username, $password);
    }
}

$connection = Helper::getConnection();
// $connection->exec("START TRANSACTION");

$sql = "SELECT * FROM MCC_1";
$statement = $connection->prepare($sql);
$statement->execute();

// ------ GET INPUT AMPERE
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     foreach ($statement as $key => $value) {
//         if ($_POST[$value["name"] . "_ampere"] == "") {
//             echo "0" . "<br/>";
//         } else {
//             echo $_POST[$value["name"] . "_ampere"] . "<br/>";
//         }
//     }
// }


// ------ GET INPUT TEMPERATURE
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     foreach ($statement as $key => $value) {
//         if ($_POST[$value["name"] . "_temperature"] == "") {
//             echo "0" . "<br/>";
//         } else {
//             echo $_POST[$value["name"] . "_temperature"] . "<br/>";
//         }
//     }
// }

// ---------- GET LENGTH OF AN DATABASE RECORD
$array_of_name = [];
$array_of_ampere = [];
$allowed_max_temperature = 150;

foreach ($statement as $key => $value) {
    $array_of_name[] = $value['name'];

    // echo $key . PHP_EOL;

    // echo gettype($value['ampere']) . PHP_EOL; // NULL DOUBLE.. NULL

    if (gettype($value['ampere']) == "NULL") {
        $array_of_ampere[] = 0;
        // echo "nol" . PHP_EOL;
    } else {
        $array_of_ampere[] = $value['ampere'];
        // echo "tidak nol" . PHP_EOL;
    }
}

// var_dump($array_of_ampere);

// echo gettype($array_of_ampere['1']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_connection = Helper::getConnection();
    $new_connection->query("START TRANSACTION");

    for ($i = 0; $i < sizeof($array_of_name); $i++) {

        $name = $array_of_name[$i];
        $allowed_max_ampere = $array_of_ampere[$i];

        $ampere_input = $_POST[$name . "_ampere"];
        $temperature_input = $_POST[$name . "_temperature"];

        if ($ampere_input == "") {
            $ampere_input = 0;
        }
        if (
            $temperature_input == ""
        ) {
            $temperature_input = 0;
        }

        $sql_avs = "INSERT INTO avs_1 (name, ampere, temperature) VALUES (?, ?, ?)";
        $new_statement = $new_connection->prepare($sql_avs);

        if ($ampere_input > $allowed_max_ampere or $ampere_input < 0) {
            $error = new Exception("Cek kembali ampere " . "<strong>" . $name . "</strong>" . " yang anda input <br/>");
            echo $error->getMessage();

            $new_connection->exec("ROLLBACK");
            return;
        } else if ($temperature_input > $allowed_max_temperature or $temperature_input < 0) {
            $error = new Exception("Cek kembali temperature " . $name . " yang anda input <br/>");
            echo $error->getMessage();

            $new_connection->exec("ROLLBACK");
            return;
        } else {
            $new_statement->execute([
                $name, $ampere_input,
                $temperature_input
            ]);
            echo "start input " . $array_of_name[$i] . "<br/>";
        }
    }
    $new_connection->query("COMMIT");
    $new_connection = null;
    echo "input all data success ✔" . PHP_EOL;
}


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     foreach ($statement as $key => $value) {
//         $new_connection = Helper::getConnection();
//         $sql_avs = "INSERT INTO detail_avs_mcc_7 VALUES (?, ?, ?)";
//         $new_statement = $new_connection->prepare($sql_avs);
//         $new_statement->execute([$value['name'], $value['name'] . "_ampere", $value['name'] . "_temperature"]);
//         $new_connection = null;

//         // $new_connection = Helper::getConnection();
//         // $sql_avs = "INSERT INTO detail_avs_mcc_7 VALUES (?, ?, ?)";
//         // $new_statement = $new_connection->prepare($sql_avs);
//         // $new_statement->execute([$value['name'], $value['name'] . "_ampere", $value['name'] . "_temperature"]);
//         // $new_connection = null;
//     }
// }
