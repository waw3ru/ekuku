<?php

class Dashboard_Model extends model{

	public function __construct(){
		parent::__construct();
	}

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

	/*public function getLatestNewsUpdates($business){
		if ($business == "both"){
			$query = "SELECT subject, detail, newsdate FROM news ORDER BY newsid DESC LIMIT 15";
			$dashNewsQuery = $this->db->prepare($query);
			$dashNewsQuery->setFetchMode(PDO::FETCH_ASSOC);
			$dashNewsQuery->execute();
		}
		else{
			$query = "SELECT subject, detail, newsdate FROM news WHERE newstype=:business ORDER BY newsid DESC 15";
			$dashNewsQuery = $this->db->prepare($query);
			$dashNewsQuery->setFetchMode(PDO::FETCH_ASSOC);
			$dashNewsQuery->execute(array(':business'=>$business));
		}

		echo json_encode($dashNewsQuery->fetchall());
	}*/

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