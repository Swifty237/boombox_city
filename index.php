<?php

require_once './controllers/main-controller.php';

$controller = new MainController;

$page = $controller->findPage();

require_once './models/'.$page.'-model.php';

// require_once './admin/admin-models/'.$page.'-model.php';

$control = $controller->controlPage($page);