<?php

require_once 'main-model.php';

class Pictures 
{   
    use MainModel;

    public function getPicsList()
    {
        $stmt = $this->$pdo->query('SELECT * FROM pictures');

        $pictures = [];

        while ($picture = $stmt->fetchObject()) {
            
            $pictures[] = $picture;
        }
        return $pictures;
    }
}