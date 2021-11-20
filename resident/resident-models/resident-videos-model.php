<?php

require_once '../models/main-model.php';

class ResidentVideos 
{
    use MainModel;

    public function getVideosList()
    {
        $stmt = $this->pdo->query('SELECT * FROM videos');
        $videos = [];

        while ($video = $stmt->fetchObject()) {
        $videos[] = $video;
        }
        return $videos;
    }
}