<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


if(isset($_POST["submit"])){
  $checkbox1=$_POST['Fuel'];  
  $host="localhost";//host name  
 $username="root"; //database username  
 $word="";
 $db_name="projects"; 
 $con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");
 $email=$_SESSION["email"];
 $truck=$_POST["truck"];
 $selected=$_POST["selected"];

 $chk="";  
 foreach($checkbox1 as $chk1)  
    {  
       $chk .= $chk1.",";  
    }  
 $in_ch=mysqli_query($con,"insert into truckdetail(email,fuel,truck_type,time) values ('$email','$chk','$truck','$selected')");  
 if($in_ch)  
    {  
      header("location: calculator.php"); 
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
<meta charset="utf-8"/>
<title>Truck Industry Council | Safer | Greener | Essential</title>
<meta content="The Truck Industry Council (TIC) is Australia&#x27;s peak industry body representing truck manufacturers, importers and major component suppliers. TIC has set itself the task of marketing its core message: SAFER | GREENER | ESSENTIAL" name="description"/>
<meta property="og:type" content="website"/>
<meta content="summary_large_image" name="twitter:card"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/css/truck-industry-council-website.0486d2b39.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript">
</script>
<script type="text/javascript">
WebFont.load({  google: {    families: ["Oswald:200,300,400,500,600,700","Varela:400"]  }});
</script>
<!--[if lt IE 9]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript">
</script>
<![endif]-->
<script type="text/javascript">
!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",
("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
</script>
<link href="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/5cf5b75c1931d96efce4d019_TIC-stacked-logo-favicon-Truck-industry-council.png" rel="shortcut icon" type="image/x-icon"/>
<link href="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/5cf5b7d05b65b6e903995223_TIC-stacked-logo-webclip-Truck-industry-council.png" rel="apple-touch-icon"/>
<!-- Memberstack -->
<script src="https://api.memberstack.io/static/memberstack.js" data-memberstack-id="a1931af7eca4ea2613821b9b6cc3cab2">
</script>
</head>
<body class="body" >
<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease-in" data-easing2="ease-out" data-doc-height="1" role="banner" class="navbar w-nav">
<div class="div-block">
<a href="/" aria-current="page" class="brand w-nav-brand w--current">
<img src="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/5cf5aef01931d9ae1de4a793_Truck-Industry-Council-Logo-REV_Bigger%20Font.svg" width="205" alt="" class="image"/>
</a>
<nav role="navigation" class="nav-menu w-nav-menu">
<a href="index.php" aria-current="page" class="nav-link w-nav-link w--current">
HOME</a>
<div data-delay="0" class="dropdown w-dropdown">
<div class="dropdown-toggle-2 w-dropdown-toggle">
<div class="text-block-2">
ABOUT
<br/>
TIC
</div>
<div class="icon-13 w-icon-dropdown-toggle">
</div>
</div>
<nav class="dropdown-list w-dropdown-list">
<a href="/about-tic" class="dropdown-link w-dropdown-link">ABOUT TIC
</a>
<a href="/tic-council-members" class="dropdown-link-2 w-dropdown-link">
TIC COUNCIL MEMBERS
</a>
<a href="/member-companies" class="dropdown-link-3 w-dropdown-link">
MEMBER COMPANIES
</a>
<a href="/achievements" class="dropdown-link-4 w-dropdown-link">
ACHIEVEMENTS
</a>
<a href="/links" class="dropdown-link-5 w-dropdown-link">
LINKS
</a>
</nav>
</div>
<a href="/todays-trucks" class="nav-link-3 w-nav-link">
TODAY&#x27;S TRUCKS</a>
<a href="/service-and-repairs-truck-industry-council-safer-greener-essential" class="nav-link-3-copy _9 w-nav-link">
SERVICE &amp; REPAIR
</a>
<a href="/downloads" class="nav-link-5 w-nav-link">
DOWNLOADS
</a>
<a href="/gallery" class="nav-link-5 w-nav-link">
GALLERY
</a>
<a href="/news-articles" class="nav-link-6 w-nav-link">
NEWS &amp; ARTICLES
</a>
<a href="/contact-us" class="nav-link-7 w-nav-link">
CONTACT US
</a>
<a href="http://localhost/newproject/login.php" class="nav-link-7 w-nav-link">
MEMBERS AREA
</a>
<a href="http://localhost/newproject/register.php" class="nav-link-7 w-nav-link">
Register AREA
</a>
<a href="http://localhost/newproject/calculator.php" class="nav-link-8 w-nav-link">
CALCULATOR
</a>
</nav>
<div class="menu-button w-nav-button">
<div class="icon w-icon-nav-menu">
</div>
</div>
</div>
</div>


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






    <div class="truck-details">
        <img class="logo" src="./images/logo.png" alt="logo of TIC">
        <h1  class="head">Enter Truck Details</h1>
        <!---------------------Select Fuel Type----------------->
    <div class="ps-5">
    <form method="post">

        <label for="formGroupExampleInput" class="form-label fw-bold ps-5 fs-5">Select Fuel Type</label></div>
      <div class="row details mb-4" >         
       <div class="col-sm-auto ms-5" >
              <div class="form-check">
                <input class="form-check-input" name="Fuel[]" value="diesel" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Diesel
                </label>
              </div></div>

              <div class="col-sm-auto ms-3">
              <div class="form-check">
                <input class="form-check-input" name="Fuel[]" value="gasoline" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                  Gasoline
                </label>
              </div></div>


        <div class="col-sm-auto ms-3">
              <div class="form-check">
                <input class="form-check-input" name="Fuel[]" value="Natural Gas" type="checkbox" id="gridCheck1">
                <label class="form-check-label" for="gridCheck1">
                 Natural Gas
                </label>
              </div></div>

              <div class="col-sm-auto ms-3">
                <div class="form-check">
                  <input class="form-check-input" name="Fuel[]" value="electronics" type="checkbox" id="gridCheck1">
                  <label class="form-check-label" for="gridCheck1">
                Electronic
                  </label>
                </div></div>
            </div>
    
        
                        
   <!------------------Truck Structure Type----------------->
      <div class=" ps-5">
        <label for="formGroupExampleInput2" class="form-label fw-bold ps-5 fs-5">Truck Structure Type</label>
        <div class="col-sm-auto d-flex ms-5">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="truck" id="gridRadios1" value="light" checked>
              <label class="form-check-label" for="gridRadios1">
               Light
              </label>
            </div>

            <div class="form-check ms-5">
                <input class="form-check-input" type="radio" name="truck" id="gridRadios2" value="medium">
                <label class="form-check-label" for="gridRadios2">
                  Medium
                </label>
              </div>

              <div class="form-check ms-5">
                <input class="form-check-input" type="radio" name="truck" id="gridRadios2" value="heavy">
                <label class="form-check-label" for="gridRadios2">
                  Heavy
                </label>
              </div>
      </div></div>

    <!-----------------Manufracture Time------------------------->
      <div class="mt-4 ms-5">
        <label for="formGroupExampleInput2" class="form-label fw-bold ps-5 fs-5">Manufracture Time</label>
        <div class="col-sm-6 ms-5">
            <label class="visually-hidden" for="autoSizingSelect">Preference</label>
            <select class="form-select" id="autoSizingSelect" name="selected">
            <option selected></option>
    <option value="Brand new">Brand new</option>
    <option value="2010-2020">2010-2020</option>
    <option value="3">Early 20's-2010</option>
    <option value="4">Early 20's</option>
            </select>
          </div>
     
      <button type="submit" name="submit" class="btn my-4 fcbtn">Finish & Continue</button>
</form>
    </div> </div>

</script>


</body>
</html>