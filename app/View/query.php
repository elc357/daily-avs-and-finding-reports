<?php

// for max value
function ceiling($number, $significance = 10)
{
    return (is_numeric($number) && is_numeric($significance)) ? (ceil($number / $significance) * $significance) : false;
}

$id = 0;

// $statementCopy = (array) $model['statement']->fetchAll();

$dataPointsAmps = array();
$dataPointsTemp = array();
foreach ($model["trend"]->fetchAll() as $key => $value) {
    $date = new DateTime($value["created_at"]);
    $timestamp = $date->getTimestamp();
    $values = (string) $timestamp;
    array_push($dataPointsAmps, array("x" => (int) ($values . "000"), "y" => (int) $value["ampere"]));
    array_push($dataPointsTemp, array("x" => (int) ($values . "000"), "y" => (int) $value["temperature"]));
    // $dataPointsAmps[] = array("x" => (int) ($values . "000"), "y" => (int) $value["ampere"]);
    // echo $value["ampere"] . " dan " . $value["created_at"] . "IN: " . "<br/>";
}

// foreach ($statementCopy as $key => $value) {
//     echo $value["temperature"] . "<br/>";
// }


// $myTestDataPoints = array();
// foreach ($model["trend"]->fetchAll() as $key => $value) {
//     array_push($myTestDataPoints, array("x" => (int) $value["x"], "y" => (int) $value["y"] - 10));
// }
// var_dump($myTestDataPoints);


// $k = 1678440674000;
// for ($i = 0; $i < 10; $i++) {
//     $k += 86400000;
//     echo $k . "<br/>";
// }
// var_dump($dataPointsAmps);

foreach ($dataPointsAmps as $key => $value) {

    // echo 'array("x" => ' . $value['x'] . ', "y" => ' . $value['y'] . '),' . "<br/>";

    // foreach ($value as $k => $result) {
    //     echo $result . "<br/>";
    // }
}

// AMPERE NOMINAL
$nominal_ampere = 0;
foreach ($model["nominal"] as $key => $value) {
    $nominal_ampere = $value["ampere"];
}

$dataPoints = array(
    array("x" => 1483381800000, "y" => 110),
    array("x" => 1483468200000, "y" => 154),
    array("x" => 1483554600000, "y" => 153),
    array("x" => 1483641000000, "y" => 124),
    array("x" => 1483727400000, "y" => 105),
    array("x" => 1483813800000, "y" => 148),
    array("x" => 1483900200000, "y" => 114),
    array("x" => 1483986600000, "y" => 141),
    array("x" => 1484073000000, "y" => 150),
    array("x" => 1484159400000, "y" => 132),
    array("x" => 1484245800000, "y" => 128), // 86.400.000
    array("x" => 1484332200000, "y" => 120), // 86.400.000
    array("x" => 1484418600000, "y" => 145), // 86.400.000
    array("x" => 1484505000000, "y" => 134) // 86.400.000
);

// $data = json_encode($dataPoints);

// var_dump($data);

// $dataPoints = json_encode($dataPoints);

$myNewDataPoints = array(
    array("x" => 1677576674000, "y" => 121),
    array("x" => 1677663074000, "y" => 122),
    array("x" => 1677749474000, "y" => 122),
    array("x" => 1677835874000, "y" => 124),
    array("x" => 1677922274000, "y" => 135),
    array("x" => 1678008674000, "y" => 125),
    array("x" => 1678095074000, "y" => 115),
    array("x" => 1678181474000, "y" => 144),
    array("x" => 1678267874000, "y" => 143),
    array("x" => 1678354274000, "y" => 105),
    array("x" => 1678440674000, "y" => 134),
    array("x" => 1678527074000, "y" => 143),
    array("x" => 1678613474000, "y" => 118),
    array("x" => 1678699874000, "y" => 115),

    array("x" => 1678786274000, "y" => 123),
    array("x" => 1678872674000, "y" => 145),

    array("x" => 1678959074000, "y" => 150),
    array("x" => 1679045474000, "y" => 136),
    array("x" => 1679131874000, "y" => 145),
    array("x" => 1679218274000, "y" => 105),
    array("x" => 1679304674000, "y" => 125),
    array("x" => 1679391074000, "y" => 120),
    array("x" => 1679477474000, "y" => 135),
    array("x" => 1679563874000, "y" => 114),
    array("x" => 1679650274000, "y" => 138)
);

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


    <!-- icon -->
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />

    <title>Record of <?= $model['module_name'] ?></title>
</head>
<style>
    <?php require __DIR__ . "/../View/Style/query.css"
    ?>
</style>

<body>
    <div class="container">

        <div class="content" class="MCC" id="MCC_2"> <!-- start content mcc_2 -->
            <a href="#module_name">
                <h3>Record of <?= $model['module_name'] ?></h3>
            </a>

            <form action="avs_2" method="post">
                <table>
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Load</th>
                            <th>Temp</th>
                            <th>Checked By</th>
                            <th>Checked At</th>
                        </tr>
                        <?php
                        foreach ($model["statement"] as $key => $value) {
                            $id++ ?>
                            <tr>
                                <td>
                                    <?php echo $id ?>
                                </td>
                                <td>
                                    <?php echo $value['name']; ?>
                                </td>
                                <td>
                                    <?php if ($value['ampere'] == null) {
                                        echo "-";
                                    } else {
                                        echo $value['ampere'];
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($value['temperature'] == null) {
                                        echo "-";
                                    } else {
                                        echo $value['temperature'];
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($value['checked_by'] == null) {
                                        echo "-";
                                    } else {
                                        echo $value['checked_by'];
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($value['created_at'] == null) {
                                        echo "-";
                                    } else {
                                        $date = date_create($value['created_at']);
                                        echo date_format($date, "d M Y H:i:s");
                                    } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <input id="backButton" type="button" value="Back">
                <input id="printButton" type="button" value="Print">
            </form>
        </div> <!-- end content mcc_2 -->
        <br>
        <!-- chart here -->
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
    <script>
        let backButton = document.getElementById("backButton");
        backButton.onclick = () => {
            window.location = "/query-request";
        }

        let printButton = document.getElementById("printButton");
        printButton.onclick = () => {
            printButton.style.display = "none";
            backButton.style.display = "none";
            window.print();
        }

        window.onload = function() {

            let chart = new CanvasJS.Chart("chartContainer", {
                // width: 320,
                animationEnabled: true,
                theme: "light2",
                title: {
                    fontSize: 21,
                    fontFamily: "Calibri",
                    titleFontFamily: "Montserrat",
                    text: "<?= $model['module_name'] . " ( " . $nominal_ampere . "A )" ?>"
                },
                axisX: {
                    valueFormatString: "DD MMM"
                },
                axisY: {
                    title: "Amps",
                    includeZero: true,
                    // maximum: "<?= $nominal_ampere ?>"
                    maximum: "<?= ceiling($nominal_ampere); ?>"
                },
                axisY2: {
                    title: "Temp",
                    includeZero: true,
                    maximum: "100"
                },
                data: [{
                        // axisYType: "first",
                        showInLegend: true,
                        legendText: "Amps",
                        // color: "#6599FF",
                        color: "rgb(132, 189, 0)",
                        // color: "2F2761",
                        markerSize: 5,
                        type: "splineArea",
                        // type: "spline",
                        xValueType: "dateTime",
                        xValueFormatString: "DD MMM",
                        yValueFormatString: "#,##0 Amps",

                        dataPoints: <?= json_encode($dataPointsAmps); ?>
                    },
                    {
                        axisYType: "secondary",
                        showInLegend: true,
                        legendText: "Temp",
                        // fillOpacity: 1,
                        color: "#6599FF",
                        markerSize: 5,
                        type: "splineArea",
                        // type: "spline",
                        xValueType: "dateTime",
                        xValueFormatString: "DD MMM",
                        yValueFormatString: "#,##0 °C",

                        dataPoints: <?= json_encode($dataPointsTemp); ?>
                    }
                ]


            });

            chart.render();

        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


</body>

</html>