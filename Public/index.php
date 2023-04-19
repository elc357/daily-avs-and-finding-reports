<?php

session_start();

require_once __DIR__ . "/../app/App/Router.php";
require_once __DIR__ . "/../app/Controller/Controller.php";
require_once __DIR__ . "/../app/Middleware/AuthMiddleware.php";
require_once __DIR__ . "/../app/Middleware/ActiveMiddelware.php";


use App\Router;
use Controller\HomeController;
use Controller\DataController;
use Controller\EntityController;
use Controller\FindingController;
use Controller\UserController;

// get
Router::add("GET", "/", HomeController::class, "HomeController", "", [AuthMiddleware::class]);

Router::add("GET", "/login", UserController::class, "loginForm");


// post
Router::add("POST", "/avs_1", DataController::class, "avs", "1");
Router::add("POST", "/avs_2", DataController::class, "avs", "2");
Router::add("POST", "/avs_3", DataController::class, "avs", "3");
Router::add("POST", "/avs_5", DataController::class, "avs", "5");
Router::add("POST", "/avs_6", DataController::class, "avs", "6");
Router::add("POST", "/avs_7", DataController::class, "avs", "7");

Router::add("POST", "/avs_a", DataController::class, "avs", "a");
Router::add("POST", "/avs_b", DataController::class, "avs", "b");
Router::add("POST", "/avs_c", DataController::class, "avs", "c");
Router::add("POST", "/avs_d", DataController::class, "avs", "d");
Router::add("POST", "/avs_htm_pm1", DataController::class, "avs", "htm_pm1");
Router::add("POST", "/avs_htm_pm2", DataController::class, "avs", "htm_pm2");
Router::add("POST", "/avs_htm_sp1", DataController::class, "avs", "htm_sp1");
Router::add("POST", "/avs_htm_sp2", DataController::class, "avs", "htm_sp2");

Router::add("GET", "/query-request", DataController::class, "queryRequest", "", [ActiveMiddleware::class]);
Router::add("POST", "/query", DataController::class, "query");


Router::add("GET", "/entity/mcc_1", EntityController::class, "mcc", "mcc_1", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_2", EntityController::class, "mcc", "mcc_2", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_3", EntityController::class, "mcc", "mcc_3", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_5", EntityController::class, "mcc", "mcc_5", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_6", EntityController::class, "mcc", "mcc_6", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_7", EntityController::class, "mcc", "mcc_7", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_a", EntityController::class, "mcc", "mcc_a", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_b", EntityController::class, "mcc", "mcc_b", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_c", EntityController::class, "mcc", "mcc_c", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_d", EntityController::class, "mcc", "mcc_d", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_htm_pm1", EntityController::class, "mcc", "mcc_htm_pm1", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_htm_pm2", EntityController::class, "mcc", "mcc_htm_pm2", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_htm_sp1", EntityController::class, "mcc", "mcc_htm_sp1", [ActiveMiddleware::class]);
Router::add("GET", "/entity/mcc_htm_sp2", EntityController::class, "mcc", "mcc_htm_sp2", [ActiveMiddleware::class]);

// FINDING
Router::add("GET", "/finding", FindingController::class, "finding", "", [ActiveMiddleware::class]); // all finding
Router::add("POST", "/finding-update", FindingController::class, "findingUpdate", "", [ActiveMiddleware::class]); // update via XHR
Router::add("POST", "/finding-delete", FindingController::class, "findingDelete", "", [ActiveMiddleware::class]); // update via XHR
Router::add("GET", "/finding-form", FindingController::class, "findingForm", "", [ActiveMiddleware::class]); // finding form new finding
Router::add("POST", "/finding-upload", FindingController::class, "findingUpload", "", [ActiveMiddleware::class]); // action upload data finding


Router::add("GET", "/logout", UserController::class, "logout");

Router::run();
