<?php
	 // Connects to the Database 
 	include "sql_connection.php";
	require "login/loginheader.php";
	include "globalformat.php";
  	include "header.php";
  

 		// Function for the employee name drop down list
 		@$cat=$_GET['store_num']; // Use this line or below line if register_global is off
		//@$cat=$HTTP_GET_VARS['store_num'];
		if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
		echo "Data Error";
		exit;
		
	}
	
	if($_SESSION['access_level'] != 'superadmin') {
		// your variable does not equal 'yes' do something
		return header("location:index.php");
		exit;
		}
	
?>
  
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CTS</title>

    <!-- Bootstrap -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/updated.css" rel="stylesheet">
    
    <!-- Drop down script to select employees only from your own store number -->

    <script language=JavaScript>
	
	function reload(form)
	{
	var val=form.store_num.options[form.store_num.options.selectedIndex].value;
	self.location='adminemailssent.php?store_num=' + val ;
	}
	
	</script>

	<!-- End of drop down script for employee names by store number -->

	<!-- Script to check before deleting entries in the data table -->

	<script language="JavaScript" type="text/javascript">
		function checkDelete(){
			return confirm('Confirm that you want to delete this record?');
		}
	</script>

	<!-- End of script to check before deleting entries in the data table -->

	
</head>
 	<body>
  		
	 		 

 		<div class="container">
		 <br></br>
		 		<div class="col-md-12">
					<h3>
						Cash Tracking Program:
						<small class="text-muted">Admin Email Reports</small>
					</h3>
					<hr>
				</div>

 			<?php

				
	 			$sql = "SELECT * FROM email_reports ORDER BY date, type, store DESC LIMIT 0, $recordsdisplayed";
				$run = mysqli_query($conn, $sql);

				echo "
					<table class='table table-hover table-sm w-auto'>
						<thead>
							<tr>
								<th>Date</th>
								<th>Store</th>
								<th>Store Name</th>
								<th>Type</th>
								<th>Email</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td class='align-middle'>$rows[date]</td>
						<td class='align-middle'>$rows[store]</td>
						<td class='align-middle'>$rows[store_name]</td>
						<td class='align-middle'>$rows[type]</td>
						<td class='align-middle'>$rows[email_address]</td>
					</tr>
				";
		
			
				}

				echo "</tbody>
					</table>";

			?>
		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	
 	</body>
</html>

