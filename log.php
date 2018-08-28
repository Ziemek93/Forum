<?php
session_start();
require_once ('connect.php');

$login = htmlspecialchars($_POST['login'], ENT_QUOTES);
$password = htmlspecialchars($_POST['password'], ENT_QUOTES);

try
{

    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';
    // $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
    $connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $query = $connect->prepare("Select Id, haslo from  Uzytkownicy where Login = :login ");
    $query->bindValue(':login', $login, PDO::PARAM_STR);
    //$result = @$lacz->query($zapytanie);
    $query->execute();
    $ilosc_kat = $query->rowCount();

    if (($ilosc_kat != 0))
    {
        $query = $query->fetch();
        if (password_verify($password, $query['haslo']))
        {

            $_SESSION['Id'] = $query['Id'];
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            echo '  gut passwd  ';

            header('Location: indexZ.php');
            exit();
        }
    }
    header('Location: index.php');
    exit();
}
catch(PDOException $e)
{
    echo "Sorry: Connect error:" . $e->getMessage();
    //exit( "Sorry: Connect error:".$e->getMessage());
    
}
?>
