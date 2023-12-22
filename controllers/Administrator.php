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
class Administrator extends Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->login();

        $this->view->css=array('views/board/css/style.css', 'views/dashboard/css/style.css', 'views/administrator/css/style.css', 'views/news/css/style.css');
        #import javascript files
        $this->view->js=array('views/board/js/main.js', 'views/administrator/js/main.js', 'views/news/js/main.js');
        $this->view->title = "eKUKU :: WELCOME TO YOUR ACCOUNT";
    }
    
    
    public function index(){
        $this->view->render('administrator/Index');
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
    
    public function logout(){     
        Session::deleteSessionData();
        header ('Location: '.URL);
        exit;
    }

    // news
    public function news(){
        $this->view->render('news/Index');
    }
    // all news functions
    public function adminUpdateNews(){
        $this->model->insertNews();
    }

    //board
    public function board(){
        $this->view->render('board/Index');
    }

    //administrator work
    public function adminGetNonApproved(){
        $this->model->getNonApprovedUsers();
    }

    public function adminGetApproved(){
        $this->model->getApprovedUsers();
    }

    public function adminDisapprove(){
        $this->model->admindisapprove();
    }

    public function adminApprove(){
        $this->model->adminapprove();
    }

    public function reporter(){
        $this->model->printReport();
    }

    #functions from the index controller

        // handlers registration
    public function ajaxSysRegister(){
        $this->model->sysRegister();
    }

    #functions from the dashboard
    
     /*public function news(){
        $this->view->render('news/Index');
    }*/
    public function productNews(){
        $this->model->insertproduct();
    }

    //end of news

    //start board

    /*public function board(){
        $this->view->render('board/Index');
    }*/

    public function ajaxInsertBoard(){
        $this->model->InsertBoard();
    }

    //the profile handle
    public function ajaxSysGetUserProfile(){
        $this->model->getUserProfile(Session::getSessionData('uid'));
    }

    //the product listing handle
    public function ajaxProductListing(){
        $this->model->getProductListing();
    }

    //the Board Post handle
    public function ajaxSysGetBoardPost(){
        $this->model->getBoardPost();
    }

    //the news updates handle
    public function ajaxSysGetNewsUpdates(){
        $this->model->getNewsUpdates();
    }



}
