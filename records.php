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
	self.location='records.php?store_num=' + val ;
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
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 1.</strong> Daily Entry. <a href="dailyentry.php" class="alert-link">Enter daily information on this page.</a> Enter details daily, then to review the entries proceed to step 2.
							</div>								
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-primary">								
								<strong>Step 2.</strong> Records Review. <a href="records.php" class="alert-link">Review all records on this page.</a> Many search options exist to find individual entries.
							</div>					
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 3.</strong> Employee Records Review. <a href="recordsemployees.php" class="alert-link">Review all employee records on this page.</a> Lists all employees and their combined totals.
							</div>					
						</div>
			</div> 
  		
 		<div class="container">
		 		<div class="col-md-12">
					<h3>
						Cash Tracking Program:
						<small class="text-muted">Search & Review Form</small>
					</h3>
					<hr>
				</div>

			<?php	 

 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM dailyentry WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$store_num = $rows['store_num'];
 						$employee_name = $rows['employee_name'];
 						$date = $rows['date'];
						$tred = $rows['tred'];
						$tred_num = $rows['tred_num']; 
						$promo = $rows['promo'];
						$promo_num = $rows['promo_num'];
 						$cash = $rows['cash'];
						$refunds = $rows['refunds'];
						$refunds_num = $rows['refunds_num'];
						$flagged = $rows['flagged'];
						$comments = $rows['comments']; 
 					}
 					?>

 		
		 <form method="post">
				<dic class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Store Number</label>
							<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Employee Name (Last,First)</label>
							<input type ="text" name="edit_employee_name" value="<?php echo $employee_name; ?>" class="form-control" required>
						</div>
					 	<div class="form-group">
							<label>Date (yyyy-mm-dd)</label>
							<input type ="date" name="edit_date" value="<?php echo $date; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cash +/-</label>
							<input type ="text" name="edit_cash" value="<?php echo $cash; ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-row">  
							<div class="form-group col-md-6">
								<label>Refunds</label>
								<input type ="text" name="edit_refunds" value="<?php echo $refunds; ?>" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Number of Refunds</label>
								<input type ="text" name="edit_refunds_num" value="<?php echo $refunds_num; ?>" class="form-control">
							</div>
						</div>
						<div class="form-row"> 
							<div class="form-group col-md-6">
								<label>Promo</label>
								<input type ="text" name="edit_promo" value="<?php echo $promo; ?>" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Number of Promos</label>
								<input type ="text" name="edit_promo_num" value="<?php echo $promo_num; ?>" class="form-control">
							</div>
						</div>
						<div class="form-row">  
							<div class="form-group col-md-6">
								<label>T-Reds</label>
								<input type ="text" name="edit_tred" value="<?php echo $tred; ?>" class="form-control" required>
							</div>
							<div class="form-group col-md-6">
								<label>Number of T-Reds</label>
								<input type ="text" name="edit_tred_num" value="<?php echo $tred_num; ?>" class="form-control">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Flagged for Review</label>
								<select name="edit_flagged" value="<?php echo $flagged; ?>" class="form-control">
										<option value="">Flag?</option>
										<option value="Yes">Yes</option>
								</select>
							</div>
							<div class="form-group col-md-8">
								<label>Comments</label>
								<input type ="text" name="edit_comments" placeholder="75 Characters" value="<?php echo $comments; ?>" class="form-control">
							</div>
						</div>	
						<div class="form-group">
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>

					<div class="form-group col-md-6">
					
					</div>
	 		</form>
	 			
 	 		<?php } else { ?> 


 	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
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
							<div id="employee_name" class="form-group">
								<label>Employee Name (Last,First)</label>

								<?php

								echo "<select action='employeenamedd.php' class='form-control' name='employee_name'><option value=''>Select one</option>";
								if(isset($cat) and strlen($cat) > 0){
								if($stmt = $conn->prepare("SELECT DISTINCT employee_name FROM employees where store_num=? order by employee_name")){
								$stmt->bind_param('i',$cat);
								$stmt->execute();
								$result = $stmt->get_result();
								while ($row1 = $result->fetch_assoc()) {
								echo  "<option value='$row1[employee_name]'>$row1[employee_name]</option>";}
										

								}else{
								echo $conn->error;
								} 

								/////////
								}else{
								///////
								$query="SELECT DISTINCT employee_name FROM employees order by employee_name"; 

								if($stmt = $conn->query("$query")){
								while ($row1 = $stmt->fetch_assoc()) {
										
								echo  "<option value='$row1[employee_name]'>$row1[employee_name]</option>";

								}
							}
						}
								
									
								echo "</select>";

								?>
				
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Beginning Date (yyyy-mm-dd)</label>
									<select class="form-control" name="first_date" required>

										<?php
										$menu=" "; 

										//selection query
										$sqli="SELECT * FROM datesascend"; 

										//odbc_exec($conn,$sqli);
										$rs = mysqli_query($conn, $sqli);
										
											if (mysqli_num_rows($rs) > 0) {
											// output data of each row
											while($row = mysqli_fetch_assoc($rs)) {
												$menu .= "<option value=".$row['yearmonthday'].">" . $row['yearmonthday']. "</option>";
													}
												}
												echo $menu;
													
										?> 
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>End Date (yyyy-mm-dd)</label>
									<select class="form-control" name="second_date" required>

										<?php
										$menu=" "; 

										//selection query
										$sqli="SELECT * FROM datesdescend"; 

										//odbc_exec($conn,$sqli);
										$rs = mysqli_query($conn, $sqli);
										
											if (mysqli_num_rows($rs) > 0) {
											// output data of each row
											while($row = mysqli_fetch_assoc($rs)) {
												$menu .= "<option value=".$row['yearmonthday'].">" . $row['yearmonthday']. "</option>";
													}
												}
												echo $menu;
													
										?> 
									</select>
								</div>
							</div>	
							<div class="form-group">
								<label>Flagged?</label>
								<select name="flagged" class="form-control">
									<option value="">Flagged?</option>
									<option value="Yes">Yes</option>
								</select>
							</div>
							<div class="form-group">
								<input type ="submit" name="submit_data" class="btn btn-submit">
							</div>
						</div>

						<div class="form-group col-md-6">
							<div class="form-row">		
								<div class="form-group col-md-6">
									<label>Cash Up</label>
									<select name="updown_greater" class="form-control">
										<option value="">Select One</option>
										<option value="0.01">All Up</option>
										<option value="2">Up $2</option>
										<option value="5">Up $5</option>
										<option value="10">Up $10</option>
										<option value="20">Up $20</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Cash Missing</label>
									<select name="updown_less" class="form-control">
										<option value="">Select One</option>
										<option value=" 0">All Missing</option>
										<option value=" -2">Missing $2</option>
										<option value=" -5">Missing $5</option>
										<option value=" -10">Missing $10</option>
										<option value=" -20">Missing $20</option>
									</select>
								</div>
							</div>	
							<div class="form-group">
								<label>Refund Amounts</label>
								<select name="refunds" class="form-control">
									<option value="">Select One</option>
									<option value="2">Over $2</option>
									<option value="5">Over $5</option>
									<option value="10">Over $10</option>
									<option value="15">Over $15</option>
									<option value="20">Over $20</option>
									<option value="30">Over $30</option>
									<option value="40">Over $40</option>
									<option value="50">Over $50</option>
									<option value="75">Over $75</option>
									<option value="100">Over $100</option>
								</select>
							</div>
								<div class="form-group">
								<label>Tred Amounts</label>
								<select name="tred" class="form-control">
									<option value="">Select One</option>
									<option value="2">Over $2</option>
									<option value="5">Over $5</option>
									<option value="10">Over $10</option>
									<option value="15">Over $15</option>
									<option value="20">Over $20</option>
									<option value="30">Over $30</option>
									<option value="40">Over $40</option>
									<option value="50">Over $50</option>
									<option value="75">Over $75</option>
									<option value="100">Over $100</option>
								</select>
							</div>
							<div class="form-group">
								<label>Promo Amounts</label>
								<select name="promo" class="form-control">
									<option value="">Select One</option>
									<option value="2">Over $2</option>
									<option value="5">Over $5</option>
									<option value="10">Over $10</option>
									<option value="15">Over $15</option>
									<option value="20">Over $20</option>
									<option value="30">Over $30</option>
									<option value="40">Over $40</option>
									<option value="50">Over $50</option>
									<option value="75">Over $75</option>
									<option value="100">Over $100</option>
								</select>
							</div>
						</div>
		 		
		 		</form>

				<?php } 
		 
		 		$store_num = isset($_GET['store_num']) ? $_GET['store_num']:'';
		 		$employee_name = isset($_POST['employee_name']) ? $_POST['employee_name']:'';
		 		$first_date = isset($_POST['first_date']) ? $_POST['first_date']:'';
		 		$second_date = isset($_POST['second_date']) ? $_POST['second_date']:'';
		 		$updown_greater = isset($_POST['updown_greater']) ? $_POST['updown_greater']:'';
		 		$updown_less = isset($_POST['updown_less']) ? $_POST['updown_less']:'';
		 		$promo = isset($_POST['promo']) ? $_POST['promo']:'';
		 		$tred = isset($_POST['tred']) ? $_POST['tred']:'';
				$refunds = isset($_POST['refunds']) ? $_POST['refunds']:'';
				$flagged = isset($_POST['flagged']) ? $_POST['flagged']:'';
				$comments = isset($_POST['comments']) ? $_POST['comments']:''; 

		 		$total_query = "WHERE store_num = '$store_num'";
		 			
		 			if(!empty($employee_name)){
		 				$total_query .= "AND employee_name = '$employee_name'";
		 			}
		 			if(!empty($first_date AND $second_date)){
		 				$total_query .= "AND date between '$first_date' AND '$second_date'";
		 			}
		 			if(!empty($updown_greater)){
		 				$total_query .= "AND cash > '$updown_greater'";
		 			}
		 			if(!empty($updown_less)){
		 				$total_query .= "AND cash < '$updown_less'";
		 			}
		 			if(!empty($promo)){
		 				$total_query .= "AND promo > '$promo'";
		 			}
		 			if(!empty($tred)){
		 				$total_query .= "AND tred > '$tred'";
		 			}
		 			if(!empty($refunds)){
		 				$total_query .= "AND refunds > '$refunds'";
					}
					if(!empty($flagged)){
						$total_query .= "AND flagged = '$flagged'";
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
								<th>Average Promo</th>
								<th>Total Treds</th>
								<th>Total Treds #</th>
								<th>Average Tred</th>
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

				$sql2 = "SELECT * FROM dailyentry $total_query ORDER by date DESC, employee_name LIMIT 0, $recordsdisplayed";
				//potential future query to run for a SUM line
				//$sumtotal = "SELECT SUM(tred),SUM(tred_num),SUM(promo),SUM(cash),SUM(refunds),SUM(refunds_num) FROM dailyentry $total_query";
	 		
				$run2 = mysqli_query($conn, $sql2);
				
				echo "
					<table class='table'>
						<thead>
							<tr>
								<hr>
								<th>Store</th>
								<th>Employee Name</th>
								<th>Date</th>
								<th>Cash +/-</th>															
								<th>Refunds</th>
								<th>#-Refunds</th>
								<th>Promo</th>
								<th>#-Promo</th>
								<th>TReds</th>
								<th>#-TReds</th>
								<th>Flagged</th>
								<th>Flag/Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows2 = mysqli_fetch_assoc($run2) ) {
				echo "
					<tr>
						<td>$rows2[store_num]</td>
						<td>$rows2[employee_name]</td>
						<td>$rows2[date]</td>
						<td>$rows2[cash]</td>					
						<td>$rows2[refunds]</td>
						<td>$rows2[refunds_num]</td>
						<td>$rows2[promo]</td>
						<td>$rows2[promo_num]</td>
						<td>$rows2[tred]</td>
						<td>$rows2[tred_num]</td>
						<td>$rows2[flagged]</td>
						<td><a href='records.php?edit_id=$rows2[id]' class='btn btn-flag'>Flag/Edit</a></td>
						<td><a href='records.php?del_id=$rows2[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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

<?php
	
	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM dailyentry WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "records.php";</script>
	<?php }	

	}

	//Updating or editing existing data

	if ( isset($_POST['edit_data']) ) {
		$edited_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_employee_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_employee_name']));
		$edit_date = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date']));
		$edit_tred = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tred']));
		$edit_tred_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tred_num']));
		$edit_promo = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promo']));
		$edit_promo_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promo_num']));
		$edit_cash = mysqli_real_escape_string($conn, strip_tags($_POST['edit_cash']));
		$edit_refunds = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refunds']));
		$edit_refunds_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refunds_num']));
		$edit_flagged = mysqli_real_escape_string($conn, strip_tags($_POST['edit_flagged']));
		$edit_comments = mysqli_real_escape_string($conn, strip_tags($_POST['edit_comments']));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE dailyentry SET store_num = '$edit_store_num', employee_name = '$edit_employee_name', date = '$edit_date', tred = '$edit_tred', tred_num = '$edit_tred_num', promo = '$edit_promo', promo_num = '$edit_promo_num', cash = '$edit_cash', refunds = '$edit_refunds', refunds_num = '$edit_refunds_num', flagged = '$edit_flagged', comments = '$edit_comments', edited_ip = '$edited_ip', edited_date = '$currentday' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'records.php';</script>
		<?php } 

	}



?>
