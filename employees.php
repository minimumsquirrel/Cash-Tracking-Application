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
   
    <title>CTS</title>

    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/updated.css" rel="stylesheet">

<!-- Drop down script to select employees only from your own store number -->

	<script language=JavaScript>
				
		function reload(form)
		{
		var val=form.store_num.options[form.store_num.options.selectedIndex].value;
		self.location='employees.php?store_num=' + val ;
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
			$store_name = $rows['store_name'];
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
		 	<div class="col-md-12">
				<br></br> 
				<h3>
					Cash Tracking Program:
					<small class="text-muted">Employees - <?php echo $store_name ?></small>
				</h3>
				<hr>
			</div>

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM employees WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$store_num = $rows['store_num'];
 						$employee_name = $rows['employee_name'];
 						$date_hired = $rows['date_hired'];
						$active = $rows['active'];
						$organization = $rows['organization']; 
					}
					 
					if($user_organization != $organization) {
						// your variable does not equal 'yes' do something
						return header("location:employees.php");
						exit;
					
					}
 			?>

 		
	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Store</label>
							<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Employee Name (last,first)</label>
							<input type ="text" name="edit_employee_name" value="<?php echo $employee_name; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Date Hired</label>
							<input type ="date" name="edit_date_hired" value="<?php echo $date_hired; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Active Y/N</label>
							<input type ="text" name="edit_active" value="<?php echo $active; ?>" class="form-control" required>
						</div>
					</div>
				</div>

	 		</form>
	 			
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

								</select>
							</div>
						<div class="form-group">
							<label>Employee Name (last,first)(No Spaces)</label>
							<input type ="text" name="employee_name" class="form-control" required>
						</div>
						<div class="form-group">
							<input type ="submit" name="submit_employees" class="btn btn-submit">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Date Hired (yyyy-mm-dd)</label>
							<input type ="date" name="date_hired" class="form-control" value="<?php date_default_timezone_set("Canada/Atlantic"); echo date('Y-m-d'); ?>" required>
						</div>
						<div class="form-group">
							<label>Active Y/N</label>
							<select name="active" class="form-control" required>
									<option value="Y">Y</option>
									<option value="N">N</option>
							</select>
						</div>
					</div>
				</div>
			</form>
			<hr>
			
			<form method="post">
				<div class="row row-grid">
				<div class="form-group col-md-5">
						<div class="form-group">
							<select name="sort_employeename" class="form-control">
								<option value="employee_name">Sort by Employee Name</option>
								<option value="date_worked">Sort by Days Worked</option>
							</select>	
						</div>
					</div>
					<div class="form-group col-md-2">
						<div class="form-group">
							<input type ="submit" name="submit_sort" class="btn btn-submit">
						</div>
					</div>
				</div>

		
		
	 	
		 <?php } 
		 
		 
				$sort_employeename = isset($_POST['sort_employeename']) ? $_POST['sort_employeename']:'employee_name';
				$sql = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE store_num = '$stored_num' AND organization = '$user_organization' ORDER BY $sort_employeename";
				$run = mysqli_query($conn, $sql);
	
				echo "
					<table class='table table-striped table-hover table-sm w-auto'>
						<thead>
							<tr>
								<hr>
								<th>Store Number</th>
								<th>Employee Name</th>
								<th>Date Hired</th>
								<th>Days Employed</th>
								<th>Active</th>
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
							<td class='align-middle'>$rows[date_hired]</td>
							<td class='align-middle'>$rows[date_worked]</td>
							<td class='align-middle'>$rows[active]</td>
							<td class='align-middle'><a href='employees.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
							<td class='align-middle'><a href='employees.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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

	if( isset($_POST['submit_employees']) ) {
		
		$ip_entered = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$store_num = mysqli_real_escape_string($conn, strip_tags($_POST['store_num']));
		$employee_name = mysqli_real_escape_string($conn, strip_tags($_POST['employee_name']));
		$date_hired = mysqli_real_escape_string($conn, strip_tags($_POST['date_hired']));
		$active = mysqli_real_escape_string($conn, strip_tags($_POST['active']));
		$ins_sql = "INSERT INTO employees (store_num, organization, employee_name, date_hired, active, ip_entered, date_entered) VALUES ('$store_num', '$user_organization', '$employee_name', '$date_hired', '$active', '$ip_entered', '$currentday')";
		
		if (mysqli_query($conn, $ins_sql)) { ?>
			<script>window.location = "employees.php";</script>
		<?php }

	}

	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM employees WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "employees.php";</script>
	<?php }	

	}

	//Updating or editing existing data
	if ( isset($_POST['edit_data']) ) {
		$ip_edited = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_employee_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_employee_name']));
		$edit_date_hired = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_hired']));
		$edit_active = mysqli_real_escape_string($conn, strip_tags($_POST['edit_active']));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE employees SET store_num = '$edit_store_num', employee_name = '$edit_employee_name', date_hired = '$edit_date_hired', active = '$edit_active', ip_edited = '$ip_edited', date_edited = '$currentday' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'employees.php';</script>
		<?php } 

	}


//Access Log Recording

$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$stored_num;
$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$ins_sql2 = isset($ins_sql) ? $ins_sql:'';
$query = mysqli_real_escape_string($conn, strip_tags($ins_sql2));
$edit_sql2 = isset($edit_sql) ? $edit_sql:'';
$edit = mysqli_real_escape_string($conn, strip_tags($edit_sql2));

if ($_POST['edit_data']) {
	$edited = "Yes";
  }

if ($_POST['submit_employees']) {
	$submitted = "Yes";
  }

	$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization, edited, submitted) VALUES ('$entered_ip', '$username_data', 'Employees.php', '$stored_num', '$query', '$edit', '$user_organization', '$edited', '$submitted')";

mysqli_query($conn, $ins_sql);	

?>