<?php

require_once './models/main-model.php';
require_once './models/functions.php';

class MainController
{
    use MainModel;

    public function findPage()
    {
        $pages = scandir('views');

        if (isset($_GET['page']) && !empty($_GET['page'])) {

            if (in_array($_GET['page'].'.php', $pages)) {

                $page = $_GET['page'];

            }

            else {

                $pages = scandir('./resident/resident-views');

                if (in_array($_GET['page'].'.php', $pages)) {

                    $page = $_GET['page'];
                    require_once './resident/index.php';

                }
                
                else {

                    $pages = scandir('./admin/admin-views');

                    if (in_array($_GET['page'].'.php', $pages)) {

                        $page = $_GET['page'];
                        require_once './admin/index.php';

                    }

                    else {

                        $page = 'errors';
                    }
                }
            }
        }

        else {

            $page = 'home';

        }
        
        return $page;
    }
    
    public function controlPage($page)
    {
        switch ($page) {
            
            case 'home': 
                $pageObject = new Home();

                $maxVideoId = $pageObject->getMaxVideoId();
                $homeVideo = $pageObject->getHomeVideo($maxVideoId);

                $maxPictureId = $pageObject->getMaxPictureId();
                $homePicture = $pageObject->getHomePicture($maxPictureId);
            break;
            
            case 'videos': 
                $pageObject = new Videos();
                $videos = $pageObject->getVideosList();
                break;
                
            case 'pictures':    
                $pageObject = new Pictures();
                $pictures = $pageObject->getPicsList();

            break;
                
            case 'help': 
                    
                $pageObject = new Help(); 

            break;
                
            case 'errors': 
                    
                $pageObject = new Errors();

            break;
                
            case 'login':
                        
                if (isset($_POST['submit'])) {
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));

                    $pageObject = new Login($email, $password, $this->pdo);
                    $errors = $pageObject->getErrors();
                    $displays = $pageObject->setSession($errors);

                    if (!empty($displays)) {
                            
                        foreach ($displays as $display) {
                            
                            echo    '<div class="card m-3 errors text-white">
                            <div class="card-body">
                            <p class="card-text">'.$display.'</p>
                            </div>
                            </div>';
                        }
                    }

                    else {

                        header('Location:http://localhost/boombox_city/resident/index.php?page=resident-home');
                        exit();
                    }
                } 
                    
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
                    $displays = $pageObject->setFormDatas($errors);

                    if (!empty($displays)) {
                            
                        foreach ($displays as $display) {
                                
                            echo    '<div class="card m-3 errors text-white">
                            <div class="card-body">
                            <p class="card-text">'.$display.'</p>
                            </div>
                            </div>';
                        }
                    }
                        
                    else {
                            
                        header('Location:http://localhost/boombox_city/index.php?');
                        exit();
                    }
                } 
                    
            break;
                    
            case 'password':
                        
                if (isset($_POST['submit'])) {
                    
                    $email = htmlspecialchars(trim($_POST['email']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $confirmPassword = htmlspecialchars(trim($_POST['confirm-password']));
                    $dateValidation = date('Y-m-d H:i:s');
                            
                    $pageObject = new Password($password, $confirmPassword, $dateValidation, $email, $this->pdo);
                    $result = $pageObject->verifyToken();
                    $errors = $pageObject->getErrors($result);
                    $displays = $pageObject->setFormDatas($errors);

                    if (!empty($displays)) {
                    
                        foreach ($displays as $display) {
                            
                            echo '<div class="card m-3 errors text-white">
                            <div class="card-body">
                            <p class="card-text">'.$display.'</p>
                            </div>
                            </div>';
                        }
                    }
                            
                    else {

                        header('Location:http://localhost/boombox_city/resident/index.php?page=resident-home');
                        exit();
                    }
                }

            break;

            case 'logout':

                $pageObject = new Logout();
                
            break; 

        }

        require_once './views/'.$page.'.php';                  
    }
}