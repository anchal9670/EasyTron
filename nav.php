<!DOCTYPE html>
<html>
<head>
	<meta name="viewport"content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
	<style>
		
		/* Navigation bar styling */
		.menu-list {
			color: black;
			
			font-family:'Playfair Display', serif;
			font-size: 100%;
			margin: 0;
			margin-bottom: 0;
		}
		
		/* logo, navigation menu styling */
		.geeks {
			overflow: hidden;
			background-color:white;
			position: relative;
			margin-bottom: 10px; 
			padding-top: 0px;
			margin-top: 0px;
		}
		
		/* stylinf navigation menu */
		.geeks #menus {
			display: none;
			text-decoration: none;
			padding-left: 10px;
		}
		/* link specifi styling */
		.geeks a {
			text-decoration: none;
			color: black;
			padding: 14px 16px;
			font-size: 22px;
			display: block;	
		}
		/* navigation toggle menu styling */
		.geeks a.icon {
			display: block;
			position: absolute;
			right: 0;
			top: 0;
		}
        .footer {
        background-color: #39464a;
        color: #ffffff;
        text-align: center;
        font-size: 12px;
        padding: 15px;
        }
		/* hover effect on navigation logo and menu */
		/* For mobile phones: */
		[class*="menu-list"] {
		width: 100%;
		}
		h1{
		margin-left: 5px;
  		padding-left: 5px;
		margin: auto;
		font-family: 'Playfair Display', serif;
		font-size: 10px;
		}
		#ham{
		float: right;
		padding-right: 10px;
		margin: auto;
		color:black;
	
		}
		#ham1{
			float: right;
			padding-right: 10px;
			margin: auto;
			font-size: 26px;
		}
		#img1 {
		width: 10%;
		height:100%;
		}
		@media only screen and (min-width: 600px) {
		/* For tablets: */
		.menu-list {width: 100%;}
		#img1 {
		width: 4%;
		height:100%;
		}
		}
		@media only screen and (min-width: 768px) {
		/* For desktop: */
		.menu-list {width: 100%;}
		#img1 {
		width: 4%;
		height:100%;
		}
		}
	</style>
</head>
<body>
	<div class="menu-list">
		<!-- Logo and navigation menu -->
		<div class="geeks">

			<h2> 
			<img src="dist/img/AdminLTELogo.jpg" id="img1" alt="Easy Tron Logo" class="brand-image img-circle elevation-3" >
			
			Easy Tron
			<!-- Bar icon for navigation -->
				<a href="#" id="ham1"><i id="ham" onclick="geeksforgeeks()" class="fa fa-bars " >
				</i></a>
			</h2>
			<div id="menus">
				<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
				<a href="login.php" ><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
				<a href="SignUp.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                <a href="img/easytron.pdf"  download><i class="fa fa-book" aria-hidden="true"></i> Plan Pdf</a>
			</div>
		</div>
	</div>
	<script>
		
		// Function to toggle the bar
		function geeksforgeeks() {
			var x = document.getElementById("menus");
			var y = document.getElementById("ham");
			if (x.style.display === "block") {
				x.style.display = "none";
				
				y.classList.add("fa-bars");
			
				y.classList.remove("fa-window-close");
			} else {
				x.style.display = "block";
				
				y.classList.remove("fa-bars");
				
				y.classList.add("fa-window-close");
			}
		}
	</script>
</body>

</html>
