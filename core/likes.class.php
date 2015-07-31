
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Likes{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}

		public function addLikes( $detalis ){
			$result = $this->_db->query("INSERT INTO likes ( `user_id`, `like_created`, `post_id`) 
			VALUES ( '" . $detalis['user_id'] . "', '" . date('Y-m-d H:i:s') . "', '" . $detalis['post_id'] . "' )");
			return $result;
		
		}
		
		public function deleteLikes( $id ){
			$result = $this->_db->query("DELETE FROM likes WHERE like_id = ". $id ."");
			return $result;

		}
		
		public function getAllLikesByPost ( $idPost ){
			$result = $this->_db->query("SELECT COUNT(*) FROM likes WHERE post_id = ' . $idPost . '" );
			return $Likes;
		}

	}
