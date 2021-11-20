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

            break;
            
            case 'resident-welcome':

                header('Location: http://localhost/boombox_city/index.php?');

            
            case 'resident-home': 
                
                $pageObject = new ResidentHome();

            break;
        }

        require_once '../resident/resident-views/'.$page.'.php';                  
    }
}