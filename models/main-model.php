<?php

trait MainModel
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=boombox_city;charset=utf8', 'root', '');
        }
        catch (PDOException $e) {
            exit('Un problème est survenue lors de la connection à la base de donnée');
        }
    }
}