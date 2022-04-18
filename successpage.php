  <!-- /.container -->
<?php
ob_start();
include_once("libheader.php");

 ?>


      
        
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

<div class="container mt-5">
	<div class="row mt-5">
		<div class="col-md-6 offset-md-3 mt-5">
       <?php 
            include_once('mimi/lib.php');
             $username=new Libarian;
             $lrow=$username->getLibarian($_SESSION['libid']);
             
 
					echo "<h3 class='text-center mt-5 animate__animated animate__flash'> Welcome ". $lrow['lib_firstname']." ".$lrow['lib_lastname'] ."!</h3>

           				 <p class='pbutton mt-5'>
           				 <a href='lib_dashboard.php' class='btn btn-info animate__animated animate__flash'>Click to Proceed</a>
          				  </p>";
			 ?>
		</div>
	</div>
</div>

 <?php 
include_once("footer.php");
 ?>