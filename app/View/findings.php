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
    <!-- inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
    <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />

    <title><?= $model["title"] ?></title>
</head>

<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Inter", sans-serif;
        /* font-family: "Montserrat", "Arial"; */
    }

    ul li {
        list-style-type: none;
    }

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .container {
        margin: 0 auto;
        padding: 20px;
        max-width: 1280px;
    }

    .finding {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        justify-content: center;
        gap: 30px;
    }

    .content {
        font-size: 14px;
        padding: 20px;
        background-color: #dee2e6;
        background-color: #f5f5f5;
        border-radius: 20px;
        box-shadow: 0px 0px 10px 0px rgb(0, 0, 0, 0.6);
    }

    .image {
        border: 1px solid grey;
        height: 350px;
        width: 100%;
        margin-bottom: 20px;
        background-size: clip;
        border-radius: 10px;
        background-position: center;
        /* border-bottom-left-radius: 0;
        border-bottom-right-radius: 0; */
    }

    .info-box {
        width: 100%;
        display: grid;
        grid-template-rows: 90px, 1fr;
        gap: 20px;
        /* margin-bottom: 10px; */
    }

    .info {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }

    .info-left {
        font-weight: 600;
    }

    .info-right {
        grid-column: 2 / -1;
    }

    .status {
        display: inline-block;
    }

    ul li {
        padding: 2px;
    }

    .info-left li {
        text-transform: uppercase;
    }

    /* .status::after {
        content: "-";
        padding: 0 5px;
        background-color: #000;
        display: inline-block;
        margin-left: 10px;
    } */

    .description {
        line-height: 1.5;
    }

    button {
        padding: 10px 12px;
        background-color: teal;
        color: #fff;
        border: none;
        border-radius: 5px;
    }


    /* TV */
    @media (max-width: 1536px) {}

    /* DESKTOP */
    @media (max-width: 1280px) {
        .content {
            font-size: 14px;
        }
    }

    /* LAPTOP */
    @media (max-width: 960px) {
        .finding {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* TABLET */
    @media only screen and (max-width: 768px) {}

    /* HP */
    @media only screen and (max-width: 640px) {
        .finding {
            grid-template-columns: 1fr;
        }
    }
</style>

<body>

    <div class="container">
        <section class="finding">

            <figure class="content">
                <div class="image">
                    <img src="img/1.jpg" alt="Finding">
                </div>
                <div class="info-box">
                    <div class="info">
                        <ul class="info-left">
                            <li>Status</li>
                            <li>Id</li>
                            <li>Name</li>
                            <li>Notif</li>
                            <li>Area</li>
                            <li>Equipment</li>
                            <li>Date</li>
                            <li>Funcloc</li>
                        </ul>
                        <ul class="info-right">
                            <li class="status" contenteditable="true" autocorrect="false">Prepared</li>
                            <li class="id">00001</li>
                            <li class="name">M-2-2</li>
                            <li class="notif">80611893</li>
                            <li class="area">PM7</li>
                            <li class="equipment">EMO000365</li>
                            <li class="date">13 Mar 2023</li>
                            <li class="funcloc">FP-01-PM7-CAL-CAL1-TPR1</li>
                        </ul>
                    </div>
                    <div>
                        <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad incidunt consequuntur asperiores architecto</p>
                    </div>
                </div>
            </figure>

            <figure class="content">
                <div class="image">
                    <img src="img/2.jpg" alt="Finding">
                </div>
                <div class="info-box">
                    <div class="info">
                        <ul class="info-left">
                            <li>Status</li>
                            <li>Id</li>
                            <li>Name</li>
                            <li>Notif</li>
                            <li>Area</li>
                            <li>Equipment</li>
                            <li>Date</li>
                            <li>Funcloc</li>
                        </ul>
                        <ul class="info-right">
                            <li class="status">Monitoring</li>
                            <li class="id">00001</li>
                            <li class="name">M-2-2</li>
                            <li class="notif">80611893</li>
                            <li class="area">PM7</li>
                            <li class="equipment">EMO000365</li>
                            <li class="date">13 Mar 2023</li>
                            <li class="funcloc">FP-01-PM7-CAL-CAL1-TPR1</li>
                        </ul>
                    </div>
                    <div>
                        <p class="description">Sirkulasi udara kurang baik menyebabkan ambient </p>
                    </div>
                </div>
            </figure>

            <figure class="content">
                <div class="image">
                    <img src="img/3.jpg" alt="Finding">
                </div>
                <div class="info-box">
                    <div class="info">
                        <ul class="info-left">
                            <li>Status</li>
                            <li>Id</li>
                            <li>Name</li>
                            <li>Notif</li>
                            <li>Area</li>
                            <li>Equipment</li>
                            <li>Date</li>
                            <li>Funcloc</li>
                        </ul>
                        <ul class="info-right">
                            <li class="status">Closed</li>
                            <li class="id">00001</li>
                            <li class="name">M-2-2</li>
                            <li class="notif">80611893</li>
                            <li class="area">PM7</li>
                            <li class="equipment">EMO000365</li>
                            <li class="date">13 Mar 2023</li>
                            <li class="funcloc">FP-01-PM7-CAL-CAL1-TPR1</li>
                        </ul>
                    </div>
                    <div>
                        <p class="description">Sirkulasi udara kurang baik menyebabkan ambient </p>
                    </div>
                </div>
            </figure>
        </section>
    </div>

    <script>
        let status = document.getElementsByClassName("status");

        for (stat in status) {

            if (!isNaN(stat)) {

                if (status[stat].textContent.trim() == "Prepared") {
                    status[stat].style.backgroundColor = "red";
                    status[stat].style.color = "white";
                } else if (status[stat].textContent.trim() == "Monitoring") {
                    status[stat].style.backgroundColor = "yellow";
                } else if (status[stat].textContent.trim() == "Closed") {
                    status[stat].style.backgroundColor = "rgb(0, 255, 0)";
                }

            }
        }
    </script>
</body>

</html>