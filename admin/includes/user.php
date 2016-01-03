<?php 
class User{
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;

	public static function find_all_users(){
		$users = User::find_this_query("SELECT * FROM users");
		return $users;
	}

	public static function find_user_by_id($id){
		$user = User::find_this_query("SELECT * FROM users WHERE id = {$id} LIMIT 1");
		return !empty($user) ? array_shift($user) : false;

	}

	public static function find_this_query($sql){
		global $database;
		$objects_table = array();
		$users = $database->query($sql);
		while ($row = $users->fetch_assoc()){
			$objects_table[] = self::instantiate($row);
		}
		return $objects_table;
	}

	public static function instantiate($user_found){
		$the_object = new self;
		foreach ($user_found as $key => $value) {
			if (property_exists($the_object, $key)){
				$the_object->$key = $value;
			}
		}
		return $the_object;
	}

	public static function verify_login($username, $password){
		global $database;
		$username = $database->escape_string($username);
		$password = $database->escape_string($password);
		$result_set = User::find_this_query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
		return !empty($result_set) ? array_shift($result_set) : false;
	}
}
?>