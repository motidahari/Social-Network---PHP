
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class User{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}
		
		public function getAllUsers(){
			$result = $this->_db->query("SELECT * from users");
			$users = array();
			while ($row = mysqli_fetch_assoc ($result))
				$users[] = $row;
			return $users;
		}
		 
		public function addUser( $detalis ){
			$query = "INSERT INTO users ( user_email, user_password) VALUES ('" . $detalis['user_email'] . "', '" .  md5( $detalis['user_password'] ) . "');
			INSERT INTO users_info (user_id, user_firstname, user_lastname, user_created) VALUES 
			( LAST_INSERT_ID( ) ,'" . $detalis['user_firstname'] . "','" . $detalis['user_lastname'] . "', '" . date('Y-m-d H:i:s') . "' )";
			
			$result = $this->_db->multi_query($query);
			
			
			
		return $result;

		}
		
		public function deleteUser( $id ){
			$result = $this->_db->query("DELETE FROM users WHERE user_id = ". $id ."");
			return $result;

		}
		
		public function getUser( $id ){
			$result = $this->_db->query("SELECT * from users_info WHERE user_ID = ". $id ."");					
			$users = array();
			while ($row = mysqli_fetch_assoc ($result))
				$users[] = $row;
			return $users;
		}
		
		public function updateUser( $detalis ){
			$result = $this->_db->query("
			UPDATE users SET user_email= '" . $detalis['user_email'] . "' ,user_password= '" .  md5( $detalis['user_password']) . "' WHERE user_id = ". $id ."");
			
			return $result;
		
		}
		
		
		//user info
		
		
		
		public function addUserInfo( $detalis ){
			$result = $this->_db->query("
			
			INSERT INTO socialityplus.users_info (user_id, user_firstname, user_lastname, user_about, user_secret_about, user_created, user_birthdate, user_profile_picture, user_secret_picture) 
			VALUES ('" . $detalis['user_id'] . "' , '" . $detalis['user_firstname'] . "' , '" . $detalis['user_lastname'] . "' , '" . $detalis['user_about'] . "' , '" . $detalis['user_secret_about'] . "' ,  '" . date('Y-m-d H:i:s') . "' ,  '" . $detalis['user_birthdate'] . "' ,   '" . $detalis['user_profile_picture'] . "' ,   '" . $detalis['user_secret_picture'] . "')");

			return $result;
		
		}
				
		public function updateUserInfo( $detalis ){
			$result = $this->_db->query("UPDATE users_info SET user_firstname='" . $detalis['user_firstname'] . "' ,user_lastname='" .$detalis['user_lastname'] . "' ,user_about='" . $detalis['user_about'] . "' ,user_secret_about='" . $detalis['user_secret_about'] . "' ,user_created='" . $detalis['user_created'] . "' ,user_birthdate='" . $detalis['user_birthdate'] . "' ,user_profile_picture='" . $detalis['user_profile_picture'] . "' ,user_secret_picture='" .$detalis['user_secret_picture'] . "' WHERE user_id = '" . $id . "' ") ;

			return $result;
		
		}
	}