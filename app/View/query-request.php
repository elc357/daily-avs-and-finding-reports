<?php

$_GET["mcc"] = "";

if (isset($_GET["module_name_result"])) {
    $module_name_result = $_GET["module_name_result"];
}

function name(string $mcc_name, \PDO $connection)
{
    $sql = <<<SQL
    SELECT name FROM $mcc_name
    SQL;

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


    <!-- icon -->
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />

    <title>Query Request</title>
</head>
<style>
    <?php require __DIR__ . "/../View/Style/query-request.css" ?>
</style>


<body>

    <div class="container">


        <form id="query-request" action="query" method="post">

            <div class="content">
                <h1 id="title">Record</h1>
                <label for="start_date">Start date: <br>
                    <input class="query-select" name="start_date" id="start_date" type="date">
                </label>
            </div>

            <div class="content">
                <label for="end_date">End date: <br>

                    <input class="query-select" name="end_date" id="end_date" type="date">
                </label>
            </div>

            <div class="content">
                <label for="mcc_name">MCC name: <br>

                    <!-- <input name="module_name" id="module_name" list="modules_name"> -->
                    <select class="query-select" name="mcc_name" id="mcc_name">
                        <option selected value="">-- Choose MCC name --</option>

                        <?php foreach ($model["mcc_name"] as $key => $value) { ?>
                            <option value="<?= $value ?>"><?= strtoupper($value) ?></option>
                        <?php } ?>

                    </select>
                </label>
            </div>

            <div class="content">
                <label for="module_name">Module name: <br>

                    <select class="query-select" name="module_name" id="module_name">
                        <option selected value="">-- Choose Module name --</option>
                    </select>
                </label>
            </div>

            <input type="button" value="Home" name="homeButton" id="homeButton">
            <input type="submit" value="Submit" name="query" id="query">

        </form>
    </div>

    <script>
        let homeButton = document.getElementById("homeButton");
        homeButton.onclick = () => {
            window.location = "/";
        }

        // document.location.reload();
        let mcc_name = document.getElementById("mcc_name");
        let module_name = document.getElementById("module_name");
        let start = 0;

        mcc_name.onchange = () => {

            if (start != 0) {
                let nodelist = module_name.children
                for (let i = 0; i < nodelist.length - 1; i++) {
                    console.info(nodelist.length)
                    setTimeout(() => {
                        console.info(nodelist[1])
                        module_name.removeChild(nodelist[1])
                    }, 000);
                }
            }

            if (mcc_name.value != "") {

                ajax = new XMLHttpRequest();
                ajax.open("GET", `entity/${mcc_name.value}`)
                ajax.onload = function() {
                    let array = JSON.parse(ajax.responseText);

                    for (let i = 0; i < array.length; i++) {
                        let option = document.createElement("option");
                        option.setAttribute("class", mcc_name.value)
                        option.setAttribute("id", array[i])
                        option.setAttribute("value", array[i])
                        option.textContent = array[i];
                        module_name.appendChild(option);
                    }
                    start++;
                }
                ajax.send();
                // setTimeout(() => {
                // }, 1000);
            } else {
                console.info("String kosong")
            }
        }

        // module_name.onclick = () => {
        //     if (start < 1) {
        //         alert("⚠️ Choose MCC first !");
        //         module_name.blur();
        //         return false;
        //     } else {
        //         let title = document.getElementById("title")
        //         title.textContent = "";
        //         title.textContent = "Record " + module_name.value;
        //     }
        // }

        let queryRequest = document.getElementById("query-request");
        queryRequest.onsubmit = () => {
            if (mcc_name.value == "" && module_name.value == "") {
                alert("⚠️ MCC & Module can't be empty !")
                return false;
            }
        }
    </script>
</body>

</html>