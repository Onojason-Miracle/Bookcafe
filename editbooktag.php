<?php 
ob_start();

include_once("libheader.php");
?>

         <li class="nav-item">
          <a class="nav-link active navbar-brand" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Book Tag
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="listbooktag.php">List Booktag</a></li>
            <li><a class="dropdown-item books" href="booktag.php">Add Booktag</a></li>
           
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

    
    <h1 class="mt-4 mb-3 pbutton">Edit  BookTag</h1>


   <?php 

    //get booktag details from db table
    $booktag = $obj->findBookTag($_GET['id']);
      


      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['booktag'])) {
          $errors['errbtag'] = "Booktag is required";
        }

          if (empty($_POST['category'])) {
          $errors['errbc'] = "Book Category is required";
        }

          

          // insert into booktag table
        if(empty($errors)){
          $output = $obj->updateBookTag($_POST['booktag'], $_POST['category'],$_POST['booktag_id']);
          
          if ($output == true) {
            // redirect to listbooktag.php
            $message = "1";
            header("Location: listbooktag.php?msg=$message");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not update Booktag details</div>";
          }
        }
      }
    ?>

 
<div class="row">
      <div class="col-md-6 offset-md-3 mb-4">
      <?php 
          echo "<pre>";
          print_r($booktag);
          echo "</pre>";
        ?>
 
        <form name="booktagform" id="booktagform" 
              action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $_GET['id']; ?>"
              method="post">
          <div class="form-group">
            
              <label class="form-label">BookTag:</label>
              <input type="text" class="form-control" id="booktag" name='booktag' 
              value="<?php
                 if(isset($booktag['booktag'])){
                 echo  $booktag['booktag'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errbtag'])) {
                echo "<p class= 'text-danger'>" .$errors['errbtag'] ."</p>";
              }
              ?>
            
          </div>
     
          
          

         <div class="control-group form-group">
            
              <label class="form-label">Category:</label>
              <select class="form-control" id="category" name='category'>
                <option value=" ">Choose Category</option>
                <?php 
                  // make reference to get bookcategory method
                 $category = $obj->getBookCategory();
                  foreach($category as $key => $value){
                 // var_dump($value);
                  $categoryid = $value['bc_id'];
                  $categoryname = $value['category'];

                  if (isset($booktag['bc_id']) && $booktag['bc_id']== $categoryid) {
                    echo "<option value= '$categoryid' selected>$categoryname</option>";
                  }else{
                    echo "<option value = '$categoryid'>$categoryname</option>";
                  }
              
                   
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errbC'])) {
                echo "<p class= 'text-danger'>" .$errors['errbc'] ."</p>";
              }
              ?>
             
            
          </div>
         
      
         
            <input type="hidden" name="booktag_id" value="<?php if(isset($booktag['booktag_id'])){echo $booktag['booktag_id'];} ?>">
          
         <p class="pbutton mt-4">
          <input type="submit" class="btn btn-info" id="editBtagButton" value="Save Changes" name="updateBtag">
        </p>
        
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
   
    

<?php 
include_once("footer.php");
ob_end_flush();
?>
