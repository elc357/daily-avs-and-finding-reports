<?php

function ceiling($number, $significance = 10)
{
    return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <h1><?= ceiling(74) ?></h1>
</body>

</html>