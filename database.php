<?php 
	//require_once("config.php");
	defined("DB_HOST") ? null: define("DB_HOST", "localhost");
	defined("DB_USER") ? null: define("DB_USER", "root");
	defined("DB_PASS") ? null: define("DB_PASS", "");
	defined("DB_NAME") ? null: define("DB_NAME", "chatme");

	class database{
		private $conn;

		public function  __construct(){
			$this->openConnection();

		}


		private function openConnection(){
			$this->conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS);

			if (!$this->conn) {
				die("Database Connection failed ".mysqli_connect_error());
			}

			else{
				$select_db=mysqli_select_db($this->conn, DB_NAME);

				if (!$select_db) {
					die("Database Selection Problem ". mysqli_error());
				}
			}
		}

		public function closeConnection(){
			if (isset($this->conn)) {
				mysqli_close($this->conn);
				unset($this->conn);
			}
		}

		public function perform_query($q){
			//$q=mysqli_real_escape_string($this->conn, $q);
			//echo $q;
			$result=mysqli_query($this->conn, $q);

			if (!$result) {
				die("There was an error With The Result ".mysqli_error());
			}

			return $result;
		}

		public function fetch_result($result){

			return mysqli_fetch_assoc($result);
		}

		public function last_insertedid(){

			return mysqli_insert_id($this->conn);
		}

		public function num_rows($result){

			return mysqli_num_rows($result);

		}
	}//END OF WHOLE CLASS


	$databaseCall=new database();
	

 ?>