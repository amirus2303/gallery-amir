<?php
//include("config.php");
class Database{
	public $connexion;

	public function __construct(){
		$this->open_db_connexion();
	}

	public function open_db_connexion(){

		$this->connexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$this->connexion->set_charset('UTF8');
		if($this->connexion->connect_errno){
			echo 'Connexion failed : '.$this->connexion->connect_error;
		}
	}

	public function query($sql){
		$query = $this->connexion->query($sql);
		$this->confirm_query($query);
		return $query;
	}

	private function confirm_query($query){
		if(!$query){
			die("Query error : ". $this->connexion->error);
		}
	}

	public function escape_string($query){
		$escape_string = $this->connexion->real_escape_string($query);
		return $escape_string;
	}

}

$database = new Database();
/*$result = $database->query("SELECT * FROM users");
var_dump($result->num_rows);*/

?>