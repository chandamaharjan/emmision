<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



if(isset($_POST["submit"])){
  $host="localhost";//host name  
 $username="root"; //database username  
 $word="";
 $db_name="projects"; 
 $con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");
 $email=$_SESSION["email"];
 $area=$_POST["area"];
 $didwe=$_POST["didwe"];
 $rating=$_POST["rating"];
 
 $in_ch=mysqli_query($con,"insert into feedback(email,area,didwe,rating) values ('$email','$area','$didwe','$rating')");  
 if($in_ch)  
    {  
      header("location: index.php"); 
    }  
 else  
    {  
       echo'<script>alert("Failed To Insert")</script>';  
    }  
 
 }
?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Font Aswome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@400;700&family=Poppins:wght@400;600&family=Questrial&display=swap" rel="stylesheet">

    <title>Feedback Page</title>
</head>

<body>
<div class="feedback-page" >
    <img class="logo" src="./images/logo.png" alt="logo of TIC">
    <h1  class="heading">Feedback Page</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="mb-4 ps-5">
    <label for="formGroupExampleInput" class="form-label fw-bold ps-5 fs-5">Area for improvement:</label>
    <div class="col-sm-6">
        <input type="text" name="area" class="form-control form-control-sm fw-bold" id="colFormLabelSm" placeholder="Your answer here...">
      </div>
   
                 
  </div>
  <div class="mb-3 ps-5">
    <label for="formGroupExampleInput2" class="form-label fw-bold ps-5 fs-5">Did we miss what was really needed?</label>
    <div class="col-sm-6">
        <input type="text" name="didwe" class="form-control form-control-sm fw-bold" id="colFormLabelSm" placeholder="Your view here...">
      </div>
  </div>

  <div class="mb-3 ps-5">
    <label for="formGroupExampleInput2" class="form-label fw-bold ps-5 fs-5">Rate out of 10</label>
    <div class="col-sm-6">
        <input type="text" name="rating" class="form-control form-control-sm fw-bold" id="colFormLabelSm" placeholder="Accepted 0-10">
      </div>
  </div>
  <button type="submit" name="submit" class="btn my-4 px-2 submitbtn ">Submit</button>
</form>
  <h2 class="thank-you ms-5 ps-4">Thank you for using our Calculator !</2>
</div>
        </body></html>