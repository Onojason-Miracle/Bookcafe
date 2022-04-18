<?php 
ob_start();

include_once("libheader.php");
?>

         <li class="nav-item">
          <a class="nav-link active navbar-brand" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            issue Borrow
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="allbookorder.php">All Book Orders</a></li>
            
           
          </ul>
        </li>
        
      </ul>
      <div class="col ms-5">

         <form role="search" class="d-flex">
         
            <input type="search"  name="search"
           placeholder="Search for books"
          aria-label="Search through site content"
          id="searchbtn" 
          class="form-control"/>
         <button class="btn btn-info " style="border-radius: 20px; margin-left:-75px"><i class ="fa fa-search">Search</i></button>
           <!-- <div id="displayresult"></div>-->
        
        </form>
    
    </div>


  <p id="logreg">

       
        
       <!--libarian login -->
             <!-- Button trigger modal -->
      <a href ="logout.php" class="btn btn-info ms-4 mt-3 signlog" id="searchbtn">Logout</a> 
     
   </p>    
            
         
  
 

   
 
</nav>
</header>
 </div>

<!-- end of navbar-->


<?php 

include_once("mimi/lib.php");

//create object of Libarian  class
$obj = new Libarian;
$lrow=$obj->getLibarian($_SESSION['libid']);
  $adminid = $lrow['libtag_id'];
  $adminname =$lrow['lib_firstname']." ".$lrow['lib_lastname'];

?>

 <!-- Page Content -->
  <div class="container">

    
    <h1 class="mt-4 mb-3 pbutton">Issue Borrow</h1>

    <?php 

    //get order details from db table
    $author = $obj->findBookOrder($_GET['id']);
      


      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        // $errors = array();
        // if (empty($_POST['userid'])) {
        //   $errors['erruserid'] = " username is required";
        // }

        // if (empty($_POST['book_id'])) {
        //   $errors['errbookid'] = " bookname is required";
        // }


        // if (empty($_POST['order_id'])) {
        //   $errors['errorderid'] = " orderid is required";
        // }


        // if (empty($_POST['libtag_id'])) {
        //   $errors['errlibtagid'] = " libtag is required";
        // }


        if (empty($_POST['status'])) {
          $errors['errstatus'] = " status is required";
        }
          

          // insert into author table $order, $user, $book, $lib, $status
        if(empty($errors)){
          $output = $obj->Borrow($_POST['order_id'], $_POST['user_id'],$_POST['book_id'],$_POST['libtag_id'],$_POST['status']);
          var_dump($output);
        
          if ($output == true) {
            // redirect to listauthor.php
            $message = "1";
             header("Location: borrowedbooks.php?msg=$message");
             exit;

            //echo "successful issue borrow";
          }else{

            echo "<div class='alert alert-danger'>Sorry could not issue borrow!</div>";
          }
        }
      }
    ?>

 
      <div class="row">
      <div class="col-md-6 offset-md-3">

             <!--  <?php   //echo "<pre>";
              //print_r($author);
              //echo "</pre>";
              ?> -->
 
        <form name="issueborrow" id="issueborrowform" 
              action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $_GET['id']; ?>"
              method="post">
        


            
              
       <p >  
         <label class="form-label">Libarian</label>
          <input type="text" name="libtag_id" class="form-control" value="<?php echo $adminid; ?>"  >
        </p>

        <p><!-- 'returned','not_returned','not_picked_up','cancelled' -->
          <label class="form-label">Status</label>
          <select class="form-select" name="status">
            <option value="">--select status--</option>
            <option value='returned'>Returned</option>
            <option value='not_returned'> Not Returned</option>
            <option value='not_picked_up'>Not Picked Up</option>
            <option  value= 'cancelled'>Cancelled</option>
          </select>
           <?php 
              if (isset($errors['errstatus'])) {
                echo "<p class= 'text-danger'>" .$errors['errstatus'] ."</p>";
              }
              ?>
        </p>
          
          <p>
           <label class="form-label">Book Id</label>
           <input type="text" name="book_id" class="form-control" value="<?php if(isset($author['book_id'])){echo $author['book_id'];} ?>">
         </p>

         <p>
           <label class="form-label">User</label>
           <input type="text" name="user_id" class="form-control" value="<?php if(isset($author['user_id'])){echo $author['user_id'];} ?>">

      </p>
         <input type="hidden" name="order_id" value="<?php if(isset($author['order_id'])){echo $author['order_id'];} ?>">

         <p class="pbutton">
          <input type="submit" class="btn btn-info" id="issueborrowButton" value="Issue Borrow" name="issueborrow">
        </p>
        
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>


          

<?php 
include_once("footer.php");
ob_end_flush();
?>
