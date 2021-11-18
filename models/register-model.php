<?php

require_once 'main-model.php';

class Register 
{
    use MainModel;
    private string $name;
    private string $firstname;
    private $birthdate;
    private string $sex;
    private string $email;
    private string $confirmEmail;
    private string $token;
    
    public function __construct($name, $firstname, $birthdate, $sex, $email, $confirmEmail, $token, $pdo)
    {   
        $this->pdo = $pdo;
        $this->name = $name;
        $this->firstname = $firstname;
        $this->birthdate = $birthdate;
        $this->sex = $sex;
        $this->email = $email;
        $this->confirmEmail = $confirmEmail;

        $this->token = $token;
    }

    public function verifyEmail()
    {
        $e = ['email' => $this->email];
        $req = $this->pdo->prepare('SELECT id From residents WHERE email = :email');
        $req->execute($e);
        $result = $req->fetch();
        return $result;
    }
        
    public function getErrors($result)
    {
        $errors = [];

        if (empty($this->name) || empty($this->firstname) || empty($this->birthdate) || empty($this->sex) || empty($this->email) || empty($this->confirmEmail)) {
            
            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

             $errors['email'] = "Veuillez saisir une adresse email valide";
        }

        if ($this->email != $this->confirmEmail) {
            
            $errors['different'] = "Les adresses emails saisies ne correspondent pas";
        }

        if ($result != NULL) {

            $errors['available'] = "L'adresse email saisie est déjà utilisé par un autre habitant";
        }
                
        return $errors;
    }

    public function setFormDatas($errors) {
        
        if (empty($errors)) {

            $datas = [
                'name'      =>  $this->name,
                'firstname' =>  $this->firstname,
                'birthdate' =>  $this->birthdate,
                'sex'       =>  $this->sex,
                'email'     =>  $this->email,
                'token'     =>  $this->token
            ];
            
            $req = "INSERT INTO residents (name, firstname, birthdate, sex, email, token) VALUE (:name, :firstname, :birthdate, :sex, :email, :token)";

            $stmt = $this->pdo->prepare($req);
            $stmt->execute($datas);
            
            $user_id = $this->pdo->lastInsertId();

            $subject = "Création du compte habitant de Boombox City";
            $message = "<!DOCTYPE html>
                            <html lang='fr'>
                                <head>
                                  <meta charset='UTF-8'>    
                                </head>
                                <body>
                                    <p>
                                        Cliquez sur le <a href='http://localhost/boombox_city/index.php?page=password&id=$user_id&token=$this->token'>lien</a>, et choisissez un mot de passe.
                                    <p>
                                </body>
                            </html>";

            $header  = "MIME Version 1.0\r\n";
            $header .= "Content-type: text/html; charset=UTF-8\r\n";
            $header .= "From: yannickkamdem@example.com"."\r\n"."Reply-to: yannickkamdemkouam@yahoo.fr"."\r\n"."X-Mailer: PHP/".phpversion();
            
             mail($this->email, $subject, $message, $header);

                $savedDatas = "Données enregistrées <br> Un email vous a été envoyé à l'adresse : ".$this->email."<br> Ouvrez le et cliquez sur le lien<br><a href='index.php?page=welcome'>Revenir à l'accueil</a>";
        }

        else {
            
            $savedDatas = $errors;
        }

        return $savedDatas;
    }
}