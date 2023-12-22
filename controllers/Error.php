<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Error
 *
 * @author Waweru
 */
class Error extends Controller{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->view->css=array('views/error/css/styles.css');
        $this->view->title = "eKUKU :: 404 PAGE ERROR";
    }
    
    public function index(){
        $this->view->render('error/Index', false);
    }
}
