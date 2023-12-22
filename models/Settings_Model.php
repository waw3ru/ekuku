<?php

/*
 * author: cate.
 * Settings Model class.
 * Description: This is the model class for the database update for the user.
*/

class Settings_Model extends Model{

	public function __construct(){
		parent::__construct();
	}

	//the settings function

	public function updateChange(){
		foreach ($_POST as $key => $value) {
			# code...
			#didnt find a betta way to get the value and key of the POST global array
		}
		if (empty($value)){
				header("Location: ".URL."settings/?msg=error-updating");
				exit;
		}

		$query = "UPDATE users SET $key = :fieldvalue WHERE uid=:uid";
		$settings = $this->db->prepare($query);
		$settings->execute(array(':fieldvalue'=>$value, ':uid'=>Session::getSessionData('uid')));
		header("Location: ".URL."dashboard");

	}
}