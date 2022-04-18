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

//create object of libarian class
$pubobj = new Libarian;
?>

 <!-- Page Content -->
  <div class="container" id="publisher">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 pbutton">Add  Publisher
      <!--<small>form</small>-->
    </h1>

    <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['publisher_name'])) {
          $errors['errpublisher_name'] = "Name is required";
        }


        if(empty($errors)){
          $output = $pubobj->addPublisher($_POST['publisher_name']);
          
          if ($output == true) {
            // redirect to listpublisher.php
            $pub = "1";
            header("Location: listpublisher.php?msg=$pub");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not add publisher details details</div>";
          }
        }
      }
    ?>


 
    <div class="row">
      <div class="col-md-6 offset-md-3 mb-4">
 
        <form name="pubform" id="pubform" action="" method="post" >
          <div class="form-group">
            
              <label class="form-label">Publisher Name:</label>
              <input type="text" class="form-control" id="publisher_name" name='publisher_name' 
              value="<?php
                 if(isset($_POST['publisher_name'])){
                 echo  $_POST['publisher_name'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['publisher_name'])) {
                echo "<p class= 'text-danger'>" .$errors['errpublisher_name'] ."</p>";
              }
              ?>
            
          </div>

          
		  
          <p class="pbutton">
          <input type="submit" class="btn btn-info " id="pubbutton" value="Add Publisher" name="addpub">
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