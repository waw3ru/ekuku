<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $this->title; ?></title>
		<link type="text/css" rel="stylesheet" href="<?php echo URL; ?>public/css/main.css" />
		<link href="<?php echo URL; ?>public/img/favicon.ico" type="image/icon" rel="icon" />
		<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>

<!-- This is where we are calling out js and css remotely -->
		<?php
		if (isset($this->css)){

			foreach($this->css as $css){
				echo "<link href='".URL.$css."' type='text/css' rel='stylesheet' />";
			}
		}
			
		if (isset($this->js)){
			foreach($this->js as $js){
				echo "<script src='".URL.$js."' type='text/javascript'></script>";
			}
		}		
		?>

	</head>


	<body>
		<div id="head">
			<div class="logo"><img src="<?php echo URL; ?>public/img/logo.png"></div>

<!-- Check whether someone is logged in -->
 <?php Session::intiliaze(); ?>
 <!--  -->
<?php if (Session::getSessionData("loggedIn") == false): ?>
			<div class="login">
				<table>
					<tr>
						<form action="<?php echo URL; ?>index/ajaxSysLogin" method="post" id="index-login-form">
						<td class="col"><label>Email Address: </label></td>
						<td class="col"><input type="text" name="email" class="text" /></td>
						<td class="col"><label>Password: </label></td>
						<td class="col"><input type="password" name="pass" class="text" /></td>
						<td><input type="submit" value="login" class="sub-btn" /></td>
						</form>
					</tr>
				</table>
			</div>

<?php else: ?>

			<div class="menu">
				<table>
					<tr>
						<td class="col"><a href="<?php echo URL; ?>administrator/news">News and Products</a></td>
						<td class="col"><a href="<?php echo URL; ?>administrator/board">The Board</a></td>
						<td class="col"><a href="<?php echo URL; ?>administrator">User Manager</a></td>
						<td class="col"><a href="<?php echo URL; ?>administrator/reporter">Users Report</a></td>
						<td class="col"><a href="<?php echo URL; ?>administrator/logout">Logout</a></td>
						</form>
					</tr>
				</table>
			</div>

<?php endif; ?>

		</div>

