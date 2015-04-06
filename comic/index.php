<?php 
	include("config.php");
	include("header.html");
	error_reporting(E_ALL & ~E_NOTICE);
	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(isset($_POST['regsub'])){
			//$name = inputtrim($_POST['name']);
			$email = inputtrim($_POST['email']);
			$pass = inputtrim($_POST['password']);
			//$cpass = inputtrim($_POST['cpassword']);
			//$nameerror = "";
			$emailerror = "";
			$passerror = "";
			//$cpasserror = "";
			$flag = 1;
			
			//Form Validation
			/*if(!empty($name)){
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
			/*
			if(!empty($cpass)){
				if($pass != $cpass){
					$nameerror = "Password mismatch.";
					$flag = 0;
				}
			}else{
				$flag = 0;
				$nameerror = "Please confirm your password.";
			}*/
			$query = $mysqli->query("SELECT * from users ");
			
			while($row = mysqli_fetch_array($query))
			{
				if($row['email'] ==$email && $row['password']==md5($pass))
					{
						$flag=0;
						break;
					}
			}
			if($flag!=0){
				$passerror = "Invalid username or password";
			}else{
				//TO DO----------------------
				echo "<script> alert('succesfull login');</script>";
				header( 'Location:collection.php' ) ;
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

	
	
	<div id='carousel_container'>  
		<div id='left_scroll'  onclick="javascript:slide('left');"><img src="resources/circle_back_arrow.png"/></div>
			<div id='carousel_inner'>  
				<ul id='carousel_ul'>  
					<?php
						$query = $mysqli->query("SELECT `filepath` FROM `covers`");
						if($query){
							while($row = mysqli_fetch_array($query)){
								echo "<li><a href='#'><img src='".$row['filepath']."'/></a></li>";
							}
						}
					?> 
				</ul>  
			</div>  
		<div id='right_scroll' onclick="javascript:slide('right');"><img src="resources/circle_next_arrow.png"/></div>  
		<input type='hidden' id='hidden_auto_slide_seconds' value=0 />  
	</div>

	
	<div class="register-section" >
		<form enctype="multipart/form-data" name="register" method="post"   >
			<div class="input-group">
				<label class="form-label">Email ID :&nbsp;</label>
				<input type="email" name="email" class="form-input" onblur="validateEmail()" placeholder="Enter your Email ID" required/>
				<span id="emailerror" class="error"><?php echo $emailerror;?></span>
			</div>
			<div class="input-group">
				<label class="form-label">Password :&nbsp;</label>
				<input type="password" name="password" class="form-input" onblur="validatePassword()" placeholder="Enter your Password" required/>
				<span id="passerror" class="error"><?php echo $passerror;?></span>
			</div>
			
			<div class="input-group-submit">
				<input type="submit" name="regsub" value="Submit" class="register-submit"/>
			</div>
		</form>
	</div>
	
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="carousel.js"></script>
	
	</body>
</html>
