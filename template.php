<?php

$pagepart1 = "

<!DOCTYPE html>
<html lang='pl'>
   <head>
      <title>Skrypt</title>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	  
      <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js'></script>
      <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
		<link rel='stylesheet' href='styl.css' >
 
   </head>
   <body>
      <header>
         <div class = 'strona' >
            <h1> 
               <em>
               <img src='https://orig00.deviantart.net/a4be/f/2017/331/8/2/happy_tree_friends___flippy_by_princesshetalia-dbv3nzh.png' id = 'obrazek' width='128' height='164' alt='Smiley face'>
               Milosnicy  czarnego humoru
               </em>
			  </h1>  
			    <div class='d-flex flex-row-reverse col-lg-9 mb-3' id='log-rej-btn' role='group' aria-label='Basic example'>

				 <a class='btn btn-primary btn-sm ml-3 mr-4 log-rej '    role='button' data-toggle='modal' data-target='#login' >Login</a>
				  <a class='btn btn-primary btn-sm ml-3 mr-2 log-rej '   role='button' data-toggle='modal' data-target='#registr' >Registration</a>
			   

				</div>
		  
           
         </div>
      </header>
	  
	  <nav>
					
		  <ul class='myClass'>
		  <li><a class ='G' href='#' >Strona Główna</a><li>
		  <li><a class ='G' href='for.html'>Forum</a></li>
		  <li><a  class ='G' href='Kontakt.html'>Kontakt</a></li>
		  <li><a class ='G' href='Regulamin.html'>Regulamin</a> </li>
		 
		  </ul>

		</nav>

		<div class = 'naglowek'><b>Aktualnosci</b></div>
	";	
		
		
     $pagepart2 = "
      <!-- The Modal -->
      <div class='modal fade' id='registr'>
         <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content'>
               <!-- Modal Header -->
               <div class='modal-header'>
                  <h4 class='modal-title'>Registration</h4>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
               </div>
               <!-- Modal body -->
               <div class='modal-body'>
                  
                     <div class='container'>
                         
                           <div class='card-body'>
                  <form action='addPost.php' class='container' method= 'post'>
                     <div class='form-group'>
                      <input name = 'login' type='text' placeholder='Login' class='form-control  mt-2' required>
                      <input type='text' placeholder='Nazwisko' class='form-control  mt-2' required>
                   
                   
                    
                    </div>
                    <div class='form-group'>
                      <input type='password'  placeholder='haslo' class='form-control  mt-2' required>
                      <input type='password' placeholder='powtórz haslo' class='form-control  mt-2' required>
						 <select  class='form-control  mt-2'>
                                    <option selected>Man</option>
                                    <option value='1'>Women</option>
                                    <option value='2'>Idk</option>
                                 
                                 </select>
				   </div>
                    <div class='form-group form-check  mt-2' >
                      <label class='form-check-label '>
                      <input class='form-check-input' type='checkbox' required> Akceptuje regulamin.
                      </label>
                    </div>
                    <button type='submit' class='btn btn-primary  col'>Submit</button>
                  </form>
                </div>
                            
                        </div>
                     
                
               </div>
               <!-- Modal footer -->
            </div>
         </div>
      </div>

	  <!-- The Modal -->
      <div class='modal fade' id='login'>
         <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content'>
               <!-- Modal Header -->
               <div class='modal-header'>
                  <h4 class='modal-title'>Login</h4>
                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
               </div>
               <!-- Modal body -->
               <div class='modal-body'>
                 
                     <div class='container'>
                         
                <div class='card-body'>
                  <form action='log.php' class='container' method= 'post'>
                     <div class='form-group'>
                      <input name = 'login' type='text' placeholder='Login' class='form-control  mt-2' required>
                      <input name = 'password' type='password'  placeholder='Password' class='form-control  mt-2' required>
				   </div>
					
                    <button type='submit' class='btn btn-primary  col'>Submit</button>
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
 ";     
 
?>