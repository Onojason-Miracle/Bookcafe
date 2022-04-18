
<?php 
   include_once('hheader.php');
?>

  
    <div class="row trans px-0" >
      <div class="col-md">


<video id="background-video" autoplay loop muted poster="images/brown.jpg">
  <source src="images/inside.mp4" type="video/mp4">
</video>

<div>

      <?php 
   include_once('homeheader.php');
   ?>
</div>
<div class=" col-md-12 writeup">

  <h1 class="card-title animate__animated animate__fadein text-info pbutton" style="font-size: 4rem">Welcome To Bookcafe</h1>
    <p class="card-text text-info pbutton animate__animated animate__bounce " style="font-size: 2rem">The Home Of Leaders</p>
    <p class="card-text text-info pbutton animate__animated animate__bounce " >  <a href="login.php" class="btn btn-light" id="searchbtn" style="padding: 10px;">Lets Get Started</a>
     </p>
  </div>
    
      

  
  </div>
      </div>
   







<!-- </div>
</div>
 -->
  
<div class="row " style="background-color:white; color:black; display:flex; justify-content:space-around">
  
  <div class="col-md-4 mt-5 " >
   
  <div class="col-md-2">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.9512926218995!2d7.508898414734864!3d9.068202093493696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0bccd4d3458d%3A0x73f696e798b1e997!2sNational%20Assembly!5e0!3m2!1sen!2sng!4v1648775915965!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>


  </div>



    <div class="col-md-4 mt-4 " >
  <p class="card-text">
     <h1 class="pbutton mb-3">Library Hours</h1>
      <table class="table table-striped table-hover text-center">
        <thead class="table-dark">
          <tr>
            <th>Days</th>
            <th>Time</th>
          </tr>
        </thead>

        <tbody class="table-light">
          <tr>
            <td>Mondays</td>
            <td>9am to 6pm</td> 
          </tr>

          <tr>
            <td>Tuesdays</td>
            <td>9am to 6pm</td>
          </tr>

         <tr>
            <td>Wednesdays</td>
            <td>9am to 6pm</td>
          </tr>

          <tr>
            <td>Thursdays</td>
            <td>9am to 6pm</td>
          </tr>

           <tr>
            <td>Fridays</td>
            <td>9am to 6pm</td>
          </tr>

           <tr>
            <td>Saturdays</td>
            <td>10am to 4pm</td>
          </tr>

           <tr>
            <td>Sundays</td>
            <td>1pm to 3pm</td>
          </tr>

        </tbody>
      </table>
    </p>

  </div>
</div>

   


  <div class="row" style="background-color:white; color:black; display:flex; justify-content:space-around">
    
<div class="col-md-6 mt-5 mb-md-4">
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/pple.jpg" class="d-block w-100" alt="images">
    </div>

    <div class="carousel-item">
      <img src="images/plibrary.jpg" class="d-block w-100" alt="images">
    </div>

    <div class="carousel-item">
      <img src="images/libdesign.jpg" class="d-block w-100" alt="images">
    </div>

    <div class="carousel-item">
      <img src="images/kidspix.jpg" class="d-block w-100" alt="images">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
   
  </div>

  <div class="col-md-4">
      <h1 class="mt-md-5 pbutton">Our Story</h1>
      <p>The fact that libraries are open is of huge importance to the history of libraries, as it has forged a great role for libraries to help the general public access vital information—from medicine and science to public affairs and literary arts. Moreover, these libraries serve a critical function of connecting to other libraries. The fact that libraries are open is of huge importance to the history of libraries, as it has forged a great role for libraries to help the general public access vital information—from medicine and science to public affairs and literary arts. Moreover, these libraries serve a critical function of connecting to other libraries.</p>
    </div>
   

</div>


<!-- end of about library-->


<!--begining of children, adult and research (car) div-->
<div class="row justify-content-around mt-5  car" style=" position: relative;
  top: 200px">

<div class="col-md-3 mt-5 mb-md-5 section_div" >
  <h2 class="text-center">Kids/Teens Section</h2>
   <img src="images/finance/howtospeakmoney.jpg" class='fluid mt-3 ms-md-2' alt="financebook" width="150px">
    <img src="images/finance/financialfreedom.jpg" class='fluid mt-3 ms-md-4' alt="financebook" width="150px">
    <p class="pbutton mt-3"><a href="kids.php" class=" btn btn-info ">View More</a></p>

</div>

<div class="col-md-3 mt-5 mb-md-5 section_div" >
  <h2 class="text-center">Adults Section</h2>
   <img src="images/historicals/ka.jpg" class='fluid mt-3 ms-md-2' alt="historybook" width="150px">
    <img src="images/historicals/best.jpg" class='fluid mt-3 ms-md-4' alt="historybook" width="150px">
    <p class="pbutton mt-3"><a href="adults.php" class=" btn btn-info ">View More</a></p>

</div>

<div class="col-md-3 mt-5 mb-md-5 section_div" >
  <h2 class="text-center" style="color:black">Research</h2>
   <img src="images/historicals/africa.jpg" class='fluid mt-3 ms-md-2' alt="historybook" width="150px">
    <img src="images/finance/richestman.jpg" class='fluid mt-3 ms-md-4' alt="historybook" width="150px">
    <p class="pbutton mt-3"><a href="research.php" class=" btn btn-info ">View More</a></p>
</div>
</div>
</div>

<?php   
  include_once("homefooter.php");
?>