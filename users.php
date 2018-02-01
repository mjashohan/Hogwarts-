<?php 
	require_once("config.php");
	require_once("database.php");
	require_once("class.phpmailer.php");

	/**
	* This is USERS class 
	*/

	class users
	{
		
		public $ChatmeID ;
		public $Password;
		public $First_Name;
		public $Last_Name;
		public $Email;
		public $DOB;
		public $Gender;
		public $CurrentCity;
		public $HomeTown;



		public function find_all(){

			return self::find_by_sql("SELECT * FROM users");
		}//END OF FIND ALL

		public function find_users_by_sql($sql){
			global $databaseCall;

			//$q=mysqli_real_escape_string($databaseCall->$sql);

			$result=$databaseCall->perform_query($sql);

			$result=$databaseCall->fetch_result($result);

			return $result;
		}//END OF FIND BY SQL

		public function find_users_by_email($email){
			
			return self::find_users_by_sql("SELECT * FROM users WHERE Email = '{$email}' LIMIT 1");
		}//END OF FIND BY EMAIL


		private function give_me_hash($password){

			$hash_format="$2y$11$";
			$salt="amarektanodiacheNirjon";

			$format_salt=$hash_format.$salt;

			$hashed=crypt($password, $format_salt);

			return $hashed;
		}//END OF GIVE_ME_HASH


		public function getRandomID(){
			global $databaseCall;
			$lastID=$databaseCall->last_insertedid();

			$digit=10- (string)strlen($lastID+1);

			$str=(string)($lastID+1);

			for ($i=0; $i < $digit; $i++) { 
				$temp=rand(64, 122);
				if($temp>90 && $temp<97){
				$i--;
				}else{

				$str.=chr($temp);
				}
			}
	
			return $str;
		}//END OF GETRANDOMID

		public function randomString($length){
			$str="";
			for ($i=0; $i < $length; $i++) { 
				$temp=rand(64, 122);
				if($temp>90 && $temp<97){
				$i--;
				}else{

				$str.=chr($temp);
				}
			}
			return $str;
		}//END OF GET RAMOM STRING


		public function instantiate($record){
			$obj=new self;

			foreach ($record as $attribute => $value) {
				if ($obj->has_attr($attribute)) {
					$obj->$attribute=$value;
				}
			}
		}//END OF INSTANTIATE

		private function has_attr($variables){
			
			$objVariables=get_object_vars($this);

			return array_key_exists($variables, $objVariables);
		}//END OF HAS_ATTR


		public function signUp(){
			global $databaseCall;
			$ranDom=self::getRandomID();
			$pass=self::give_me_hash($this->Password);
			
			$sql="INSERT INTO users ( ";
			$sql.=" ChatmeID , Password, First_Name, Last_Name, Email, Gender ) ";
			$sql.="values ( '{$ranDom}', '{$pass}', '{$this->First_Name}', ";
			$sql.="'{$this->Last_Name}', '{$this->Email}', '{$this->Gender}')";
			
			$confirm=$databaseCall->perform_query($sql);
			$time=time();
			$sql2="INSERT INTO userstatus values ( ";
				$sql2.= "'{$ranDom}', {$time} )";
			
			$databaseCall->perform_query($sql2);
				session_start();
				$_SESSION["id"]=$ranDom;
				header("Location:index.php");
			return $confirm;
		}//End of signup function 

		public function authenticate($user_name="", $user_pass=""){

			global $databaseCall;

			$user_pass=self::give_me_hash($user_pass);

			$query="SELECT * FROM users where Email='{$user_name}' AND password='{$user_pass}' LIMIT 1";

			 $result=self::find_users_by_sql($query);

			 if (!empty($result)) {
			 	
			 	$id=$result["ChatmeID"];
			 	//echo $id."<br>";
			 	$t=time();
			 	//echo "<br>".$t;
			 	//self::instantiate($result);
				$sql="UPDATE userstatus SET status={$t} where FChatmeID='{$id}'";
				//echo $sql;	
			 	$databaseCall->perform_query($sql);
			 	session_start();
			 	$_SESSION["id"]=$result["ChatmeID"];
			 	//echo $_SESSION["id"];
			 	header("Location:index.php");
			 	//return true;
			 }
			 
			return false;
		}//END OF AUTHENTICATE

		public function lastOnline(){
			global $databaseCall;
			$id=$_SESSION["id"];
			//$id="1cSYgjgYvI";
			$sql="SELECT status from userstatus where FChatmeID ='{$id}'";
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);
			 $result["status"];
		}// End of last Online

		public function isonline(){
			global $databaseCall;
			//$id="1iamVGEktv";
			$sql="SELECT status from userstatus where FChatmeID ='{$id}'";
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);
			////$t=time();
			//echo $t;
			if(time()-360>$result["status"]){
				return "offline";
			}
			return "online";
		}// End of isOnline

		public function onLineUsers(){
			global $databaseCall;
			$id=$_SESSION["id"];
			$t=time()-360;
			$sql="SELECT First_Name, Last_Name from users, userStatus where userStatus.status >= {$t} and users.ChatmeID=userStatus.FChatmeID and users.ChatmeID!='{$id}'";

			$result=$databaseCall->perform_query($sql);
			$arr=array();
			
				
				$i=0;
				while($row=mysqli_fetch_assoc($result)){
					$arr[$i]=$row["First_Name"]." ".$row["Last_Name"];
					//echo $row["First_Name"];
					$i++;
				}
			
			
			return $arr;

		}//End of onLineusers

		public function updateOnlineStatus(){
			global $databaseCall;
				$id=$_SESSION["id"];

				$t=time();
			 	//echo "<br>".$t;
			 	//self::instantiate($result);
				$sql="UPDATE userstatus SET status={$t} where FChatmeID='{$id}'";
				//echo $sql;	
			 	$databaseCall->perform_query($sql);
		}

		public function logout(){
			global $databaseCall;
			if (isset($_SESSION["id"])) {
				$id=$_SESSION["id"];

				$t=time()-1000;
			 	//echo "<br>".$t;
			 	//self::instantiate($result);
				$sql="UPDATE userstatus SET status={$t} where FChatmeID='{$id}'";
				//echo $sql;	
			 	$databaseCall->perform_query($sql);
				unset($_SESSION["id"]);
				session_destroy();
				header("Location:login.php");
			}
		}//End of Logout Function

		public function showMyName(){
			global $databaseCall;
			$id=$_SESSION["id"];
			//$id="1Ji@iMLviK";
			//echo $id;
			$sql="SELECT First_Name from users where ChatmeID='{$id}'";
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);
			return $result["First_Name"];
		}

		public function showMyNameFull(){
			global $databaseCall;
			$id=$_SESSION["id"];
			//$id="1Ji@iMLviK";
			//echo $id;
			$sql="SELECT First_Name, Last_Name from users where ChatmeID='{$id}'";
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);
			return $result["First_Name"]." ".$result["Last_Name"];
		}// Enter end of showMyNameFull

		public function passResetLink($id){
			global $databaseCall;
			$sql="SELECT * from resetpass where FChatmeID='{$id}' LIMIT 1";
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);
			//var_dump($result);
			if (!empty($result)) {
				$param1=$result["param1"];
				$param2=$result["param2"];
				$param3=$result["param3"];
			}

			else{
				$param1=$this->randomString(30);
				$param2=$this->randomString(30);
				$param3=$this->randomString(30);
				$sql="INSERT INTO resetpass values ( ";
				$sql.="'{$id}', '{$param1}', '{$param2}', '{$param3}' )";
				$result=$databaseCall->perform_query($sql);
			}
			
			$generateURL="http:www.tuntuni.tk/resetpass.php?ref=";
				$generateURL.=htmlentities(urlencode($param1));
				$generateURL.="&token=";
				$generateURL.=htmlentities(urlencode($param2));
				$generateURL.="&bula=";
				$generateURL.=htmlentities(urlencode($param3));
			
			return $generateURL;
		}// End of Generate ResetLink

		public function sendMail($sub, $to, $msg){
			$mail = new PHPMailer(); // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true; // authentication enabled
			$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for outlook ssl for gmail
			//$mail->Host = "smtp.gmail.com";
			$mail->Host = "smtp-mail.outlook.com";
				 
			$mail->Port = 587; // or 587 465- for gmail
			$mail->IsHTML(true);
			$mail->Username = "tuntuni66@outlook.com";
			$mail->Password = "Nopassword01";
			$mail->SetFrom("tuntuni66@outlook.com");
			$mail->Subject = $sub;
			$mail->Body =$msg;
			$mail->AddAddress($to);

			if(!$mail->Send()){
				//echo "Mailer Error: " . $mail->ErrorInfo;
		    	return false;
		    }else{
		    return true;
		    }
		}// End of send mail

		public function checkPassResetTokens($ref, $token, $bula){
			global $databaseCall;

			$sql="SELECT ChatmeID, First_Name from users, resetpass where ";
				$sql.="users.ChatmeID=resetpass.FChatmeID and ";
				$sql.="resetpass.param1='{$ref}' and ";
				$sql.="resetpass.param2='{$token}' and resetpass.param3='{$bula}'";
			
			$result=$databaseCall->perform_query($sql);
			$result=$databaseCall->fetch_result($result);

			return $result;
		}//End of checkpassResetTokens

		public function updatePassword($id, $pass){
			global $databaseCall;
			$hash=$this->give_me_hash($pass);

			$sql="update users set Password='{$hash}' where ChatmeID='{$id}'";
			 $databaseCall->perform_query($sql);
			 header("Location:login.php");


		}// Update Password



	}//End of class

	$user=new users();
	//echo $user->randomString(30);
	//echo $user->getRandomID(); 1QohUhQpqM
	//$var=$user->sendMail("AnotherTest", "koushikjay66@gmail.com", "this is just some testing");
	//echo "";
	// $user->checkPassResetTokens("ZBiRlrVVLdZyfSoZZcDWwVtOuTkXmQ", "PpEWZsWswZHxI%40yJKlkeYmbOuxev", "XAuMy%40pn");
	//echo $user->passResetLink("1rzPkTfafx");
	//echo $_SERVER[""];
	//$user->updatePassword("1rzPkTfafx", "Nopassword01");
?>