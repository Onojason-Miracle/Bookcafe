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
            <li><a class="dropdown-item books" href="allbookorder.php">All Book Orders</a></li>
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

    
    <h1 class="mt-4 mb-3 pbutton">Edit  Authors</h1>

    <?php 

    //get authors details from db table
    $author = $obj->findAuthor($_GET['id']);
      


      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['firstname'])) {
          $errors['errfirstname'] = " Firstname is required";
        }

        if (empty($_POST['lastname'])) {
          $errors['errlastname'] = " Lastname is required";
        }

          

          // insert into author table
        if(empty($errors)){
          $output = $obj->updateAuthor(strip_tags(trim($_POST['firstname'])), strip_tags(trim($_POST['lastname'])),strip_tags(trim($_POST['author_id'])));
          
          if ($output == true) {
            // redirect to listauthor.php
            $message = "1";
            header("Location: listauthor.php?msg=$message");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry could not update authors details!</div>";
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
 
        <form name="publisherform" id="publisherform" 
              action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>?id=<?php echo $_GET['id']; ?>"
              method="post">
          <div class="form-group">
            
              <label class="form-label">Firstname:</label>
              <input type="text" class="form-control" id="firstname" name='firstname' 
              value="<?php
                 if(isset($author['firstname'])){
                 echo  $author['firstname'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errfirstname'])) {
                echo "<p class= 'text-danger'>" .$errors['errfirstname'] ."</p>";
              }
              ?>
            
          </div>

           <div class="form-group">
            
              <label class="form-label">Lastname:</label>
              <input type="text" class="form-control" id="lastname" name='lastname' 
              value="<?php
                 if(isset($author['lastname'])){
                 echo  $author['lastname'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errlastname'])) {
                echo "<p class= 'text-danger'>" .$errors['errlastname'] ."</p>";
              }
              ?>
            
          </div>
     
         <input type="hidden" name="author_id" value="<?php if(isset($author['author_id'])){echo $author['author_id'];} ?>">

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
