<?php
session_start();

if (isset($_SESSION['resident'])) {

    unset($_SESSION['resident']);
    
}

$_SESSION['flash'] = "Vous êtes déconnecté";

header('Location:http://localhost/boombox_city/index.php?');