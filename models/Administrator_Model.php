<?php

/*
 * author: cate.
 * Administrator Model class.
 * Description: This is the model class for the Admin.
*/

class Administrator_Model extends Model{

	public function __construct(){
		parent::__construct();
	}

	//the admins model function
	
	public function getNonApprovedUsers(){
		$query = "SELECT * FROM users WHERE approved = 'no' AND user_type <> 'admin'";
		$nonapprovedQuery = $this->db->prepare($query);
		$nonapprovedQuery->setFetchMode(PDO::FETCH_ASSOC);
		$nonapprovedQuery->execute();
		echo json_encode($nonapprovedQuery->fetchall());
	}

	public function getApprovedUsers(){
		$query = "SELECT * FROM users WHERE approved = 'yes' AND user_type <> 'admin'";
		$approvedQuery = $this->db->prepare($query);
		$approvedQuery->setFetchMode(PDO::FETCH_ASSOC);
		$approvedQuery->execute();
		echo json_encode($approvedQuery->fetchall());
	}

	public function admindisapprove(){
		$id = $_POST['uid'];
		$query = "UPDATE users SET approved = 'no' WHERE uid = $id";
		$disapproveQuery = $this->db->prepare($query);
		$disapproveQuery->execute();
	}

	public function adminapprove(){
		$id = $_POST['uid'];
		$query = "UPDATE users SET approved = 'yes' WHERE uid = $id";
		$disapproveQuery = $this->db->prepare($query);
		$disapproveQuery->execute();
	}

    public function printReport(){
        $filename = "report\userReport".time().".csv";
        $handle = fopen($filename, "w+");
        fputcsv($handle, array('uid','firstname', 'lastname', 'phone', 'email', 'gender', 'business', 'creation_date', 'approved'));

        //query
        $query = "SELECT * FROM users WHERE user_type <> 'admin'";
        $approvedQuery = $this->db->prepare($query);
        $approvedQuery->setFetchMode(PDO::FETCH_ASSOC);
        $approvedQuery->execute();
        $row =  $approvedQuery->fetchall();
        //print_r($data);

        for($i=0; $i<count($row); $i++){
            fputcsv($handle, array($row[$i]['uid'],$row[$i]['firstname'],$row[$i]['lastname'],$row[$i]['phone'],$row[$i]['email'],$row[$i]['gender'],$row[$i]['business'],$row[$i]['creation_date'],$row[$i]['approved']));
            //print_r($data[$i]);
        }

        header("Location: ".URL."administrator");
    }

	#index register functionality //index_model
	    
    
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
    
    

	#dashboard model functionality

		public function getBoardPost(){

		$query = "SELECT board.status, board.boarddate, users.firstname, users.lastname
            FROM board INNER JOIN users ON board.uid = users.uid ORDER BY board.boardid DESC";

        $dashBoardQuery = $this->db->prepare($query);
        $dashBoardQuery->setFetchMode(PDO::FETCH_ASSOC);
        $dashBoardQuery->execute();
		echo json_encode($dashBoardQuery->fetchall());
		//print_r($dashBoardQuery->fetchall());
	}

	public function getProductListing(){
		$query = "SELECT updates.updates, users.firstname, users.lastname, users.phone
            FROM updates INNER JOIN users ON updates.uid = users.uid ORDER BY updates.up_date DESC LIMIT 20";
        $listingQuery = $this->db->prepare($query);
        $listingQuery->setFetchMode(PDO::FETCH_ASSOC);
        $listingQuery->execute();
        echo json_encode($listingQuery->fetchAll());
	}
	

	public function getUserProfile($uid){
		$query = "SELECT firstname, lastname, gender, business, phone FROM users WHERE uid=:uid";
		$dashProfileQuery = $this->db->prepare($query);
		$dashProfileQuery->setFetchMode(PDO::FETCH_ASSOC);
		$dashProfileQuery->execute(array(':uid'=>$uid));
		echo json_encode($dashProfileQuery->fetchall());
	}

	public function getNewsUpdates(){
			$query = "SELECT newstype, subject, detail, newsdate FROM news ORDER BY newsid DESC";
			$dashNewsQuery = $this->db->prepare($query);
			$dashNewsQuery->setFetchMode(PDO::FETCH_ASSOC);
			$dashNewsQuery->execute();
		
			echo json_encode($dashNewsQuery->fetchall());
	}

    private function post_news_check(){
        $data1 = empty($_POST['subject']) && empty($_POST['details']);
        
        if (!$data1){
            return true;
        }
        else{
            return false; 
        }
    }

    private function post_board_check(){
        $data1 = empty($_POST['details']);
        
        if (!$data1){
            return true;
        }
        else{
            return false; 
        }
    }private function post_update_check(){
        $data1 = empty($_POST['product']);
        
        if (!$data1){
            return true;
        }
        else{
            return false; 
        }
    }

	public function insertNews(){

		if ($this->post_news_check()){
			// date
           $date = getdate();
	       $date = $date['year']."-".$date['mon']."-".$date["mday"];

	       //insert
	       $query = "INSERT INTO news (newsid, newstype, subject, detail, newsdate)"
                . "VALUES (null, :type, :sub, :info, :date)";

           $newsQuery = $this->db->prepare($query);

           $newsQuery->execute(array(':type'=>$_POST['business'], ':sub'=>$_POST['subject'],
           	':info'=>$_POST['details'], ':date'=>$date)); 

           $data = array('subject'=>$_POST['subject'], 'detail'=>$_POST['details'], 'newsdate'=>$date);
           echo json_encode($data);
		}
        
	}

	public function insertproduct(){

		if ($this->post_update_check()){
			// date
           $date = getdate();
	       $date = $date['year']."-".$date['mon']."-".$date["mday"];

	       //insert
	       $query = "INSERT INTO updates (uid, updates, up_date) VALUES (:type, :sub, :date) ON DUPLICATE KEY UPDATE updates=:sub, up_date=:date";

           $newsQuery = $this->db->prepare($query);

           $newsQuery->execute(array(':type'=>Session::getSessionData('uid'), ':sub'=>$_POST['product'], ':date'=>$date)); 

           $this->getProductListing();
		}
        
	}

	public function InsertBoard(){
			if ($this->post_board_check()){

			//uid
				$uid = Session::getSessionData('uid');
			// date
           $date = getdate();
	       $date = $date['year']."-".$date['mon']."-".$date["mday"];

	       //insert
	       $query = "INSERT INTO board (boardid, uid, status, boarddate)"
                . "VALUES (null, :uid, :status, :date)";

           $newsQuery = $this->db->prepare($query);

           $newsQuery->execute(array(':uid'=>$uid, ':status'=>$_POST['details'], ':date'=>$date)); 

           $this->getBoardPost();

		}

	}
}