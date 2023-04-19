<?php

$error = "";
if (!isset($_SESSION['user'])) {
    if (isset($_GET['user']) && isset($_GET['password'])) {

        $user = trim($_GET['user'], " ");
        $password = trim($_GET['password'], " ");

        if ($model['userRepository']->verify($user, $password) == 1) {
            $_SESSION['time'] = time();
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            header('location: /');
            exit();
        } else {
            $error = "Login gagal";
        }
    }
} else {
    header("Location: /");
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
    <title><?= $model['title'] ?></title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        max-height: 100vh;
    }


    .container {
        margin-top: 20px;
        min-width: 500px;
        margin-left: 50%;
        transform: translate(-50%, 0);
        justify-content: center;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .body {
        display: flex;
        justify-content: center;
        flex-direction: column;
        max-width: 300px;
    }

    table {
        max-width: 500px;
    }

    label {
        font-family: 'Roboto Mono', monospace;
        width: 100px;
    }

    input {
        height: 20px;
        width: 100px;
        margin: 5px;
    }

    #content {
        text-align: center;
        font-weight: 500;
        font-size: 27px;
        margin: 25px;
    }

    #button-submit {
        border: none;
        margin-top: 30px;
        margin-left: 50%;
        transform: translate(-50%, -50%);
        height: 30px;
        width: 100px;
        background-color: rgb(132, 189, 0);
        color: black;
        border-radius: 5px;
    }

    h2 {
        font-weight: 300;
    }
</style>

<body>
    <div class="container">

        <?php if ($error != " ") { ?>
            <h2><?= $error ?></h2>
        <?php } ?>

        <h1 id="content"><?= $model['content'] ?></h1>
        <form>
            <tr>
                <td>
                    <label for="user">
                        Username:
                    </label>
                </td>
                <td>
                    <input autocomplete="off" type="text" name="user" id="user">
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    <label for="password">
                        Password:
                    </label>
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
            <br>
            <input type="submit" name="submit" id="button-submit" value="Login">
        </form>

    </div>

    <script>
        // let login = document.getElementById("content")
        // login.onclick = () => {
        //     window.location = "/login";
        // }

        // let buttonSave = document.getElementById("buttonSave");
        // buttonSave.onmouseover = () => {
        //     buttonSave.style.cursor = "Pointer";
        // }
    </script>
</body>

</html>