<?php

require_once '../models/main-model.php';

class ResidentPpicture 
{
    use MainModel;
    private $posted;
    private string $title;
    private string $description;
    private string $residentId;
    private PDO $pdo;

    public function __construct($posted, $title, $description, $residentId, $pdo)
    {
        $this->posted = $posted;
        $this->title = $title;
        $this->description = $description;
        $this->residentId = $residentId;
        $this->pdo = $pdo;
    }

    public function post()
    {
        $datas = [
            'title'         =>  $this->title,
            'description'   =>  $this->description,
            'residentId'    =>  $this->residentId,
            'posted'        =>  $this->posted  
        ];
    
      $req = "INSERT INTO pictures (posted, title, description, resident_id) VALUES (:posted, :title, :description, :residentId)";
    
      $stmt = $this->pdo->prepare($req);
      $stmt->execute($datas);
    }

    public function post_img($tmp_name, $extension)
    {
        $id = $this->pdo->lastInsertId();
    
        $datas = [
                'id' =>  $id,
                'picture_name' =>  $id.$extension];
    
        $req = "UPDATE pictures SET picture_name = :picture_name WHERE id = :id";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);
    
        move_uploaded_file($tmp_name, '../resources/pictures/'.$id.$extension);
        //header('Location:index.php?page=post&id='.$id);
    } 
}