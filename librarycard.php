 <?php 
ob_start();

   
include_once("bbookheader.php");
?>


 <!-- Page Content -->
  <div class="container-fluid">

   
        <h1 class= "pbutton mb-3 mt-3">Library Card</h1>
 


    <?php
    
     include_once('mimi/lib_user.php');
     $username=new User;
             $row=$username->getUser($_SESSION['userid']);
             $userid = $row['user_id'];
            // echo "<h3 class='pbutton alert alert-info'> Welcome ". $row['firstname']." ".$row['lastname'] ."!</h3>";
             $username =$row['firstname']." ".$row['lastname'];
             echo "<h2 class='alert alert-dark pbutton'> Name: ". $username."<br> Library Number:" .$userid."</h2>";
 ?>
  
    <div class="row">

          <!--other divs-->
<!-- <div class="card bg-dark ">
  <img src="images/pple.jpg" class="card-img" alt="image" style="background-attachment: fixed;">

  <div class="card-img-overlay trans">
    <h1 class="card-title animate__animated animate__bounce textcolor pbutton mt-3">Welcome To Bookcafe</h1>
    <p class="card-text textcolor pbutton animate__animated animate__bounce">The Home Of Leaders</p>
    <p class="card-text"> -->

    <?php
    
    
             include_once('mimi/lib.php');
             $obj = new Libarian;
             $output = $obj->LibraryCard($userid);

             foreach ($output as $key => $value) {
               $_SESSION['book_id'] = $value['book_id'];
               $dateb = $value['date_borrowed'];
                $dr = $value['date_to_return'];
                $status = $value['status'];
               
          $date=date_create($dateb);
          date_add($date,date_interval_create_from_date_string("14 days"));
          //echo date_format($date,"Y-m-d");
          $value['date_to_return'] = date_format($date,"Y-m-d");
          $dr = date_format($date,"Y-m-d");
           if ($status == 'not_returned') {
             $not = " this book is with ". ucwords($username);
           }

           elseif ($status == 'not_picked_up') {
             $not = "Hello ".ucwords($username)." you didnt pick up your borrowed book";
           }

            elseif ($status == 'cancelled') {
             $not = "Hello ".ucwords($username)." you cancelled your book borrowing process";
           }

           else{
            $not = "Hello ".ucwords($username)." Thank you for returning this book";
           }

              
              
             $book = $obj->findBook($_SESSION['book_id'])
            
               ?>
              
                
 <div class="card mb-3" >   
 <div class="row g-0">
    <div class="col-md-4 offset-md-3">
      <img src="bookimage/<?php if(isset($book['book_images'])){echo $book['book_images'];}?>" class="img-fluid rounded-start" alt="bookimage" style="width: 30%;">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text mt-5">Name Of Book: <?php if(isset($book['book_name'])){echo $book['book_name'];}?></p>
         <p class="card-text">Date Borrowed: <?php echo $dateb?></p>
         <p class="card-text">Date To Return: <?php echo $dr?></p>
        <p class="card-text"><small class="text-muted">Status: <?php echo $not?></small></p>
      </div>
    </div>
  </div>
</div>
  

               <?php

               
                }
    
?>

   
</div>
  <!-- /.container -->
<?php 
include_once("footer.php");
ob_end_flush();
?>