<?php

require_once '../models/main-model.php';

class ResidentModif 
{
    use MainModel;
    private $pseudo;
    private $description;

    public function __construct($pseudo, $description, $pdo)
    {
        $this->pseudo = $pseudo;
        $this->description = $description;
        $this->pdo = $pdo;
    }

    public function updatePseudo()
    {
        $datas = ['pseudo' => $this->pseudo];

        if ($this->pseudo != NULL) {

            $req = "UPDATE residents SET pseudo = :pseudo WHERE id = ".$_GET['id'];
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
        }
        return;
    }

    public function updateDescription()
    {
        $datas = ['description' => $this->description];

        if ($this->description != NULL) {

            $req = "UPDATE residents SET presentation = :description WHERE id = ".$_GET['id'];
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
        }

        return;
    }

    public function updateProfilImage($id)
    {
        if (!empty($_FILES['image']['name'])) {
            $file = $_FILES['image']['name'];
            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
            $extension = strrchr($file, '.');
              
            if (!in_array($extension, $extensions)) {
    
                $error = "Le fichier n'est pas au bon format";
            }
            else {

                $datas = [
                    'id' =>  $id,
                    'profil_picture' =>  $id.$extension];
        
                $req = "UPDATE residents SET profil_picture = :profil_picture WHERE id = :id";
                $stmt = $this->pdo->prepare($req);
                $stmt->execute($datas);
        
                move_uploaded_file($_FILES['image']['tmp_name'], '../resources/pictures/profil/'.$id.$extension);
            }                 
        }
        
        return $error;
    }
}