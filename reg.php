<?php
session_start();
require ('connect.php');

$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
$sex = htmlspecialchars($_POST['sex'], ENT_QUOTES);

//echo $login." ".$password." ";
$password = password_hash($password, PASSWORD_ARGON2I);
//echo $password;
try
{

    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';
    // $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
    $connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $query = $connect->prepare("INSERT INTO Uzytkownicy (Id, imie, login, haslo, plec) VALUES (NULL, :name, :login, :password, :sex)");
    $query->bindValue(':name', $idp, PDO::PARAM_STRS);
    $query->bindValue(':login', $idp, PDO::PARAM_STR);
    $query->bindValue(':password', $idp, PDO::PARAM_STR);
    $query->bindValue(':sex', $idp, PDO::PARAM_STR);
    //$result = @$lacz->query($zapytanie);
    $query->execute();

    header('Location: index.php');
    exit();
}
catch(PDOException $e)
{
    echo "Sorry: Connect error:" . $e->getMessage();
    //exit( "Sorry: Connect error:".$e->getMessage());
    
}
?>
