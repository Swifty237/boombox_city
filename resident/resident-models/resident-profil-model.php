<?php

require_once '../models/main-model.php';

class ResidentProfil 
{
    use MainModel;

    public function getProfil()
    {
        $datas = ['id' => $_GET['id']];

        $req = "SELECT * FROM residents WHERE id = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);
        $profil = $stmt->fetchObject();
        return $profil;
    }

}