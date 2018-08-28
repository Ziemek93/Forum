<?php
require_once ('connect.php');
require ('template.php');

session_start();

if (isset($_SESSION['IDD']))
{
    $idp = $_SESSION['IDD'];
    unset($_SESSION['IDD']);

    try
    {

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';
        // $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
        $connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $dbQuery = $connect->prepare("SELECT Tytul, Tresc, FName from POSTY where id_p = '$idp'");

        $updQuery = $connect->prepare("UPDATE Posty
	SET Bool = 1
	WHERE id_p = '$idp' ");

        $updQuery->execute();
        $dbQuery->execute();
        //	$update = @$lacz->query($updQuery);
        //$result = @$lacz->query($dbQuery);
        $lenght = $dbQuery->rowCount();

        if ($dbQuery && $lenght > 0)
        {

            $dbQuery = $dbQuery->fetch();

            $title = $dbQuery['Tytul'];
            $content = $dbQuery['Tresc'];
            $fName = $dbQuery['FName'];
            echo 'ffff' . $fName . 'hhhhh';

            CreatePost($pagepart1, $pagepart2, $fName, $title, $content);
        }
        header('Location: adminPanel.php');
        exit();

    }
    catch(PDOException $e)
    {
        echo "Sorry: Connect error:" . $e->getMessage();
        //exit( "Sorry: Connect error:".$e->getMessage());
        
    }

}

function CreatePost($pagepart1, $pagepart2, $fName, $title, $content)
{

    $handle = fopen($fName . '.php', 'w') or die('Cannot open file:  ' . $fName); //implicitly creates file
    $content = $pagepart1 . "<ul><li><a>" . $title . "</a></li> </ul> <ul> <li><a>" . $content . "</a></li> </ul>" . $pagepart2;
    fputs($handle, $content);
}
?>
