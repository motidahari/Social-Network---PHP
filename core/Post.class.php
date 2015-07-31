
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Posts{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}
		
		public function getAllPosts(){
			$result = $this->_db->query("SELECT * from posts user_id = '" .  $id ."'");
			$posts = array();
			while ($row = mysqli_fetch_assoc ($result))
				$posts[] = $row;
			return $posts;
		}
		
		public function addPost( $detalis ){
			$result = $this->_db->query("INSERT INTO posts ( `user_id`, `post_content`, `post_created`) VALUES ('" . $detalis['user_id'] . "', '" . $detalis['post_content'] . "', '" . date('Y-m-d H:i:s') . "' )");
			return $result;
		
		}
		
		public function deletePost( $id ){
			$result = $this->_db->query("DELETE FROM posts WHERE post_id = ". $id ."");
			return $result;

		}
		
		public function updatePost( $id , $detalis ){
			$result = $this->_db->query("UPDATE `posts` SET `post_content`= '" . $detalis['post_content'] . "',`post_created`= '" . date('Y-m-d H:i:s') . "'  WHERE `post_id`= '" . $id . "'");			
			
			return $result;
		
		}

		
		//post Relations
		
		
				
		public function addPostRelations( $detalis ){
			$result = $this->_db->query("INSERT INTO users ( `user_username`, `user_email`, `user_password`, `user_fullname`) VALUES 
			( '" . $detalis['user_username'] . "', '" . $detalis['user_email'] . "', '" .md5( $detalis['user_password']) . "', '" . $detalis['user_fullname'] . "')");

			return $result;
		
		}
		
		public function deletePostRelations( $id ){
			$result = $this->_db->query("DELETE FROM users WHERE user_id = ". $id ."");
			return $result;

		}
		
	}
