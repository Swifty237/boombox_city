<?php

trait MainModel
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            // $this->pdo = new PDO('mysql:host=localhost;dbname=boombox_city;charset=utf8', 'root', '');
            $this->pdo = new PDO('mysql:bd30b0362e7c98:30393616@us-cdbr-east-04.cleardb.com/heroku_7af5250ecc04f74?reconnect=true');
        }
        catch (PDOException $e) {
            echo $e;
            exit();
        }
    }
}