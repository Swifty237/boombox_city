<?php

require_once '../models/main-model.php';

class ResidentHome 
{
    use MainModel;

    public function getMaxVideoId()
    {
        $stmt = $this->pdo->query('SELECT * FROM videos');
        $videos = [];

        while ($video = $stmt->fetchObject()) {

            $videos[] = $video->id;
        }

        $maxVideoId = max($videos);
        return $maxVideoId;
    }

    public function getHomeVideo($maxVideoId)
    {
        $stmt = $this->pdo->query('SELECT * FROM videos');

        while ($video = $stmt->fetchObject()) {

            if ($video->id == $maxVideoId) {

                $homeVideo = $video; 
            }
        }

        return $homeVideo;
    }

    public function getMaxPictureId()
    {
        $stmt = $this->pdo->query('SELECT * FROM pictures');
        $pictures = [];

        while ($picture = $stmt->fetchObject()) {

            $pictures[] = $picture->id;
        }

        $maxPictureId = max($pictures);
        return $maxPictureId;
    }

    public function getHomePicture($maxPictureId)
    {
        $stmt = $this->pdo->query('SELECT * FROM pictures');

        while ($picture = $stmt->fetchObject()) {

            if ($picture->id == $maxPictureId) {

                $homePicture = $picture; 
            }
        }

        return $homePicture;
    }
}