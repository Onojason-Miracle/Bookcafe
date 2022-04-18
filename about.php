
<?php 
include_once("header.php");
?>
     </div>
    <div class="row " style="display: flex; flex-direction:row;
    justify-content:space-around; background-color: #DEDEDE;">
        <!-- <div class="col mt-3">  -->

            <?php
    include_once("mimi/lib.php");
    // create object of class Libarian
    $obj = new Libarian;
     $author = $obj->findBook($_GET['id']);
      //$aut = $obj->findAuthor($_GET['id']);

    
   
 


      
     


?>
            <div class="col-md-2 offset-md-1 mt-5 mb-4">
                <img src="bookimage/<?php if(isset($author['book_images'])){echo $author['book_images'];}?> " class="card-img-top" alt="images" height="400px"><br>
            </div>

            <div class="col-md-4 offset-md-1 mt-5 card-body">
                    <h3 class="card-title text-danger mt-5">Book Details</h3>
        <h5 class="card-text">Book Name: </h5><p class="card-text ms-5"><?php if(isset($author['book_name'])){echo $author['book_name'];} ?></p>

       <!--  <h5 class="card-text">Name Of Author: </h5><p class="card-text ms-5"><?php //if(isset($aut['firstname'])){echo $aut['firstname']." ".$aut['lastname'];}?></p>
        
        <h5 class="card-text">Publisher: </h5><p class="card-text ms-5"><?php //if(isset($author['publisher_name'])){echo $author['publisher_name'];} ?></p> -->

          <h5 class="card-text">Published Year: </h5><p class="card-text ms-5"><?php if(isset($author['published_year'])){echo $author['published_year'];} ?></p>

          <h5 class="card-text">Book description: </h6><p class="card-text ms-5"><?php if(isset($author['about_book'])){echo $author['about_book'];} ?></p><br>
     <?php    


   ?>
</div>

</div>
      





<?php 
include_once("footer.php");

?>