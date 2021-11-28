<?php

require_once '../models/main-model.php';

class ResidentPicture 
{
    use MainModel;
    private $id;
    private PDO $pdo;

    public function __construct($id, $pdo)
    {
        $this->id = $id;
        $this->pdo = $pdo;
    }

    public function getPicture()
    {
        $datas = ['id' => $this->id];

        $req = "SELECT * FROM pictures WHERE id = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);
        $picture = $stmt->fetchObject();

        return $picture;
    }
}