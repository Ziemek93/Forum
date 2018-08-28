<?php
require_once ('connect.php');

session_start();

if (isset($_SESSION['IDD']))
{
    echo $_SESSION['IDD'];
    $idp = $_SESSION['IDD'];
    unset($_SESSION['IDD']);

    try
    {

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';
        // $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
        $connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $dbQuery = $connect->prepare("SELECT Tytul, Tresc, FName from POSTY where id_p = :idp");
        $dbQuery->bindValue(':idp', $idp, PDO::PARAM_INT);

        $delQuery = $connect->prepare("Delete FROM Posty WHERE id_p = ':idp' ");
        $delQuery->bindValue(':idp', $idp, PDO::PARAM_INT);

        $dbQuery->execute();
        $delQuery->execute();

        //$update = @$lacz->query($updQuery);
        //$result = @$lacz->query($dbQuery);
        $lenght = $dbQuery->rowCount();

        if ($lenght > 0)
        {

            $dbQuery = $dbQuery->fetch();

            $fName = $dbQuery['FName'];

            try
            {
                unlink($fName . '.php');
                $delQuery->execute();
            }
            catch(Exception $e)
            {
                print "whoops!";
                //or even leaving it empty so nothing is displayed
                
            }

        }

        header('Location: adminPanel.php');
        exit();

    }

    catch(Exception $e)
    {
        echo "Sorry: Connect error:" . $e->getMessage();
        //exit( "Sorry: Connect error:".$e->getMessage());
        
    }
}

?>
