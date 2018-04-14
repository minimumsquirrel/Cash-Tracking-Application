<?php
	 // Connects to the Database 
  include "sql_connection.php";
  require "login/loginheader.php";
  include "globalformat.php";
 	include "header.php";
  
   
 ?>
  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CTS</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/updated.css" rel="stylesheet">

  </head>
 	<body>
 		<div  class="container">
 			<div class="alert alert-primary" role="alert">
      <div>
        <br></br>
       
<?php                 

echo $username_data;

?> 

<br></br>

<?php 
echo $_SERVER["REMOTE_ADDR"];
?>

<br></br>

<?php 
echo $_SESSION['access_level'];
?>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>


