<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author Waweru
 */
class Index extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->login();
    }
    
    public function index(){
        $this->view->render('start/Index', false);
    }
    

    public function login(){
        Session::intiliaze();
        $logged = Session::getSessionData('loggedIn');
        if (($logged)){
            header('Location: '.URL.'dashboard');
            exit;
        }else{
            Session::deleteSessionData();
        }

    }

    // handlers login
    public function ajaxSysLogin(){
        $this->model->syslogin($_POST['email'], $_POST['pass']);
    }
    
    // handlers registration
    public function ajaxSysRegister(){
        $this->model->sysRegister();
    }
    
    //handler for the index page product update
    public function ajaxSysGetProductListing(){
        $this->model->getProductListing();
    }
    
        
}
