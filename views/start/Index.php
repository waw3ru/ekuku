<html lang="en">
	<head>

		<meta charset="utf-8">
		<title>eKUKU::Welcome to our website</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style_index.css">
		<link rel="icon" href="<?php echo URL; ?>public/img/logo.ico" type="image/ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>
		<!-- Header starts -->
		<header>
			<div class="logo"><img src="<?php echo URL; ?>public/img/logo.png"></div>
			<div class="quick-info"><p>A Poultry Management System to enable you to get ease on all your daily poultry businesses</p></div>
			<div class="contacts">
				<ul>
					<li><a href=""><img src="<?php echo URL; ?>public/img/facebook.ico" data-toggle="tooltip" data-placement="left" 
   title="See our Page on Facebook"></a></li>
					<li><a href=""><img src="<?php echo URL; ?>public/img/twitter.ico" data-toggle="tooltip" data-placement="right" 
   title="Send us a tweet on twitter"></a></li>
					<li><a href=""><img src="<?php echo URL; ?>public/img/ytube.ico" data-toggle="tooltip" data-placement="left" 
   title="Watch our media on youtube"></a></li>
					<li><a href=""><img src="<?php echo URL; ?>public/img/linkedin.ico" data-toggle="tooltip" data-placement="right" 
   title="See out business profile and trends on linkedIn"></a></li>
				</ul>
			</div>
		</header>
		<!-- Header end -->

		<!--body starts-->
		 <div class="container site-info">
      		<div class="row">
          		<div class="col-xs-12 col-sm-6 col1">
              		<img src="<?php echo URL; ?>public/img/about.ico">
          		</div>

          		<div class="col-xs-12 col-sm-6 col2">
              		<h2>About Poultry Farming</h2>
					<p>Poultry farming is the raising of domesticated birds such as chickens, turkeys, ducks, and geese, for the purpose of farming meat or eggs for food. 
					Poultry are farmed in great numbers with chickens being the most numerous. More than 50 billion chickens are raised annually as a source of food, for both their meat and their eggs. 
					Chickens raised for eggs are usually called layers while chickens raised for meat are often called broilers. In total, the UK alone consumes over 29 million eggs per day.
					In the US, the national organization overseeing poultry production is the Food and Drug Administration (FDA). In the UK, the national organization is the Department for Environment, Food and Rural Affairs (Defra).
					<cite><a data-toggle="tooltip" data-placement="right" 
   title="See all about poultry on wikipedia"
   href="http://en.wikipedia.org/wiki/Poultry_farming" target="_blank">more about poultry on wikipedia</a></cite></p>
          		</div>
      		</div>
  		</div>
		<!-- body end -->

		<!-- Footer starts -->
		<footer>
			<div class="container footer-info">
				<h2>Poultry Products on sale</h2>
			<div class="col-xs-12 col-sm-6 col3" id="product-update-start">

			</div>

			<div class="col-xs-12 col-sm-6 col4">

				<ul id="myTab" class="nav nav-tabs">
   				   <li  class="active"><a href="#ios" data-toggle="tab"><img src="<?php echo URL; ?>public/img/login.ico">Access Your Account</a></li>
   				   <li><a href="#home" data-toggle="tab"><img src="<?php echo URL; ?>public/img/sign_up.ico">Join us today</a></li>
				</ul>
			<div id="myTabContent" class="tab-content">
			   <div class="tab-pane fade in active" id="home">
			      <form id="regForm" action="<?php echo URL; ?>index/ajaxSysRegister" method="post" class="index-reg-form">
			      	<div class="txtForm">
		      		<label>Firstname: </label>
		      		<input type="text" name="firstname" placeholder="Enter your firstname">
		      		</div>

		      		<div class="txtForm">
		      		<label>Lastname: </label>
		      		<input type="text" name="lastname" placeholder="Enter your lastname">
		      		</div>

		      		<div class="txtForm">
		      		<label>Email Address: </label>
		      		<input type="text" name="email" placeholder="Enter your email address">
		      		</div>

		      		<div class="txtForm">
		      		<label>Phone Number: </label>
		      		<input type="text" name="phone" placeholder="Enter your phone number">
		      		</div>

		      		<div class="txtForm">
		      		<label>Password: </label>
		      		<input type="password" name="password" placeholder="Enter your password">
			      	</div>

			      	<div class="txtForm">
		      		<label>Gender: </label>
		      		<select name="gender">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                    </select>
                    </div>
                    
                    <div class="txtForm">
		      		<label>Business: </label>
                    <select name="business">
                            <option value="layers">Layers</option>
                            <option value="broilers">Broilers</option>
                            <option value="both">Both broilers and layers</option>
                    </select>
			      	</div>
			      	
			      	<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Sign Up</button>
			      </form>
			   </div>
			   <div class="tab-pane fade" id="ios">
			      <form id="regForm" class="index-login-form" action="<?php echo URL; ?>index/ajaxSysLogin" method="post">
			      	<div class="txtForm">
			      		<label>Email Address: </label>
			      		<input type="text" name="email" placeholder="Enter your email address">
			      	</div>
			      	
			      	<div class="txtForm">
			      		<label>Password: </label>
			      		<input type="password" name="pass" placeholder="Enter your password">
			      	</div>
			      	 <button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Login</button>
			      </form>
			   </div>
			</div>

			</div>
			</div>
		</footer>
		<!-- Footer end -->
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>views/start/js/main.js"></script>
		<script type="text/javascript">
   			$(function () { $("[data-toggle='tooltip']").tooltip(); });
		</script>
		<script type="text/javascript">
		   $(function () {
		      $('#myTab li:eq(1) a').tab('show');
		   });
		</script>
	</body>
</html>