<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Waweru
 */

class Session {
    
    
    public static function intiliaze() {
        @session_start();
    }
    
    public static function setSessionData($key, $value){
        $_SESSION[$key] = $value;
    }
    
    public static function seeCookie($key){
        if (isset($_COOKIE[$key])){
        return $_COOKIE[$key];
        }
    }
    
    public static function getSessionData($key){
        if (isset($_SESSION[$key])){
        return $_SESSION[$key];
        
        }
    }
    
    public static function deleteSessionData(){
        session_destroy();
    }
}
