<?php

trait MainModel
{
    public PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=boombox_city;charset=utf8', 'root', '');
        }
        catch (PDOException $e) {
            exit('Erreur :'.$e->getMessage());
        }
    }
}