
  
<!--footer-->


  <!--beginning of footer-->
<div class="row  mt-4 "  style=" position: relative;
  top: 200px">
  <div class="col-md-12  mt-5 car pbutton">
    <h1 class=" bgcolor">Ask a Libarian</h1>
     
      
        <p class="footer">
          <a href="callto: +234 8138414787">Call Us</a>
       </p>

        <p class="footer">
          <a href="callto:+234 8061619880">Chat Us</a>
        </p>
  
        <p class="footer">
              <a href="mailto:bookcafe@gmail.com">Email us</a>
         </p>
      
    
          
     
            
      <a href=""><img src="images/sc_icons/twitter.png" alt="twitter icon" class="fluid mb-3" height="25px" /></a>
      <a href=""><img src="images/sc_icons/instagram.png" alt="instagram icon" class="fluid ms-3 mb-3" height="25px"/></a>
      <a href=""><img src="images/sc_icons/linkedin.png" alt="linkedin icon" class="fluid ms-3 mb-3" height="25px"/></a>
      <a href=""><img src="images/sc_icons/facebook.png" alt="facebook icon" class="imgicon ms-3 mb-3"class="fluid" height="25px"/></a>
            
  </div>
<!-- </div>
 -->
  <!--developed by-->
  <footer id='divfooter' class="bgcolor">
      <div> Copyright &copy; 2022 Onojason Miracle. All rights reserved </div>
  </footer>
</div>
<!--end of footer-->






      
     </div>
  </div>
</div>

</div>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
  <script src="others/jquery/jquery.txt"></script>
  
    <script type="text/javascript" language="javascript">
    
    </script>
 
      


<!-- Modal -->

 <?php          

if ($_SERVER['REQUEST_METHOD']=='POST') {
  
   // to validate
  $errors = array();

  if (empty($_POST['email'])) {
      $errors['email'] = "Email address field cannot be empty";
    }


    if (empty($_POST['password'])) {
      $errors['password'] = "Password field cannot be empty";
    } 

    if (empty($errors)) {
      // code...
   
  //include your user.php
  include_once("mimi/lib.php");


  //create user object
  $obj = new Libarian;


  // to access login method
  $message = $obj->login($_POST['email'], $_POST['password']);
  if ($message==true) {
    //redirect to success page
    

   header("Location: successpage.php");
   exit;
  }

  else{
    echo "Invalid email address or password";
  }
 
}



else{
  
  echo "oops something happened";
  // foreach ($errors as $key => $value) {
  //   echo $value;
  // 
}

 
 }


?>




  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p>
        <form action="" method="post" >
            <h2>Libarian Login </h2>

          <p class="form-group">
            <label class="form-label">Email:</label>
            <input type="email" name="email"  class="form-control" id="modal">
          </p>

          <p class="form-group">
            <label class="form-label">Password:</label>
            <input type="password" name="password"  class="form-control" id="modal"><br>
            
          </p>


            <p class="pbutton">
            <input type="submit" name="submit" value="Login" class="btn btn-info">
          </p>
          

        </form>
      </p>
       

    </div>
  </div>
</div>
</div>

</body>
</html>

<?php 
  ob_end_flush();
 ?>