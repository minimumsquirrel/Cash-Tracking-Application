<?php
	 // Connects to the Database 
 	include "sql_connection.php";
 	include "header.php";
 	require "login/loginheader.php";
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
       
                <div>
                  <tr>
                    
                    <ul><a href='index.php'>Home</a></ul>

                    <ul><a href='employees.php'>Employees</a></ul>
                           
                    <ul><a href='dailyentry.php'>Daily Entry</a></ul>
                  
                    <ul><a href='records.php'>Records</a></ul>

                    <ul><a href='recordsemployees.php'>Employee Records</a></ul>
           
                    <ul><a href='phonebookentry.php'>Phonebook Entry</a></ul>
                                       
                    <ul><a href='phonebookrecords.php'>Phonebook Records</a></ul>

                    <ul><a href='contact.php'>Contact</a></ul>                               
                   
                    <ul><a href='/login/logout.php'>Logout</a></ul>
              </div>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>


