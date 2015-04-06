<?php 
	include("config.php");
	
	error_reporting(E_ALL & ~E_NOTICE);
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['regsub'])){
			$name = inputtrim($_POST['name']);
			$email = inputtrim($_POST['email']);
			$pass = inputtrim($_POST['password']);
			$cpass = inputtrim($_POST['cpassword']);
			$nameerror = "";
			$emailerror = "";
			$passerror = "";
			$cpasserror = "";
			$flag = 1;
			
			//Form Validation
			if(!empty($name)){
				if(!preg_match("/^[a-zA-Z0-9 .]+$/", $name)){
					$nameerror = "Only alphabets, digits, space and dot(.) allowed.";
					$flag = 0;
				}
			}else{
				$flag = 0;
				$nameerror = "Please enter a name.";
			}
			if(!empty($email)){
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$emailerror = "Invalid email ID.";
					$flag = 0;
				}else{
					$query = $mysqli->query("SELECT `id` FROM `users` WHERE `email`='$email'");
					if($query){
						if(mysqli_num_rows($query)!=0){
							$emailerror = "Email ID already exists.";
							$flag = 0;
						}
					}else{
						$flag = 0;
						$emailerror = "Email ID could not be verified. Please contact site adminstrator.";
					}
				}
			}else{
				$flag = 0;
				$emailerror = "Please enter an email ID.";
			}
			if(!empty($pass)){
				if(!preg_match("/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/", $pass)){
					$passerror = "Password should be 8-15 characters in length<br/>Atleast one uppercase letter, one lowercase letter and one digit required";
					$flag = 0;
				}
			}else{
				$flag = 0;
				$passerror = "Please enter a password.";
			}
			if(!empty($cpass)){
				if($pass != $cpass){
					$nameerror = "Password mismatch.";
					$flag = 0;
				}
			}else{
				$flag = 0;
				$nameerror = "Please confirm your password.";
			}
			
			//Insertion of user
			if($flag == 0){
				echo "<script>alert('You have some form errors. Please correct the same.');</script>";
			}else{
				//Storing password as md5 checksum of actual
				$query = $mysqli->query("SELECT MAX(id) as lastID from users");
				$lastID = mysqli_fetch_array($query);
				$newID = $lastID['lastID']+1;
				echo "<script>alert('".$lastID['lastID']."')</script>";
				$query = $mysqli->query("INSERT INTO users (id, name, email, password) VALUES('$newID', '$name' ,'$email', '".md5($pass)."')");
				if(!$query)
					{
					//$msg = $query->errno();
					
					echo "<script>alert('Account could not be created.Please try again.')</script>";
					}
				else
					{
						//$row = mysqli_fetch_array($query);
						echo "<script>alert('Account successfully created. Please log in to continue.')</script>";
					
					}
			}
		}
	}
	function inputtrim($param){
		$param = trim($param);
		$param = stripslashes($param);
		$param = htmlspecialchars($param);
		return $param;
	}
?>
<!doctype html>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="carousel.css">
	<link rel="stylesheet" href="register.css">
	<meta charset="UTF-8"/>
	</head>
	<body >
		
	<div class="nav_bar">
		<div class="nav_element">
				<span style="font-size:30px;"><a href="index.php"> &#8962 </a> </span>
		</div>
		<div class="nav_element ">
			<a href="collection.php">COLLECTIONS</a>
		</div>
		<div class="nav_element ">
			option 3 <span style="font-size:12px;">&#x25bc </span>
			<ul class="dropdown-list">
					<li> item 1</li>
					<li> item 2</li>
					<li> item 3</li>
					<li> <a href="#">item 4</a></li>
			</ul>
		</div>
		<div class="nav_element float_right">
			<a href="register.php"> Sign Up </a>
			
		</div>
		
	</div>
	<div class="register-section">
		<form enctype="multipart/form-data" name="register" method="post" onsubmit="validateForm()">
			<div class="input-group">
				<label class="form-label">Enter your full name :&nbsp;</label>
				<input type="text" name="name" class="form-input" onkeyup="validateName()" onblur="validateName()" placeholder="Enter your name" required/>
				<span id="nameerror" class="error"><?php echo $nameerror;?></span>
			</div>
			<div class="input-group">
				<label class="form-label">Enter your email ID :&nbsp;</label>
				<input type="email" name="email" class="form-input" onblur="validateEmail()" placeholder="Enter your Email ID" required/>
				<span id="emailerror" class="error"><?php echo $emailerror;?></span>
			</div>
			<div class="input-group">
				<label class="form-label">Choose your password :&nbsp;</label>
				<input type="password" name="password" class="form-input" onblur="validatePassword()" placeholder="Enter your Password" required/>
				<span id="passerror" class="error"><?php echo $passerror;?></span>
			</div>
			<div class="input-group">
				<label class="form-label">Re-enter password :&nbsp;</label>
				<input type="password" name="cpassword" class="form-input" onblur="validateCPassword()" placeholder="Re-enter your password" required/>
				<span id="cpasserror" class="error"><?php echo $cpasserror;?></span>
			</div>
			<div class="input-group-submit">
				<input type="submit" name="regsub" value="Submit" class="register-submit"/>
			</div>
		</form>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="carousel.js"></script>
	<script type="text/javascript" src="register.js"></script>
	</body>
</html>
