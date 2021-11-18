<?php

require_once 'main-model.php';

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

        if (empty($this->email) || empty($this->password)) {

            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        return $errors;
    }

    public function verifyUserSession($errors)
    {   
        session_start();
        $_SESSION['flash']['success'] = NULL;

        if (empty($errors)) {

            $datas = [
                'email' => $this->email,
            ];

            $req = "SELECT * FROM residents WHERE email = :email";
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
            $residentObjectDatas = $stmt->fetchObject();

            if (password_verify($this->password, $residentObjectDatas->password)) {
            
                $_SESSION['resident'] = $residentObjectDatas;
                $_SESSION['flash']['success'] = "Vous êtes connecté";

                $errors = $_SESSION['flash']['success'];

                header('Location:http://localhost/boombox_city/index.php?page=home');
            }

            else {
                $errors['password'] = "Les identifiants saisis ne correspondent pas";
            }

            $displays = $errors;
        }

        else {
            
            $displays = $errors;
        }

        return $displays;
    }
}