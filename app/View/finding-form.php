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
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Montserrat";
    }

    .container {
        position: relative;
        margin: auto;
        position: relative;
        /* top: 25%; */
        /* transform: translateY(25%); */
        height: 100vh;
        display: flex;
        align-items: center;
    }

    form {
        width: 300px;
        margin: auto;
    }

    label {
        font-weight: 500;
        font-size: large;
    }

    .content {
        margin-bottom: 15px;
    }

    .input-field {
        border: 1px solid black;
        border-radius: 5px;
        padding: 8px;
        width: inherit;
        display: inline-block;
        width: 100%;
        background-color: white;
        font-family: "Montserrat";
    }

    input[type="submit"] {
        font-family: "Poppins";
        background-color: rgb(132, 189, 0);
        padding: 5px 8px;
        border-radius: 8px;
        margin: 8px 0px 8px 8px;
        color: white;
        border: none;
        outline: none;
        font-weight: 400;
        font-size: large;
        font-family: "Montserrat", "Arial";
        text-align: center;
        float: right;
    }


    input[type="submit"]:hover {
        cursor: pointer;
        box-shadow: 0px 0px 6px 1px rgb(0, 0, 0, 0.3);
        background-color: #77aa00;
    }

    #homeButton {
        font-family: "Poppins";
        /* background-color: #6599ff; */
        background-color: #2e2661;
        padding: 5px 12px;
        border-radius: 8px;
        margin: 8px 8px 8px 0px;
        color: white;
        border: none;
        outline: none;
        font-size: large;
        font-family: "Montserrat", "Arial";
        text-align: center;
        float: left;
    }

    #homeButton:hover {
        cursor: pointer;
    }

    .content h1 {
        margin-bottom: 20px;
        font-weight: 700;
    }

    .file[type="file"] {
        display: block;
        cursor: pointer;
    }

    .description {
        overflow-wrap: break-word;
    }

    textarea {
        resize: vertical;
        min-height: 50px;
        max-height: 100px;
        /* overflow: scroll; */
    }
</style>

<body>
    <div class="container">
        <form action="finding-upload" method="post" enctype="multipart/form-data">
            <div class="content">
                <h1 id="title">Upload Finding</h1>
                <label for="from-file">From File
                    <br>
                    <input type="file" class="file" name="from-file" id="from-file">
                </label>
            </div>
            <div class="content">
                <label for="from-camera">From Camera
                    <br>
                    <input type="file" class="file" name="from-camera" id="from-camera" accept="image/*" capture="environment">
                </label>
            </div>
            <div class="content">
                <label for="name">Name
                    <br>
                    <input maxlength="20" placeholder="Example: M-2-2" type="text" class="name input-field" name="name" id="name">
                </label>
            </div>
            <div class="content">
                <label for="area">Area
                    <br>
                    <input maxlength="3" placeholder="Example: SP7" type="text" class="area input-field" name="area" id="area">
                </label>
            </div>
            <div class="content">
                <label for="equipment">Equipment
                    <br>
                    <input maxlength="9" placeholder="Example: ELP001709" type="text" class="equipment input-field" name="equipment" id="equipment">
                </label>
            </div>
            <div class="content">
                <label for="funcloc">Funcloc
                    <br>
                    <input maxlength="30" placeholder="Example: FP-01-SP7-PU02" type="text" class="funcloc input-field" name="funcloc" id="funcloc">
                </label>
            </div>
            <div class="content resizable">
                <label for="description">Description
                    <br>
                    <textarea maxlength="125" placeholder="Example: Suara gearbox kasar, perlu cek departemen MTS" type="text" class="description input-field" name="description" id="description"></textarea>
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
        // let input_field = document.getElementsByClassName("input-field");
        // let button = document.getElementById("query");

        // console.info(input_field[`${input_field.length - 1}`]);


        // array = [];
        // for (let i = 0; i < input_field.length; i++) {
        //     input_field[i].onblur = () => {
        //         array.push(input_field[i].value);
        //     }
        // }


        // function isFilled() {
        //     for (let i = 0; i < input_field.length; i++) {
        //         if (input_field[i].value.length > 4) {
        //             return true;
        //         }
        //     }
        // }

        // console.info(isFilled());

        // button.disabled = true;

        // let name_value = "";
        // let area_value = "";
        // let equipment_value = "";
        // let funcloc_value = "";
        // let description_value = "";

        // let array = [];

        // console.info(array);
    </script>
</body>

</html>