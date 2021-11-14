<?php

class MainController
{
    public function mainPage()
    {
        $pages = scandir('views');

        if (isset($_GET['page']) && !empty($_GET['page'])) {

            if (in_array($_GET['page'].'.php', $pages)) {
            $page = $_GET['page'];
            }
            else {
            $page = 'error';
            }
        }

        else {
          $page = 'welcome';
        }
        
        require_once './models/'.$page.'-list.php';
        return $page;
    }

    public function switchPage($page)
    {
        switch ($page) {

            case 'home': $pageObject = new Home();
            break;
        
            case 'videos': 
                $pageObject = new Videos();
                $videos = $pageObject->getVideosList();
            break;
        
            case 'pictures':    
                $pageObject = new Pictures();
                $pictures = $pageObject->getPicsList();
            break;
        
            case 'help': $pageObject = new Help();
            break;
        
            case 'error': $pageObject = new Error();
            break;
        
            case 'lives': $pageObject = new Lives();
            break;
        
            case 'contact': $pageObject = new Contact();
            break;
            
            case 'connexion': $pageObject = new Connexion();
            break;

            case 'new-resident':

                if (isset($_POST['submit'])) {

                    $name = htmlspecialchars(trim($_POST['name']));
                    $firstname = htmlspecialchars(trim($_POST['firstname']));
                    $birthdate = htmlspecialchars(trim($_POST['birthdate']));
                    $sex = htmlspecialchars(trim($_POST['sex']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $email_again = htmlspecialchars(trim($_POST['email_again']));

                    $pageObject = new NewResident($name, $firstname, $birthdate, $sex, $email, $email_again);
                    $errors = $pageObject->setErrors();
                    $savedDatas = $pageObject->saveFormDatas($errors);

                    if (is_array($savedDatas)) {

                        foreach ($savedDatas as $savedData) {

                            echo $savedData;
                        }
                    }

                    else {
                        
                        echo $savedDatas;
                    }
                 }
            break;
        }
        require_once './views/'.$page.'.php';
    }
}