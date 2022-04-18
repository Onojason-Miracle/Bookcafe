<?php 
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
<div class="container">
    <div class="row">
        <div class="col mt-md-3">
            <h1 class="text-center mb-md-3">Publishers List</h1>
             <table class="table table-striped table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">PublisherName</th>
     <th scope="col">Date Added</th>
       <th scope="col">Edit</th>
       <th scope="col">Delete</th>
    
    </tr>
  </thead>
 <tbody class="table-info">

     <?php 
    include_once("mimi/lib.php");

    // create instance of libarian class
    $obj = new Libarian;

    // reference getpublisher
    $publisher = $obj->getPublisher();
    $counter = 1;

    foreach($publisher as $key => $value){
      $id = $value['publisher_id'];
      ?>
      <tr>

        <th scope = "col"><?php echo $counter++; ?></th>
        
        <td><?php echo $value['publisher_name'];?></td>
         <td><?php echo $value['Date_Added'];?></td>
        
        
        <td>
          <a href="editpublisher.php?id=<?php echo $id; ?>" class="btn btn-info">
            <i class = 'fa fa-edit'></i>Edit
          </a>
      </td>

      <td>
          <a href="deletepublisher.php?id=<?php echo $id; ?>" class="btn btn-danger">
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