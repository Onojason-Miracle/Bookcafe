
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


	<title>Login page</title>
	<style type="text/css">
		
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
	</style>
</head>
<body>

  <div class="container-fluid ">
  <!--the upper div with social media icons-->
  <div  class="row mb-0"  style="background-color: #0dcaf0; color: black" id="searchbtn">

    <div class="col-md-3 mt-2">
    <?php 
        echo date("l,jS F, Y"). "<br>";

       ?>
     
    </div>
 <div class="col-md-2 offset-md-7  icondiv">
  <p>
      <a href="" style="color:black" class="ms-5 "><i class="fa fa-twitter"></i></a>
  
      <a href="" style="color:black"class="ms-md-2 "><i class="fa fa-instagram"></i></a>
      <a href="" style="color:black"class="ms-md-2 "><i class="fa fa-linkedin"></i></a>
      <a href="" style="color:black"class="ms-md-2 "><i class="fa fa-facebook"></i></a>
    </p>
    </div>

  </div>
  <!-
  <!-- end of upper div with social media icons-->

  
  <!--begining of navbar-->
  <div class="row" style="background-color:black">
  <div id="navdiv">
  <!--<div class="row" id="navdiv">-->
  <header class="header">
     <nav class="navbar navbar-expand-lg navbar-light  "  >
 
       <img src="images/cafelog.png" alt="Logo" class="mylogo ms-3">
      

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


<a href="#form">
  <p id="logreg">

       
      </p>    
              
        
       
      <a href="login_signup.php" type="button" class="btn btn-info ms-md-4 signlog " name="login" 
      value="login" id="searchbtn"><i class=" fa fa-sign-in  me-md-1"></i>Signup</a>
  
         
    </a>
 

    </div>
 
</nav>

<!-- end of navbar-->

</header>
 </div>
</div>
<!--end of nav bar-->

	<div class="container">
    <div class="row">

      <div class="col-md-6 mt-4" >
        <!-- <img src="images/formm.png" class="fluid ratio ratio 16x9 " > -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/pple.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/plibrary.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/kidspix.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>

		
			<div class="col-md-5 offset-md-1 mt-3" id="formimg">


 <?php          

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
   // to validate
  $errors = array();

  if (empty($_POST['email'])) {
      $errors['email'] = "Email address field cannot be empty";
    }


    if (empty($_POST['password'])) {
      $errors['password'] = "Password field cannot be empty";
    } 

    if (empty($errors)) {
      // code...
   
  //include your user.php
  include_once("mimi/lib_user.php");


  //create user object
  $obj = new User;


  // to access login method

  $message = $obj->login(strip_tags(trim($_POST['email'])), strip_tags(trim($_POST['password'])));
  $emailaddress =$_POST['email'];
  // $name =$_POST['firstname']." ".$_POST['lastname'];
 
  if ($message==true) {

    echo "<div class='alert alert-success text-center'>successful login!</div>

            <p class='pbutton'>
            <a href='bbook.php' class='btn btn-info'>Click to Proceed</a>
            </p>";


    //redirect to homepage.php
   //header("Location: adults.php");
   //exit;
  }

  else{
    echo "<p class='pbutton alert alert-danger'>Invalid email address or password</p>";
  }
 
}



else{
  
  echo "oops something happened";
  // foreach ($errors as $key => $value) {
  //   echo $value;
  // 
}

 
 }


?>


				
            <p class="pbutton mt-5">New on this page? <a href="login_signup.php" class="btn btn-info"><i class=" fa fa-sign-in  me-md-1"></i>Create Account</a></p>
        <form action="" method="post"  class="mt-3  regform" >

          <h2 class="text-center">Login</h2>
          <p class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email"  class="form-control" required="true" id="form_input">
          </p>

          <p class="form-group">
            <label class="form-label">Password:</label>
            <input type="password" name="password"  class="form-control" required="true" id="form_input"><br>
           
            
          </p>

          <p class="form-group pbutton">
          <a class="btn btn-link" href="passwordverify.php">Forgot your password?</a>
        </p>

           <p class="form-group pbutton">
            <input type="submit" name="submit" value="Login" class="btn btn-info">
          </p>


        </form>
      
			</div>
		</div>
	</div>
	
<?php
include_once("footer.php");
ob_end_flush();

?>