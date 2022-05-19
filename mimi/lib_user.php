<?php
		//include constant
			include_once("constant.php");

		class User{
			
			//member variables
			public $firstname;
			public $lastnaame;
			public $email;
			public $password;
			
			
			public $phone_number;
			public $address;
			public $dbcon; //object handler

			//member methods
			function __construct(){
				//to connect to database by intantiating mysqli class
				$this->dbcon= new mysqli(DB_SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

				//check connection
				if ($this->dbcon->connect_error) {
					// code to be performed
					die("connection failed: ".$this->dbcon->connect_error);

				}else{
					//return true;
					}
				}
		

			function signup($fname, $lname, $email, $pswd, $phone, $address, $confirm){
				//hash password and confirm password
				$password = password_hash($pswd, PASSWORD_DEFAULT);
				//$confirm_password = password_hash($cpswd, PASSWORD_DEFAULT);
				//$confirm_password = $password;
				//
				$sql = "INSERT INTO user(firstname, lastname, email, password, phone_number, address) VALUES('$fname', '$lname','$email', '$password',  '$phone', '$address')";

				//run the query
				$result=$this->dbcon->query($sql);

				//checking for error
					$msg=array();
				if($this->dbcon->error){
					
					 $msg["error"] =" could not add your details ".$this->dbcon->error;
					}

					else{
						
						$msg["success"] = " you are successfully signed up ";
					}
					return $msg;
					}

					//login method

						function login($email, $password){
						//$password = password_hash($pswd, PASSWORD_DEFAULT);

						//write query
						$sql = "SELECT * from user WHERE email='$email'";

						

						//run the query
						$result= $this->dbcon->query($sql);

						if ($result->num_rows > 0) {
							// code...
							$row = $result->fetch_assoc();
							$confirm = password_verify($password, $row['password']);
							//var_dump($confirm);
						//exit;

							if ($confirm) {
								// create session variables

								session_start();
								$_SESSION['userid'] = $row['user_id'];
								$_SESSION['userfirstname'] = $row['firstname'];
								$_SESSION['userlastname'] = $row['lastname'];
								$_SESSION['mylogchecker'] = "RT_0_0_cMeg";
								
								return true;
							}

							

						else{

								return false;
							}
					
					}


				}
				

			
					//end login

				//start get user
				public	function getUser($userid){
					$sql = "select * FROM user WHERE user_id='$userid' ";

					//run the query
					$result = $this->dbcon->query($sql);

					if ($result ->num_rows==1) {
						// code...to loop through result set and fetch all records
						$row=$result->fetch_assoc();
							return $row;
						}else{
							return "Records not found";
						}

						
				}
				//end get user



				//begin get book category
				function get_user(){
					$sql = "select * FROM user";

					//run the query
					$result = $this->dbcon->query($sql);
					$records = array();

					if ($result ->num_rows > 0) {
						// code...to loop through result set and fetch all records

						while ($row = $result->fetch_assoc()) {
							$records[] = $row;
						}

						return $records;
					}

					else{
						return $records;
					}
				}
				// end get Book Category


				//begin bookorder

					public function bookOrder($user, $book){
						//$sql = "INSERT INTO bookorder SET user_id = \'1\', book_id = \'3\';";
						//$sql = "INSERT INTO bookorder SET user_id = \'$user\', book_id = \'$book\'";
						$sql = "INSERT INTO bookorder SET user_id = '$user', book_id = '$book'";

								//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1) {
									return true;
							}else{
									return false;
								}
					}
				//end bookorder
				

			
					//begin logout
					public function logout(){
						session_start();

						session_destroy();

						//redirect to login

						header("Location: login.php");
						exit;
					}

					//end logout

			}
	
?>