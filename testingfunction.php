<?php
	 // Connects to the Database 
   include "sql_connection.php";
   require "login/loginheader.php";
   include "globalformat.php";
   include "header.php";
   
 	
 ?>
  
<html lang="en">
  <head>
    <meta charset="UTF-8">
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
       
                

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>


<?php
	//Inserting new data

    $entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
    
		$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store) VALUES ('$entered_ip', '$username_data', 'testingfunction', '$stored_num')";
    
    mysqli_query($conn, $ins_sql);


	