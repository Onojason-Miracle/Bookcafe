
<?php
    session_start();
// check if the libarian authenticate
    if (isset($_SESSION['mylogchecker'])  && $_SESSION['mylogchecker']== 'RT_0_0_cMeg') {
    
    }else{
      header("Location: login.php");
      exit;
    }
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>home page demo</title>
<style type="text/css">
  .trans{
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      padding: 20px;
      
}
</style>

</head>
<body>
<div class="container-fluid">
  <!--the upper div with social media icons-->
   <div  class="row mb-0"  style="background-color: #0dcaf0; color: black" id="searchbtn">

    <div class="col-md-3 mt-2"><i class="fa fa-calendar" aria-hidden="true"></i>
    <?php 
        echo date("l,jS F, Y");

       ?>
  
    </div>
 <div class="col-md-2 offset-md-7  icondiv">
  <p>
      <a href="" style="color:black" class="ms-5 "><i class="fa fa-twitter"></i></a>
  
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-instagram"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-linkedin"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-facebook"></i></a>
    </p>
    </div>

  </div>
  <!-- end of upper div with social media icons-->


  <!--begining of navbar-->
  <div class="row" id="navdiv" style="background-color:black">
  <header class="header">
     <nav class="navbar navbar-expand-lg navbar-light "  >
 
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
          <a class="nav-link active navbar-brand text-info" href="librarycard.php">Library Card</a>
        </li>


         <li class="nav-item">
          <a class="nav-link active navbar-brand text-info" href="bbook.php">Books</a>
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

        <a  href="userlogout.php" class="btn btn-info ms-md-5 mt-3" id="searchbtn"><i class="fa fa-sign-out" aria-hidden="true"></i>logout</a>

        
         
      </p>    
              
     
  
         
 

    </div>
 
</nav>

<!-- end of navbar-->
  
</header>
 </div>
</div>
