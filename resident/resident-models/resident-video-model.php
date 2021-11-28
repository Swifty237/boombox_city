<?php

require_once '../models/main-model.php';

class ResidentVideo 
{
    use MainModel;
    private $id;
    private PDO $pdo;

    public function __construct($id, $pdo)
    {
        $this->id = $id;
        $this->pdo = $pdo;
    }

    public function getVideo()
    {
        $datas = ['id' => $this->id];

        $req = "SELECT * FROM videos WHERE id = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);
        $video = $stmt->fetchObject();

        return $video;
    }
}