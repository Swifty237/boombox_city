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
        
        require_once './models/'.$page.'-model.php';
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
            
            case 'connexion': $pageObject = new Login();
            break;

            case 'new-resident':

                if (isset($_POST['submit'])) {

                    $name = htmlspecialchars(trim($_POST['name']));
                    $firstname = htmlspecialchars(trim($_POST['firstname']));
                    $birthdate = htmlspecialchars(trim($_POST['birthdate']));
                    $sex = htmlspecialchars(trim($_POST['sex']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $confirmEmail = htmlspecialchars(trim($_POST['confirm-email']));

                    $pageObject = new Register($name, $firstname, $birthdate, $sex, $email, $confirmEmail);
                    $errors = $pageObject->setErrors();
                    $savedDatas = $pageObject->saveFormDatas($errors);

                    if (is_array($savedDatas)) {

                        foreach ($savedDatas as $savedData) {

                            echo    '<div class="card m-3 inscription-box text-white">
                                        <div class="card-body">
                                            <p class="card-text">'.$savedData.'</p>
                                        </div>
                                    </div>';
                        }
                    }

                    else {
                        
                        echo    '<div class="card m-3 inscription-box text-white">
                                    <div class="card-body">
                                        <p class="card-text">'.$savedDatas.'</p>
                                    </div>
                                </div>';
                    }
                }
                break;

                case 'password':

                    if (isset($_POST['submit'])) {

                        $email = htmlspecialchars(trim($_POST['email']));
                        $password = htmlspecialchars(trim($_POST['password']));
                        $confirmPassword = htmlspecialchars(trim($_POST['confirm-password'])); 
                    
                        $pageObject = new Password($email, $password, $confirmPassword);
                        $errors = $pageObject->setErrors();
                        $savedDatas = $pageObject->saveFormDatas($errors);
                    }

                    else {

                    }
                break;
            }
            require_once './views/'.$page.'.php';
        }
    }
    
    