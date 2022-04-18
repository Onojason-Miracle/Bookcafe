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
    <h1 class="col-md-6 offset-md-3 pbutton mb-3 mt-3">Borrowed Books Details</h1>

     
     
     
     
	   <table class="table table-striped table-hover text-center table-responsive">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Borrowers Name</th>
      <th>Book Name</th>
     <th>Order Id</th>
      <th>Status</th>
  	  <th>Libarian Id</th>
      <th>Date Borrowed</th>
      <th>Date to Return</th>
      
      <th>Edit</th>
      <th>Delete</th>
      
     
    </tr>
  </thead>
 <tbody class="table-success">
   <?php 
    include_once('mimi/lib.php');
     $obj=new Libarian;
    

    // reference getbooks
    $bk = $obj->getBorrow();
    $counter = 1;
    // var_dump($bk);
    // exit;
   
   


    foreach($bk as $key => $value){
      $id = $value['bb_id'];
     
      $bookid = $value['book_id'];
       //var_dump($bookid);
      $da = $value['date_borrowed'];
      $dr = $value['date_to_return'];
       $orderid = $value['order_id'];
      $libname = $value['lib_firstname']." ".$value['lib_lastname'];
      $username = $value['firstname']." ".$value['lastname'];
      $bookname = $value['book_name'];
      $datebooked = $value['date_booked'];
    // var_dump($id);
    // exit;

               
          $date=date_create($da);
          date_add($date,date_interval_create_from_date_string("14 days"));
          //echo date_format($date,"Y-m-d");
          $value['date_to_return'] = date_format($date,"Y-m-d");
          $dr = date_format($date,"Y-m-d");

           $output = $obj->updateReturn($dr,$id);//updateAvail($bookavail, $_SESSION['book_id']);
           //var_dump($output);
   
?>
      
      
      
      <tr>

        <th><?php echo $counter++; ?></th>
       
        <td><?php echo $username;?></td>
        <td><?php echo $bookname;?></td>
       <td><?php echo $value['order_id'] ;?></td> 
        <td><?php echo $value['status'];?></td>
         <td><?php echo $libname;?></td>
          <td><?php echo $value['date_borrowed'];?></td>
         <td><?php echo $dr?></td>
        
         
        
        
        
        
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