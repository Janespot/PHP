<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" />
		<title>Rectangle</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<?php
	require('Rectangle.php');
	
	$width = 44;
	$height = 70;
	
	echo "<h2>With a width of $width and a a height of $height...</h2>";
	
	$r = new Rectangle($width, $height);
	
	echo '<p>The Area of the rectangle is: '.$r->getArea()."</p>";
	
	echo '<p>The perimeter of the rectangle is: '.$r->getPerimeter()."</p>";
	
	echo '<p>This rectangle is ';
		if($r->isSquare()){
			echo'also';
		}else{
			echo "not";
		}
		echo " a square.</p>";
		
	unset($r);
	?>
	</body>
</html>	