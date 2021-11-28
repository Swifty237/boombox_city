<?php

require_once '../models/main-model.php';
require_once '../models/functions.php';

class ResidentController
{
    use MainModel;

    public function findPage()
    {
        $pages = scandir('../resident/resident-views');

        if (isset($_GET['page']) && !empty($_GET['page'])) {

            if (in_array($_GET['page'].'.php', $pages)) {

                $page = $_GET['page'];

            }

            else {

                $page = 'resident-errors';
            }
        }

        else {

            $page = 'resident-welcome';

        }
        
        return $page;
    }
    
    public function controlPage($page)
    {
        switch ($page) {
            
            case 'resident-videos':

                $pageObject = new ResidentVideos();
                $videos = $pageObject->getVideosList(); 
                break;
                
            case 'resident-pictures':

                $pageObject = new ResidentPictures();
                $pictures = $pageObject->getPicsList(); 

            break;

            case 'resident-video':
                
                if (isset($_GET['id'])) {
                    
                    $id = $_GET['id'];
                    $pageObject = new ResidentVideo($id, $this->pdo);
                    $video = $pageObject->getVideo(); 
                }
            break;

            case 'resident-picture': 
                
                if (isset($_GET['id'])) {

                    $id = $_GET['id'];
                    $pageObject = new ResidentPicture($id, $this->pdo);
                    $picture = $pageObject->getPicture(); 
                }

            break;
                
            case 'resident-help': 
                    
                $pageObject = new ResidentHelp(); 

            break;
                
            case 'resident-errors': 
                    
                header('Location: http://localhost/boombox_city/index.php?page=errors');

            break;
                
            case 'resident-lives':

                $pageObject = new ResidentLives();

            break;
                
            case 'resident-contact': 
                    
                $pageObject = new ResidentContact();
                $residents = $pageObject->getResidentList();
                
                session_start();
                $_SESSION['contact'] = $residents;

            break;
            
            case 'resident-home': 
                
                $pageObject = new ResidentHome();

            break;

            case 'resident-profil': 
                
                $pageObject = new ResidentProfil();
                $profil = $pageObject->getProfil();

                session_start();
                $_SESSION['profil'] = $profil;

            break;

            case 'resident-pvideo':

                if (isset($_POST['submit']) && (!empty($_POST['title'])) && (!empty($_POST['description'])) && (!empty($_FILES['video']))) {

                    $title = htmlspecialchars(trim($_POST['title']));
                    $description = htmlspecialchars(trim($_POST['description']));
                    $posted = isset($_POST['public']) ? 1 : 0;

                    session_start();

                    $residentId = $_SESSION['resident']->id;

                    if (!empty($_FILES['video']['name'])) {
                        $file = $_FILES['video']['name'];
                        $extensions = ['.mp4', '.MP4', '.avi', '.AVI', '.wmv', '.WMV'];
                        $extension = strrchr($file, '.');

                          
                        if (!in_array($extension, $extensions)) {
                
                            ?>
                            <div class="card errors">
                              <div class="card-text d-flex justify-content-center my-2 text-white">
                  
                              <?php
                                echo 'Cette vidéo n\'est pas au bon format';
                              ?>
                  
                              </div>
                            </div>
                  
                          <?php
                        }
                        else {

                            $pageObject = new ResidentPvideo($posted, $title, $description, $residentId, $this->pdo);
              
                            if (!empty($_FILES['video']['name'])) {
                                $pageObject->post();
                                $pageObject->post_vid($_FILES['video']['tmp_name'], $extension);
                            }
                        }                 
                    }
                    
                    else {

                        $pageObject = new ResidentPvideo($posted, $title, $description, $residentId, $this->pdo);
                        $pageObject->post();
                        //$id = $this->pdo->lastInsertId();
                        // header('Location:index.php?page=post&id='.$id);
                    } 
                }

            break;

            case 'resident-ppicture':
                
                 if (isset($_POST['submit']) && (!empty($_POST['title'])) && (!empty($_POST['description'])) && (!empty($_FILES['image']))) {

                    $title = htmlspecialchars(trim($_POST['title']));
                    $description = htmlspecialchars(trim($_POST['description']));
                    $posted = isset($_POST['public']) ? 1 : 0;

                    session_start();

                    $residentId = $_SESSION['resident']->id;

                    if (!empty($_FILES['image']['name'])) {
                        $file = $_FILES['image']['name'];
                        $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
                        $extension = strrchr($file, '.');

                          
                        if (!in_array($extension, $extensions)) {
                
                            ?>
                            <div class="card errors">
                              <div class="card-text d-flex justify-content-center my-2 text-white">
                  
                              <?php
                                echo 'Cette image n\'est pas au bon format';
                              ?>
                  
                              </div>
                            </div>
                  
                          <?php
                        }
                        else {

                            $pageObject = new ResidentPpicture($posted, $title, $description, $residentId, $this->pdo);
              
                            if (!empty($_FILES['image']['name'])) {
                                $pageObject->post();
                                $pageObject->post_img($_FILES['image']['tmp_name'], $extension);   //$_FILES['image']['tmp_name'] => représente le nom temporaire du fichier qui sera chargé sur la machine serveur.
                            }
                        }                 
                    }
                    
                    else {

                        $pageObject = new ResidentPpicture($posted, $title, $description, $residentId, $this->pdo);
                        $pageObject->post();
                        //$id = $this->pdo->lastInsertId();
                        // header('Location:index.php?page=post&id='.$id);
                    } 
                }

            break;

            case 'resident-tchat':
                
                session_start();

                $destinationId = $_GET['id'];
                $expeditorId = $_SESSION['resident']->id;
                $message = NULL;
                
                $pageObject = new ResidentTchat($expeditorId, $destinationId, $message, $this->pdo);
                $messages = $pageObject->sendMessage();
                $_SESSION['msg'.$destinationId] = $messages;


                if (isset($_POST['submit']) && (!empty($_POST['message'])) && (isset($_GET['id'])) && (!empty($_GET['id']))) {

                    $message = htmlspecialchars(trim($_POST['message']));
                    
                    $pageObject = new ResidentTchat($expeditorId, $destinationId, $message, $this->pdo);
                    $exist = $pageObject->getReceiver();

                    $pageObject->addMessage($exist);

                    $messages = $pageObject->sendMessage();
                    
                    $_SESSION['msg'.$destinationId] = $messages;
                }

            break;

            case 'resident-modif':
                
                $pageObject = new ResidentModif();
        }

        require_once '../resident/resident-views/'.$page.'.php';                  
    }
}