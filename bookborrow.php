<?php 
include_once("bbookheader.php");
?>


 <!-- Page Content -->
  <div class="container-fluid">

    <div class="row">
            <!--other divs-->
<div class="card bg-dark text-white">
  <img src="images/pple.jpg" class="card-img" alt="image" style="background-attachment: fixed;">

  <div class="card-img-overlay trans">
    <h1 class="card-title animate__animated animate__bounce text-info pbutton mt-3">Bookcafe</h1>
    <p class="card-text text-info pbutton animate__animated animate__bounce">The Home Of Leaders</p>
    <p class="card-text">
      <h5 class="pbutton mt-5"> Book Borrowing Process Successful! Readers are Leaders, Kindly visit our physical location to pick up your book</h5>
      <p class="pbutton"> <a href="bbook.php" class="btn btn-info mt-3">Back</a></p>

      <div class="col-md-6 offset-md-4 mt-3"> 
        
    <?php
    
     include_once('mimi/lib_user.php');
     $username=new User;
             $row=$username->getUser($_SESSION['userid']);
             $userid = $row['user_id'];
            // echo "<h3 class='pbutton alert alert-info'> Welcome ". $row['firstname']." ".$row['lastname'] ."!</h3>";
             $username =$row['firstname']." ".$row['lastname'];
    include_once("mimi/lib.php");
    $obj = new Libarian;
    //$transref = "CH".rand().time();

    $id = $_POST['book_id']; 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // insert transaction details
       
          $output = $obj->borrow(strip_tags(trim($_POST['userid'])), strip_tags(trim($_POST['book_id'])), strip_tags(trim($_POST['libarian'])),strip_tags(trim($_POST['status'])));
          //var_dump($output);

       

     

// $date=date_create("2013-03-15");
// date_add($date,date_interval_create_from_date_string("40 days"));
// echo date_format($date,"Y-m-d");


      $items = $obj->getBok($id);
  
    if (!empty($items)) {
      foreach ($items as $key => $value) {
      $imageurl = $value['book_images'];
      $bookname = $value['book_name'];
      $aboutbook = $value['about_book'];
      $bookid = $value['book_id'];
      $author = $value['firstname']." ".$value['lastname'];
   
     ?>


     
      <div class="card mb-3 alert alert-dark" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 mt-5">
      <img src="bookimage/<?php echo $imageurl?>?id=<?php echo $id ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Book Borrow</h5>
        <p class="card-text">Name Of Borrower: <?php echo $username; ?></p>
        <p class="card-text">Book Author: <?php echo $value['firstname']." ".$value['lastname']; ?></p>
        <p class="card-text">Book Number: <?php echo $_POST['book_id']; ?></p>
         <p class="card-text">Book Name: <?php echo $value['book_name']; ?></p>
          <p>Book description: <?php echo $value['about_book']; ?></p>
        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
  </div>
</div>

      
     <?php    
     }
   }

      }
   ?>
      </div>
         
      </div>

    </div>
    <!-- /.row -->
</p>
</div>
</div>


</body>
</html>


  
<?php 
include_once("bbookfooter.php");
?>



