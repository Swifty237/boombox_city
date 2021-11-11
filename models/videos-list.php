<?php

require_once 'main-model.php';

class Videos 
{
    use MainModel;

    public function getVideosList()
    {
        $stmt = $this->$pdo->query('SELECT * FROM videos');
        $videos = [];

        while ($video = $stmt->fetchObject()) {
        $videos[] = $video;
        }
        return $videos;
    }
}