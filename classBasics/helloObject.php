<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Hello, World!</title>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<?php
		require("HelloWorld.php");
		
		$greeting = new HelloWorld();
		$greeting->sayHello();
		$greeting->sayHello('Swahili');
		$greeting->sayHello("French");
		$greeting->sayHello('Italian');
		unset($greeting);
		
		?>
	</body>
</html>