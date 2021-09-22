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
 $emission=$_POST["total"];

 
 $in_ch=mysqli_query($con,"insert into calculator(email,emission) values ('$email','$emission')");  
 if($in_ch)  
    {  
      header("location: feedback.php"); 
    }  
 else  
    {  
       echo'<script>alert("Failed To Insert")</script>';  
    }  
 
 }



?>






<!DOCTYPE html>
<html lang="en" >
  <script>
    function populatedata(form){
   form.formula.value='('+form.fuel_quantity.value.toString()+'*'+form.energy_content.value.toString()+'*'+form.load_amount.value.toString()+'*'+form.distance_travelled.value.toString()+'*'+form.emission_factor.value.toString()+')/1000';
    }
  
    let totals=0;
    function addData(form){
    form.total.value=(parseInt(form.fuel_quantity.value)*parseInt(form.energy_content.value)*parseInt(form.load_amount.value)*parseInt(form.distance_travelled.value)*parseInt(form.emission_factor.value))/1000 + parseInt(totals);
    totals=form.total.value;

    
    
    } 

    function clearForm(form){
      form.fuel_quantity.value=form.energy_content.value=form.load_amount.value=form.distance_travelled.value=form.emission_factor.value= form.formula.value="";    
    } 

    function setMail(form){
      // find the dropdown
      var ddl = document.getElementById("fuels");
      console.log(ddl);
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex];
    // find the attribute value
    var mailValue = selectedOption.getAttribute("data-mail");
    // find the textbox
    var textBox = document.getElementsByName("energy_content");

    // set the textbox value
    if(mailValue=="1"){
        form.energy_content.value = '34.2';
        form.emission_factor.value='67.4';
    }
    else if(mailValue=="2"){
      form.energy_content.value = '34';
        form.emission_factor.value='1.6';
    }else{
      form.energy_content.value = '34.2';
        form.emission_factor.value='1.7';
    } 

    }
 
         
    </script>

    
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
<body class="body">
  <a href="https://www.truck-industry-council.org/
" target="_blank">Visit Truck!</a>

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- Font awSome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Css -->
    <link rel="stylesheet" href="css/style1.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">

   
    <div class="Calculator-form">
     <div class="container">
          
        <h1 class="calculate">Calculate Emission</h1>
        <div class="mid-box row ">
         
          
          <div class="form"> 
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class=" form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Enter the Emission Type:</label>
                   <select style="margin: buttom 2px;" id="fuels" onChange="return setMail(this.form)" class="form-select" name="selected" aria-label="Default select example">
   <option selected></option>
  <option data-mail="1" value="Carbondioxide">Carbondioxide</option>
  <option data-mail="2" value="Methane">Methane</option>
  <option data-mail="3" value="Nitrous Oxide">Nitrous Oxide</option>
</select>
                 
                </div>

                <div class="form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label pb-0">Enter the quantity of fuel:(Q)</label>
                    <div class="col-sm-10">
                      <input type="text" name="fuel_quantity" class="form-control" placeholder="Eg: 123KL">
                      <p>Note:Unit must be in Kiloliter</p>
                    </div>
                </div>
                  
                <div class="form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Enter the energy content:(EC)</label>
                  <div class="col-sm-10">
                    <input type="text" name="energy_content" class="form-control" placeholder="Eg: 45.6 GJ/KL ">
                    <p>Note:Unit must be in gigajoules per kiloliter</p>
                  </div>
                </div>
             <div class="form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Enter the amount of load:(L)</label>
                  <div class="col-sm-10">
                    <input type="text" name="load_amount" class="form-control" placeholder="Eg: 112 kg ">
                    <p>Note:Unit must be in kilometer</p>
                  </div>
                </div>
                <div class="form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Distance Travelled:(DT)</label>
                  <div class="col-sm-10">
                    <input type="text" name="distance_travelled" class="form-control" placeholder="Eg:100 km">
                    <p>Note:Unit must be in kilometer</p>
                  </div>
                </div>

                <div class="form-group row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Enter the emission Factor:EF</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="emission_factor"  placeholder="Eg: 0.05 kg CO2-e/GJ">
                    <p>Note:Unit must be in gigajoules per kilograms C02-e per gigajoules</p>
                    <input type="button" value="confirm" class="btn-confirm" onclick="populatedata(this.form)"></button>  
                  </div>
                </div>
  
               


                <div class= "formula mx-8">
                <div class="form-group row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">In Formula:</label>
                    <div class="col-sm-10">
                      <input type="formula" class="form-control" name="formula" placeholder="ET(C02) = =123*45.6*0.05*100*112/1000">
                    </div>
                    <input type="button" value="calculate"  class="btn-calculate   my-4" onclick="addData(this.form)"></button>  
                  </div>

                     
                <div class="form-group row mb-3">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Total Emission of your truck is:</label>
                    <div class="col-sm-10">
                      <input type="text" name="total" class="form-control"  placeholder="ETg: 100 t CO2-eE">
                    </div>
               
                   <div Class="RE-Me d-flex ms-5">
                    <input type="button" value="re-enter" class="btn-enter" onclick="clearForm(this.form)"></button> 
                 <button type="submit" name="submit" class="btn my-4 px-2 submitbtn ">Submit</button>
                </div>
                    </div>
                  </div>

                </div>
            </form>  
    
       </div></div>
       </div>
       <div class="footer home"><div class="footer-container"><div class="right-footer-container">
  <h1 class="heading-13">Menu</h1>
  <a href="/" aria-current="page" class="link-2 w--current">Home</a><a href="/about-tic" class="link-2">About Us</a><a href="/todays-trucks" class="link-2">Today&#x27;s Trucks</a><a href="/downloads" class="link-2">Downloads</a><a href="/gallery" class="link-2">Gallery</a><a href="/news-articles" class="link-2">News &amp; Articles</a><a href="/contact-us" class="link-2">Contact Us</a>
<a href="calculator.php" class="link-2">Calculator</a></div><div class="left-footer-container"><a id="Footer-Link" href="/" aria-current="page" class="footer-link w-inline-block w--current"><img src="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/5cbff5ea2c7ff4884c34396d_Truck-Industry-Council-Logo-White.svg" width="220" alt="" class="tic-logo-white"/></a><div class="div-block-15"><a href="/privacy" class="link-3">Privacy</a><a href="/disclaimer" class="link-3">Disclaimer</a><a href="/copyright" class="link-3">Copyright</a></div><div class="text-block">© Copyright 2018 Truck Industry Council. All Rights Reserved.</div></div></div></div><script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5cbe46bce3c2320cf45d2b62" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/js/truck-industry-council-website.82a80b6e1.js" type="text/javascript">
</script>
</body>
</html>