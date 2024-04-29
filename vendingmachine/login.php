<?php
   ob_start();
   session_start();
?>
<?php

	if(isset($_SESSION["password"]))
	{
		  header('Refresh: 1; URL = index.php');
		
	}
else
{
	
}

?>

<?php
	$msg = '';
	
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		   
		
	   if ($_POST['username'] == 'admin' && 
		  $_POST['password'] == 'admin') {
		  $_SESSION['valid'] = true;
		  $_SESSION['password'] = 'admin';
		  $_SESSION['username'] = 'tutorialspoint';
		  
		  echo 'You have entered valid use name and password';
		  header('Refresh: 1; URL = index.php');
	 die();
	   }else {
		  $msg = 'Wrong username or password';
	   }
	}
 ?>




<html>
    <head>
        <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	* {
  box-sizing: border-box;
  padding: 1px;
  font-family: Arial, Helvetica, sans-serif;
}

#heading1{
    text-align: center;
    padding: 30px;
}
img{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
 
}
.myForm{
    max-width:500px;
   margin: auto;
   margin-top: 10px;
  }
  .input-container {
    
    display: flex;
    width: 100%;
    margin-bottom: 15px;
    
  }
  .icon {
    padding: 10px;
    background: darkorange;
    color: white;
    min-width: 50px;
    text-align: center;
  }
  .input-field {
    width: 100%;
    padding: 10px;
    outline: none;
    border: none;
    border-bottom: 3px solid darkcyan;
  }
  .input-field:focus {
    border: 2px solid darkcyan;
  }

  .bttn {
    background-color:darkorange;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }
  .bttn:hover {
    opacity: 1;
    background-color: darkcyan;
  }  
  a:hover{
    color: blueviolet;
}
.icon:hover{
    background-color: darkcyan;
}
	</style>
    </head>
    <body>
       <h1 id="heading1">Login Here</h1>
       <img src="https://img.icons8.com/cute-clipart/344/login-rounded-right.png" alt="Login Logo" style="width:100px; height:100px;">
     <div>
         <form action="" method="post" class="myForm" name="myForm">
             <div class="input-container">
                 <i class="fa fa-envelope icon"></i>
                 <input type="text" placeholder="userid" name="username" class="input-field" required>
             </div>
             <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input type="password" placeholder="Password" name="password" class="input-field"  required>
               </div>
            <div><input type="submit" class="bttn"></div>
         </form>
     </div>
    </body>
</html>