<?php

if (password_verify('1', '$argon2i$v=19$m=1024,t=2,p=2$THJoWnpOTHhDdnRCUjRxWQ$KPqoLCsdhV3oiEE/Lt5/WvF8LAyOojr6jCyAZaXAPC0')) 
	{
		echo 'Password is valid!';
	} 
else 
	{
		echo 'Invalid password.';
	}

?>

<html>
	<head>
		<title>Skrypt</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		 
		<link rel="stylesheet" type="text/css" href="styl.css">
		
	
	</head>
	<body>
		
		<form id= "newsletter">
		Email: 
		<input type = "text" class ="admDel">
		<input type = "submit" value ="Wyslij">
		 
		
 
</html>