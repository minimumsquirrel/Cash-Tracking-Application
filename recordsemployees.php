<?php
	 // Connects to the Database 
 	include "sql_connection.php";
  	require "login/loginheader.php";
  	include "header.php";
  	include "globalformat.php";

 		// Function for the employee name drop down list
 		@$cat=$_GET['store_num']; // Use this line or below line if register_global is off
		//@$cat=$HTTP_GET_VARS['store_num'];
		if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not. 
		echo "Data Error";
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
	self.location='recordsemployees.php?store_num=' + val ;
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
			<div class="form-row"> 
						<div class="col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 1.</strong> Daily Entry. <a href="dailyentry.php" class="alert-link">Enter daily information on this page.</a> Enter details daily, then to review the entries proceed to step 2.
							</div>								
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 2.</strong> Records Review. <a href="records.php" class="alert-link">Review all records on this page.</a> Many search options exist to find individual entries.
							</div>					
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-primary">								
								<strong>Step 3.</strong> Employee Records Review. <a href="recordsemployees.php" class="alert-link">Review all employee records on this page.</a> Lists all employees and their combined totals.
							</div>					
						</div>
			</div> 
  		
 		<div class="container">
		 		<div class="col-md-12">
					<h3>
						Cash Tracking Program:
						<small class="text-muted">Aggregate Employee Review</small>
					</h3>
					<hr>
				</div>
				
		 	<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-12">
						<div class="form-group">
							<label>Store</label>

								<?Php

								
								$query2="SELECT DISTINCT store_name,store_num FROM stores order by store_name"; 
														
								//First drop down box
								echo "<select action='employeenamedd.php' class='form-control' name='store_num' onchange=\"reload(this.form)\"><option value=''>Select one</option>";
								if($stmt = $conn->query("$query2")){
									while ($row2 = $stmt->fetch_assoc()) {
									if($row2['store_num']==@$cat){echo "<option selected value='$row2[store_num]'>$row2[store_name]</option>";}
								else{echo  "<option value='$row2[store_num]'>$row2[store_name]</option>";}

								}
								}else{
								echo $conn->error;
								}

								echo "</select>";

								?>
													
							</div>
							
							
						</div>

						<div class="form-group col-md-6">
							<div class="form-row">
								
									
								
									
							</div>
		 		
		 		</form>
				</div>
				<div class="container">									
				<form method="post">
					
						<div class="row text-center col-md-12">
							<div class="col-3">
								<input type="submit" class="btn btn-submit" value="Current Month" name="current_month">
							</div>
							<div class="col-2">
								<input type="submit" class="btn btn-flag" value="Past 3 Months" name="three_months">
							</div>
							<div class="col-2">
								<input type="submit" class="btn btn-submit" value="Past 6 Months" name="six_months">
							</div>
							<div class="col-2">
								<input type="submit" class="btn btn-flag" value="Past 12 Months" name="twelve_months">
							</div>
							<div class="col-3">
								<input type="submit" class="btn btn-submit" value="All Time" name="all_time">
							</div>
							
						</div>
					
				</form>
				</div>
				<?php 
		 
		 		$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$username_data;
		 		$current_month = isset($_POST['current_month']) ? $_POST['current_month']:'';
				$three_months = isset($_POST['three_months']) ? $_POST['three_months']:'';
				$six_months = isset($_POST['six_months']) ? $_POST['six_months']:'';
				$twelve_months = isset($_POST['twelve_months']) ? $_POST['twelve_months']:'';
				$all_time = isset($_POST['all_time']) ? $_POST['all_time']:'';
				 
				 $total_query = "WHERE store_num = '$store_num'";
		 			
		 			if(!empty($current_month)){
						$total_query .= "AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
						MONTH(date) = MONTH(CURRENT_DATE)";
					}
					if(!empty($three_months)){
						$total_query .= "AND date between (CURRENT_DATE - INTERVAL 3 MONTH) AND (CURRENT_DATE)";
					}
					if(!empty($six_months)){
						$total_query .= "AND date between (CURRENT_DATE - INTERVAL 6 MONTH) AND (CURRENT_DATE)";
					}
					if(!empty($twelve_months)){
						$total_query .= "AND date between (CURRENT_DATE - INTERVAL 12 MONTH) AND (CURRENT_DATE)";
					}
					if(!empty($all_time)){
						$total_query .= "AND date between (2017-08-01) AND (CURRENT_DATE)";
					}
		 					

				
				// _____________________________________________ TOTALS ______________________________

				
				$totalall = "SELECT IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(promo)/SUM(promo_num),2),0) AS value_promoavg, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry $total_query";
				   
				$run = mysqli_query($conn,$totalall);
				
				echo "
					
					<table class='table col-md-12'>
						<thead>
							<tr>
								<hr>
								<th>Total Cash +/-</th>
								<th>Total Refunds</th>
								<th>Total Refunds #</th>
								<th>Average Refunds</th>
								<th>Total Promo</th>
								<th>Avg Promo</th>
								<th>Total Treds</th>
								<th>Total Treds #</th>
								<th>Avg TReds</th>
							</tr>
						</thead>
						
						<tbody>
						
			
				";
				while($rows = mysqli_fetch_array($run) ) {
				echo "
					<tr>
						<td>$rows[value_cash]</td>
						<td>$rows[value_refunds]</td>
						<td>$rows[value_refundsnum]</td>
						<td>$rows[value_refundsavg]</td>
						<td>$rows[value_promo]</td>
						<td>$rows[value_promoavg]</td>
						<td>$rows[value_tred]</td>
						<td>$rows[value_trednum]</td>
						<td>$rows[value_tredavg]</td>
					</tr>
						
				";
				
				}

				echo "</tbody>
					</table>";

				//_______________________________________ALL DATA__________________________________	

				$sql2 = "SELECT employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(promo)/SUM(promo_num),2),0) AS value_promoavg, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry $total_query GROUP BY employee_name";
				
	 		
				$run2 = mysqli_query($conn, $sql2);
				
				echo "
					
					<table class='table table-striped'>
						<thead>
							<tr>
								<hr>
								<th>Employee Name</th>
								<th>Cash +/-</th>															
								<th>Refunds</th>
								<th>#-Refunds</th>
								<th>Refunds Avg</th>
								<th>Promo</th>
								<th>Promo Avg</th>
								<th>TReds</th>
								<th>#-TReds</th>
								<th>Treds Avg</th>
								
								
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows2 = mysqli_fetch_assoc($run2) ) {
				echo "
					<tr>
						
						<td>$rows2[employee_name]</td>
						<td>$rows2[value_cash]</td>
						<td>$rows2[value_refunds]</td>
						<td>$rows2[value_refundsnum]</td>
						<td>$rows2[value_refundsavg]</td>
						<td>$rows2[value_promo]</td>
						<td>$rows2[value_promoavg]</td>
						<td>$rows2[value_tred]</td>
						<td>$rows2[value_trednum]</td>
						<td>$rows2[value_tredavg]</td>
						
					</tr>
				";
		
			
				}

				echo "</tbody>
					</table>";

			?>
			
		</div>

	</form>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

 	</body>
</html>