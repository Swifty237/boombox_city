<?php

require_once 'main-model.php';

class Password 
{
    use MainModel;
    private string $password;
    private string $confirmPassword;
    private string $dateValidation;
    private string $email;

    public function __construct($password, $confirmPassword, $dateValidation, $email, $pdo)
    {
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->dateValidation = $dateValidation;
        $this->email = $email;
        $this->pdo = $pdo;
    }

    public function verifyToken()
    {
        
        $datas = ['id' => $_GET['id']];
        $token = $_GET['token'];
        $result = FALSE;

        $stmt = $this->pdo->prepare('SELECT token FROM residents WHERE id = :id');
        $stmt->execute($datas);
        $tokenId = $stmt->fetchObject();

        session_start();

        if ($tokenId->token == $token) {
            
            $result = TRUE;
        }

        else {

            $_SESSION['flash']['danger'] = "Ce token n'est plus valide";

            header('Location:http://localhost/boombox_city/index.php?page=login');
        }

        return $result;
    }
    
    public function getErrors($result)
    {
        $errors = [];

        $stmt = $this->pdo->prepare('SELECT email FROM residents WHERE id = :id');
        $stmt->execute(['id' => $_GET['id']]);
        $emailObject = $stmt->fetchObject();

        if ($result == FALSE) {

            $errors['token'] = $_SESSION['flash']['danger'];
            unset($_SESSION['flash']);
        }

        if (empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
            
            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        if($this->email != $emailObject->email) {

            $errors['email'] = "L'adresse email est invalide";
        }
        
        if ($this->password != $this->confirmPassword) {
            
            $errors['different'] = "Les mots de passes saisis ne correspondent pas";
        }

        return $errors;
    }
    

    public function setFormDatas($errors)
    {
        if (empty($errors))  {

            $datas = [
                'password'  =>  password_hash($this->password, PASSWORD_BCRYPT),
                'date'      =>  $this->dateValidation
            ];
            
            $req = "UPDATE residents SET password = :password, token = NULL, date_validation = :date WHERE id = ".$_GET['id'];

            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);

            $sql = $this->pdo->prepare('SELECT * FROM residents WHERE id = :id');
            $sql->execute(['id' => $_GET['id']]);
            $residentObject = $sql->fetchObject();
            
            $_SESSION['resident'] = $residentObject;
        
            header('Location:http://localhost/boombox_city/index.php?page=home');
        }

        else {
            
            $savedDatas = $errors;
        }

        return $savedDatas;
    }
}