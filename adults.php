
<?php 
include_once("bheader.php");

?>

        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand text-info" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Adults Books
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
            <?php 
              include_once("mimi/lib.php");
              $obj = new Libarian;
              $output=$obj->getKids(2);
             // var_dump($output);
              foreach($output as $key => $value){
                $id=$value['booktag_id'];

            ?>
            <li><a class="dropdown-item books" href="http://localhost/bookcafe2/adults.php?id=<?php echo $id ?>"><?php echo $value['booktag'];?></a></li>
            <?php
               }
             ?>
            
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

<p>

        <a href="login_signup.php" class="btn btn-info ms-md-5 mt-3 signlog" id="searchbtn">Signup</a>
        
      <a href="homedemo.php" class="btn btn-info ms-4 signlog mt-3" id="searchbtn">Login</a> 
     
  </p>       
    
 

    </div>
 
</nav>
</header>
</div>

<!-- end of navbar-->
<!--end of nav bar-->


  <div class="row mt-5">
    
      
<div class="col trans ">
  <h1 class="text-center">Adults Section</h1>

      <p class="pbutton">
        <a href="login.php" class="btn btn-light mt-2" id="searchbtn">Borrow Book</a>
      </p>

</div>
</div>
<div class="row mt-4">
        <?php 
           include_once("mimi/lib.php");
           $obj = new Libarian;
          
           //var_dump($id);
           if (isset($_GET['id'])) {
             $id=$_GET['id'];
             $output=$obj->getBk($id);
             foreach ($output as $key => $value) {
                $bookid=$value['book_id'];
                $bkimage = $value['book_images']
               
               
               
          
        ?>
           <div class="col-md-3 mt-md-5"><br>
        <div class="card  cardimg"  style="width: 17rem;">
  <img src="bookimage/<?php echo $value['book_images']; ?>" class="card-img-top" alt="images" height=300px><br>
  <div class="card-body" style="background-color: black; color:white">
    <h5 class="card-title text-center" id="imgbg"><?php echo $value['book_name']; ?></h5>
     <p class="pbutton">
        <a href="about.php?id=<?php echo $id; ?>" class="btn btn-info"><i class = 'fa fa-book'></i>About Book</a>
    </p>
      
    
    
  </div>
</div>
        </div> 
        <?php
         }
           //}
           }else{

        ?>
        <?php 
    include_once("mimi/lib.php");
    // create object of class marketplace
    $obj = new Libarian;
    $images = $obj->getBook(); 
    if (!empty($images)) {
      foreach ($images as $key => $value) {
      $id = $value['book_id'];
      $imageurl = $value['book_images'];
      $bookname = $value['book_name'];
      $about = $value['about_book'];
      $author = $value['firstname']." ".$value['lastname'];
     ?>
    
       
        <div class="col-md-3 mt-md-5">
        <div class="card cardimg" style="width: 17rem; "><br>
  <img src="bookimage/<?php echo $imageurl; ?>" class="card-img-top" alt="images"  height="300px"><br>
  <div class="card-body text-center" style="background-color: black; color:white">
    <h5 class="card-title"><?php echo $bookname; ?></h5>
    <p class="pbutton">
        <a href="about.php?id=<?php echo $id; ?>" class="btn btn-info"><i class = 'fa fa-book'></i>About Book</a>
    </p>
      
  
     
  
   </div>


</div>
        </div> 

  
      <?php
      }
    }
  }
   ?>

  
  </div>
</div>


<!--  -->
</body>
</html>

<?php  
include_once("footer.php");
?>





