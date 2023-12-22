<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contoller
 *
 * @author Waweru
 */
class Controller {
    
    public function __construct() {
        $this->view = new View();
    }
    
    public function load_model($name){
        $name = ucwords($name);
        $path = 'models/'.$name.'_Model.php';
        
        if (file_exists($path)){
            require 'models/'.$name.'_Model.php';
            $model_name = $name."_Model";
            $this->model = new $model_name();
        }
    }
         
}
