<?php

require_once './models/main-model.php';
require_once './models/functions.php';

class MainController
{
    use MainModel;

    public function getPage()
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
        
        return $page;
    }
    
    public function controlPage($page)
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
                    
                    case 'errors': $pageObject = new Errors();
                    break;
                    
                    case 'lives': $pageObject = new Lives();
                    break;
                    
                    case 'contact': $pageObject = new Contact();
                    break;
                    
                    case 'login': $pageObject = new Login();
                    break;
                    
                    case 'register':
                        
                        if (isset($_POST['submit'])) {
                            
                            $name = htmlspecialchars(trim($_POST['name']));
                            $firstname = htmlspecialchars(trim($_POST['firstname']));
                            $birthdate = htmlspecialchars(trim($_POST['birthdate']));
                            $sex = htmlspecialchars(trim($_POST['sex']));
                            $email = htmlspecialchars(trim($_POST['email']));
                            $confirmEmail = htmlspecialchars(trim($_POST['confirm-email']));

                            $token = getToken(60);
                            
                            $pageObject = new Register($name, $firstname, $birthdate, $sex, $email, $confirmEmail, $token, $this->pdo);
                            
                            $result = $pageObject->verifyEmail();
                            $errors = $pageObject->getErrors($result);
                            $savedDatas = $pageObject->setFormDatas($errors);

                            
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
                                
                                $password = password_hash(htmlspecialchars(trim($_POST['password'])), PASSWORD_BCRYPT);
                                $confirmPassword = password_hash(htmlspecialchars(trim($_POST['confirm-password'])), PASSWORD_BCRYPT);
                                $dateValidation = date(time()); 
                                
                                $pageObject = new Password($password, $confirmPassword, $dateValidation, $this->pdo);

                                $result = $pageObject->tokenValidation();
                                $errors = $pageObject->getErrors($result);
                                $savedDatas = $pageObject->setFormDatas($errors);
                            }
                            
                            else {
                                
                            }
                            break;
        }
        
        require_once './views/'.$page.'.php';                  
    }
}