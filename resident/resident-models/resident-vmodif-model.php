<?php

require_once '../models/main-model.php';

class ResidentVmodif 
{
    use MainModel;
    private $title;
    private $description;

    public function __construct($title, $description, $pdo)
    {
        $this->title = $title;
        $this->description = $description;
        $this->pdo = $pdo;
    }

    public function updateTitle()
    {
        $datas = ['title' => $this->title];

        if ($this->title != NULL) {

            $req = "UPDATE videos SET title = :title WHERE id = ".$_GET['id'];
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
        }
        return;
    }

    public function updateDescription()
    {
        $datas = ['description' => $this->description];

        if ($this->description != NULL) {

            $req = "UPDATE videos SET description = :description WHERE id = ".$_GET['id'];
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
        }

        return;
    }
}