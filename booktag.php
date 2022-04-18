  <!-- /.container -->
  <!-- /.container -->
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
            <li><a class="dropdown-item books" href="listbooktag.php">List BookTag</a></li>
            <li><a class="dropdown-item books" href="booktag.php">Add BookTag</a></li>
          
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

//create object of libarian class
$obj = new Libarian;
?>

 <!-- Page Content -->
  <div class="container">

   
    <h1 class="mt-4 mb-3 pbutton">Add Book Tag</h1>

    <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['bookcategory'])) {
          $errors['errbc'] = "book category is required";
        }

          if (empty($_POST['booktag'])) {
          $errors['errbooktag'] = "booktag is required";
        }


        if(empty($errors)){
          $output = $obj->addBookTag(strip_tags(trim($_POST['bookcategory'])), strip_tags(trim($_POST['booktag'])));
          
          if ($output == true) {
            // redirect to listbooktag.php
            $booktag = "1";
            header("Location: listbooktag.php?msg=$booktag");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Oops could not add booktag details</div>";
          }
        }
      }
    ?>

  

 
    <div class="row">
      <div class="col-md-6 offset-md-3 mb-4">
 
        <form name="booktagform" id="booktagform" action='' method="post" >
          <div class="form-group">
            
              <label class="form-label"> Book Tag:</label>
              <input type="text" class="form-control" id="booktag" name='booktag' 
              value="<?php
                 if(isset($_POST['booktag'])){
                 echo  $_POST['booktag'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errbooktag'])) {
                echo "<p class= 'text-danger'>" .$errors['errbooktag'] ."</p>";
              }
              ?>
            
          </div>
      
         
         
              <div class=" form-group">
           
              <label class="form-label">Book Category:</label>
              <select class="form-control" id="bookcategory" name='bookcategory'>
                <option value=" ">Choose Category</option>
                <?php 
                  // make reference to get bookcategory method
                 $category = $obj->getBookCategory();
                  foreach($category as $key => $value){
                 // var_dump($value);
                  $categoryid = $value['bc_id'];
                  $categoryname = $value['category'];
              
                   echo "<option value= '$categoryid'>$categoryname</option>";
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errbc'])) {
                echo "<p class= 'text-danger'>" .$errors['errbc'] ."</p>";
              }
              ?>
             
            
          </div>
         
           
        <p class="pbutton"> 
          <input type="submit" class="btn btn-info mt-5" id="addbooktagButton" value="Add BookTag" name="addbooktag">
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