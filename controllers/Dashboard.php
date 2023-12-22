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
class Dashboard extends Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->login();
    }
    
    public function index(){
        $this->view->render('accounts/Index', false);
    }

    /*public function adminstrator(){
        $this->view->render('administrator/Index');
    }*/

    //news code

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

    //end board
    
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

    /*public function ajaxSysNewsUpdates(){
        $this->model->getLatestNewsUpdates();
    }*/
}
