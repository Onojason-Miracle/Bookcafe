<?php 
ob_start();

include_once("libheader.php");
?>

         <li class="nav-item">
          <a class="nav-link active navbar-brand" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Publisher
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="listpublisher.php">List Publisher</a></li>
            <li><a class="dropdown-item books" href="publisher.php">Add Publisher</a></li>
           
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
?>

 <!-- Page Content -->
  <div class="container">

    
    <h1 class="mt-4 mb-3 pbutton">Edit  Publishers</h1>

    <?php 

    //get publishers details from db table
    $publisher = $obj->findPublisher($_GET['id']);
      


      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['publisher_name'])) {
          $errors['errpubname'] = " Name is required";
        }

          

          // insert into publisher table
        if(empty($errors)){
          $output = $obj->updatePublisher($_POST['publisher_name'], $_POST['publisher_id']);
          
          if ($output == true) {
            // redirect to listpublisher.php
            $pub = "1";
            header("Location: listpublisher.php?msg=$pub");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not update publisher details!</div>";
          }
        }
      }
    ?>

 
      <div class="row">
      <div class="col-md-6 offset-md-3">

              <?php   echo "<pre>";
              print_r($publisher);
              echo "</pre>";
              ?>
 
        <form name="publisherform" id="publisherform" 
              action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $_GET['id']; ?>"
              method="post">
          <div class="form-group">
            
              <label class="form-label">Publisher Name:</label>
              <input type="text" class="form-control" id="publisher_name" name='publisher_name' 
              value="<?php
                 if(isset($publisher['publisher_name'])){
                 echo  $publisher['publisher_name'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errpubname'])) {
                echo "<p class= 'text-danger'>" .$errors['errpubname'] ."</p>";
              }
              ?>
            
          </div>
     
         <input type="hidden" name="publisher_id" value="<?php if(isset($publisher['publisher_id'])){echo $publisher['publisher_id'];} ?>">

         <p class="pbutton">
          <input type="submit" class="btn btn-info" id="editPublisherButton" value="Save Changes" name="editpublisher">
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
