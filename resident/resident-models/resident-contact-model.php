<?php

require_once '../models/main-model.php';

class ResidentContact 
{
    use MainModel;

    public function getResidentList()
    {
        $stmt = $this->pdo->query('SELECT * FROM residents');

        $residents = [];

        while ($resident = $stmt->fetchObject()) {
            
            $residents[] = $resident;

        }
        return $residents;
    }
}