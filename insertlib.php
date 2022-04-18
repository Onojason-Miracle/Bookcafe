<?php
// echo "<pre>";
// 	print_r($_POST);
// 	echo "</pre>";

//include_once("mimi/lib.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
include_once("mimi/lib.php");
$firstname=strip_tags(trim($_POST['firstname']));
$lastname=strip_tags(trim($_POST['lastname']));
$email=strip_tags(trim($_POST['email']));
$password=strip_tags(trim($_POST['password']));

 var_dump($_POST);
	$obj=new Libarian;
	$output=$obj->Register($firstname, $lastname, $email, $password);
	if($output==true){
		//redirect to borrow book page
		echo "successful";
	}else{
		echo"Sorry could not sign you up, try again";
	}

}

?>



				<form action="" method="post"  class="mt-3 ">
					<p class="form-group">
						<label class="form-label">Firstname:</label>
						<input type="text" name="firstname"  class="form-control " id="form_input">
					</p>

					<p class="form-group">
						<label class="form-label">Lastname:</label>
						<input type="text" name="lastname"  class="form-control" id="form_input">
					</p>

					<p class="form-group">
						<label class="form-label">Email:</label>
						<input type="email" name="email"  class="form-control" id="form_input">
					</p>

					<p class="form-group">
						<label class="form-label">Password:</label>
						<input type="password" name="password"  class="form-control" id="form_input" minlength="6"><br>
						</p>


						<p class="form-group pbutton">
							<input type="submit" name="submit" value="Register libarian" class="btn btn-info">
						</p>

				</form>