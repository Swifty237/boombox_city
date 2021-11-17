<?php

require_once 'main-model.php';

class Password 
{
    use MainModel;
    private string $email;
    private $password;
    private $confirmPassword;

    private function __construct($email, $password, $confirmPassword)
    {
        $this->email = $email;
        $this->password = $password;
        $this->password_again = $confirmPassword;
    }

    
    public function setErrors()
    {
        
        if (empty($this->email) || empty($this->password) || empty($this->confirmPassword)) {
            
            $errors['empty'] = "Veuillez renseigner tous les champs";
        }
        
        if ($this->password != $this->password_again) {
            
            $errors['different'] = "Les mots de passes saisis ne correspondent pas";
        }
    }
    
    public function testEmail()
    {
        
    }

    public function setFormDatas()
    {

    }
}