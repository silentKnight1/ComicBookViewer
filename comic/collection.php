<?php
	include("config.php");
?>

<!DOCTYPE html> 
<html > 
<head> 
<link rel="stylesheet" href="pageOverlay.css">
<link rel="stylesheet" href="style.css">

</head> 
<body> 

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


<table class="collections" >
	<?php
		$query = $mysqli->query("SELECT filepath from covers");
		if(!$query)
			echo "<script>alert('Error loading cover pages');</script>";
		
		else
		{	$colCount=0;
			
			while($row = mysqli_fetch_array($query))
			{
				if($colCount==0)
					echo "<tr>";
					echo "<td><div class='imgPreview'> <a href='#fullScreen' ><img src='".$row['filepath']."'/></a> 
			</div>
		</td>";
			if($colCount==4)
					{echo "</tr>";
			$colCount=0;
		}
			$colCount++;
			}
			
		}
	?>
</table>
 
 
<div id="fullScreen"> 
<a href="#" class="cancel">&times;</a> 
<img src=""/>

</div> 
<div id="cover" > 
<ul class="zoom">
<li class="in" > + </li>
<li class="out"> - </li>
</ul>
</div>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="pageOverlay.js"></script>
<script type="text/javascript" src="script.js"></script>
</body> 
</html> 