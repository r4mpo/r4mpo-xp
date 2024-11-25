<?php

require_once __DIR__ . "/core/Core.php";
require_once __DIR__ . "/models/Database.php";
require_once __DIR__ . "/router/routes.php";

$core = new Core();
$core->loadEnv(".env");

$database = new Database();
$database->prepareDataBaseInitial();

spl_autoload_register(function ($file) {
    if (file_exists(__DIR__ . "/utils/" . $file . ".php")) {
        require_once __DIR__ . "/utils/" . $file . ".php";
    } elseif (file_exists(__DIR__ . "/models/" . $file . ".php")) {
        require_once __DIR__ . "/models/" . $file . ".php";
    } elseif (file_exists(__DIR__ . "/controllers/" . $file . ".php")) {
        require_once __DIR__ . "/controllers/" . $file . ".php";
    }
});

$core->run($routes);