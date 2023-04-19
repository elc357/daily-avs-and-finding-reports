<?php

// require __DIR__ . "/../Helper/Database.php";

// use Helper\Database;

function statement(string $mcc_name, \PDO $connection)
{
    // $connection = Database::getConnection();

    $sql = "SELECT * FROM $mcc_name";
    // $statement = $connection->prepare($sql);
    $statement = $connection->prepare($sql);
    $statement->execute();

    return $statement;
}
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
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <!-- mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chivo+Mono:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />

    <title><?= $model["title"] ?></title>
</head>

<style>
    <?= require __DIR__ . "/Style/index.css" ?>
</style>

<body>

    <!-- NAVBAR START -->
    <div class="topnav" id="myTopnav">
        <a href="/" class="active">Input AVS</a>
        <div class="dropdown">
            <button class="dropbtn">Shortcut
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="#MCC_1">MCC I</a>
                <a href="#MCC_2">MCC II</a>
                <a href="#MCC_3">MCC III</a>
                <a href="#MCC_5">MCC V</a>
                <a href="#MCC_6">MCC VI</a>
                <a href="#MCC_7">MCC VII</a>
                <a href="#MCC_A">MCC A</a>
                <a href="#MCC_B">MCC B</a>
                <a href="#MCC_C">MCC C</a>
                <a href="#MCC_D">MCC D</a>
                <a href="#MCC_HTM_SP1">HTM SP1</a>
                <a href="#MCC_HTM_SP2">HTM SP2</a>
                <a href="#MCC_HTM_PM1">HTM PM1</a>
                <a href="#MCC_HTM_PM2">HTM PM2</a>
            </div>
        </div>
        <a href="/finding">Finding Data</a>
        <a href="/finding-form">New Finding</a>
        <a href="/query-request">Record Ampere</a>
        <a href="/logout">Logout</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <!-- NAVBAR END -->

    <div class="container"> <!-- container -->

        <h1 id="area">--- AREA PM3 ---</h1>
        <br>
        <!-- <h1 style="text-align: center; font-family: Montserrat; font-size: 41px">FORM CHECK AVS PM3</h1> -->

        <div class="content" class="MCC" id="MCC_2"> <!-- start content mcc_2 -->
            <a href="#MCC_2">
                <h3>MCC II PM3 (TR.006)</h3>
            </a>
            <h3 class="jam"></h3>
            <form action="avs_2" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_2", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_2_button" type="submit" value="Post MCC II">
            </form>
        </div> <!-- end content mcc_2 -->
        <br>

        <div class="content" class="MCC" id="MCC_1"> <!-- start content mcc_1 -->
            <a href="#MCC_1">
                <h3>MCC I PM3 (TR.006)</h3>
            </a>
            <form action="avs_1" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_1", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_1_button" type="submit" value="Post MCC I">
            </form>
        </div> <!-- end content mcc_1 -->
        <br>

        <div class="content" class="MCC" id="MCC_6"> <!-- start content mcc_6 -->
            <a href="#MCC_6">
                <h3>MCC VI PM3 (TR.006)</h3>
            </a>
            <form action=" avs_6" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_6", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_6_button" type="submit" value="Post MCC VI">
            </form>
        </div> <!-- end content mcc_6 -->
        <br>

        <div class="content" class="MCC" id="MCC_5"> <!-- start content mcc_5 -->
            <a href="#MCC_5">
                <h3>MCC V PM3 (TR.005)</h3>
            </a>
            <form action="avs_5" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_5", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_5_button" type="submit" value="Post MCC V">
            </form>
        </div> <!-- end content mcc_5 -->
        <br>

        <div class="content" class="MCC" id="MCC_7"> <!-- end content mcc_7 -->
            <a href="#MCC_7">
                <h3>MCC VII PM3 (TR.005)</h3>
            </a>
            <form action="avs_7" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_7", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_7_button" type="submit" value="Post MCC VII">
            </form>
        </div> <!-- end content mcc_7 -->
        <br>

        <div class="content" class="MCC" id="MCC_3"> <!-- start content mcc_3 -->
            <a href="#MCC_3">
                <h3>MCC III PM3 (TR.005)</h3>
            </a>
            <form action="avs_3" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_3", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_3_button" type="submit" value="Post MCC III">
            </form>
        </div> <!-- end content mcc_3 -->
        <br>

        <h1 id="area">--- AREA SP3 ---</h1>
        <br>

        <div class="content" class="MCC" id="MCC_D"> <!-- start content MCC_D -->
            <a href="#MCC_D">
                <h3>MCC D SP3 (TR.009)</h3>
            </a>
            <h3 class="jam"></h3>
            <form action="avs_d" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_D", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_D_button" type="submit" value="Post MCC D">
            </form>
        </div> <!-- end content MCC_D -->
        <br>

        <div class="content" class="MCC" id="MCC_B"> <!-- start content MCC_B -->
            <a href="#MCC_B">
                <h3>MCC B SP3 (TR.009)</h3>
            </a>
            <form action="avs_b" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_B", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_B_button" type="submit" value="Post MCC B">
            </form>
        </div> <!-- end content MCC_B -->
        <br>

        <div class="content" class="MCC" id="MCC_C"> <!-- start content MCC_C -->
            <a href="#MCC_C">
                <h3>MCC C SP3 (TR.805)</h3>
            </a>
            <form action="avs_c" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_C", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_C_button" type="submit" value="Post MCC C">
            </form>
        </div> <!-- end content MCC_C -->
        <br>

        <div class="content" class="MCC" id="MCC_A"> <!-- start content MCC_A -->
            <a href="#MCC_A">
                <h3>MCC A SP3 (TR.009)</h3>
            </a>
            <form action="avs_a" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_A", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_A_button" type="submit" value="Post MCC A">
            </form>
        </div> <!-- end content MCC_A -->
        <br>

        <div class="content" class="MCC" id="MCC_HTM_SP1"> <!-- start content MCC_HTM_SP1 -->
            <a href="#MCC_HTM_SP1">
                <h3>HTM SP1 SP3 (TR.010)</h3>
            </a>
            <form action="avs_htm_sp1" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_HTM_SP1", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_HTM_SP1_button" type="submit" value="Post HTM SP1">
            </form>
        </div> <!-- end content MCC_HTM_SP1 -->
        <br>

        <div class="content" class="MCC" id="MCC_HTM_SP2"> <!-- start content MCC_HTM_SP2 -->
            <a href="#MCC_HTM_SP2">
                <h3>HTM SP2 SP3 (TR.010)</h3>
            </a>
            <form action="avs_htm_sp2" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_HTM_SP2", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_HTM_SP2_button" type="submit" value="Post HTM SP2">
            </form>
        </div> <!-- end content MCC_HTM_SP2 -->
        <br>

        <div class="content" class="MCC" id="MCC_HTM_PM1"> <!-- start content MCC_HTM_PM1 -->
            <a href="#MCC_HTM_PM1">
                <h3>HTM PM1 SP3 (TR.007)</h3>
            </a>
            <form action="avs_htm_pm1" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_HTM_PM1", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_HTM_PM1_button" type="submit" value="Post HTM PM1">
            </form>
        </div> <!-- end content MCC_HTM_PM1 -->
        <br>

        <div class="content" class="MCC" id="MCC_HTM_PM2"> <!-- start content MCC_HTM_PM2 -->
            <a href="#MCC_HTM_PM2">
                <h3>HTM PM2 SP3 (TR.007)</h3>
            </a>
            <form action="avs_htm_pm2" method="post">
                <table>
                    <tbody>
                        <?php
                        echo $model['tableRow'];
                        foreach (statement("MCC_HTM_PM2", $model['connection']) as $key => $value) { ?>
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
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_ampere" ?>" type="text" inputmode="numeric" />
                                </td>
                                <td>
                                    <input id="<?php echo $value['name'] ?>" class="avs_input" name="<?php echo $value["name"] . "_temperature" ?>" type="text" inputmode="numeric" />
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="MCC_HTM_PM2_button" type="submit" value="Post HTM PM2">
            </form>
        </div> <!-- end content MCC_HTM_PM2 -->
        <br>

    </div> <!-- container -->

    <!-- <div class="to-top"> -->

    </div>

    <footer>

        <p class="footer">Copyright ©2023 | <a href="https://wa.me/08983456945">Doni Darmawan</a></p>

    </footer>
    <script>
        // ARRAY OF ALL INPUT FORM
        let array_of_input_data = document.getElementsByClassName("avs_input");

        for (let i = 0; i < array_of_input_data.length; i++) {

            let input = array_of_input_data[i]

            let parent_element = input.parentElement.parentElement; // (tr node)
            let column_funcloc = parent_element.children[5]; // (funcloc column)

            let input_ampere = parent_element.children[6].children[0];
            let input_temperature = parent_element.children[7].children[0];

            if (column_funcloc.innerText == "-") { // jika funcloc == strip (-)

                input_ampere.value = 0; // input ampere
                input_temperature.value = 0; // input temperature

                input_ampere.onchange = function() {

                    try {
                        input_ampere.value = Number(input_ampere.value);
                        if (isNaN(input_ampere.value)) {
                            throw new Error("Provide a number !")
                        }
                    } catch (error) {
                        alert("⚠️ Provide a number !");
                        input_ampere.value = 0;
                    }

                    if (Number(input_ampere.value) > 0) {
                        alert("⚠️ Load should not be more than zero !");
                        input_ampere.value = 0;
                    } else if (Number(input_ampere.value) < 0) {
                        alert("⚠️ Load cannot be less than zero !");
                        input_ampere.value = 0;
                    }
                }

                input_temperature.onchange = function() {

                    try {
                        input_temperature.value = Number(input_temperature.value);
                        if (isNaN(input_temperature.value)) {
                            throw new Error("Provide a number !")
                        }
                    } catch (error) {
                        alert("⚠️ Provide a number !");
                        input_temperature.value = 0;
                    }

                    if (input_temperature.value > 0) {
                        alert("⚠️ Temperature should not be more than zero !")
                        input_temperature.value = 0;
                    } else if (input_temperature.value < 0) {
                        alert("⚠️ Temperature can't be less than zero !");
                        input_temperature.value = 0;
                    }
                }

            } else { // isset(funcloc) == true

                // WITH NOMINAL MOTOR

                let ampere_nominal = 0;
                if (i % 2 == 1) {

                    ampere_nominal = Number(parent_element.children[3].textContent.trim())

                    input_ampere.onchange = function() {

                        try {
                            input_ampere.value = Number(input_ampere.value);
                            if (isNaN(input_ampere.value)) {
                                throw new Error("Provide a number !")
                            }
                        } catch (error) {
                            alert("⚠️ Provide a number !");
                            input_ampere.value = 0;
                        }

                        if (Number(input_ampere.value) > ampere_nominal) {
                            alert("⚠️ Load should not be more than nominal !");
                            input_ampere.value = 0;
                        } else if (Number(input_ampere.value) < 0) {
                            alert("⚠️ Load can't be less than zero !");
                            input_ampere.value = 0;
                        }
                    }

                    input_temperature.onchange = function() {

                        try {
                            input_temperature.value = Number(input_temperature.value);
                            if (isNaN(input_temperature.value)) {
                                throw new Error("Provide a number !")
                            }
                        } catch (error) {
                            alert("⚠️ Provide a number !");
                            input_temperature.value = 0;
                        }

                        if (Number(input_temperature.value) > 150) {
                            alert("⚠️ Temperature should not be more than 150°C !");
                            input_temperature.value = 0;
                        } else if (Number(input_temperature.value) < 0) {
                            alert("⚠️ Load can't be less than zero !");
                            input_temperature.value = 0;
                        }
                    }
                }
            }
        }

        // NAVBAR
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function addZero(value) {
            if (value <= 9) {
                return "0" + value
            } else {
                return value;
            }
        }
        setInterval(() => {
            let jam = document.getElementsByClassName("jam")
            let datetime = new Date();
            let hour = datetime.getHours();
            let minute = datetime.getMinutes();
            let second = datetime.getSeconds();

            for (let i = 0; i < jam.length; i++) {
                jam[i].textContent = addZero(hour) + ":" + addZero(minute) + ":" + addZero(second) + " wib"
                // console.info(addZero(hour) + ":" + addZero(minute) + ":" + addZero(second))
            }
        }, 1000);
    </script>
</body>

</html>