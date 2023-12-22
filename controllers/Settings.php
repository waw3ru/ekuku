<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author cate
 */
class Settings extends Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->login();

        //$this->view->css=array('views/board/css/style.css', 'views/dashboard/css/style.css', 'views/administrator/css/style.css', 'views/news/css/style.css');
        #import javascript files
        //$this->view->js=array('views/dashboard/js/main.js', 'views/board/js/main.js', 'views/administrator/js/main.js', 'views/news/js/main.js');
        // /$this->view->title = "eKUKU :: WELCOME TO YOUR ACCOUNT";
    }
    
    public function index(){
        $this->view->render('settings/Index', false);
    }

    public function getChange(){
        $this->model->updateChange();
    }

    public function login(){
        Session::intiliaze();
        $logged = Session::getSessionData('loggedIn');
        if (!($logged)){
            Session::deleteSessionData();
            header ('Location: '.URL);
            exit;
        }
    }

}
