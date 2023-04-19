<?php

namespace Controller {

    require_once __DIR__ . "/../App/View.php";
    require_once __DIR__ . "/../Helper/Database.php";
    require_once __DIR__ . "/../Repository/UserRepository.php";
    require_once __DIR__ . "/../Entity/Finding.php";

    use App\View;
    use DateTime;
    use Helper\Database;
    use UserRepository\UserRepositoryImpl;
    use Entity\Finding;

    class HomeController
    {

        // CREATE GLOBAL CONNECTION
        public \PDO $connection;

        public function HomeController()
        {

            $connection = Database::getConnection();

            // RENDER AN TABLE HEAD 
            function tableRow()
            {
                $table_row = <<<HTML
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>kW</th>
                    <th>IN</th>
                    <th>Pole</th>
                    <th>Funcloc</th>
                    <th>Load</th>
                    <th>Temp</th>
                </tr>
                HTML;

                return $table_row;
            }

            $model = [
                "title" => "AVS PM3",
                "content" => "AVS PM3",
                "connection" => $connection, // send the connection
                "tableRow" => tableRow(),
            ];

            // VIEW - INDEX
            View::render("index", $model);
        }
    }

    // =+=+=+=+=+=+=+=+=+ DATA CONTROLLER =+=+=+=+=+=+=+=+=+
    class DataController
    {
        // CREATE GLOBAL CONNECTION
        public \PDO $connection;

        // STORED DATA INTO AVS MCC DATABASE
        public function avs(string $mcc)
        {
            $connection = Database::getConnection();
            $checked_by = $_SESSION['user'];

            // QUERY ALL DATA FROM MCC DATABASES
            $sql = "SELECT * FROM MCC_$mcc";
            $statement = $connection->prepare($sql);
            $statement->execute();

            $array_of_name = [];
            $array_of_ampere = [];
            $allowed_max_temperature = 150;

            foreach ($statement as $key => $value) {

                // INSERT COLUMN NAME INTO ARRAY OF NAME
                $array_of_name[] = $value['name'];

                // CONVERT NULLABLE AMPERE INTO NUMBER
                if (gettype($value['ampere']) == "NULL") {
                    $array_of_ampere[] = 0;
                    // echo "nol" . PHP_EOL;
                } else {
                    $array_of_ampere[] = $value['ampere'];
                    // echo "tidak nol" . PHP_EOL;
                }
            }

            // GET ARRAY OF INPUTS
            $array_of_ampere_input = [];
            $array_of_temperature_input = [];

            for ($i = 0; $i < sizeof($array_of_name); $i++) {
                if (
                    $_POST[$array_of_name[$i] . "_ampere"] != "" and
                    $_POST[$array_of_name[$i] . "_temperature"] != ""
                ) {
                    $array_of_ampere_input[] = $_POST[$array_of_name[$i] . "_ampere"];
                    $array_of_temperature_input[] = $_POST[$array_of_name[$i] . "_temperature"];
                }
            }

            // CONNECTION FOR INSERT DATA USER INPUT
            $new_connection = Database::getConnection();
            $new_connection->query("START TRANSACTION");

            if (
                $_SERVER["REQUEST_METHOD"] == "POST" &&
                // VALIDATION FOR EACH INPUT MUST HAVE A VALUE
                sizeof($array_of_ampere_input) == sizeof($array_of_name) &&
                sizeof($array_of_temperature_input) == sizeof($array_of_name)
            ) {

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

                    // INSERT INTO DATABASE AVS MCC
                    $sql_avs = "INSERT INTO avs_mcc_$mcc (name, ampere, temperature, checked_by, created_at) VALUES (?, ?, ?, ?, ?)";
                    $new_statement = $new_connection->prepare($sql_avs);

                    if ($ampere_input > $allowed_max_ampere or $ampere_input < 0) {

                        // AMPERE > IN or AMPERE < 0
                        $baris = $i + 1;

                        $new_connection->query("ROLLBACK");

                        $model = [
                            "input" => "ampere",
                            "name" => $name,
                            "baris" => $baris
                        ];

                        View::render("alert", $model);
                        return;
                    } else if ($temperature_input > $allowed_max_temperature or $temperature_input < 0) {

                        // TEMPERATURE > 150 or TEMPERATURE < 0
                        $baris = $i + 1;

                        $new_connection->query("ROLLBACK");

                        $model = [
                            "input" => "temperature",
                            "name" => $name,
                            "baris" => $baris
                        ];

                        View::render("alert", $model);
                        return;
                    } else {

                        date_default_timezone_set('Asia/Jakarta');
                        $datetime = new DateTime();
                        // $datetime->setDate(2023, 03, 07); // SET DATE MANUALLY
                        // $datetime->setDate(2023, 05, 04); // SET DATE MANUALLY
                        // $datetime->setTime(20, 12, 12);

                        $arr_datetime = (array) $datetime;

                        // EXECUTE DATA INTO DATABASE AVS MCC
                        $new_statement->execute([
                            $name, $ampere_input,
                            $temperature_input, $checked_by, $arr_datetime['date']
                        ]);
                    }
                }

                $new_connection->query("COMMIT");
                $new_connection = null;

                $model = [
                    "mcc" => $mcc
                ];

                View::render("success", $model);
                return;
            } else {

                // IF THERE IS ONE INPUT THAT IS NOT FILLED
                View::render("not-filled", $model = []);
                return;
            }
        }

        public function queryRequest()
        {

            $connection = Database::getConnection();

            $sql_mcc = "SHOW TABLES LIKE 'MCC%'";
            $statement = $connection->prepare($sql_mcc);
            $statement->execute();

            $mcc_name = [];
            foreach ($statement as $keys => $value) {
                foreach ($value as $key => $result) {
                    if (is_integer($key)) {
                        $mcc_name[] = $result;
                    }
                }
            }

            array_pop($mcc_name);


            // $name_of_mcc_7 = [];
            // function getName(array $name_of_array, string $mcc_name)
            // {
            //     $connection = Database::getConnection();

            //     $sql = "SELECT name FROM ?";
            //     $statement = $connection->prepare($sql);
            //     $statement->execute([$mcc_name]);
            // }


            $model = [
                "connection" => $connection,
                "mcc_name" => $mcc_name,
                // "statement" => getColumnName($mcc_name),
            ];

            View::render("query-request", $model);
        }

        public function query()
        {

            $connection = Database::getConnection(); // GET ALL FROM AVS
            $connection_nominal = Database::getConnection(); // GET NOMINAL MOTOR
            $connection_trend = Database::getConnection(); // GET TREND


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if (($_POST['start_date'] == "") && ($_POST['end_date'] == "")) {


                    $date = new DateTime();

                    // $date->setTimeZone(new DateTimeZone("Asia/Jakarta"));
                    $week = clone $date;
                    $min_week = new \DateInterval("P1M");
                    $min_week->invert = 1;
                    $week->add($min_week);
                    $week = (array) $week;
                    $start_date = $week['date']; // date start

                    $add_day = new \DateInterval("P1D");
                    $date->add($add_day);
                    $date_now = (array) $date;
                    $end_date = $date_now["date"]; // date end
                } else {
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                }

                $mcc_name = $_POST['mcc_name'];
                $module_name = $_POST['module_name'];

                // echo $mcc_name . " dan " . $module_name;

                // $sql = <<<SQL
                // select (id, name, ampere, temperature, checked_by, created_at)
                // from avs_$mcc_name where created_at between ? and ? and name = ?;
                // SQL;

                // $statement = $connection->prepare("select (id, name, ampere, temperature, checked_by, created_at) from avs_" . $mcc_name  . " where created_at between " . $start_date . " and " . $end_date . " and name = " . $module_name);

                $sql = "select * from avs_" . $mcc_name . " where created_at between ? and ? and name = ?";
                $sql_nominal = "select ampere from " . $mcc_name . " where name = " . "'" . $module_name . "'";
                // $sql_nominal = "select * from " . $mcc_name . " where name = ?";
                $sql_trend  = "select * from avs_" . $mcc_name . " where created_at between ? and ? and name = ?";

                $statement = $connection->prepare($sql);
                $statement_nominal = $connection_nominal->prepare($sql_nominal);
                $statement_trend = $connection_trend->prepare($sql_trend);

                $statement->execute([$start_date, $end_date, $module_name]);
                $statement_nominal->execute();
                $statement_trend->execute([$start_date, $end_date, $module_name]);



                $model = [
                    "statement" => $statement, // ALL
                    "nominal" => $statement_nominal, // NOMINAL
                    "trend" => $statement_trend, // TREND
                    "module_name" => $module_name,
                    // "mcc_name" => $mcc_name,
                    // "start_date" => $start_date,
                    // "end_date" => $end_date,
                    // "module_name" => $module_name,
                ];

                View::render("query", $model);
            }
            $connection = null;
            $connection_nominal = null;
            $connection_trend = null;
        }
    }

    class FindingController
    {
        // =========================================
        // ================ FINDING ================
        // =========================================
        public function finding()
        {

            $connection = Database::getConnection();
            $sql = "SELECT status, id, name, notif, area, equipment, finddate, findby, funcloc, description, format FROM finding WHERE deleted = false ORDER BY id DESC";
            $statement = $connection->prepare($sql);
            $statement->execute();

            $data = [];

            foreach ($statement as $keys => $value) {
                $findingObj = new Finding();
                foreach ($value as $key => $result) {
                    if (!is_integer($key)) {
                        if ($key == "status") {
                            if (is_null($result)) {
                                $findingObj->setStatus("-");
                            } else {
                                $findingObj->setStatus($result);
                            }
                        } else if ($key == "id") {
                            if (is_null($result)) {
                                $findingObj->setId("-");
                            } else {
                                $findingObj->setId($result);
                            }
                        } else if ($key == "name") {
                            if (is_null($result)) {
                                $findingObj->setName("-");
                            } else {
                                $findingObj->setName($result);
                            }
                        } else if ($key == "notif") {
                            if (is_null($result)) {
                                $findingObj->setNotif("-");
                            } else {
                                $findingObj->setNotif($result);
                            }
                        } else if ($key == "area") {
                            if (is_null($result)) {
                                $findingObj->setArea("-");
                            } else {
                                $findingObj->setArea($result);
                            }
                        } else if ($key == "equipment") {
                            if (is_null($result)) {
                                $findingObj->setEquipment("-");
                            } else {
                                $findingObj->setEquipment($result);
                            }
                        } else if ($key == "finddate") {
                            if (is_null($result)) {
                                $findingObj->setFinddate("-");
                            } else {
                                $findingObj->setFinddate($result);
                            }
                        } else if ($key == "findby") {
                            if (is_null($result)) {
                                $findingObj->setFindby("-");
                            } else {
                                $findingObj->setFindby($result);
                            }
                        } else if ($key == "funcloc") {
                            if (is_null($result)) {
                                $findingObj->setFuncloc("-");
                            } else {
                                $findingObj->setFuncloc($result);
                            }
                        } else if ($key == "description") {
                            if (is_null($result)) {
                                $findingObj->setDescription("-");
                            } else {
                                $findingObj->setDescription($result);
                            }
                        } else if ($key == "format") {
                            if (is_null($result)) {
                                $findingObj->setFormat("jpg");
                            } else {
                                $findingObj->setFormat($result);
                            }
                        }
                    }
                }

                $data[] = $findingObj;
            }

            $model = [
                "title" => "Finding",
                "statement" => $statement,
                "data" => $data,
            ];

            View::render("finding", $model);
        }

        function findingForm()
        {

            $model = [
                "title" => "Finding Form"
            ];

            View::render("finding-form", $model);
        }

        // public function findingUpload()
        // {
        //     if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //         $name = $_POST['name'];
        //         $area = $_POST['area'];
        //         $equipment = $_POST['equipment'];
        //         $findby = $_SESSION['user'];
        //         $funcloc = $_POST['funcloc'];
        //         $description = $_POST['description'];


        //         $connection = Database::getConnection();
        //         $sql = "INSERT INTO finding (name, area, equipment, findby, funcloc, description, format) values (?, ?, ?, ?, ?, ?, ?)";
        //         $statement = $connection->prepare($sql);
        //         $statement->execute([$name, $area, $equipment, $findby, $funcloc, $description, $format]);

        //         $connection = null;
        //     }
        // }

        public function findingUpdate()
        {
            $connection = Database::getConnection();
            $connection->query("START TRANSACTION");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $status = $_POST['finding-status'];
                $id = $_POST['finding-id'];
                $name = $_POST['finding-name'];
                $notif = $_POST['finding-notif'];
                $area = $_POST['finding-area'];
                $equipment = $_POST['finding-equipment'];
                $findby = $_POST['finding-findby'];
                $funcloc = $_POST['finding-funcloc'];
                $description = $_POST['finding-description'];

                if ($status == "Prepared" or $status == "Monitoring" or $status == "Closed") {

                    $sql = "UPDATE finding set status = ?, name = ?, notif = ? , area = ?, equipment = ?, findby = ?, funcloc = ?, description = ? where id = ?";

                    $statement = $connection->prepare($sql);
                    $statement->execute([$status, $name, $notif, $area, $equipment, $findby, $funcloc, $description, $id]);

                    $connection->query("COMMIT");
                    $connection = null;

                    // header("Location: /finding");

                    // $model = [
                    //     "title" => "Finding Update",
                    //     "finding-status" => $status,
                    //     "finding-id" => $id,
                    //     "finding-notif" => $notif,
                    // ];

                    // View::render("finding-update", $model);
                } else {
                    header("Location: /finding");
                }
            }
        }

        public function findingDelete()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id = $_POST['id'];
                // $deleted = $_POST['deleted'];

                $connection = Database::getConnection();
                $sql = "UPDATE finding SET deleted = true where id = ?";
                $statement = $connection->prepare($sql);
                $statement->execute([$id]);
                $connection = null;
            }
        }

        public function findingUpload()
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $id = 1;
                $name = $_POST['name'];
                $name_format = str_replace(" ", "", $name);
                $area = $_POST['area'];
                $equipment = $_POST['equipment'];
                $findby = $_SESSION['user'];
                $funcloc = $_POST['funcloc'];
                $description = $_POST['description'];

                // GET ID TO USED FOR NAME OF IMAGE UPLOADED
                $connection = Database::getConnection();
                $sql = "SELECT id FROM finding ORDER BY id DESC LIMIT 1";
                $statement = $connection->prepare($sql);
                $statement->execute();

                foreach ($statement as $key => $value) {
                    // var_dump($value["id"]);

                    if ($value["id"] == "") {
                        $id = 1;
                    } else {
                        $id = (int) $value["id"] + 1;
                    }
                }


                $connection = null;

                // FROM FILE
                $file_name = $_FILES['from-file']['name'];
                $file_type = $_FILES['from-file']['type'];
                $file_size = $_FILES['from-file']['size'];
                $file_tmp_name = $_FILES['from-file']['tmp_name'];
                $file_error = $_FILES['from-file']['error'];

                // FROM CAMERA
                $camera_name = $_FILES['from-camera']['name'];
                $camera_type = $_FILES['from-camera']['type'];
                $camera_size = $_FILES['from-camera']['size'];
                $camera_tmp_name = $_FILES['from-camera']['tmp_name'];
                $camera_error = $_FILES['from-camera']['error'];


                if ($name == "") {
                    $name = "#####";
                }

                if ($area == "") {
                    $area = "###";
                }

                if ($equipment == "") {
                    $equipment = "#########";
                }

                if ($funcloc == "") {
                    $funcloc = "FP-01-###-###-####";
                }

                if ($description == "") {
                    $description = "*Description not set";
                }


                // echo "name : " . $name . "</br>";
                // echo "area : " . $area . "</br>";
                // echo "equipment : " . $equipment . "</br>";
                // echo "findby : " . $findby . "</br>";
                // echo "name : " . $funcloc . "</br>";
                // echo "name : " . $description . "</br>";


                if (
                    $name != "" &&
                    $area != "" &&
                    $equipment != "" &&
                    $findby != "" &&
                    $funcloc != "" &&
                    $description != ""
                ) {

                    // FROM CAMERA
                    // echo "nama: " . $camera_name . "</br>";
                    // echo "tipe: " . $camera_type . "</br>";
                    // echo "size: " . $camera_size . "</br>";
                    // echo "temp: " . $camera_tmp_name . "</br>";
                    // echo "error: " . $camera_error . "</br>";

                    if (($camera_name != "") && ($camera_type != "") && ($camera_type == "image/png" or $camera_type == "image/jpg" or $camera_type == "image/jpeg")  && ($camera_size != "") && ($camera_tmp_name != "") && ($camera_error === 0)) {

                        $file_name = null;
                        $file_type = null;
                        $file_size = null;
                        $file_tmp_name = null;
                        $file_error = null;

                        $format = str_replace("image/", "", $camera_type);
                        move_uploaded_file($camera_tmp_name, __DIR__ . "/../../Public/img/" . "$name_format-$id" . "." . $format);
                    } else if (($file_name != "") && ($file_type != "") && ($file_type == "image/png" or $file_type == "image/jpg" or $file_type == "image/jpeg") && ($file_size != "") && ($file_tmp_name != "") && ($file_error === 0)) {

                        $camera_name = null;
                        $camera_type = null;
                        $camera_size = null;
                        $camera_tmp_name = null;
                        $camera_error = null;

                        $format = str_replace("image/", "", $file_type);
                        move_uploaded_file($file_tmp_name, __DIR__ . "/../../Public/img/" . "$name_format-$id" . "." . $format);
                    } else {
                        // echo "GAGAL KEDUA";
                        header("Location: /");
                        exit();
                    }

                    $connection = Database::getConnection();
                    $sql = "INSERT INTO finding (id, name, area, equipment, findby, funcloc, description, format) values (?, ?, ?, ?, ?, ?, ?, ?)";
                    $statement = $connection->prepare($sql);
                    $statement->execute([$id, $name, $area, $equipment, $findby, $funcloc, $description, $format]);

                    $connection = null;

                    $success = <<<SUC
                            <!DOCTYPE html>
                            <html lang="en">

                            <head>
                                <meta charset="UTF-8" />
                                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                                <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- icon -->
                                <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="32x32" />
                                <link rel="icon" href="https://www.fajarpaper.com/wp-content/uploads/2020/12/fajarpaper-logo-ico.png" sizes="192x192" />
                                <!-- google font -->
                                <link rel="preconnect" href="https://fonts.googleapis.com" />
                                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                                <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />


                                <title>✅ Success</title>
                            </head>

                            <body>
                                <script>
                                    alert("✅ Finding successfully uploaded")

                                    function goBack() {
                                        window.history.back();
                                    }

                                    goBack();
                                </script>
                            </body>

                            </html>
                            SUC;

                    echo $success;
                } else {
                    echo "GAGAL PERTAMA";
                    sleep(10);
                    header("Location: /finding-form");
                    exit();
                }
            }
        }




        function test()
        {

            $model = [
                "title" => "Test",
            ];

            View::render("test", $model);
        }
    }

    class EntityController
    {
        public function mcc(string $queue)
        {
            // $connection = Database::getConnection();

            // $sql_mcc = "SHOW TABLES LIKE 'MCC%'";
            // $statement = $connection->prepare($sql_mcc);
            // $statement->execute();

            // // $tables = [];
            // $mcc_name = [];
            // foreach ($statement as $keys => $value) {

            //     foreach ($value as $key => $result) {
            //         if (is_integer($key)) {
            //             $mcc_name[] = $result;
            //         }
            //     }
            // }

            // array_pop($mcc_name);
            // // return $mcc_name;

            function queryModuleName(string $mcc_name)
            {
                $connection = Database::getConnection();

                $array_of_name = [];
                $sql = "SELECT name FROM $mcc_name ORDER BY id";
                $statement = $connection->prepare($sql);
                $statement->execute();

                foreach ($statement as $key => $value) {
                    $array_of_name[] = $value[0];
                }
                return $array_of_name;

                // return $statement;
            }

            $result = queryModuleName($queue);
            echo json_encode($result);
        }
    }

    class UserController
    {
        public function loginForm()
        {

            $connection = Database::getConnection();
            $UserRepository = new UserRepositoryImpl($connection);

            $model = [
                "title" => "Login AVS PM3",
                "content" => "Login AVS PM3",
                "userRepository" => $UserRepository
            ];

            View::render("loginForm", $model);
        }

        public function logout()
        {
            session_start();
            session_destroy();
            header("Location: /login");
        }

        public function notAllowed()
        {
            $model = [
                'title' => "Restricted",
            ];

            View::render("notallowed", $model);

            // $message = <<<MESSAGE
            //     <!DOCTYPE html>
            //     <html lang="en">
            //     <head>
            //     <meta charset="UTF-8" />
            //     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            //     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            //     <title>Restricted</title>
            //     </head>
            //     <body>
            //     <h1 style="text-align: center; margin-top: 20px; font-size: 27px; font-weight: 500">Sorry, your'e not allowed..</h1>
            //     </body>
            //     </html>
            //     MESSAGE;

            // echo $message;
        }
    }
}
