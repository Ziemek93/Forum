<?php

/*
class MyClass 
{
    const CONST_VALUE = 'A constant value';
}

$classname = 'MyClass';
echo $classname::CONST_VALUE; // As of PHP 5.3.0

echo MyClass::CONST_VALUE;
*/

 session_name( 'fObj' );
  session_start();

  print_r( session_name());
  
  
  session_destroy();
?>