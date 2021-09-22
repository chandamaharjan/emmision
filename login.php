<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: details.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>



<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8"/>
<title>Truck Industry Council | Safer | Greener | Essential</title>
    <link rel="stylesheet"  href="logincss.css">
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
<div class="home-page-slider-new">
<div data-delay="3000" data-animation="cross" data-autoplay="1" data-easing="ease-in" data-duration="500" data-infinite="1" class="home-slider w-slider">
<div class="mask w-slider-mask">
<div class="slide-3 w-slide">
<div class="welcome-to-tic-div-block">
<h1 class="heading">

</h1>
<h2 class="heading-2">
	<br>
	<br>
EMMISSION CALULATOR
<br/>

</h2>



</head>
<body>
      <link rel="stylesheet"  href="Css/logincss.css">
	<div class="container" >
		<div class="card">
		
			
			
					<h2>Login</h2>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<input type="text" class="input-box" placeholder="enter email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
				<input type="password" class="input-box" name="password"  placeholder="enter password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
             
						<button type="submit" class="submit-btn">Submit</button>
					

					</form>
					<button type="button" class="btn" onclick="openLogin()">Log In</button>
		
			</div>
		</div>
	</div>
	</div>
				</div>
			</div>
		</div>
	</div>

	</div>



<div class="footer home">
	<div class="footer-container">
		<div class="right-footer-container">
			<h1 class="heading-13">Menu</h1>
			<a href="all part" aria-current="page" class="link-2 w--current">Home</a>
			<a href="/about-tic" class="link-2">About Us</a>
			<a href="/todays-trucks" class="link-2">Today&#x27;s Trucks</a>
			<a href="/downloads" class="link-2">Downloads</a><a href="/gallery" class="link-2">Gallery</a>
			<a href="/news-articles" class="link-2">News &amp; Articles</a><a href="/contact-us" class="link-2">Contact Us</a>
		</div><div class="left-footer-container">
			<a id="Footer-Link" href="/" aria-current="page" class="footer-link w-inline-block w--current">
				<img src="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/5cbff5ea2c7ff4884c34396d_Truck-Industry-Council-Logo-White.svg" width="220" alt="" class="tic-logo-white"/></a>
<div class="div-block-15">
	<a href="/privacy" class="link-3">Privacy</a>
	<a href="/disclaimer" class="link-3">Disclaimer</a>
	<a href="/copyright" class="link-3">Copyright</a>
</div>
<div class="text-block">© Copyright 2018 Truck Industry Council. All Rights Reserved.</div>
</div>
</div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5cbe46bce3c2320cf45d2b62" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://assets.website-files.com/5cbe46bce3c2320cf45d2b62/js/truck-industry-council-website.82a80b6e1.js" type="text/javascript">
</script><!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>

</html>