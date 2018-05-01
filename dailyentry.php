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
	self.location='dailyentry.php?store_num=' + val ;
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

	<?php

	//Check to make sure store number access is in same group as user group

	$stored_num = isset($_GET['store_num']) ? $_GET['store_num']:$default_store;
	$sql_organization = "SELECT * FROM stores WHERE store_num = '$stored_num'";
		  $run_organization = mysqli_query($conn, $sql_organization);
		  while ( $rows = mysqli_fetch_assoc($run_organization) ) {
			  $store_organization = $rows['store_organization'];
	  }
	  
	  if($user_organization != $store_organization) {
		// your variable does not equal 'yes' do something
		return header("location:index.php");
		exit;
	  }

	//End of Check

	?>
	

  </head>
 	<body>
  		
	 		<div class="container">
				<br></br> 
				<div class="form-row"> 
					<div class="col-md-4">
						<div class="alert alert-dismissible alert-primary">								
							<strong>Step 1.</strong> Daily Entry. <a href="dailyentry.php" class="alert-link">Enter daily information on this page.</a> Enter details daily, then to review the entries proceed to step 2.
						</div>								
					</div>
					<div class="form-group col-md-4">
						<div class="alert alert-dismissible alert-secondary">								
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
						<small class="text-muted">Daily Entry Form</small>
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
						$organization = $rows['organization']; 
					 }
					 
					if($user_organization != $organization) {
						// your variable does not equal 'yes' do something
						return header("location:dailyentry.php");
						exit;
					}
 					?>

 		
	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
							<div class="form-group">
								<label>Store Number</label>
								<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control" disabled>
							</div>
							<div class="form-group">
								<label>Employee Name (Last,First)</label>
								<input type ="text" name="edit_employee_name" value="<?php echo $employee_name; ?>" class="form-control" disabled>
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
								<input type ="text" name="edit_promo_num" value="<?php echo $promo_num; ?>" class="form-control" required>
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
						<div class="form-group">
					 		<hr>
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>
				</form>
			</div>
	 			
 	 		<?php } else { ?> 


 	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Store</label>

								<?Php

								
								$query2="SELECT DISTINCT store_name,store_num FROM stores WHERE store_organization = '$user_organization' order by store_name"; 
														
								//First drop down box
								echo "<select action='employeenamedd.php' class='form-control' name='store_num' onchange=\"reload(this.form)\" required><option value=''>Select one</option>";
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

								echo "<select required action='employeenamedd.php' class='form-control' name='employee_name'><option value=''>Select one</option>";
								if(isset($cat) and strlen($cat) > 0){
								if($stmt = $conn->prepare("SELECT DISTINCT employee_name FROM employees where store_num=? order by employee_name")){
								$stmt->bind_param('i',$cat);
								$stmt->execute();
								$result = $stmt->get_result();
								while ($row1 = $result->fetch_assoc()) {
								echo  "<option value='$row1[employee_name]'>$row1[employee_name]</option>";
										}

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

						<div class="form-group">
							<label>Date (yyyy-mm-dd)</label>
							<input type ="date" name="date" class="form-control" value="<?php date_default_timezone_set("Canada/Atlantic"); echo date('Y-m-d'); ?>" required>
						</div>
						<div class="form-group">
							<label>Cash +/-</label>
							<input type ="text" name="cash" class="form-control" placeholder="Cash +/-" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Refunds</label>
								<input type ="text" name="refunds" class="form-control" placeholder="Refund $" required>
							</div>
						<div class="form-group col-md-6">
							<label>Number of Refunds</label>
							<input type ="text" name="refunds_num" class="form-control" placeholder="# of Refunds" required>
						</div>
						</div> 
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Promo</label>
								<input type ="text" name="promo" class="form-control" placeholder="Promo $" required>
							</div>
							<div class="form-group col-md-6">
								<label>Number of Promos</label>
								<input type ="text" name="promo_num" class="form-control" placeholder="# of Promos" required>
							</div>
						</div>
						<div class="form-row">   
							<div class="form-group col-md-6">
								<label>Treds</label>
								<input type ="text" name="tred" class="form-control" placeholder="Treds $" required>
							</div>  
							<div class="form-group col-md-6">
								<label>Number of Treds</label>
								<input type ="text" name="tred_num" class="form-control" placeholder="# of Treds" required>
							</div>
						</div>	 		 						 
						<div class="form-group">
							<hr>
							<input type ="submit" name="submit_data" class="btn btn-submit">
						</div>
					</div>
				</form>

				
				<?php } 

	 			$sql = "SELECT * FROM dailyentry WHERE organization = '$user_organization' ORDER BY date DESC, store_num, employee_name LIMIT 0, $dailyentrydisplayed";
				$run = mysqli_query($conn, $sql);

				echo "
					<table class='table table-hover table-sm w-auto'>
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
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td class='align-middle'>$rows[store_num]</td>
						<td class='align-middle'>$rows[employee_name]</td>
						<td class='align-middle'>$rows[date]</td>
						<td class='align-middle'>$rows[cash]</td>
						<td class='align-middle'>$rows[refunds]</td>
						<td class='align-middle'>$rows[refunds_num]</td>
						<td class='align-middle'>$rows[promo]</td>
						<td class='align-middle'>$rows[promo_num]</td>
						<td class='align-middle'>$rows[tred]</td>
						<td class='align-middle'>$rows[tred_num]</td>												
						<td class='align-middle'><a href='dailyentry.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
						<td class='align-middle'><a href='dailyentry.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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

<?php
	//Inserting new data

	if( isset($_POST['submit_data']) ) {
		
		$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$store_num = mysqli_real_escape_string($conn, strip_tags($_POST['store_num']));
		$employee_name = mysqli_real_escape_string($conn, strip_tags($_POST['employee_name']));
		$date = mysqli_real_escape_string($conn, strip_tags($_POST['date']));
		$tred = mysqli_real_escape_string($conn, strip_tags($_POST['tred']));
		$tred_num = mysqli_real_escape_string($conn, strip_tags($_POST['tred_num']));
		$promo = mysqli_real_escape_string($conn, strip_tags($_POST['promo']));
		$promo_num = mysqli_real_escape_string($conn, strip_tags($_POST['promo_num']));
		$cash = mysqli_real_escape_string($conn, strip_tags($_POST['cash']));
		$refunds = mysqli_real_escape_string($conn, strip_tags($_POST['refunds']));
		$refunds_num = mysqli_real_escape_string($conn, strip_tags($_POST['refunds_num']));
		$ins_sql = "INSERT INTO dailyentry (store_num, employee_name, date, date_entered, tred, tred_num, promo, promo_num, cash, refunds, refunds_num, entered_ip, organization, original_cash, original_tred, original_tred_num, original_promo, original_promo_num, original_refunds, original_refunds_num, original_date) VALUES ('$store_num', '$employee_name', '$date', '$currentday', '$tred', '$tred_num', '$promo', '$promo_num', '$cash', '$refunds', '$refunds_num', '$entered_ip', '$user_organization', '$cash', '$tred', '$tred_num', '$promo', '$promo_num', '$refunds', '$refunds_num', '$date')";
		
		if (mysqli_query($conn, $ins_sql)) { ?>
			<script>window.location = "dailyentry.php";</script>
		<?php }

	}

	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM dailyentry WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "dailyentry.php";</script>
	<?php }	

	}

	if ( isset($_POST['edit_data']) ) {
		$edited_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
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
		$edit_sql = "UPDATE dailyentry SET date = '$edit_date', tred = '$edit_tred', tred_num = '$edit_tred_num', promo = '$edit_promo', promo_num = '$edit_promo_num', cash = '$edit_cash', refunds = '$edit_refunds', refunds_num = '$edit_refunds_num', flagged = '$edit_flagged', comments = '$edit_comments', edited_ip = '$edited_ip', edited_date = '$currentday' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'dailyentry.php';</script>
		<?php } 

	}

	//Access Log Recording

	$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$stored_num;
	$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
	$ins_sql2 = isset($ins_sql) ? $ins_sql:'';
	$query = mysqli_real_escape_string($conn, strip_tags($ins_sql2));
	$edit_sql2 = isset($edit_sql) ? $edit_sql:'';
	$edit = mysqli_real_escape_string($conn, strip_tags($edit_sql2));

		$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization) VALUES ('$entered_ip', '$username_data', 'DailyEntry.php', '$store_num', '$query', '$edit', '$user_organization')";
    
    mysqli_query($conn, $ins_sql);


?>