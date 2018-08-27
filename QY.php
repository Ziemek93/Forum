<?php
			
function resultArray($result)
		{
		
		   $tablica_wyn = array();

		   for ($licznik=0; $rzad = $result->fetch(); $licznik++)
			   {
			 $tablica_wyn[$licznik] = $rzad;
		   }
			
		   return $tablica_wyn;
		}
		
function lacz_bd()
		{
			$nazwa_bazy = 'forum';
		$host = 'localhost';
		$uzytkownik = 'root';
		$haslo = '';
		
		    $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
		   $result = new PDO($dsn, $uzytkownik, $haslo);
		   if (!$result)
			{
			  return false;
			}
			echo " poloczenie gut";
		   return $result;
		   
		}

		
function InsertComment($Tytul, $Tresc, $Id, $posted, $fname)
		{
			 
						 $lacz = lacz_bd();
			
				   $zapytanie = "INSERT INTO posty (Id_p, Tytul, Tresc, Data, Id, posted, fname) VALUES (NULL, '$Tytul', '$Tresc', CURDATE(), '$Id', '$posted', '$fname')";
				   $result = $lacz->query($zapytanie);
			
				 //echo $zapytanie;

				
				   
						 
			
		}
		
		
function Update($tableName, $columns, $thing, $value, $WHERE) 
		{
			 
						 $lacz = lacz_bd();
				   $zapytanie = "UPDATE $tableName SET $thing = $value $WHERE";
				   $result = @$lacz->query($zapytanie);
				   echo $result->rowCount();

				   if (!$result) {
					   echo ' bad ';
					  return false;
				   }
				   $ilosc_kat = $result->rowCount();
				   if ($ilosc_kat == 0) {
					   echo ' bad ';
					  return false;
					  
				   } 
				   $result = resultArray($result);
				    
				   $outputArr = array();
				  
				   foreach($result as $i)
				   {
				
					   array_push($outputArr, $i['Tytul']);			 
					  
				   }
				   
				   return $outputArr;
		}	
		
		
?>

