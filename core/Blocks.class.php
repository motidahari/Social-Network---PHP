
<?php

require_once dirname(__FILE__) . '/../lib/DB.class.php'; 

	class Blocks{
		
		private $_db;
		
		public function __construct(){
			$this->_db = DB::getResource();
		}
		
		public function getAllBlocks(){
			$result = $this->_db->query("SELECT * from blocks user_id = '" .  $id ."'");
			$blocks = array();
			while ($row = mysqli_fetch_assoc ($result))
				$blocks[] = $row;
			return $blocks;
		}
		
		public function addBlocks( $detalis ){
			$result = $this->_db->query("
			INSERT INTO `socialityplus`.`blocks` ( `user_id`, `user_friend_id`, `block_created`) VALUES ( 
			'" . $detalis['user_id'] . "',  '" . $detalis['user_friend_id'] . "', '" . date('Y-m-d H:i:s') . "')");
			return $result;
		
		}
		
		public function deleteBlocks( $id ){
			$result = $this->_db->query("DELETE FROM blocks WHERE blocks_id = ". $id ."");
			return $result;

		}
		/*
		public function getBlocks( $id ){
			$result = $this->_db->query("SELECT * from users WHERE user_ID = ". $id ."");					
			$blocks = array();
			while ($row = mysqli_fetch_assoc ($result))
				$blocks[] = $row;
			return $blocks;
		}*/

	}
