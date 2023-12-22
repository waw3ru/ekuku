<?php
	if ((Session::getSessionData('user_type') == "admin")){
		header('Location: '.URL.'administrator');
		exit;
	}
	
?>
<html>
	<head>

		<meta charset="utf-8">
		<title>eKUKU::Welcome to your account</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>public/css/style_accounts.css">
		<link rel="icon" href="<?php echo URL; ?>public/img/logo.ico" type="image/ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>

		<!-- left section starts -->
		<div id="left-section">
			<div class="logo"><img src="<?php echo URL; ?>public/img/logo.png"></div>

			<div class="small-menu">
				<ul>
					<li><a class="link-board" href="<?php echo URL; ?>dashboard/"><img src="<?php echo URL; ?>public/img/sign_up.ico">Go back to the board</a></li>
					<li><a class="link-settings" href="<?php echo URL; ?>dashboard/logout" ><img src="<?php echo URL; ?>public/img/login.ico">logout</a></li>
						
				</ul>
			</div>
			
			<div class="news">
			<h3>News and Poultry Tips</h3>
				<ul id="myTab" class="nav nav-tabs">
   				   <li  class="active"><a href="#poultry-farming" data-toggle="tab">About Farming</a></li>
   				   <li><a href="#poultry-other" data-toggle="tab">Other</a></li>
   				   <li><a href="#poultry-market" data-toggle="tab">Marketing</a></li>
				</ul>

				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="poultry-farming">
						<div id='farming'>
	
						</div>
					</div>
					<div class="tab-pane fade" id="poultry-other">
						<div id='other'>

						</div>
					</div>
					<div class="tab-pane fade" id="poultry-market">
					 <div id='market'>

					</div>
					</div>
				</div>

			</div>
		</div>
		<!-- left section end -->

<?php
	if (isset($_GET['msg'])){
		echo "<script type='text/javascript'>alert('".$_GET['msg']."')</script>";
	}
?>


		<!-- body starts-->
		<div id="body">
		<h3 class="board-chwakiz">Change your account information</h3>
			<div class="edit-form">
				<form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange">
			      	<div class="txtForm">
		      		<input type="text" placeholder="Change your firstname" name="firstname" >
		      		</div>

		      		<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
		      	</form>

		      	<form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange">
   
		      		<div class="txtForm">
		      		<input type="text" placeholder="Change your lastname" name="lastname">
		      		</div>

		      		<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
		      	</form>

		      	<form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange">
		      		<div class="txtForm">
		      		<input type="text" placeholder="Change your email address" name="email">
		      		</div>

		      		<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
		        </form>

		        <form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange">
		      		<div class="txtForm">
		      		<input type="text" placeholder="Change your phone number" name="phone">
		      		</div>

		      		<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
		      	</form>

		      	<form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange">
		      		<div class="txtForm">
		      		<select name="gender">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                    </select>
                    </div>

                    <button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
                </form>

                <form id="regForm" method="post" action="<?php echo URL; ?>settings/getChange"> 
                    <div class="txtForm">
                    <select name="business">
                            <option value="layers">Layers</option>
                            <option value="broilers">Broilers</option>
                            <option value="both">Both broilers and layers</option>
                    </select>
			      	</div>

			      	<button type="reset" class="btn btn-default">Reset</button>
			      	<button type="submit" class="btn btn-primary">Change</button>
			    </form>
			</div>


		</div>
		<!-- body end -->



		<!-- right section starts -->
		<div id="right-section">
			<div class="update">
				<h3>Product Update</h3>
				<form class="form-products" method="post" action="<?php echo URL; ?>dashboard/productNews" id="product-insert">
					<div class="form-group">
			            <label for="descField">Product description</label>
			            <textarea type="text" name="product" class="form-control txtarea" id="descField" placeholder="Describe your product, method of contact and terms of sale"></textarea>
				    </div>
				        
				    <button type="submit" class="btn btn-primary">Submit Product</button> <button type="reset" class="btn btn-default">Reset</button>
			    </form>
			</div>

			<div class="product-update">

				<div id='products'>

				</div>

			</div>

			</div>
		<!-- right section end -->

		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo URL; ?>views/accounts/js/main.js"></script>
		<script type="text/javascript">
   			$(function () { $("[data-toggle='tooltip']").tooltip(); });
		</script>
		<script type="text/javascript">
		   $(function () {
		      $('#myTab li:eq(1) a').tab('show');
		   });
		   $(document).ready(function (){

			   	$(".form-txtarea").click(function(){
			   		$(".form-txtarea").animate({height: "200px"});
			   });
			   $(".form-txtarea").blur(function(){
			   		$(".form-txtarea").animate({height: "80px"}, "slow");
			   });

		   });
		   
		</script>

	</body>
</html>
