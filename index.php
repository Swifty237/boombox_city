<?php

require_once './controllers/main-controller.php';

$controller = new MainController;

$page = $controller->mainPage();


$control = $controller->switchPage($page);