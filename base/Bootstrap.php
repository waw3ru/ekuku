<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bootstrap
 *
 * @author Waweru
 */
class Bootstrap {
    //put your code here
    private $url; private $controller;
    
    //initializer
    public function __construct() {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->url = rtrim($this->url, '/');
        $this->url = explode('/', $this->url);
        
        $this->url_verification($this->url);
    }
    
    //look for empty url
    private function url_verification($url){
        if (empty($url[0])){
            require 'controllers/Index.php';
            $this->controller = new Index();
            $this->controller->load_model('index');
            $this->controller->index();
            exit;
        }
        $this->initializer($url);
    }
    
    //initialize page per the url
    private function initializer($url){
        #initialize the controller per the url
        $file = 'controllers/'.$url[0].'.php';
        if (file_exists($file)){
            require $file;
            $this->controller = new $url[0];
            $this->controller->load_model($url[0]);
        }else{
            $this->page_error();
        }
        
        $this->url_routing($url, $this->controller);
    }   
    
    //route to look for a method
    private function url_routing($url, $controller) {
        if (isset($url[2])){
            $this->the_arguement($url, $controller);
        }      
        else{
            //check if method exist
            if (isset($url[1])){ 
                $this->the_method($url, $controller);
            }         
            else{
                $controller->index();
            }
        }         
    }
    
    //look if second method exist
    private function the_method($url, $controller){
        if (method_exists($controller, $url[1])){
            $controller->{$url[1]}();
                }
        else{
            $this->page_error();
            }
    }
    
    //look if the first method exist
    private function the_arguement($url, $controller){
            if (method_exists($controller, $url[1])){
                $controller->{$url[1]}($url[2]);
            }
            else{
                $this->page_error();
            }  
    }
    
    //load 404 error
    private function page_error(){
        require 'controllers/Error.php';
        $this->controller = new Error();
        $this->controller->index();
        exit;
    }
    
}
