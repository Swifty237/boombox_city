<?php

require_once 'main-model.php';

class NewResident 
{
    use MainModel;
    private string $name;
    private string $firstname;
    private $birthdate;
    private string $sex;
    private string $email;
    private string $email_again;
    
    public function __construct($name, $firstname, $birthdate, $sex, $email, $email_again)
    {   
        $this->name = $name;
        $this->firstname = $firstname;
        $this->birthdate = $birthdate;
        $this->sex = $sex;
        $this->email = $email;
        $this->email_again = $email_again;
    }
        
    public function setErrors()
    {
        $errors = [];

        if (empty($this->name) || empty($this->firstname) || empty($this->birthdate) || empty($this->sex) || empty($this->email) || empty($this->email_again)) {
            
            $errors['empty'] = "Veuillez renseigner tous les champs";
        }

        if ($this->email != $this->email_again) {
            
            $errors['different'] = "Les adresses emails saisies ne correspondent pas";
        }
                
        return $errors;
    }

    public function saveFormDatas($errors) {
        
        if (empty($errors)) {

            try {
                $pdo = new PDO('mysql:host=localhost;dbname=boombox_city;charset=utf8', 'root', '');
            }
            catch (PDOException $e) {
                exit('Erreur :'.$e->getMessage());
            }

            // $datas = [
            //     'name'      =>  $this->name,
            //     'firstname' =>  $this->firstname,
            //     'birthdate' =>  $this->birthdate,
            //     'sex'       =>  $this->sex,
            //     'email'     =>  $this->email
            // ];
            
            // $sql = "INSERT INTO residents (name, firstname, birthdate, sex, email) VALUE (:name, :firstname, :birthdate, :sex, :email)";

            // $stmt = $pdo->prepare($sql);
            // $stmt->execute($datas);

            $subject = 'Création du compte habitant de Boombox City';
            $message = '<!DOCTYPE html>
                            <html lang="fr">
                                <head>
                                  <meta charset="UTF-8">    
                                </head>
                                <body>
                                  Cliquez sur le <a href="http://localhost/boombox_city/index.php?page=connexion">lien</a> 
                                  <br>Saisissez votre identifiant : '.$this->email.' et choisissez votre mot de passe.
                                </body>
                            </html>';

            $header  = 'MIME Version 1.0\r\n';
            $header .= 'Content-type: text/html; charset=UTF-8\r\n';
            $header .= 'From: no-reply@yannick.com'.'\r\n'.'Reply-to: yannickkamdemkouam@yahoo.fr'.'\r\n'.'X-Mailer: PHP/'.phpversion();
            
            mail($this->email, $subject, $message, $header);
            var_dump(mail($this->email, $subject, $message, $header));

            $savedDatas = "Données enregistrées <br> Un email vous a été envoyé à l'adresse suivante : ".$this->email."<br> Cliquez sur le lien qui s'y trouve";
        }

        else {
            
            $savedDatas = $errors;
        }

        return $savedDatas;
    }
}