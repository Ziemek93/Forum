<?php

/*
if (password_verify('1', '$argon2i$v=19$m=1024,t=2,p=2$THJoWnpOTHhDdnRCUjRxWQ$KPqoLCsdhV3oiEE/Lt5/WvF8LAyOojr6jCyAZaXAPC0')) 
	{
		echo 'Password is valid!';
	} 
else 
	{
		echo 'Invalid password.';
	}
	
	*/
	 session_name( 'fObj' );
	 print_r( session_get_cookie_params() );
  session_start();
print_r( session_get_cookie_params() );
  $_SESSION['foo'] = 'bar';

  
  
  $username = 'nobody' ?? null;
  echo $username;
  
?>

 