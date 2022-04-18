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


  <div class="container-fluid">

  <h1 class="col-md-6 offset-md-3 pbutton mb-3 mt-3">All Books</h1>

     
    <!-- Content Row -->
    <div class="row">
     
     
     
	   <table class="table table-striped table-hover text-center table-responsive">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Book Image</th>
      <th>Book Name</th>
      <th>ISBN</th>
      <th>Publisher</th>
  	  <th>Author</th>
      <th>Book Category</th>
      <th>Book Tag</th>
  	  <th>Published Year</th>
      <th>About Book</th>
      <th>Quantity</th>
      <th>Date Added</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
 <tbody class="table-success">
   <?php 
    // reference getbooks
    $bk = $obj->getBook();
    $counter = 1;

    foreach($bk as $key => $value){
      $id = $value['book_id'];
      ?>
      <tr>

        <th><?php echo $counter++; ?></th>
        <td><img src="bookimage/<?php echo $value['book_images'];?>" alt="bookimage" style="width:45px;"></td>
        <td><?php echo $value['book_name'];?></td>
        <td><?php echo $value['ISBN'];?></td>
        <td><?php echo $value['publisher_name'];?></td>
        <td><?php echo $value['firstname']." ".$value['lastname'];?></td>
        <td><?php echo $value['category'];?></td>
        <td><?php echo $value['booktag'];?></td>
        <td><?php echo $value['published_year'];?></td>
        <td><?php echo $value['about_book'];?></td>
        <td><?php echo $value['quantity'];?></td>
        <td><?php echo $value['Date_Added'];?></td>
        
        <td>
          <a href="editbook.php?id=<?php echo $id; ?>" class="btn btn-info">
            <i class = 'far fa-edit'></i>Edit
          </a>
        </td>

         <td>
          <a href="deletebook.php?id=<?php echo $id; ?>" class="btn btn-danger">
            <i class = 'fa fa-trash'></i>Delete
          </a>
        </td>
      </tr>
    <?php   
    }
    ?>
   
 </tbody>


</table>

      
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?php 
include_once("footer.php");
ob_end_flush();
?>