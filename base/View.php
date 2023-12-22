<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author Waweru
 */
class View {
    //put your code here
    public function render($name, $noincludes=true){
        
        if ($noincludes){
            require 'views/header.php';
            require 'views/'.$name.'.php';
            //require 'views/Footer.php';
        }
        else{
            require 'views/'.$name.'.php';
        }
    }
}
