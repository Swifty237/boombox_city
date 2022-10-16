<?php

trait MainModel
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=boombox_city;charset=utf8', 'root', '');
            // $this->pdo = new PDO(   'mysql:host=w3epjhex7h2ccjxx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;
            // dbname=oc0sh5i9xtpiuy7v;charset=utf8', 'j984yymk42ki0apu', 'oc0sh5i9xtpiuy7v');
        } catch (PDOException $e) {
            echo "Une erreur est sur venue lors de la connexion a la base de données";
        }
    }
}
