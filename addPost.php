<?php
session_start();

 

$ID = htmlspecialchars($_SESSION['Id'], ENT_QUOTES);
$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
$text = htmlspecialchars($_POST['postText'], ENT_QUOTES);

$ID = ''.$ID;
$rn = rand();




InsertComment($title, $text, "$ID", "TRUE", $rn);


header('Location: indexZ.php');






function InsertComment($Tytul, $Tresc, $Id, $posted, $fname)
		{
			  require_once('connect.php');
						 	try
		{
			 
					$dsn = 'mysql:host='.$config['host'].';dbname='.$config['nazwaBazy'].';charset=utf8';
					// $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
			
					$connect = new PDO($dsn,
							$config['uzytkownik'],
							$config['haslo'], 
							[PDO::ATTR_EMULATE_PREPARES => false, 
							PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
							
				    $query =  $connect->prepare("INSERT INTO posty (Id_p, Tytul, Tresc, Data, fname, bool, Id) VALUES (NULL, '$Tytul', '$Tresc', CURDATE(), '$fname', FALSE, '$Id')");
				  // $result = $lacz->query($zapytanie);
			
			
					$query->execute();
					
		}
			    catch (PDOException $e)
		{
			echo "Sorry: Connect error:".$e->getMessage();
			//exit( "Sorry: Connect error:".$e->getMessage());
			 
		}
				 //echo $zapytanie;

				
				   
						 
			
		}

?>


 