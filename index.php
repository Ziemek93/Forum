<?php
   require_once ('connect.php');
   require_once ('indexPosts.php');
   session_start();
   
   if (isset($_SESSION['Id']) || isset($_SESSION['login']) || isset($_SESSION['password']) || isset($_SESSION['password']))
   	{
   	header('Location: indexZ.php');
   	exit();
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
            <button class="button button1" data-toggle="modal" data-target="#login">Login</button>
            <button class="button button2" data-toggle="modal" data-target="#registr">Register</button>
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
      <!-- The Modal -->
      <div class="modal fade" id="registr">
         <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Registration</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="container">
                     <div class="card-body">
                        <form action="reg.php" class="container" method= "post">
                           <div class="form-group">
                              <input name = "name" type="text" placeholder="Name" class="form-control  mt-2" required>
                              <input name = "login" type="text" placeholder="Login" class="form-control  mt-2" required>
                           </div>
                           <div class="form-group">
                              <input name = "password" type="password"  placeholder="Password" class="form-control  mt-2" required>
                              <input type="password" placeholder="Password" class="form-control  mt-2" required>
                              <select  name = "sex" class="form-control  mt-2">
                                 <option selected>Man</option>
                                 <option value="1">Women</option>
                                 <option value="2">Idk</option>
                              </select>
                           </div>
                           <div class="form-group form-check  mt-2" >
                              <label class="form-check-label ">
                              <input class="form-check-input" type="checkbox" required> Akceptuje regulamin.
                              </label>
                           </div>
                           <button type="submit" class="button  ">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
      <!-- The Modal -->
      <div class="modal fade" id="login">
         <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Login</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                  <div class="container">
                     <div class="card-body">
                        <form action="log.php" class="container" method= "post">
                           <div class="form-group">
                              <input name = "login" type="text" placeholder="Login" class="form-control  mt-2" required>
                              <input name = "password" type="password"  placeholder="Password" class="form-control  mt-2" required>
                           </div>
                           <button type="submit" class="button">Submit</button>
                        </form>
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>
   </body>
</html>