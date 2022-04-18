<?php
include_once("libheader.php");
?>



 <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle navbar-brand text-info" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libarian
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item books" href="addbook.php">Add Books</a></li>
            <li><a class="dropdown-item books" href="borrowedbooks.php">Issue Borrow</a></li>
            <li><a class="dropdown-item books" href="addauthor.php">Add Author</a></li>
            <li><a class="dropdown-item books" href="publisher.php">Add Publisher</a></li>
            <li><a class="dropdown-item books" href="booktag.php">Add Book Tag</a></li>
            <li><a class="dropdown-item books" href="listbooktag.php">list Book Tag</a></li>
            <li><a class="dropdown-item books" href="allbookorder.php">Book Orders</a></li>
            
            
            
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


<div class="container">
  <div class="row">
    <!--begining of books-->
    <div class="col-md-5 offset-md-1 mt-md-5" id="dsbooks">
    	<h3 class="pbutton mt-3">Total Number Of Books</h3>
    	<h6 class="pbutton">3423 Books in the library</h6>
    	<table class="table table-striped table-hover text-center">
    		<thead>
    			<tr >
    				<th colspan="2" class="table-light">Kids/Teens</th>
    				<th colspan="2" class="table-danger">Adults</th>
    				<th colspan="2" class="table-dark">Research</th>
    			</tr>
    		</thead>

    		<tbody>
    			<tr >
    				<td class="table-light">Animations</td>
    				<td class="table-light">200</td>

    				<td class="table-danger">Business</td>
    				<td class="table-danger">300</td>

    				<td class="table-dark">Sciences</td>
    				<td class="table-dark">250</td>
    		
    			</tr>


    			<tr>
    				<td class="table-light">Academics</td>
    				<td class="table-light">350</td>

    				<td class="table-danger">Health</td>
    				<td class="table-danger">180</td>

    				<td class="table-dark">Arts</td>
    				<td class="table-dark">238</td>
    			</tr>

    			<tr>
    				<td class="table-light">Fictions</td>
    				<td class="table-light">260</td>

    				<td class="table-danger">Inspirationals</td>
    				<td class="table-danger">150</td>

    				<td class="table-dark">Social Science</td>
    				<td class="table-dark">245</td>
    			</tr>


    			<tr>
    				<td class="table-light">Others</td>
    				<td class="table-light">350</td>

    				<td class="table-danger">Others</td>
    				<td class="table-danger">400</td>

    				<td class="table-dark">Others</td>
    				<td class="table-dark">500</td>
    			</tr>

    			
    		</tbody>


    	</table>
<p class="pbutton">
		<a href="" class="btn btn-outline-light">Details</a>
	</p>



    </div>

    <!--end of books-->

     <!--begining of borrowed books-->  
   <div class="col-md-5 ms-md-5 mt-md-5" id="dsbooks">
   	
<h3 class="pbutton mt-3">Borrowed Books</h3>
    	<h6 class="pbutton">3423 borrowed Books</h6>
    	<table class="table table-striped table-hover text-center">
    		<thead>
    			<tr >
    				<th colspan="2" class="table-light">Kids/Teens</th>
    				<th colspan="2" class="table-danger">Adults</th>
    				<th colspan="2" class="table-dark">Research</th>
    			</tr>
    		</thead>

    		<tbody>
    			<tr >
    				<td class="table-light">Animations</td>
    				<td class="table-light">200</td>

    				<td class="table-danger">Business</td>
    				<td class="table-danger">300</td>

    				<td class="table-dark">Sciences</td>
    				<td class="table-dark">250</td>
    		
    			</tr>


    			<tr>
    				<td class="table-light">Academics</td>
    				<td class="table-light">350</td>

    				<td class="table-danger">Health</td>
    				<td class="table-danger">180</td>

    				<td class="table-dark">Arts</td>
    				<td class="table-dark">238</td>
    			</tr>

    			<tr>
    				<td class="table-light">Fictions</td>
    				<td class="table-light">260</td>

    				<td class="table-danger">Inspirationals</td>
    				<td class="table-danger">150</td>

    				<td class="table-dark">Social Science</td>
    				<td class="table-dark">245</td>
    			</tr>


    			<tr>
    				<td class="table-light">Others</td>
    				<td class="table-light">350</td>

    				<td class="table-danger">Others</td>
    				<td class="table-danger">400</td>

    				<td class="table-dark">Others</td>
    				<td class="table-dark">500</td>
    			</tr>

    			
    		</tbody>
		</table>

	<p class="pbutton">
		<a href="" class="btn btn-outline-light">Details</a>
	</p>





   </div>

<!--end of borrowed books-->


<!--begining of publishers-->
    <div class="col-md-5 offset-md-1 mt-md-5" id="dsbooks">

<!-- 
  <p class="pbutton mt-3" >
    <a href="publisher.php" class="btn btn-outline-light">Add Publisher</a>
  </p> -->
    	
    	<h3 class="pbutton mt-3">Publishers</h3>
    	<h6 class="pbutton">105 publishers</h6>
    	<table class="table table-striped table-hover text-center">
    		<thead>
    			<tr >
    				<th colspan="3" class="table-light pbutton">Publishers</th>
    				
    			</tr>
    		</thead>

    		<tbody>
    			<tr >
    				<td class="table-dark">Kids/Teens</td>
    				<td class="table-dark">Adults</td>

    				<td class="table-dark">Research</td>
    				
    		
    			</tr>


    			<tr>
    				
    				<td class="table-light">25</td>

    				<td class="table-light">30</td>
    				<td class="table-light">50</td>

    				
    			</tr>

    			    			
    		</tbody>
		</table>


  <p class="pbutton">
    <a href="listpublisher.php" class="btn btn-outline-light">Details</a>
  </p>



    </div>
<!--end of publisher-->


   <!--beginning of author-->
    <div class="col-md-5 ms-md-5 mt-md-5" id="dsbooks">
    	
    	<h3 class="pbutton mt-3">Author</h3>
    	<h6 class="pbutton">400 Authors</h6>
    	<table class="table table-striped table-hover text-center">
    		<thead>
    			<tr >
    				<th colspan="3" class="table-light pbutton">Authors</th>
    				
    			</tr>
    		</thead>

    		<tbody>
    			<tr >
    				<td class="table-dark">Kids/Teens</td>
    				<td class="table-dark">Adults</td>

    				<td class="table-dark">Research</td>
    				
    		
    			</tr>


    			<tr>
    				
    				<td class="table-light">120</td>

    				<td class="table-light">100</td>
    				<td class="table-light">180</td>

    				
    			</tr>

    			    			
    		</tbody>
		</table>

	<p class="pbutton">
		<a href="listauthor.php" class="btn btn-outline-light">Details</a>
	</p>
    </div>
   
   <!-- end of author-->
  </div>
</div>






<?php
include_once("footer.php");
?>