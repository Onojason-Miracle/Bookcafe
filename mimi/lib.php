	<?php

	include_once("constant.php");

		class Libarian{
			
			//member variables
			public $firstname;
			public $lastnaame;
			public $email;
			public $pswd;
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
					return true;
					}
				}

					function register($firstname, $lastname, $email, $pswd){
				//hash passwords
				$password = password_hash($pswd, PASSWORD_DEFAULT);
				//
				$sql = "INSERT INTO libarian(lib_firstname, lib_lastname, email, password) VALUES('$firstname', '$lastname','$email', '$password')";

				//run the query
				$result=$this->dbcon->query($sql);

				//check if theres an error
					$msg=array();
				if($this->dbcon->error){
			
					 $msg["error"] =" could not add libarian details ".$this->dbcon->error;
					}

					else{
			
						$msg["success"] = " libarian was successfully added ";
					}
					return $msg;
					}
		

		//login method



					//login method
					function login($email, $password){
						//$password = password_hash($pswd, PASSWORD_DEFAULT);

						//write query
						$sql = "SELECT * from libarian WHERE email='$email'";

						

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
								$_SESSION['libid'] = $row['libtag_id'];
								$_SESSION['libfirstname'] = $row['lib_firstname'];
								$_SESSION['liblastname'] = $row['lib_lastname'];
								$_SESSION['mylogchecker'] = "RT_0_0_cMeg";
								
								return true;
							}

							else{

								return false;
							}
					
					}
				}

			
					//end login

				//start get libarian
				public	function getLibarian($lib){
					$sql = "select * FROM libarian WHERE libtag_id='$lib' ";

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
				//end get libarian


					//start get libarian2
						public	function getLib(){
					$sql = "select * FROM Libarian";

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
				//end get libarian2

				


				//start add publisher
				public function addPublisher($pname){
					
					
						//write your sql
							$sql = "INSERT INTO publishers SET publisher_name = '$pname'";
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

				//end add publisher

				//start get publisher
				public	function getPublisher(){
					$sql = "select * FROM publishers";

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
				//end get publisher


				//begin find publisher
					public function findPublisher($pubid){
						// write the query
						$sql = "SELECT * FROM publishers WHERE publisher_id = '$pubid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find publisher


						// begin update publisher

				public function updatePublisher($name, $pubid){
				
							//write your sql
							$sql = "UPDATE publishers SET publisher_name = '$name' WHERE publisher_id = 
								'$pubid'";
									//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

						

				}
				// end update publisher

				// start delete publisher

public function deletePublisher($id){
	$sql = " DELETE * FROM publishers WHERE publisher_id=$id";
}
				//end delete publisher

			

				//start add author
				public function addAuthor($fname, $lname){
					
					
						//write your sql
							$sql = "INSERT INTO author SET firstname = '$fname', lastname = '$lname'";
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

				//end add author


				//start get author
				public	function getAuthor(){
					$sql = "select * FROM author";

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
				//end get author





//start get author
				public	function getAuth($id){
					$sql = "select * FROM author WHERE author_id = $id";

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
				//end get author






				//begin find author
					public function findAuthor($authorid){
						// write the query
						$sql = "SELECT * FROM author WHERE author_id = '$authorid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find author


						// begin update author

				public function updateAuthor($fname, $lname, $authorid){
				
							//write your sql
							$sql = "UPDATE author SET firstname = '$fname' , lastname = '$lname' WHERE author_id = 
								'$authorid'";
									//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

						

				}
				// end update author


				//begin get book category
				function getBookCategory(){
					$sql = "select * FROM book_category";

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



				//start add booktag
				
					public function addBookTag($bc, $booktag){
					
					
						//write your sql
							$sql = "INSERT INTO book_tag SET bc_id = '$bc', booktag = '$booktag'";
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

				//end add booktag

				

				//begin get booktag
				function getBookTag(){
					$sql = "select * FROM book_tag JOIN book_category ON book_tag.bc_id = book_category.bc_id";

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
				// end get booktag


				//begin find booktag
					public function findBookTag($btagid){
						// write the query
						$sql = "SELECT * FROM book_tag WHERE booktag_id = '$btagid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find booktag


							// begin update booktag

				public function updateBookTag($btag, $bc, $btagid){
					

						//write your sql
							$sql = "UPDATE `book_tag` SET `booktag` = '$btag', `bc_id` = '$bc' WHERE `book_tag`.`booktag_id` = '$btagid'";
									//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

					
						}
				// end update booktag

						// begin add book

				public function addBook( $bookname,$isbn, $publisher,$author, $bc, $booktag, $pyear,$aboutbook,$quantity){
						$bookimage = $this->uploadFile();
						if ($bookimage != false) {
				//write your sql
							$sql = "INSERT INTO book SET book_name = '$bookname', ISBN = '$isbn',  publisher_id = '$publisher',  author_id = '$author', bc_id = '$bc', booktag_id = '$booktag',  published_year = '$pyear',  about_book = '$aboutbook',quantity = $quantity, book_images ='$bookimage'";
									
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1) {
									return true;
							}else{
									return false;
								}

							}

				
					

				}
				// end add book

				//begin get book
				function getBook(){
					$sql = "select * FROM book JOIN book_category ON book.bc_id = book_category.bc_id JOIN author ON book.author_id = author.author_id JOIN publishers ON book.publisher_id = publishers.publisher_id JOIN book_tag ON book.booktag_id = book_tag.booktag_id";

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
				// end get book


					//begin find book
					public function findBook($bookid){
						// write the query
						$sql = "SELECT * FROM book WHERE book_id = '$bookid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find book



							// begin update book

				public function updateBook($booktag, $bc,$author, $bookname,$isbn, $publisher, $pyear, $aboutbook, $quantity,$bookid){
					

						//write your sql
							$sql = "UPDATE `book` SET `booktag_id` = '$booktag', `bc_id` = '$bc', `author_id` = '$author', `book_name` = '$bookname', `ISBN` = '$isbn', `publisher_id` = '$publisher', `published_year` = '$pyear', `about_book` = '$aboutbook' , `quantity` = '$quantity' WHERE `book`.`book_id` = '$bookid'";
									 //var_dump($sql);
									 
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

					
						}
				// end update book



							// begin update bookupdate

				public function updateAvail($bookavail,$bookid){
					

						//write your sql
							$sql = "UPDATE `book` SET `book_available` = '$bookavail' WHERE `book`.`book_id` = '$bookid'";
									 //var_dump($sql);
									 
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

					
						}
				// end update bookupdate




				//begin upload bookimg
					public function uploadFile(){

						// create variables to access the upload file data

	$filename = $_FILES['book_images']['name']; // original file name that was uploaded
	$filesize = $_FILES['book_images']['size'];
	$tmp_name = $_FILES['book_images']['tmp_name']; //temporary folder
	$filetype = $_FILES['book_images']['type']; //the type of file uploaded
	$error = $_FILES['book_images']['error'];

	// check if file is uploaded
	if ($error > 0) {
		// code...
		die("No file uploaded");
	}

	// check the file size

	if ($filesize > 2097152) {
		// code...
		die("file size should not be morethan 2mb");
	}

	$extensions = array('jpg', 'png', 'jpeg', 'gif', 'svg', 'jfif' );

	//get the uploaded file extension
	$file_ext = explode(".", $filename);
	$the_file_ext = end($file_ext);

	var_dump($the_file_ext);

		echo "<br>";
	// check if the file extension is allowed

	if (!in_array(strtolower($the_file_ext), $extensions)) {
		// code...
		die("File type not allowed!");
	}

	// destination folder

	$folder = "bookimage/";

	$new_filename = rand().time().".".$the_file_ext;

	$destination = $folder.$new_filename;

	//move the file from temporary folder to destination
	if (move_uploaded_file($tmp_name, $destination)) {
		// code...
		return $new_filename;
	}

	else{
		return false;
	}



	
					}

				//end of upload file

			//start addbookimage

					public function addBookImg($bookid){
					// call upload file function
					$bookimage = $this->uploadFile();

					if ($bookimage != false) {
						//write your sql
							$sql = "INSERT INTO book_images SET book_id = '$bookid',image_url = '$bookimage'";
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
					

				}
				// end addbookimage


					//begin get bookimages
				function getBookImages(){
					$sql = "select * FROM book_images JOIN book ON book_images.book_id = book.book_id";

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
				// end get bookimages

				//start get user
				public	function getUser(){
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
				//end get user

//begin get kids
				function getKids($num){
					$sql = "select * FROM book_tag WHERE bc_id=$num";

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
				// end get kids



					//begin get bookimg
				function getBookImg($img){
					$sql = "select * FROM book_images JOIN book ON book_images.book_id = book.book_id WHERE image_id='$img'";

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
				// end get bookimg


					//begin get bk
				function getBk($book){
					$sql = "select * FROM book Where booktag_id='$book'";

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
				// end get bk

 
 				//start add bookinstance
				
					public function addBookInstance($bookid, $bstatus,){
					
					
						//write your sql
							$sql = "INSERT INTO book_instance SET book_id = '$bookid', book_status = '$bstatus'";
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

				//end add bookinstance

				

				//begin get bookinstance
				function getBookInstance(){
					$sql = "select * FROM book_instance JOIN book ON book_instance.book_id = book.book_id ";

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
				// end get bookinstance


				//begin find bookinstance
					public function findBookInstance($instanceid){
						// write the query
						$sql = "SELECT * FROM book_instance WHERE instance_id = '$instanceid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find bookinstance


							// begin update bookinstance

				public function updateBookInstance($bstatus, $bookid, $instanceid){
					

						//write your sql
							$sql = "UPDATE `book_instance` SET `book_status` = '$bstatus' WHERE `book_instance`.`instance_id` = '$instanceid'";
									//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

					
						}
				// end update bookinstance


						// begin borrow book method

				public function Borrow($order, $user, $book, $lib, $status ){
					
					
						//write your sql
							$sql = "INSERT INTO borrowed_books SET order_id = '$order', user_id = '$user', book_id = '$book',  libtag_id = '$lib', status ='$status'";
							// var_dump($sql);
							// exit;
 //(SELECT DATEADD(year, 1, 'date_borrowed') AS date_to_return
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

									//begin get borrow
			public 	function getBorrow(){
					$sql = "select * FROM borrowed_books JOIN book ON borrowed_books.book_id = book.book_id JOIN user ON borrowed_books.user_id = user.user_id JOIN libarian ON borrowed_books.libtag_id = libarian.libtag_id JOIN bookorder ON borrowed_books.order_id = bookorder.order_id" ;

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
				

				// end borrow book method



				public 	function getBborrow($id){
					$sql = "select * FROM borrowed_books JOIN book ON borrowed_books.book_id = book.book_id JOIN user ON borrowed_books.user_id = user.user_id JOIN libarian ON borrowed_books.libtag_id = libarian.libtag_id JOIN bookorder ON borrowed_books.order_id = bookorder.order_id WHERE bb_id = '$id'" ;

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
				

				// end borrow book method

				//begin find author
					public function findBorrow($bbid){
						// write the query
						$sql = "SELECT * FROM borrowed_books JOIN bookorder on borrowed_books.order_id = bookorder.order_id JOIN book ON borrowed_books.book_id = book.book_id WHERE bb_id = '$bbid'";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find author


						// begin update borrow

				public function updateBorrow($user, $book, $lib, $status,$bbid){
				
							//write your sql
							$sql = "UPDATE borrowed_books SET user_id = '$user' , book_id = '$book' , libtag_id = '$lib',status = '$status' WHERE bb_id = 
								'$bbid'";
									//var_dump($sql);
									//exit;
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

						

				}
				// end update borrow



							// begin update bookupdate

				public function updateReturn($return,$bbid){
					

						//write your sql
							$sql = "UPDATE `borrowed_books` SET `date_to_return` = '$return' WHERE `borrowed_books`.`bb_id` = '$bbid'";
									 //var_dump($sql);
									 
							// run the query
							$result = $this->dbcon->query($sql);
							if ($this->dbcon->affected_rows ==1 || $this->dbcon->affected_rows ==0) {
									return true;
							}else{
									return false;
								}

					
						}
				// end update bookupdate



				//begin Library Card
				public function LibraryCard($user){
					$sql = "select * FROM borrowed_books WHERE user_id = '$user'";
						//var_dump($sql);
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
				// end get Library Card




				//begin get book
				function getBok($bk){
					$sql = "select * FROM book JOIN book_category ON book.bc_id = book_category.bc_id JOIN author ON book.author_id = author.author_id JOIN publishers ON book.publisher_id = publishers.publisher_id JOIN book_tag ON book.booktag_id = book_tag.booktag_id WHERE book_id = '$bk'";

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
				// end get book


				//begin get book order
				function getBookOrder(){
					$sql = "select * FROM bookorder JOIN book ON bookorder.book_id = book.book_id JOIN user ON bookorder.user_id = user.user_id";

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
				// end getbookorder





	//begin get bbook order
				function getBbookOrder($id){
					$sql = "select count(book_id), quantity FROM bookorder JOIN book ON bookorder.orderbook_id = book.book_id JOIN user ON bookorder.user_id = user.user_id WHERE book_id='$id'";

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
				// end getbbookorder




	//begin get bbook ordercount
				function getBbookCount($id){
					$sql = "select count(book_id) as bookcount FROM bookorder WHERE book_id='$id'";

					//run the query
					$result = $this->dbcon->query($sql);
					$records = array();

					if ($result ->num_rows > 0) {
						// code...to loop through result set and fetch all records

						$records=$result->fetch_assoc();
						$counter=$records['bookcount'];
						if($counter>0){
						return $counter;
					}else{
						return "No record found";
					}
					}

					
				}
				// end getbbookordercount



	//begin get book quantity
				function getQuantity($id){
					$sql = "select quantity as bookquantity FROM book WHERE book_id='$id'";

					//run the query
					$result = $this->dbcon->query($sql);
					$records = array();

					if ($result ->num_rows > 0) {
						// code...to loop through result set and fetch all records

						$records=$result->fetch_assoc();
						$counter=$records['bookquantity'];
						if($counter>0){
						return $counter;
					}else{
						return "No record found";
					}
					}

					
				}
				// end getbbookquantity









				//begin find Bookorder
					public function findBookOrder($orderid){
						// write the query
						$sql = "SELECT * FROM bookorder WHERE order_id = '$orderid' ";

						//run the query
						$result = $this->dbcon->query($sql);
						if ($result->num_rows == 1) {
							$row = $result->fetch_assoc();
							return $row;
						}else{
							return false;
						}
					}
				// end find bookorder


					//begin logout
					public function logout(){
						session_start();

						session_destroy();

						//redirect to login

						header("Location: homedemo.php");
						exit;
					}

					//end logout

				


			}




// $obj = new Libarian;

// $mi=$obj->getBbookCount(6);
// echo $mi;
// 				$output->$obj->borrow(1, 2, 2, 'notreturned');
				
// 									var_dump($output);
// 									exit;
?>

								