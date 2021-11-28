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
        // $datas = ['email' => $this->email];

        $req = "SELECT * FROM residents WHERE email = :email";
        $stmt = $this->pdo->prepare($req);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchObject();  // => problème avec le navigateur Mozilla renvoi false


        if (empty($this->email) || empty($this->password)) {

            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        if (!password_verify($this->password, $user->password)) {
        
            $errors['password'] = "Le login ou le mot de passe est incorrect";
        }

        return $errors;
    }

    public function setSession($errors)
    {   
        if (empty($errors)) {

            $displays = NULL;

            $datas = ['email' => $this->email];

            $req = "SELECT * FROM residents WHERE email = :email";
            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
            $residentObjectDatas = $stmt->fetchObject();

            session_start();

            $_SESSION['resident'] = $residentObjectDatas;
            $_SESSION['flash'] = ["success" => "Vous êtes connecté"];  
        }

        else {
            
            $displays = $errors;
        }

        return $displays;
    }
}