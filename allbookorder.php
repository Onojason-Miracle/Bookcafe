 <?php 
ob_start();

   
include_once("libheader.php");
?>


         <li class="nav-item">
          <a class="nav-link active navbar-brand" href="lib_dashboard.php">Dashboard</a>
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
 <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col  mt-3"> 


    
 

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="col-md-6 offset-md-3 pbutton mb-3 mt-3">Book Order Details Details</h1>

     
     
     
     
	   <table class="table table-striped table-hover text-center table-responsive">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>User Name</th>
      <th>Book Name</th>
      <th>Date Booked</th>
      <th>Issue Borrow</th> 
     <th>Edit</th>
      <th>Delete</th>
      
     
    </tr>
  </thead>
 <tbody class="table-success">
   <?php 
    include_once('mimi/lib.php');
     $obj=new Libarian;

     include_once('mimi/lib_user.php');
    $hello = new User;

   
   
   
 // reference getbooks
    $bk = $obj->getBookOrder();
    $counter = 1;
    foreach($bk as $key => $value){
      $id = $value['order_id'];
      $username = $value['firstname']." ".$value['lastname'];
      $bookname = $value['book_name'];
      $datebooked = $value['date_booked'];




              
          // $date=date_create($da);
          // date_add($date,date_interval_create_from_date_string("14 days"));
          // echo date_format($date,"Y-m-d");
          // $value['date_to_return'] = date_format($date,"Y-m-d");    
      
      ?>
      <tr>

        <th><?php echo $counter++; ?></th>
       
        <td><?php echo $username;?></td>
        <td><?php echo $bookname;?></td>
         <td><?php echo $datebooked;?></td>
        
         
        
        <td>
          <a href="issueborrow.php?id=<?php echo $id; ?>" class="btn btn-success">
            <i class = 'fa fa-edit'></i>Issue Borrow
          </a>
      </td>
        
        
        
        <td>
          <a href="editborrow.php?id=<?php echo $id; ?>" class="btn btn-info">
            <i class = 'fa fa-edit'></i>Edit
          </a>
      </td>

      <td>
          <a href="deleteborrow.php?id=<?php echo $id; ?>" class="btn btn-danger">
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
</div>
  <!-- /.container -->
<?php 
include_once("footer.php");
ob_end_flush();
?>