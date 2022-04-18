<?php
ob_start();
include_once("libheader.php");

 ?>


         <li class="nav-item">
          <a class="nav-link active navbar-brand text-info" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand text-info" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Author
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="listauthor.php">List Author</a></li>
            <li><a class="dropdown-item books" href="addauthor.php">Add Author</a></li>
          
          </ul>
        </li>
        
      </ul>
      <div class="col ms-md-5">

          <form role="search" class="d-flex">
         
            <input type="search"  name="search"
           placeholder="Search for books"
          aria-label="Search through site content"
          id="searchbtn" 
          class="form-control"/>
         <button class="btn btn-info " style="border-radius: 20px; margin-left:-75px"><i class ="fa fa-search">Search</i></button>
           
        </form>    </div>


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

//create object of club class
$obj = new Libarian;
?>

 <!-- Page Content -->
  <div class="container" id="publisher">

    
    <h1 class="mt-4 mb-3 pbutton">Add  Author</h1>

    <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['firstname'])) {
          $errors['errfirstname'] = "firstname is required";
        }

          if (empty($_POST['lastname'])) {
          $errors['errlastname'] = "lastname is required";
        }


        if(empty($errors)){
          $output = $obj->addAuthor(strip_tags(trim($_POST['firstname'])), strip_tags(trim($_POST['lastname'])));
          
          if ($output == true) {
            // redirect to listauthor.php
            $author = "1";
            header("Location: listauthor.php?msg=$author");
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
            <div class="controls">
              <label>firstName:</label>
              <input type="text" class="form-control" id="firstname" name='firstname' 
              value="<?php
                 if(isset($_POST['firstname'])){
                 echo  $_POST['firstname'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['firstname'])) {
                echo "<p class= 'text-danger'>" .$errors['errfirstname'] ."</p>";
              }
              ?>
            </div>
          </div>

           <div class="form-group">
            <div class="controls">
              <label>LastName:</label>
              <input type="text" class="form-control" id="lastname" name='lastname' 
              value="<?php
                 if(isset($_POST['lastname'])){
                 echo  $_POST['lastname'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['lastname'])) {
                echo "<p class= 'text-danger'>" .$errors['errlastname'] ."</p>";
              }
              ?>
            </div>
          </div>


      
		  
          <p class="pbutton">
          <input type="submit" class="btn btn-info " id="pubbutton" value="Add Author" name="addauthor">
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