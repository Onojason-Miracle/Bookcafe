
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
  $message = $obj->login(strip_tags(trim($_POST['email'])), strip_tags(trim($_POST['password'])));
  if ($message==true) {
    //redirect to dashboard.php
   header("Location: lib_dashboard.php");
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

