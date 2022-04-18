
<?php 
ob_start();

include_once("libheader.php");
?>

         <li class="nav-item">
          <a class="nav-link active navbar-brand text-info" href="lib_dashboard.php">Dashboard</a>
        </li>

       <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand text-info" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Books
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="listbooks.php">List Book</a></li>
            <li><a class="dropdown-item books" href="addbook.php">Add Book</a></li>
           
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
  <div class="container-fluid">
    <div class="row overlay">
    
        <div class="col-md-6 offset-md-3 mt-5">
  
    <h1 class="pbutton mb-3 ">Add  Book</h1>

    <?php 
      if ($_SERVER['REQUEST_METHOD']=='POST') {
        // validation

        $errors = array();
        if (empty($_POST['bookname'])) {
          $errors['errbookname'] = "Book name is required";
        }

          if (empty($_POST['publisher'])) {
          $errors['errpublisher'] = "Book Publisher is required";
        }

          if (empty($_POST['author'])) {
          $errors['errauthor'] = "Book Author is required";
        }

          if (empty($_POST['bc'])) {
          $errors['errbc'] = "Book Category is required";
        }

          if (empty($_POST['btag'])) {
          $errors['errbtag'] = "Booktag is required";
        }


          if (empty($_POST['aboutbook'])) {
          $errors['erraboutbook'] = "please give a brief description of the  book!";
        }


          if (empty($_POST['quantity'])) {
          $errors['errquantity'] = "How many quantity are u adding";
        }



          if (empty($_FILES['book_images'])) {
          $errors['errbookimage'] = "add the book image!";
        }
          var_dump($errors);

        if(empty($errors)){
          $output = $obj->addBook(strip_tags(trim($_POST['bookname'])), strip_tags(trim($_POST['isbn'])), strip_tags(trim($_POST['publisher'])), strip_tags(trim($_POST['author'])), strip_tags(trim($_POST['bc'])), strip_tags(trim($_POST['btag'])), strip_tags(trim($_POST['pyear']))strip_tags(trim(, $_POST['aboutbook'])),strip_tags(trim($_POST['quantity'])));
          
          if ($output == true) {
            // redirect to listbooks.php
            $message = "1";
            header("Location: listbooks.php?msg=$message");
            exit;
          }else{

            echo "<div class='alert alert-danger'>Sorry! could not add Book details</div>";
          }
        }
      }
    ?>

   

 
    <div class="row">
      <div class="mb-4">
 
        <form name="bookform" id="bookform" action='' method="post" enctype="multipart/form-data" >

          <div class=" form-group">
          <label class="form-label">Book Name:</label>
              <input type="text" class="form-control" id="bookname" name='bookname' 
              value="<?php
                 if(isset($_POST['bookname'])){
                 echo  $_POST['bookname'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errbookname'])) {
                echo "<p class= 'text-danger'>" .$errors['errbookname'] ."</p>";
              }
              ?>
            
          </div>


          <div class=" form-group">
          <label class="form-label">ISBN:</label>
              <input type="text" class="form-control" id="isbn" name='isbn' 
              value="<?php
                 if(isset($_POST['isbn'])){
                 echo  $_POST['isbn'];
                  }
                ?>">
              
            
          </div><br>


             <div class=" form-group">
            
              <label class="form-label">Publisher:</label>
              <select class="form-control" id="publisher" name='publisher'>
                <option value=" ">Choose Publisher</option>
                <?php 
                  // make reference to get publisher method
                 $publisher = $obj->getPublisher();
                  foreach($publisher as $key => $value){
                 // var_dump($value);
                  $publisherid = $value['publisher_id'];
                  $publishername = $value['publisher_name'];
              
                   echo "<option value= '$publisherid'>$publishername</option>";
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errpublisher'])) {
                echo "<p class= 'text-danger'>" .$errors['errpublisher'] ."</p>";
              }
              ?>
             
            
          </div><br>


           <div class=" form-group">
            
              <label class="form-label">Author:</label>
              <select class="form-control" id="author" name='author'>
                <option value=" ">Choose Author</option>
                <?php 
                  // make reference to get author method
                 $author = $obj->getAuthor();
                  foreach($author as $key => $value){
                 // var_dump($value);
                  $authorid = $value['author_id'];
                  $authorname = $value['firstname']." ".$value['lastname'];
              
                   echo "<option value= '$authorid'>$authorname</option>";
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errauthor'])) {
                echo "<p class= 'text-danger'>" .$errors['errauthor'] ."</p>";
              }
              ?>
             
            
          </div><br>


           <div class=" form-group">
            
              <label class="form-label">Book Category:</label>
              <select class="form-control" id="bc" name='bc'>
                <option value=" ">Choose Book Category</option>
                <?php 
                  // make reference to get bookcategory method
                 $bookcat = $obj->getBookCategory();
                  foreach($bookcat as $key => $value){
                 // var_dump($value);
                  $categoryid = $value['bc_id'];
                  $category = $value['category'];
              
                   echo "<option value= '$categoryid'>$category</option>";
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errbc'])) {
                echo "<p class= 'text-danger'>" .$errors['errbc'] ."</p>";
              }
              ?>
             
            
          </div><br>

           <div class=" form-group">
            
              <label class="form-label">Book Tag:</label>
              <select class="form-control" id="btag" name='btag'>
                <option value=" ">Choose Book Tag</option>
                <?php 
                  // make reference to get booktag method
                 $btag = $obj->getBookTag();
                  foreach($btag as $key => $value){
                 // var_dump($value);
                  $btagid = $value['booktag_id'];
                  $tagname = $value['booktag'];
              
                   echo "<option value= '$btagid'>$tagname</option>";
                }
                ?>

              </select>

                <?php 
              if (isset($errors['errbtag'])) {
                echo "<p class= 'text-danger'>" .$errors['errbtag'] ."</p>";
              }
              ?>
             
            
          </div><br>


		  <div class=" form-group">
            
              <label class="form-label">Published Year:</label>
              <select class="form-control" id="pyear" name="pyear">
                  <option value=" ">Choose Year</option>
                  <?php 
                    for ($year=1920; $year <=2022 ; $year++) { 
                      ?>
                     
                       "<option value= <?php echo $year; ?>
                       <?php //to do selected
                        if (isset($_POST['pyear']) && $_POST['pyear'] == $year) {
                          echo "selected";
                        }
                       ?>
                          > <?php echo $year; ?>
                         </option>"

                   <?php 
                    }
                  ?>
              </select>
             
             </div><br>


          <div class=" form-group">
        
              <label class="form-label">About Book:</label>
              <textarea class="form-control" id="aboutbook" name="aboutbook"  value="<?php
                 if(isset($_POST['aboutbook'])){
                 echo  $_POST['aboutbook'];
                  }
                ?>"></textarea><br>

                <?php 
              if (isset($errors['erraboutbook'])) {
                echo "<p class= 'text-danger'>" .$errors['erraboutbook'] ."</p>";
              }
              ?>
            
          </div>



      <div class=" form-group">
            
              <label class="form-label">Quantity:</label>
              <select class="form-control" id="quantity" name="quantity">
                  <option value=" ">--select quantity--</option>
                  <?php 
                    for ($q=1; $q <=100 ; $q++) { 
                      ?>
                     
                       "<option value= <?php echo $q; ?>
                       <?php //to do selected
                        if (isset($_POST['quantity']) && $_POST['quantity'] == $q) {
                          echo "selected";
                        }
                       ?>
                          > <?php echo $q; ?>
                         </option>"

                   <?php 
                    }
                  ?>
              </select>
             
             </div><br>


          <div class=" form-group">
          <label class="form-label">Book Image:</label>
              <input type="file" class="form-control" id="bookname" name='book_images' 
              value="<?php
                 if(isset($_POST['book_images'])){
                 echo  $_POST['book_images'];
                  }
                ?>">
                <br>
              <?php 
              if (isset($errors['errbookimage'])) {
                echo "<p class= 'text-danger'>" .$errors['errbookimage'] ."</p>";
              }
              ?>
            
          </div>


         
           
        <p class="pbutton mt-3">
          <input type="submit" class="btn btn-info" id="addbookButton" value="Add Book" name="addbook">
        </p>
        
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
</div>
</div>
</div>

  <!-- /.container -->

<?php 
include_once("footer.php");
ob_end_flush();
?>
