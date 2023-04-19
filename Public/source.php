<?php

require_once __DIR__ . "/../Helper/Database.php";

use Helper\Database;

// class Helper
// {
//     static function getConnection(): \PDO
//     {

//         $db = "MCC_PM3";
//         $host = "localhost";
//         $port = "3306";
//         $username = "root";
//         $password = "1234";

//         return new PDO("mysql:host=$host:$port;dbname=$db", $username, $password);
//     }
// }

$connection = Database::getConnection();


// foreach ($statement as $keys => $value) {
//     echo "id: " . $value["id"] . PHP_EOL;
//     echo "name: " . $value["name"] . PHP_EOL;
//     echo "power: " . $value["power"] . PHP_EOL;
//     echo "ampere: " . $value["ampere"] . PHP_EOL;
//     echo "pole: " . $value["pole"] . PHP_EOL;
//     echo "funcloc: " . $value["funcloc"] . PHP_EOL;
//     echo PHP_EOL;
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <title>TAG NAME</title>
</head>

<style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: 'Roboto Mono', monospace;
    }

    h3 {
        font-family: 'Roboto Mono', monospace;
        background-color: greenyellow;
        display: inline-block;
    }

    table,
    th,
    td {
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px;
    }

    table {
        max-width: 800px;
    }


    th:nth-child(1),
    td:nth-child(1) {
        width: 30px;
    }


    th:nth-child(2),
    td:nth-child(2) {
        width: 250px;
    }

    th:nth-child(3),
    th:nth-child(4),
    th:nth-child(5),
    td:nth-child(3),
    td:nth-child(4),
    td:nth-child(5) {
        width: 50px;
    }

    th:nth-child(6),
    td:nth-child(6) {
        width: 250px;
    }

    .content {
        margin-bottom: 20px;
    }

    .avs_input {
        width: 50px;
    }

    @media only screen and (max-width: 600px) {


        th {
            font-size: 11px;
        }

        td {
            font-size: 9px;
        }

        th:nth-child(1),
        td:nth-child(1) {
            max-width: 5px;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 60px;
        }

        th:nth-child(3),
        th:nth-child(4),
        th:nth-child(5),
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5) {
            max-width: 8px;
        }

        th:nth-child(6),
        td:nth-child(6) {
            width: 50px;
        }

        table {
            width: 440px;
        }

    }
</style>

<body>
    <div class="container">
        <div class="content" id="MCC_7">
            <h3>MCC VII PM3 (TR.005)</h3>
            <form action="avs_7.php" method="post">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>kW</th>
                        <th>IN</th>
                        <th>Pole</th>
                        <th>Funcloc</th>
                        <th>Ampere</th>
                        <th>Temperature</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM MCC_7";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    foreach ($statement as $key => $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value['id'] ?>
                            </td>
                            <td>
                                <?php echo $value['name']; ?>
                            </td>
                            <td>
                                <?php if ($value['power'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['power'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['ampere'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['ampere'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['pole'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['pole'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['funcloc'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['funcloc'];
                                } ?>
                            </td>
                            <td>
                                <input class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="number">
                            </td>
                            <td>
                                <input class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="number">
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <input type="submit" value="Post">
            </form>
        </div>
        <div class="content" id="MCC_1">
            <h3>MCC I PM3 (TR.006)</h3>
            <form action="avs_1.php" method="post">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>kW</th>
                        <th>IN</th>
                        <th>Pole</th>
                        <th>Funcloc</th>
                        <th>Ampere</th>
                        <th>Temperature</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM MCC_1";
                    $statement = $connection->prepare($sql);
                    $statement->execute();
                    foreach ($statement as $key => $value) { ?>
                        <tr>
                            <td>
                                <?php echo $value['id'] ?>
                            </td>
                            <td>
                                <?php echo $value['name']; ?>
                            </td>
                            <td>
                                <?php if ($value['power'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['power'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['ampere'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['ampere'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['pole'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['pole'];
                                } ?>
                            </td>
                            <td>
                                <?php if ($value['funcloc'] == null) {
                                    echo "-";
                                } else {
                                    echo $value['funcloc'];
                                } ?>
                            </td>
                            <td>
                                <input class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="number">
                            </td>
                            <td>
                                <input class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="number">
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <input type="submit" value="Post">
            </form>
        </div>
        <div class="content" id="MCC_2">
            <h3>MCC II PM3 (TR.006)</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>kW</th>
                    <th>IN</th>
                    <th>Pole</th>
                    <th>Funcloc</th>
                </tr>
                <?php
                $sql = "SELECT * FROM MCC_2";
                $statement = $connection->prepare($sql);
                $statement->execute();
                foreach ($statement as $key => $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <td>
                            <?php if ($value['name'] == null) {
                                echo "Spare";
                            } else {
                                echo $value['name'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['power'] == null) {
                                echo "-";
                            } else {
                                echo $value['power'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['ampere'] == null) {
                                echo "-";
                            } else {
                                echo $value['ampere'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['pole'] == null) {
                                echo "-";
                            } else {
                                echo $value['pole'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['funcloc'] == null) {
                                echo "-";
                            } else {
                                echo $value['funcloc'];
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="content" id="MCC_3">
            <h3>MCC III PM3 (TR.005)</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>kW</th>
                    <th>IN</th>
                    <th>Pole</th>
                    <th>Funcloc</th>
                </tr>
                <?php
                $sql = "SELECT * FROM MCC_3";
                $statement = $connection->prepare($sql);
                $statement->execute();
                foreach ($statement as $key => $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <td>
                            <?php if ($value['name'] == null) {
                                echo "Spare";
                            } else {
                                echo $value['name'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['power'] == null) {
                                echo "-";
                            } else {
                                echo $value['power'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['ampere'] == null) {
                                echo "-";
                            } else {
                                echo $value['ampere'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['pole'] == null) {
                                echo "-";
                            } else {
                                echo $value['pole'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['funcloc'] == null) {
                                echo "-";
                            } else {
                                echo $value['funcloc'];
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="content" id="MCC_5">
            <h3>MCC V PM3 (TR.005)</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>kW</th>
                    <th>IN</th>
                    <th>Pole</th>
                    <th>Funcloc</th>
                </tr>
                <?php
                $sql = "SELECT * FROM MCC_5";
                $statement = $connection->prepare($sql);
                $statement->execute();
                foreach ($statement as $key => $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <td>
                            <?php if ($value['name'] == null) {
                                echo "Spare";
                            } else {
                                echo $value['name'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['power'] == null) {
                                echo "-";
                            } else {
                                echo $value['power'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['ampere'] == null) {
                                echo "-";
                            } else {
                                echo $value['ampere'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['pole'] == null) {
                                echo "-";
                            } else {
                                echo $value['pole'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['funcloc'] == null) {
                                echo "-";
                            } else {
                                echo $value['funcloc'];
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <div class="content" id="MCC_6">
            <h3>MCC VI PM3 (TR.006)</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>kW</th>
                    <th>IN</th>
                    <th>Pole</th>
                    <th>Funcloc</th>
                </tr>
                <?php
                $sql = "SELECT * FROM MCC_6";
                $statement = $connection->prepare($sql);
                $statement->execute();
                foreach ($statement as $key => $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value['id'] ?>
                        </td>
                        <td>
                            <?php if ($value['name'] == null) {
                                echo "Spare";
                            } else {
                                echo $value['name'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['power'] == null) {
                                echo "-";
                            } else {
                                echo $value['power'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['ampere'] == null) {
                                echo "-";
                            } else {
                                echo $value['ampere'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['pole'] == null) {
                                echo "-";
                            } else {
                                echo $value['pole'];
                            } ?>
                        </td>
                        <td>
                            <?php if ($value['funcloc'] == null) {
                                echo "-";
                            } else {
                                echo $value['funcloc'];
                            } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>