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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel='stylesheet' type='text/css' href='book.css'> 
  <link rel="stylesheet" type="text/css" href="others/jquery/animate/animate.css">

    <title>home page demo</title>
<style type="text/css">
    
#modal{
  border: 1px solid black;
  background-color: #eee;
}
#modal:focus{
background-color: white;
}

.marg{
  margin-right: -10px;
}

  .trans{
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      
}
</style>

</head>

<body>
<div class="container-fluid" style="position:relative;">
  <!--the upper div with social media icons-->
  <div  class="row  mb-0 "  style="background-color: #0dcaf0; color: black;" id="searchbtn">

    <div class="col-md-3 mt-2 "><i class="fa fa-calendar" aria-hidden="true"></i>
    <?php 
        echo date("l,jS F, Y");

       ?>
    
    </div>
 <div class="col-md-2 offset-md-7 icondiv">
  <p>
      <a href="" style="color:black" class="ms-5 "><i class="fa fa-twitter"></i></a>
  
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-instagram"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-linkedin"></i></a>
      <a href="" style="color:black"class="ms-2 "><i class="fa fa-facebook"></i></a>
    </p>
    </div>

  </div>
  <!-- end of upper div with social media icons-->