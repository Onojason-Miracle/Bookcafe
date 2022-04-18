<?php 
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
<div class="container">
    <div class="row">
        <div class="col mt-md-3">
            <h1 class="text-center mb-md-3">Authors List</h1>
             <table class="table table-striped table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Firstname</th>
      <th>Lastname</th>
       <th>DateAdded</th>
      <th>Edit</th>
      <th>Delete</th>
     
    
    </tr>
  </thead>
 <tbody class="table-info">

     <?php 
    include_once("mimi/lib.php");

    // create instance of libarian class
    $obj = new Libarian;

    // reference getClubs
    $author = $obj->getAuthor();
    $counter = 1;

    foreach($author as $key => $value){
      $id = $value['author_id'];
      ?>
      <tr>

        <th><?php echo $counter++; ?></th>
        
        <td><?php echo $value['firstname'];?></td>
        <td><?php echo $value['lastname'];?></td>
         <td><?php echo $value['Date_Added'];?></td>
         
        
        
        
        
        <td>
          <a href="editauthor.php?id=<?php echo $id; ?>" class="btn btn-info">
            <i class = 'fa fa-edit'></i>Edit
          </a>
      </td>

      <td>
          <a href="deleteauthor.php?id=<?php echo $id; ?>" class="btn btn-danger">
            <i class = 'fa fa-trash'></i>Delete
          </a>
        </td>
      </tr>
    <?php   
    }
    ?>
   
 </tbody>


</table>

    <!-- end of divs for container,row and col-->
        </div>
    </div>
</div> 

<?php 
    include_once("footer.php");
 ?>