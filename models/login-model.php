<?php

require_once './models/main-model.php';

class Login 
{
    use MainModel;
    private string $email;
    private string $password;

    public function __construct($email, $password, $pdo)
    {
        $this->email = $email;
        $this->password = $password;
        $this->pdo = $pdo;
    }

    public function getErrors()
    {
        $errors = [];
        $datas = [
            'email' => $this->email,
        ];

        $req = "SELECT * FROM residents WHERE email = :email";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute($datas);
        $residentObjectDatas = $stmt->fetchObject();

        if (empty($this->email) || empty($this->password)) {

            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        if (!password_verify($this->password, $residentObjectDatas->password)) {
        
            $errors['password'] = "Les identifiants saisis ne correspondent pas";
        }

        else {

            session_start();
            $_SESSION['resident'] = $residentObjectDatas;
            $_SESSION['flash']['success'] = "Vous êtes connecté";

            header('Location:http://localhost/boombox_city/resident/index.php?page=resident-home');

        }

        return $errors;
    }

    public function setSession($errors)
    {   
        if (empty($errors)) {

            $displays = $_SESSION['flash']['success'];
            unset($_SESSION['flash']['success']);
        }

        else {
            
            $displays = $errors;
        }

        return $displays;
    }
}