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

            case 'home': $pageObject = new Home;
            break;
        
            case 'videos': 
                $pageObject = new Videos;
                $videos = $pageObject->getVideosList();
            break;
        
            case 'pictures': 
                $pageObject = new Pictures;
                $pictures = $pageObject->getPicsList();
            break;
        
            case 'help': $pageObject = new Help;
            break;
        
            case 'error': $pageObject = new Error;
            break;
        
            case 'lives': $pageObject = new Lives;
            break;
        
            case 'contact': $pageObject = new Contact;
            break;
            
            case 'contact': $pageObject = new Connexion;
            break;  
        }
        require_once './views/'.$page.'.php'; 
    }
}