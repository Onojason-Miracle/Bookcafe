<?php 
include_once("bbookheader.php");
?>



  <div class="container-fluid">

    <div class="row" >

          <?php 
            include_once('mimi/lib_user.php');
             $username=new User;
             $row=$username->getUser($_SESSION['userid']);
             $userid = $row['user_id'];
      
             $username =$row['firstname']." ".$row['lastname'];
             echo("<h3 class='pbutton trans mt-5'>".ucwords($username) ."</h3>");
        
   


    include_once("mimi/lib.php");

    
    $obj = new Libarian;








   $items = $obj->getBook();
    
    if (!empty($items)) {
      foreach ($items as $key => $value) {
      $_SESSION['book_images']= $value['book_images'];
      $_SESSION['book_name'] = $value['book_name'];
     $_SESSION['about_book'] = $value['about_book'];
      $_SESSION['book_id']= $value['book_id'];
      $_SESSION['lastname']= $value['firstname']." ".$value['lastname'];




$u = $obj->getBookOrder();
//var_dump($u);
if (!empty($u)) {
  foreach ($u as $key => $m) {
    // code...
    $_SESSION['order_id']= $m['order_id'];
    $hey = $m['book_id'];

}



$b = $obj->getBorrow();
 //var_dump($b);
if (!empty($b)) {
  foreach ($b as $key => $t) {
    // code...
    $_SESSION['bb_id']= $t['bb_id'];
    //$status = $t['status'];
    
   // $hey = $m['book_id'];
    //echo $hey;
  }
}
    

$m = $obj->getBborrow($_SESSION['bb_id']);
 //var_dump($m);
if (!empty($m)) {
  foreach ($m as $key => $y) {
    // code...
    $_SESSION['bb_id']= $y['bb_id'];
    $status = $y['status'];

    
   // $hey = $m['book_id'];
    //echo $hey;
  }
}
  

 $status = "not_returned";
 $order = $obj->findBookOrder($_SESSION['order_id']);
 //var_dump($order);
            
$books = $obj->findBook($_SESSION['book_id']);
$bookordered = $obj->getBbookCount( $_SESSION['book_id']);
//var_dump($bookordered);
$quantity = $obj->getQuantity($_SESSION['book_id']);
//var_dump($quantity);
 $borrow = $obj->findBorrow($_SESSION['book_id']);
 //var_dump($borrow);
  if(isset($borrow['status'])){$status = $borrow['status'];} ;
  //var_dump($status);
 $bookavail = intval(($quantity)) - intval(($bookordered));
 //var_dump($bookavail);
   $output = $obj->updateAvail($bookavail, $_SESSION['book_id']);
   // var_dump($output);
   if ($status == 'returned' || $status=='cancelled' || $status == 'not_picked_up') {
     $bookavail = $bookavail + 1;
     //var_dump($bookavail);
   }else{
       $bookavail = intval(($quantity)) - intval(($bookordered));
   }



      ?>



       <div class="col-md-3 mt-5  " ><br>
        <div class="card cardimg" style="width: 16rem; ">
  <img src="bookimage/<?php echo $value['book_images']?>" class="card-img-top" alt="images"  height="250px"><br>
  <div class="card-body text-center" style="background-color: black; color:white">
    <h5 class="card-title"><?php echo $value['book_name']; ?></h5><br>
     <!--  <h5 class="card-title">Borowed:<?php  //echo $available;?></h5><br>
      <h5 class="card-title">Quantity:<?php  //echo $quantity;?></h5><br>
         <h5 class="card-title">available:<?php  //echo $bookavail;?></h5><br> -->
    <p class="card-text alert alert-info"><?php echo $value['firstname']." ".$value['lastname']; ?></p>
     <form action="bookorder.php" method="post">
     
          <input type="hidden" name="book_id"  value="<?php echo  $value['book_id']; ?>">
          

          
          <input type="hidden" name="userid"  value="<?php echo $userid; ?>">
     
        <?php 
          if ($bookavail <= 0) {
           echo  "<p class='card-text alert alert-info'>This Book is Not Available for Borrow</p>";
          }else{

        ?>
         
         
         
          
          
      <input type="submit" class="btn btn-info addcard" 
      value="Borrow Book" id="borrowbtn" data-productid ="<?echo $bookid?>">

    <?php } ?>
         
        </form> 
   
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
    <!-- /.row -->



</body>
</html>


  </div>
<?php 
include_once("bbookfooter.php");
?>



