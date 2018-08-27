<?php

$postTitle = array();
$postLink = array();

function resultArray($result) // changing object to array

{
				$tablica_wyn = array();
				for ($licznik = 0;$rzad = $result->fetch();$licznik++)
				{
								$tablica_wyn[$licznik] = $rzad;
				}

				return $tablica_wyn;
}

try
{
				$dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';

				// $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
				$connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
				$query = $connect->prepare("select Tytul, fname from Posty");

				$query->execute();

				$ilosc_kat = $query->rowCount(); //
				if ($ilosc_kat != 0)
				{
								echo "   |result == True and ilosc_kat != 0|    ";

								foreach ($query as $posts)
								{

												array_push($postLink, $posts['fname']);
												array_push($postTitle, $posts['Tytul']);
								}
				}
}

catch(PDOException $e)
{
				echo "Sorry: Connect error:" . $e->getMessage();

				// exit( "Sorry: Connect error:".$e->getMessage());
				
}

?>