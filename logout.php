<?php

	session_start();

/*
	unset($_SESSION['Id']);
	unset($_SESSION['login']);
	unset($_SESSION['password']);
  */
unset($_SESSION);  
	session_destroy();
	
	header('Location: index.php');
	exit();
	 


?>