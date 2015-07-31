
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Request{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}
		
		public function getAllRequest( $id ){
			$result = $this->_db->query("SELECT * from friend_request WHERE user_id = '" .  $id ."'");
			$request = array();
			while ($row = mysqli_fetch_assoc ($result))
				$request[] = $row;
			return $request;
		}
		
		public function addRequest( $detalis ){
			$result = $this->_db->query("
			INSERT INTO friend_request ( `user_id`, `user_friend_id`, `request_created`) 
			VALUES ( '" . $detalis['user_id'] . "', '" . $detalis['user_friend_id'] . "',  '" . date('Y-m-d H:i:s') . "' )");
			
			return $result;
		
		}
		
		public function deleteRequest( $id ){
			$result = $this->_db->query("DELETE FROM friend_request WHERE request_id = ". $id ."");
			return $result;

		}
		
		
	}
