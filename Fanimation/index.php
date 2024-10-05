<?php
session_start();
require_once 'app/configs/database.php';
require_once 'app/app.php';

foreach (glob("app/controllers/*.php") as $controller) {
    require_once $controller;
}


$app = new App();
$app->handleRequest();
?>
