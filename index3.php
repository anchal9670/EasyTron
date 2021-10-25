<?php include("nav.php"); 
session_start();
if(isset($_SESSION['email'])){
echo "<script>window.location.href = 'dash.php'</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Easy Tron</title>
	<meta name="viewport"
		content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Sansita:ital@1&display=swap" rel="stylesheet">	
<style>
/* For mobile phones: */
[class*="col-"] {
    width: 100%;
    }
.aside {
color: black;
}
img {
    width: 100%;
       
    }
	* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.5s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 5s;
  animation-name: fade;
  animation-duration: 5s;
}

@-webkit-keyframes fade {
  from {opacity: .8} 
  to {opacity: 2}
}

@keyframes fade {
  from {opacity: .8} 
  to {opacity: 2}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
@media only screen and (min-width: 768px) {
	img {
		width: 100%;
		height:25em;
	}
}


.footer {
	background-color: #39464a;
	color: #ffffff;
	text-align: center;
	font-size: 12px;
	padding: 15px;
	}
</style>
</head>

<body class="bg-light">
	<div class="slideshow-container">

	<div class="mySlides fade">
	<div class="numbertext">1 / 4</div>
	<img src="img/h.jpg" >
	</div>

	<div class="mySlides fade">
	<div class="numbertext">2 / 4</div>
	<img src="img/w.jpg" >
	</div>

	<div class="mySlides fade">
	<div class="numbertext">3 / 4</div>
	<img src="img/trx.png" >
	</div>
	<div class="mySlides fade">
	<div class="numbertext">4/ 4</div>
	<img src="img/l.jpg" >
	</div>
	</div>
	<br>
<!-- Imp  -->
	<div style="text-align:center">
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 
	<span class="dot"></span> 

	</div>
<!--Easy -->
	<div class="container bg-white">
	<div class="row p-2">
        <div class="col-lg-6 col-md-12 col-sm-12 ">
       
			<img src="img/images.jpg" alt="Easy Tron Logo" class="brand-image float elevation-3" >
			<h3 class="text-danger">Easy Tron</h3>
        <p class="text-success">Hello Leader!.</p>
		<marquee behavior="" direction="right">Welcome To the world Of Cryptocurrency.</marquee>
		</div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="aside">
                <h4 class="text-light">Tron ?</h4>
                <p>Tron is a blockchain-based decentralized platform that aims to build a free, global digital content entertainment system with distributed storage technology, and allows easy and cost-effective sharing of digital content. 
				Tron was founded in September 2017 by a Singapore based non-profit organization called the Tron Foundation.</p>
                <h4 class="text-light">Why Tron?</h4>
                <p>What makes TRON cryptocurrency a good buy? Backed by the blockchain technology, the TRON cryptocurrency has the functionality which enables it to host multiple decentralised applications. Also, its future potential of leading the Web 3.0 referred above as well as its affordable pricing makes it a good buy.
				 </p>
                
            </div>
        </div>
    </div>
	</div>
	<div class="footer">
    <p>copyright: &copy; 2021-2024 Easy Tron. All right are reserved.</p>
</div>
	<script>
		
		// Function to toggle the bar
		function geeksforgeeks() {
			var x = document.getElementById("menus");
			if (x.style.display === "block") {
				x.style.display = "none";
			} else {
				x.style.display = "block";
			}
		}
	</script>

	<script>
		
		// Function to toggle the plus menu into minus
		function myFunction(x) {
			x.classList.toggle("fa-minus-circle");
		}
	</script>
	<script>
	var slideIndex = 0;
	showSlides();

	function showSlides() {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}
	slideIndex++;
	if (slideIndex > slides.length) {slideIndex = 1}    
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " active";
	setTimeout(showSlides, 2000); // Change image every 2 seconds
	}
	</script>
</body>

</html>
