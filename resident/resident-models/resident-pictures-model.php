<?php

require_once '../models/main-model.php';

class ResidentPictures 
{   
    use MainModel;

    public function getPicsList()
    {
        $stmt = $this->pdo->query("SELECT * FROM pictures");

        $pictures = [];

        while ($picture = $stmt->fetchObject()) {
            
            $pictures[] = $picture;
        }
        return $pictures;
    }
}