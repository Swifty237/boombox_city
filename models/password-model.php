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

    public function tokenValidation()
    {
        
        $datas = ['id' => $_GET['id']];
        $token = $_GET['token'];
        $result = FALSE;

        $stmt = $this->pdo->prepare('SELECT token FROM residents WHERE id = :id');
        $stmt->execute($datas);
        $tokenId = $stmt->fetchObject();

        if ($tokenId->token == $token) {
            
            $result = TRUE;
        }

        return $result;
    }
    
    public function getErrors($result)
    {
        $errors = [];

        if ($result == FALSE) {

            $errors['token'] = "Ceci n'est pas une url valide";
        }

        if (empty($this->password) || empty($this->confirmPassword)) {
            
            $errors['empty'] = "Veuillez renseigner tous les champs";
        }
        
        if ($this->password != $this->confirmPassword) {
            
            $errors['different'] = "Les mots de passes saisis ne correspondent pas";
        }

        return $errors;
    }
    

    public function setFormDatas($errors, $email)
    {
        if (empty($errors))  {

            $datas = [
                'password'  =>  password_hash($this->password, PASSWORD_BCRYPT),
                'date'      =>  $this->dateValidation
            ];
            
            $req = "UPDATE residents SET password = :password, token = NULL, date_validation = :date WHERE id = ".$_GET['id'];

            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);

            session_start();
            $_SESSION['resident'] = $email; 

            header('Location:http://localhost/boombox_city/index.php?page=home');
        }

        else {
            
            $savedDatas = $errors;
        }

        return $savedDatas;
    }
}