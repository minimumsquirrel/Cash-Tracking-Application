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
	self.location='adminaccesslogs.php?store_num=' + val ;
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
						<small class="text-muted">Admin Access Entry/Edit Review</small>
					</h3>
					<hr>
				</div>

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM access_logs WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
						$store_num = $rows['selected_store'];
						$date_time = $rows['date_time'];
						$ip = $rows['ip'];
						$date = $rows['date_time'];
						$organization = $rows['organization'];
						$query = $rows['query'];
						$edit = $rows['edit'];
						$username = $rows['username'];
						$page = $rows['page'];
						
					 }
					 
					
 					?>

 		
	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Selected Store</label>
									<input type ="text" name="edit_selected_store" value="<?php echo $store_num; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Username</label>
									<input type ="text" name="edit_username" value="<?php echo $username; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
								<div class="form-group col-md-6">
									<label>Page</label>
									<input type ="text" name="edit_page" value="<?php echo $page; ?>" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Ip</label>
									<input type ="text" name="edit_ip" value="<?php echo $ip; ?>" class="form-control">
								</div>
						</div>
						<div class="form-row"> 
							<div class="form-group col-md-6">
								<label>Date</label>
								<input type="text" name="edit_date_time" value="<?php echo $date_time; ?>" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Organization</label>
								<input type ="text" name="edit_organization" value="<?php echo $organization; ?>" class="form-control">
							</div>
						</div>
						
						<div class="form-group">
					 		<hr>
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>
					<div class="form-group col-md-6">
						
						<div class="form-group">
							<label>Query</label>
							<textarea name="edit_query" rows="9" class="form-control" placeholder="Query"><?php echo $query; ?></textarea>
						</div>
						<div class="form-group">
							<label>Edit</label>
							<textarea name="edit_edit" rows="6" class="form-control" placeholder="Edit"><?php echo $edit; ?></textarea>
						</div>		
					</div>
				</form>
			</div>
	 			
 	 		<?php } else { ?> 


 	 		<form method="post">
				
			</form>

				
				<?php } 

				
	 			$sql = "SELECT * FROM access_logs WHERE edited = 'Yes' OR submitted = 'Yes' ORDER BY date_time, organization, page DESC LIMIT 0, $recordsdisplayed";
				$run = mysqli_query($conn, $sql);

				echo "
					<table class='table table-hover table-sm w-auto'>
						<thead>
							<tr>
								
								<th>Username</th>
								<th>Date</th>
								<th>Organization</th>
								<th>Selected Store</th>
								<th>Page</th>
								<th>Submitted</th>
								<th>Edited</th>

							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td class='align-middle'>$rows[username]</td>
						<td class='align-middle'>$rows[date_time]</td>
						<td class='align-middle'>$rows[organization]</td>
						<td class='align-middle'>$rows[selected_store]</td>
						<td class='align-middle'>$rows[page]</td>
						<td class='align-middle'>$rows[submitted]</td>
						<td class='align-middle'>$rows[edited]</td>
						<td class='align-middle'><a href='adminaccesslogs.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
						<td class='align-middle'><a href='adminaccesslogs.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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
		$del_sql = "DELETE FROM access_logs WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "adminaccesslogs.php";</script>
	<?php }	

	}

	if ( isset($_POST['edit_data']) ) {

		$edit_ip = mysqli_real_escape_string($conn, strip_tags($_POST['edit_ip']));
		$edit_date_time = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_time']));
		$edit_organization = mysqli_real_escape_string($conn, strip_tags($_POST['edit_organization']));
		$edit_query = mysqli_real_escape_string($conn, strip_tags($_POST['edit_query']));
		$edit_edit = mysqli_real_escape_string($conn, strip_tags($_POST['edit_edit']));
		$edit_username = mysqli_real_escape_string($conn, strip_tags($_POST['edit_username']));
		$edit_page = mysqli_real_escape_string($conn, strip_tags($_POST['edit_page']));
		$edit_selected_store = mysqli_real_escape_string($conn, strip_tags($_POST['edit_selected_store']));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = 
		
		"UPDATE access_logs SET 
		ip = '$edit_ip', 
		date_time = '$edit_date_time', 
		organization = '$edit_organization', 
		query = '$edit_query', 
		edit = '$edit_edit',
		username = '$edit_username',
		page = '$edit_page',
		selected_store = '$edit_selected_store'
		
		WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'adminaccesslogs.php';</script>
		<?php } 

	}

//Access Log Recording

$store_num = isset($_GET['store_num']) ? $_GET['store_num']:'';
$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$ins_sql2 = isset($ins_sql) ? $ins_sql:'';
$query = mysqli_real_escape_string($conn, strip_tags($ins_sql2));
$edit_sql2 = isset($edit_sql) ? $edit_sql:'';
$edit = mysqli_real_escape_string($conn, strip_tags($edit_sql2));

	$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization) VALUES ('$entered_ip', '$username_data', 'AdminDailyEntry.php', '$store_num', '$query', '$edit', '$user_organization')";

mysqli_query($conn, $ins_sql);
	

?>