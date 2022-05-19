<?php 
	ob_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' type='text/css' href= 'bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='icons/css/all.css'>
  <link rel='stylesheet' type='text/css' href='icons/css/fontawesome.css'>
  <link rel='stylesheet' type='text/css' href='book.css'>
  <link rel="stylesheet" type="text/css" href="others/jquery/animate/animate.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<title>login/signup page</title>

	<style type="text/css">
		

		#formimg{
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

#form_input{
	border: 1px solid black;
	background-color: #eee;
}
#form_input:focus{
background-color: white;
}
		.trans{
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
			
}

		#register{
			/*background-color:#0dcaf0;*/
			color:black;
		}

		#logreg{
			align-content: center;
		}

	.formsearch{
		width: 100%;
	}


	.cols{background-color:black;
	color:white;
}

.span{
	color: #0dcaf0;
	font-size: 1.2em;
}

	</style>
</head>

<body>
 <div class="container-fluid">
  <!--the upper div with social media icons-->
  <div  class="row mb-0"  style="background-color: #0dcaf0; color: black" id="searchbtn">

    <div class="col-md-3 mt-2">
    <?php 
        echo date("l,jS F, Y"). "<br>";

       ?>
     
    </div>
 <div class="col-md-2 offset-md-7  icondiv">
  <p>
      <a href="" style="color:black" class="ms-md-5 "><i class="fa fa-twitter"></i></a>
  
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-instagram"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-linkedin"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-facebook"></i></a>
    </p>
    </div>

  </div>
  <!-- end of upper div with social media icons-->

    <div class="row " style="background-color:black">
      <div class="col-md">

  <!--begining of navbar-->

	
 <div id="navdiv" >
  	
  <header class="header">
     <nav class="navbar navbar-expand-lg navbar-light  " >
 
       <img src="images/cafelog.png" alt="Logo" class="mylogo">
      
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active navbar-brand ms-md-5 text-info" aria-current="page" href="homedemo.php">Home</a>
        </li>

       

          <li class="nav-item">
          <a class="nav-link active navbar-brand text-info" aria-current="page" href="blog.php">Blog</a>
        </li>


         <li class="nav-item">
          <a class="nav-link active navbar-brand text-info" href="faq.php">FAQ</a>
        </li>
      
      </ul>
      <div class="col ms-md-5">

         <form role="search" class="d-flex">
         
            <input type="search"  name="search"
           placeholder="Search for books"
          aria-label="Search through site content"
          id="searchbtn" 
          class="form-control"/>
         <button class="btn btn-info " style="border-radius: 20px; margin-left:-75px"><i class ="fa fa-search">Search</i></button>
        </form>
    
    </div>

</nav>
</header>
</div>
</div>
<div class=" col-md-12 main">

  
    <h1 class="card-title animate__animated animate__bounce text-info pbutton mt-3">This Is Bookcafe</h1>
    <p class="card-text text-info pbutton animate__animated animate__bounce mb-2">The Home Of Leaders</p>
  </div>
    
      

  
  </div>
      </div>
  

 <div class="row car" >




 
			
		<p class="pbutton mt-5">
					Already have an account? <a href="login.php" class="btn btn-info animate__animated animate__flash">Login</a>
		</p>
			
			<h1 class="text-center mb-1">Create an Account</h1>

				
		<div  class='col-md-6 offset-md-3 mt-1 '>

			<div id="signup">


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
include_once("mimi/lib_user.php");
$fname=strip_tags(trim($_POST['firstname']));
$lname=strip_tags(trim($_POST['lastname']));
$email=strip_tags(trim($_POST['email']));
$password=strip_tags(trim($_POST['password']));
$phone=strip_tags(trim($_POST['phone_number']));
$address=strip_tags(trim($_POST['address']));
$confirm=strip_tags(trim($_POST['confirm_password']));
 //var_dump($_POST);
	$obj=new User;
	if ($confirm == $password) {
		$output=$obj->signup($fname, $lname, $email, $password, $phone, $address, $confirm);
	if($output==true){
	//	echo "Successful Signup";
echo "<div class='alert alert-success'>Registration Successful Now Proceed to <a href='login.php' class='btn btn-info'>Login</a></div>";
		//header("Location: login.php");
		
	}else{
		echo"Sorry could not sign you up, try again";
	}

}else{
	echo "password do not match!";
}

	}
	


?>




				<form action="" method="post"  class="mt-3 ">
					<p class="form-group">
						<label class="form-label">Firstname:</label>
						<input type="text" name="firstname"  class="form-control " id="form_input" required>
					</p>

					<p class="form-group">
						<label class="form-label">Lastname:</label>
						<input type="text" name="lastname"  class="form-control" id="form_input" required>
					</p>

					<p class="form-group">
						<label class="form-label">Email:</label>
						<input type="email" name="email"  class="form-control" id="form_input" required>
					</p>

					<p class="form-group">
						<label class="form-label">Password:</label>
						<input type="password" name="password"  class="form-control" id="form_input" minlength="6" required><br>
						<label class="form-label">Confirm Password:</label>
						<input type="password" name="confirm_password"  class="form-control" id="form_input" required>
						
					</p>

					<p class="form-group">
						<label class="form-label">PhoneNumber:</label>
						<input type="text" name="phone_number" class="form-control" id="form_input" required>
					</p>

					

					<p class="form-group">
						<label class="form-label">Address:</label>
						<textarea class="form-control" name="address" id="form_input" required></textarea>
					</p>


						<p class="form-group pbutton mt-md-2 mb-md-2">
							<input type="submit" name="submit" value="Create Account" class="btn btn-info">
						</p>

				</form>
		






</div>
</div>
</div>
</div>
		</div>
	</div>
	
<?php
include_once("footer.php");
ob_end_flush();
?>