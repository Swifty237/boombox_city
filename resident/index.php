<?php

require_once '../controllers/resident-controller.php';

$controller = new ResidentController;

$page = $controller->findPage();

require_once './resident-models/'.$page.'-model.php';

$control = $controller->controlPage($page);