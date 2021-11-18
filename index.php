<?php

require_once './controllers/main-controller.php';

$controller = new MainController;

$page = $controller->getPage();

require_once './models/'.$page.'-model.php';

$control = $controller->controlPage($page);