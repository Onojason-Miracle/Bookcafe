<?php 
ob_start();

include_once("libheader.php");
?>

         <li class="nav-item">
          <a class="nav-link active navbar-brand" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Books
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="listauthor.php">List Author</a></li>
            <li><a class="dropdown-item books" href="addauthor.php">Add Author</a></li>
           
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
      <a href ="logout.php" class="btn btn-info ms-4 mt-3 signlog" id="searchbtn"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> 
     
   </p>    
            
         
  
 

   
 
</nav>
</header>
 </div>

<!-- end of navbar-->


<?php 

include_once("mimi/lib.php");

//create object of Libarian  class
$obj = new Libarian;
  //var_dump($obj);
    // exit;

?>

 <!-- Page Content -->
  <div class="container">

    
    <h1 class="mt-4 mb-3 pbutton">Edit  Borrow Details</h1>

    <?php 

    //get authors details from db table
    $author = $obj->findBorrow($_GET['id']);
      var_dump($author);
      //exit;


      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation
// $user, $book, $lib, $status,$bbid
        $errors = array();
        if (empty($_POST['user_id'])) {
          $errors['erruser'] = " user id is required";
        }

        if (empty($_POST['book_id'])) {
          $errors['errbook'] = " book id is required";
        }

        if (empty($_POST['libtag_id'])) {
          $errors['errlib'] = " libarian tag is required";
        }

        if (empty($_POST['status'])) {
          $errors['errstatus'] = " status is required";
        }
          

          // insert into author table
        if(empty($errors)){
          $output = $obj->updateBorrow($_POST['user_id'], $_POST['book_id'], $_POST['libtag_id'], $_POST['status'] ,$_POST['bb_id']);
          var_dump($output);
          
          if ($output == true) {
            // redirect to listauthor.php
            $message = "1";
            header("Location: borrowedbooks.php?msg=$message");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not update borrowed book details!</div>";
          }
        }
      }
    ?>

 
      <div class="row">
      <div class="col-md-6 offset-md-3">

              <?php   echo "<pre>";
              print_r($author);
              echo "</pre>";
              ?>
 
        <form name="borrowform" id="borrowform" 
              action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $_GET['id']; ?>"
              method="post">
          <div class="form-group">
            
              <label class="form-label">User Id:</label>
              <input type="text" class="form-control" id="firstname" name='user_id' 
              value="<?php
                 if(isset($author['user_id'])){
                 echo  $author['user_id'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['erruser'])) {
                echo "<p class= 'text-danger'>" .$errors['erruser'] ."</p>";
              }
              ?>
            
          </div>

           <div class="form-group">
            
              <label class="form-label">Book Id:</label>
              <input type="text" class="form-control" id="lastname" name='book_id' 
              value="<?php
                 if(isset($author['book_id'])){
                 echo  $author['book_id'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errbook'])) {
                echo "<p class= 'text-danger'>" .$errors['errbook'] ."</p>";
              }
              ?>
            
          </div>

           <div class="form-group">
            
              <label class="form-label">Libarian Tag:</label>
              <input type="text" class="form-control" id="lastname" name='libtag_id' 
              value="<?php
                 if(isset($author['libtag_id'])){
                 echo  $author['libtag_id'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errlib'])) {
                echo "<p class= 'text-danger'>" .$errors['errlib'] ."</p>";
              }
              ?>
            
          </div>

           <div class="form-group">
            
              <label class="form-label">Status:</label>
        
            
              
              <select class="form-control" id="status" name='status'>
                <option value=" ">--select Status--</option>

                
<?php 
                  if (isset($author['status']) && $author['status']== $status) {
                    echo "<option value= $status selected>$status</option>";
                  }else{
                    echo "<option value = 'returned'>Returned</option>";
                    echo "<option value = 'not_returned'>Not Returned</option>";
                       echo "<option value = 'not_picked_up'>Not Picked Up</option>";
                          echo "<option value = 'cancelled'>Cancelled</option>";
                  }
              
                   
                // }
                ?>

              </select>

                <?php 
              if (isset($errors['errstatus'])) {
                echo "<p class= 'text-danger'>" .$errors['errstatus'] ."</p>";
              }
              ?>
             
            
          </div><br>

             
                <br>
             
            
          </div>
     
         <input type="hidden" name="bb_id" value="<?php if(isset($author['bb_id'])){echo $author['bb_id'];} ?>">

         <p class="pbutton">
          <input type="submit" class="btn btn-info" id="editAuthorButton" value="Save Changes" name="editauthor">
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
