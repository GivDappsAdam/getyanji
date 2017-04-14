<?php
require_once("Loader.php");

class Answer Extends OneClass {
	
	public static $table_name = "answers";
	public static $db_fields = array( "id" , "user_id" , "q_id" , "content", "likes", "dislikes", "created_at" , "updated_at" , "published");
	
	public $id;
	public $user_id;
	public $q_id;
	public $content;
	public $likes;
	public $dislikes;
	public $answers;
	public $created_at;
	public $updated_at;
	public $published;
	
	public static function get_pending($string = "") {
		global $db;
		return self::preform_sql("SELECT * FROM " . DBTP . self::$table_name . " WHERE published = 0 {$string} ORDER BY created_at ASC " . $string );
	}
	public static function count_pending($string = "") {
		//get feed ...
		global $db;
		$result = $db->query("SELECT COUNT(id) FROM " . DBTP . self::$table_name . " WHERE published = 0 {$string} ORDER BY created_at ASC " . $string );
		return mysql_result($result, 0);
	}
	
	public static function get_answers_for($q_id , $string = "") {
		global $db;
		return self::preform_sql("SELECT * FROM " . DBTP . self::$table_name . " WHERE q_id = " . $q_id . " ORDER BY likes DESC " . $string);
	}
	
	public static function get_answers_for_user($user_id , $string = "") {
		global $db;
		return self::preform_sql("SELECT * FROM " . DBTP . self::$table_name . " WHERE user_id = " . $user_id . " ORDER BY created_at DESC" . $string);
	}
	
	public static function count_answers_for($user_id , $string="") {
		global $db;
		$result = $db->query("SELECT * FROM " . DBTP . self::$table_name . " WHERE user_id = " . $user_id . " ORDER BY created_at DESC" . $string );
		if(mysql_num_rows($result)) { return mysql_num_rows($result); } else { return '0'; }
	}
	
	public function publish() {
		$this->published = 1;
		$this->update();
	}
	
}
	
?>