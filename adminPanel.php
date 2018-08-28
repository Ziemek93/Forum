<?php
require ('connect.php');

session_start();

$postTitle = array();
$postLink = array();
$postEnabled = array();
$id = array();
$user = array();

$_SESSION['IDD'] = '';

$title = "";
$content = "";
$AddDelete = "";
$AD = "";

$dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['nazwaBazy'] . ';charset=utf8';
// $dsn = "mysql:host=$host;dbname=$nazwa_bazy";
$connect = new PDO($dsn, $config['uzytkownik'], $config['haslo'], [PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if (isset($_GET['choose']))
{

    $id_p = strchr($_GET['choose'], " ");

    $_SESSION['IDD'] = $id_p;
    try
    {

        $viewQuery = $connect->prepare("SELECT Tytul, Tresc, Bool from POSTY where id_p =  :id_p");
        $viewQuery->bindValue(':id_p', $id_p, PDO::PARAM_INT);
        //$result2 = @$lacz->query($viewQuery);
        $viewQuery->execute();
        $lenght2 = $viewQuery->rowCount();
        $viewQuery = $viewQuery->fetch();

        $title = $viewQuery['Tytul'];
        $content = $viewQuery['Tresc'];

        switch ($viewQuery['Bool'])
        {
            case 0:
                $AddDelete = 'admAdd.php';
                $AD = ' Add post ';
            break;

            case 1:
                $AD = ' Delete post ';
                $AddDelete = 'admDel.php';
            break;
        }

    }
    catch(PDOException $e)
    {
        echo "Sorry: Connect error:" . $e->getMessage();
        //exit( "Sorry: Connect error:".$e->getMessage());
        
    }
}

try
{

    $dbQuery = $connect->prepare("SELECT a.id_p, a.tresc, b.id, b.login from POSTY a INNER join UZYTKOWNICY b where a.id = b.id");

    $dbQuery->execute();
    //$dbQuery = @$lacz->query($dbQuery);
    $lenght = $dbQuery->rowCount();

    if ($dbQuery && $lenght > 0)
    {

        //$result = $result->fetch($dbQuery);
        foreach ($dbQuery as $things)
        {
            array_push($id, $things['id_p']);
            array_push($postTitle, $things['tresc']);
            array_push($user, $things['login']);
        }

    }

}

catch(PDOException $e)
{
    echo "Sorry: Connect error:" . $e->getMessage();
    //exit( "Sorry: Connect error:".$e->getMessage());
    
}

?>

<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="styl.css" />
      <title>Forum</title>
   </head>
   <body>
      <div id = "container">
      <!--header -->
      <header>
         <img src="https://orig00.deviantart.net/a4be/f/2017/331/8/2/happy_tree_friends___flippy_by_princesshetalia-dbv3nzh.png" id = "obrazek"  alt="Smiley face">
         <h1>Forum</h1>
         <a class="button button1"  href="logout.php"   role="button" >Logout</a>
      </header>
      <!--sidebar -->
      <aside>
         <!--nav-->
         <nav>
            <ul>
               <li><a href="#">Home</a></li>
               <li><a href="#">Forum</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="#">Rules</a></li>
            </ul>
         </nav>
      </aside>
      <!--main -->
      <section id ="main">
         <form action="adminPanel.php" method= "get">
            <label>Posts</label>
            <select class="btn btn-primary" name = "choose">
<?php
if (count($id) > 0)
{
    $i = 0;
    while ($i < count($id))
    {
        echo "<option>" . $user[$i] . ":  " . $id[$i] . "</option>";

        $i++;
    }
}

?>

            </select>
            <button type="submit" class="btn btn-primary  ">Submit</button>
         </form>
         <div class = "admAddDel" >
<?php
echo '<form action=' . $AddDelete . '>
               	<table>
               	<tr>
               		<th   >' . $title . '</th>
               	  </tr>
               	  <tr>
               		<td   >' . $content . '</td>
               	  </tr>
               	 </table>
                    <button type="submit" class="btn   ">' . $AD . '</button>'
?>

            </form>
      </section>
      <!--footer-->
      <footer>
      <p>mySite.pl © 2018</p>
      </footer>
      </div>
   </body>
</html>