<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index_Model
 *
 * @author Waweru
 */

class Index_Model extends Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
 
 // This is the login verificatoin code or method
    public function syslogin($email, $password){
        $query = "SELECT uid, business, user_type, approved FROM users WHERE email = :email AND password = :password";
        $loginQuery = $this->db->prepare($query);
        $loginQuery->setFetchMode(PDO::FETCH_ASSOC);
        $loginQuery->execute(array(':email'=>$email, ':password'=>sha1($password)));
        $userData = $loginQuery->fetchall();
        
        //See the kinda data bing displayed
        //print_r($userData);
        $num_users = $loginQuery->rowCount();
        
        if ($num_users == 1){
            if ($userData[0]['approved'] == 'yes'){
                //create cookie and Sessions
                $this->createSessionData($userData[0]["uid"], $userData[0]["business"], $userData[0]["user_type"]);
               //header('Location: '.URL.'dashboard');
               //exit;
                $message = array("message"=>"");
                
        }else{
            $message = array("message"=>"Awaiting your account to be approved"); 
        }
        
        }else{
                $message = array("message"=>"Please fill the correct information");
            }

        echo json_encode($message);
    }
    
    
    //user registration code SUCCESS
    private function post_data_check(){
        $data1 = empty($_POST['firstname']) && empty($_POST['lastname']) && empty($_POST['password']);
        $data2 = empty($_POST['phone']) || empty($_POST['email']) && empty($_POST['gender']);
        $email = $_POST['email'];
        $data4 = filter_var($email, FILTER_VALIDATE_EMAIL);
        
        if (!$data1 && !$data2 && $data4){
            return true;
        }
        else{
            return false; 
        }
    }
    
    private function data_is_valid(){
        
        if ($this->post_data_check()){
            $query = "SELECT uid FROM users WHERE phone=:phone and :email=:email";
            $dataVerify = $this->db->prepare($query);
            $dataVerify->setFetchMode(PDO::FETCH_ASSOC);
            $dataVerify->execute(array(':phone'=>$_POST['phone'], ':email'=>$_POST['email']));
            
            $userData = $dataVerify->fetchall();
            
            $num_users = $dataVerify->rowCount();
            
            if ($num_users >= 1){
                return false;
            }
            else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function sysRegister(){
        if ($this->data_is_valid()){
            $this->registration_query();
            $message = array('message'=>"Success: Login to enter your account");
        }else{
            $message = array('message'=>'The registration was not successful; Fill form again');
        }
        echo json_encode($message);
    }


    private function registration_query(){
        // date
            $date = getdate();
	       $date = $date['year']."-".$date['mon']."-".$date["mday"];

        //system registration
            $query = "INSERT INTO users (uid, firstname, lastname, password, phone, email, "
                . "gender, business, creation_date, user_type, approved)"
                . "VALUES (null, :first, :last, :pass, :phone, :email, :gender, :business, :date, :user, 'yes')";
        
            $registerQuery = $this->db->prepare($query);

            $registerQuery->execute(array(':first'=>$_POST['firstname'], ':last'=>$_POST['lastname'], 
                    ':pass'=>sha1($_POST['password']), ':phone'=>$_POST['phone'], ':email'=>$_POST['email'],
                    ':gender'=>$_POST['gender'], ':business'=>$_POST['business'], ':date'=>$date, ':user'=>"user"));  
    }
    
    
    //product get listing code

    public function getProductListing(){
        $query = "SELECT updates.updates, users.firstname, users.lastname, users.phone
            FROM updates INNER JOIN users ON updates.uid = users.uid ORDER BY updates.up_date DESC LIMIT 20";
        $listingQuery = $this->db->prepare($query);
        $listingQuery->setFetchMode(PDO::FETCH_ASSOC);
        $listingQuery->execute();
        echo json_encode($listingQuery->fetchAll());
    }


    
    //all about session creation and stuff
    
    private function createSessionData($uid, $business_type, $user_type){

            #start session
            Session::intiliaze();
            Session::setSessionData('loggedIn', true);
            Session::setSessionData('uid', $uid);
            Session::setSessionData('business_type', $business_type);
            Session::setSessionData('user_type', $user_type);  
    }

}
