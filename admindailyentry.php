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

		
	
	//Storing selected store number's name

		$stored_num = isset($_GET['store_num']) ? $_GET['store_num']:$default_store;
		$sql_organization = "SELECT * FROM stores WHERE store_num = '$stored_num'";
			  $run_organization = mysqli_query($conn, $sql_organization);
			  while ( $rows = mysqli_fetch_assoc($run_organization) ) {
				  
				  $store_name = $rows['store_name'];
		  }
		  
	//End of storing

	

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
	self.location='admindailyentry.php?store_num=' + val ;
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
						<small class="text-muted">Admin Daily Entry Review - <?php echo $store_name ?></small>
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
						$original_date = $rows['original_date'];
						$date = $rows['date'];
						$original_cash = $rows['original_cash'];
						$cash = $rows['cash'];
						$original_tred = $rows['original_tred'];
						$tred = $rows['tred'];
						$original_tred_num = $rows['original_tred_num'];
						$tred_num = $rows['tred_num'];
						$original_promo = $rows['original_promo'];
						$promo = $rows['promo'];
						$original_promo_num = $rows['original_promo_num'];
						$promo_num = $rows['promo_num'];
						$original_refunds = $rows['original_refunds'];
						$refunds = $rows['refunds'];
						$original_refunds_num = $rows['original_refunds_num'];
						$refunds_num = $rows['refunds_num'];
						$date_entered = $rows['date_entered'];
						$date_edited = $rows['edited_date'];
						$entered_ip = $rows['entered_ip'];
						$edited_ip = $rows['edited_ip'];
						$flagged = $rows['flagged'];
						$comments = $rows['comments'];
						$organization = $rows['organization']; 
					 }
					 
					
 					?>

 		
	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Store Number</label>
									<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Employee Name</label>
									<input type ="text" name="edit_employee_name" value="<?php echo $employee_name; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original Date</label>
									<input type ="date" name="edit_original_date" value="<?php echo $original_date; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Date</label>
									<input type ="date" name="edit_date" value="<?php echo $date; ?>" class="form-control">
								</div>
						</div>	
						
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Date Entered</label>
									<input type ="date" name="edit_date_entered" value="<?php echo $date_entered; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Date Edited</label>
									<input type ="date" name="edit_date_edited" value="<?php echo $date_edited; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Entered IP</label>
									<input type ="text" name="edit_entered_ip" value="<?php echo $entered_ip; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Edited IP</label>
									<input type ="text" name="edit_edited_ip" value="<?php echo $edited_ip; ?>" class="form-control">
								</div>
						</div>
						<div class="form-group">
							<label>Flagged (yes/no)</label>
							<input type ="text" name="edit_flagged" value="<?php echo $flagged; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Comments</label>
							<textarea name="edit_comments" rows="5" class="form-control" placeholder="Comments" required><?php echo $comments; ?></textarea>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original Cash</label>
									<input type ="text" name="edit_original_cash" value="<?php echo $original_cash; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Cash</label>
									<input type ="text" name="edit_cash" value="<?php echo $cash; ?>" class="form-control">
								</div>
						</div>	
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original Tred</label>
									<input type ="text" name="edit_original_tred" value="<?php echo $original_tred; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Tred</label>
									<input type ="text" name="edit_tred" value="<?php echo $tred; ?>" class="form-control">
								</div>
						</div>	
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original # Tred</label>
									<input type ="text" name="edit_original_tred_num" value="<?php echo $original_tred_num; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label># Tred</label>
									<input type ="text" name="edit_tred_num" value="<?php echo $tred_num; ?>" class="form-control">
								</div>
						</div>	
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original Promo</label>
									<input type ="text" name="edit_original_promo" value="<?php echo $original_promo; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Promo</label>
									<input type ="text" name="edit_promo" value="<?php echo $promo; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original # Promo</label>
									<input type ="text" name="edit_original_promo_num" value="<?php echo $original_promo_num; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label># Promo</label>
									<input type ="text" name="edit_promo_num" value="<?php echo $promo_num; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original Refunds</label>
									<input type ="text" name="edit_original_refunds" value="<?php echo $original_refunds; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Refunds</label>
									<input type ="text" name="edit_refunds" value="<?php echo $refunds; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Original # Refunds</label>
									<input type ="text" name="edit_original_refunds_num" value="<?php echo $original_refunds_num; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label># Refunds</label>
									<input type ="text" name="edit_refunds_num" value="<?php echo $refunds_num; ?>" class="form-control">
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
					<div class="form-group col-md-12">
						<div class="form-group">
							<label>Store</label>

								<?Php

								
								$query2="SELECT DISTINCT store_name,store_num FROM stores order by store_name"; 
														
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
					</div>	
			</form>

				
				<?php } 

				$store_number = isset($_GET['store_num']) ? $_GET['store_num']:$default_store;
	 			$sql = "SELECT * FROM dailyentry WHERE store_num = '$store_number' ORDER BY date DESC, store_num, employee_name LIMIT 0, $recordsdisplayed";
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
						<td class='align-middle'><a href='admindailyentry.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
						<td class='align-middle'><a href='admindailyentry.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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
	
	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM dailyentry WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "admindailyentry.php";</script>
	<?php }	

	}

	if ( isset($_POST['edit_data']) ) {

		$store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$employee_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_employee_name']));
		$original_date = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_date']));
		$date = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date']));
		$original_cash = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_cash']));
		$cash = mysqli_real_escape_string($conn, strip_tags($_POST['edit_cash']));
		$original_tred = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_tred']));
		$tred = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tred']));
		$original_tred_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_tred_num']));
		$tred_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tred_num']));
		$original_promo = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_promo']));
		$promo = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promo']));
		$original_promo_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_promo_num']));
		$promo_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promo_num']));
		$original_refunds = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_refunds']));
		$refunds = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refunds']));
		$original_refunds_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_original_refunds_num']));
		$refunds_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refunds_num']));
		$date_entered = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_entered']));
		$date_edited = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_edited']));
		$entered_ip = mysqli_real_escape_string($conn, strip_tags($_POST['edit_entered_ip']));
		$edited_ip = mysqli_real_escape_string($conn, strip_tags($_POST['edit_edited_ip']));
		$flagged = mysqli_real_escape_string($conn, strip_tags($_POST['edit_flagged']));
		$comments = mysqli_real_escape_string($conn, strip_tags($_POST['edit_comments']));	
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = 
		
		"UPDATE dailyentry SET 
		store_num = '$store_num', 
		employee_name = '$employee_name', 
		original_date = '$original_date', 
		date = '$date', 
		date_entered = '$date_entered', 
		edited_date = '$date_edited', 
		original_cash = '$original_cash', 
		cash = '$cash',
		original_tred = '$original_tred', 
		tred = '$tred', 
		original_tred_num = '$original_tred_num', 
		tred_num = '$tred_num',
		original_promo = '$original_promo', 
		promo = '$promo', 
		original_promo_num = '$original_promo_num', 
		promo_num = '$promo_num',
		original_refunds = '$original_refunds', 
		refunds = '$refunds', 
		original_refunds_num = '$original_refunds_num',
		refunds_num = '$refunds_num', 
		entered_ip = '$entered_ip', 
		edited_ip = '$edited_ip', 
		flagged = '$flagged', 
		comments = '$comments' 
		
		WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'admindailyentry.php';</script>
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

	$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization, edited) VALUES ('$entered_ip', '$username_data', 'AdminDailyEntry.php', '$store_num', '$query', '$edit', '$user_organization', '$edited')";

mysqli_query($conn, $ins_sql);
	

?>