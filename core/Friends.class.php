
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Friends{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}
		
		public function getAllFriends(){
			$result = $this->_db->query("SELECT * from friends user_id = '" .  $id ."'");
			$friends = array();
			while ($row = mysqli_fetch_assoc ($result))
				$friends[] = $row;
			return $friends;
		}
		
		public function addFriends( $detalis ){
			$result = $this->_db->query("INSERT INTO friends ( `user_id`, `user_friend_id`, `friendship_created`) VALUES 
			( '" . $detalis['user_id'] . "', '" . $detalis['user_friend_id'] . "', '" . date('Y-m-d H:i:s') . "')");

			return $result;
		
		}
		
		public function deleteFriends( $id ){
			$result = $this->_db->query("DELETE FROM friends WHERE friendship_id = ". $id ."");
			return $result;

		}
		

	}
