
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Comments{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}

		public function addComments( $detalis ){
			$result = $this->_db->query("INSERT INTO `socialityplus`.`comments` ( `comment_content`, `comment_time`, `user_id`, `post_id`) VALUES 
			( '" . $detalis['comment_content'] . "',  '" . date('Y-m-d H:i:s') . "','" . $detalis['user_id'] . "', '" . $detalis['post_id'] . "' )");

			return $result;
		
		}
		
		public function deleteComments( $id ){
			$result = $this->_db->query("DELETE FROM comments WHERE comments_id = ". $id ."");
			return $result;

		}
		
		public function getAllCommentsByPost ( $id ){
			$result = $this->_db->query("SELECT * from comments WHERE post_id = ". $id ."");					
			$comments = array();
			while ($row = mysqli_fetch_assoc ($result))
				$comments[] = $row;
			return $comments;
		}

	}
