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

  // Function for the employee name drop down list
  @$cat=$_GET['store_num']; // Use this line or below line if register_global is off
  //@$cat=$HTTP_GET_VARS['store_num'];
  if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
  echo "Data Error";
  exit;
  }
?>
  <script language=JavaScript>
	
	function reload(form)
	{
	var val=form.store_num.options[form.store_num.options.selectedIndex].value;
	self.location='records.php?store_num=' + val ;
	}
	
	</script>
<?php
  $stored_num = isset($_GET['store_num']) ? $_GET['store_num']:$username_data;
  $sql_organization = "SELECT * FROM stores WHERE store_num = '$stored_num'";
		$run_organization = mysqli_query($conn, $sql_organization);
		while ( $rows = mysqli_fetch_assoc($run_organization) ) {
			$store_organization = $rows['store_organization'];
    }
    
    if($user_organization != $store_organization) {
      // your variable does not equal 'yes' do something
      return header("location:dailyentry.php");
      exit;
    }
  ?>
  


<?php                 





echo $username_data;

?> 

<br></br>

<?php 
echo $_SERVER["REMOTE_ADDR"];
?>

<br></br>

<?php 
echo $stored_num;
?>

<br></br>

<?php 
echo $_SESSION['access_level'];
?>
<br></br>

<?php 
echo $store_organization;
?>

<br> </br>

<?php 
echo $user_organization;



?>


	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>


