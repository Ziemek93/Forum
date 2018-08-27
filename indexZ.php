<?php
require_once ('connect.php');
require_once ('indexPosts.php');
session_start();

if (!isset($_SESSION['Id']) || !isset($_SESSION['login']) || !isset($_SESSION['password']))
{
				header('Location: index.php');
				exit();
}
echo $_SESSION['login'];


?>



<!DOCTYPE html>
<html lang="pl">
   <head>
      <title>Skrypt</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
		<link rel="stylesheet" href="styl.css" >
 
   </head>
   <body>
      <header>
         <div class = "strona" >
            <h1> 
               <em>
               <img src="https://orig00.deviantart.net/a4be/f/2017/331/8/2/happy_tree_friends___flippy_by_princesshetalia-dbv3nzh.png" id = "obrazek" width="128" height="164" alt="Smiley face">
               Milosnicy  czarnego humoru
               </em>
			  </h1>  
			
				 <div class="d-flex flex-row-reverse col-lg-9 mb-3" id="log-rej-btn" role="group" aria-label="Basic example">

				 <a class="btn btn-primary btn-sm ml-3 mr-4 log-rej "  href="logout.php"   role="button"  >Logout</a>
				  
			   

				</div>
           
         </div>
      </header>
	  
	  <nav>
					
		  <ul class="myClass">
		  <li><a class ="G" href="#" >Strona Główna</a><li>
		  <li><a class ="G" href="for.html">Forum</a></li>
		  <li><a  class ="G" href="Kontakt.html">Kontakt</a></li>
		  <li><a class ="G" href="Regulamin.html">Regulamin</a> </li>
		 
		  </ul>

		</nav>
		<form action="addPost.php" method= "post">
			<div class="form-group">
				 <label for="inputsm">Title</label>
				<input name = "title" class="form-control input-sm" id="inputsm" type="text">
				  <label for="comment">Post:</label>
				  
				  <textarea name = "postText" class="form-control" rows="5" id="comment"></textarea>
				  <button type="submit" class="btn btn-primary  col">Submit</button>
			</div>
		</form>
		
		<div class = "naglowek"><b>Aktualnosci</b></div>
		<ul>
		
		 <?php
		$i=0;
		 $g = count($postTitle);
		 if( count($postTitle) > 0 )
		 {
		 while($i < count($postTitle))
		 {		
			$url = $postLink[$i].".php";
			
		echo "<li><a  href = $url >".$postTitle[$i]."</a></li>";
		$i++;
		 }
		 }
		 
		 ?>
		</ul>	
		
     
    
   </body>
</html>
                                
