  <!-- /.container -->
  <!-- /.container -->
<?php
ob_start();
include_once("bbookheader.php");

 ?>


       
   <?php 


include_once("mimi/lib_user.php");

//create object of club class
$obj = new User;
?>

 <!-- Page Content -->
  <div class="container-fluid" id="bookorder">

    
    
    <div class="row">

                 <!--other divs-->
<div class="card bg-dark text-white">
  <img src="images/pple.jpg" class="card-img" alt="image" style="background-attachment: fixed;">

  <div class="card-img-overlay trans">
    <h1 class="mt-4 mb-3 pbutton">Book Order</h1>

    <h1 class="card-title animate__animated animate__bounce text-info pbutton mt-3">Bookcafe</h1>
    <p class="card-text text-info pbutton animate__animated animate__bounce">The Home Of Leaders</p>
    <p class="card-text">
      <h5 class="pbutton mt-5"> Book Borrowing Process Successful! Readers are Leaders, Kindly visit our physical location to pick up your book</h5>
      <p class="pbutton"> <a href="bbook.php" class="btn btn-info mt-3">Back</a></p>

      <div class="col-md-6 offset-md-4 mt-3"> 
     <!--  <div class="col-md-6 offset-md-3 mb-4"> -->

    <?php 

       $row=$obj->getUser($_SESSION['userid']);
             $userid = $row['user_id'];
            // echo "<h3 class='pbutton alert alert-info'> Welcome ". $row['firstname']." ".$row['lastname'] ."!</h3>";
             $username =$row['firstname']." ".$row['lastname'];




$id= $_POST['book_id']; 

      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['userid'])) {
          $errors['erruser'] = "user is required";
        }

          if (empty($_POST['book_id'])) {
          $errors['errlastname'] = "book is required";
        }


        if(empty($errors)){
          $output = $obj->bookOrder(strip_tags(trim($_POST['userid'])), strip_tags(trim($_POST['book_id'])));
          
          if ($output == true) {
            // redirect to listauthor.php
            echo "successful";
            // $author = "1";
            // header("Location: listauthor.php?msg=$author");
            // exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not add publisher details details</div>";
          }
        }
      }
 
    ?>


 
        <?php echo $username?>


   <?php
 
    include_once("mimi/lib.php");

     // $available = $obj->getBbookOrder($id)

    // create object of class marketplace
    $lib = new Libarian;
     
    $items = $lib->findBook( $id);
  
     
 
   ?>  



          <div class="card mb-3 alert alert-dark" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 mt-1">
      <img src="bookimage/<?php if(isset($items['book_images'])){echo $items['book_images'];} ?>?id=<?php echo $id ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title mt-3">Book Borrow</h5>
        <p class="card-text">Name Of Borrower: <?php echo $username; ?></p>
        <!-- <p class="card-text">Book Author:  <?php //if(isset($items['lastname'])){echo $items['firstname']." ".$items['lastname'];}  ?></p>-->
        <p class="card-text">Book Number: <?php if(isset($items['book_id'])){echo $items['book_id'];} ?></p>
         <p class="card-text">Book Name: <?php if(isset($items['book_name'])){echo $items['book_name'];}  ?></p>
          <!-- <p>Book description: <?php //echo $value['about_book']; ?></p> -->
        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
      </div>
    </div>
  </div>
</div>
 
   <?php   
    
  //  }
  // }
?>
            </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</p>
</div>
</div>
</body>
</html>
<?php 
include_once("footer.php");
ob_end_flush();
?>