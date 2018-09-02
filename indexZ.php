<?php
   require_once ('connect.php');
   require_once ('indexPosts.php');
   
   session_start();
   
   $_SESSION['expired'] = $_SESSION['expired'] ?? 0;
   
   if (!isset($_SESSION['Id']) || !isset($_SESSION['login']) || !isset($_SESSION['password']) || $_SESSION['expired'] < time())
	   {
					header('Location: logout.php');
					exit();
	   }
	   
   echo $_SESSION['login']."     ";
   print_r($_SESSION['expired'] - time());
   $_SESSION['expired'] = time() + 600;
  
   
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
            <h1>Forum</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            </p>
            <ul>
<?php
$i = 0;
$g = count($postTitle);
if (count($postTitle) > 0)
{
    while ($i < count($postTitle))
    {
        $url = $postLink[$i] . ".php";

        echo "<li><a  href = $url >" . $postTitle[$i] . "</a></li>";
        $i++;
    }
}

?>

            </ul>
         </section>
         <!--footer-->
         <footer>
            <p>mySite.pl © 2018</p>
         </footer>
      </div>
   </body>
</html>