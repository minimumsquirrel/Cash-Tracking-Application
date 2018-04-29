<?php
	 // Connects to the Database 
 	include "sql_connection.php";
  	require "login/loginheader.php";
  	include "header.php";
	include "globalformat.php";
	  
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
   
    <title>CTS</title>

    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/updated.css" rel="stylesheet">

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
		 	<div class="col-md-12">
				<br></br> 
				<h3>
					Cash Tracking Program:
					<small class="text-muted">Stores</small>
				</h3>
				<hr>
			</div>

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM stores WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$store_num = $rows['store_num'];
 						$store_name = $rows['store_name'];
 						$store_email = $rows['store_email'];
						$store_phone = $rows['store_phone'];
						$store_organization = $rows['store_organization']; 
						$variable_name = $rows['variable_name']; 
						$email_receive = $rows['email_receive'];
					}
					 
					
 			?>

 		
	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Store Number</label>
							<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Name</label>
							<input type ="text" name="edit_store_name" value="<?php echo $store_name; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Email</label>
							<input type ="email" name="edit_store_email" value="<?php echo $store_email; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Phone</label>
							<input type ="text" name="edit_store_phone" value="<?php echo $store_phone; ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Organization</label>
							<input type ="text" name="edit_store_organization" value="<?php echo $store_organization; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Variable Name (Store_)</label>
							<input type ="text" name="edit_variable_name" value="<?php echo $variable_name; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email Receive (Y=1, N=0)</label>
							<input type ="text" name="edit_email_receive" value="<?php echo $email_receive; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>
				</div>

	 		</form>
	 			
 	 		<?php } else { ?> 


 	 		<form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Store Number</label>
							<input type ="text" name="store_num" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Name</label>
							<input type ="text" name="store_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Email</label>
							<input type ="email" name="store_email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Store Phone</label>
							<input type ="text" name="store_phone" class="form-control" required>
						</div>
					</div>
					<div class="form-group col-md-6">
					<div class="form-group">
							<label>Organization</label>
							<input type ="text" name="store_organization" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Variable Name (Store_)</label>
							<input type ="text" name="variable_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email Receive (Y=1, N=0)</label>
							<input type ="text" name="email_receive" class="form-control" required>
						</div>
						<div class="form-group">
							<input type ="submit" value="Edit Complete" name="submit" class="btn btn-submit">
						</div>
					</div>
				</div>
			</form>
			<hr>
			
		<?php } 
		 
		 		
	 			$sql = "SELECT * FROM stores ORDER BY store_organization, store_name";
				$run = mysqli_query($conn, $sql);
	
				echo "
					<table class='table table-hover table-sm w-auto'>
						<thead>
							<tr>
								<hr>
								<th>Store Number</th>
								<th>Store Name</th>
								<th>Store Email</th>
								<th>Store Phone</th>
								<th>Organization</th>
								<th>Variable Name</th>
								<th>Email Receive</th>
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
							<td class='align-middle'>$rows[store_name]</td>
							<td class='align-middle'>$rows[store_email]</td>
							<td class='align-middle'>$rows[store_phone]</td>
							<td class='align-middle'>$rows[store_organization]</td>
							<td class='align-middle'>$rows[variable_name]</td>
							<td class='align-middle'>$rows[email_receive]</td>
							<td class='align-middle'><a href='adminstores.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
							<td class='align-middle'><a href='adminstores.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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

	if( isset($_POST['submit']) ) {
		
		$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$store_num = mysqli_real_escape_string($conn, strip_tags($_POST['store_num']));
		$store_name = mysqli_real_escape_string($conn, strip_tags($_POST['store_name']));
		$store_email = mysqli_real_escape_string($conn, strip_tags($_POST['store_email']));
		$store_phone = mysqli_real_escape_string($conn, strip_tags($_POST['store_phone']));
		$store_organization = mysqli_real_escape_string($conn, strip_tags($_POST['store_organization']));
		$variable_name = mysqli_real_escape_string($conn, strip_tags($_POST['variable_name']));
		$email_receive = mysqli_real_escape_string($conn, strip_tags($_POST['email_receive']));
		$ins_sql = "INSERT INTO stores (store_num, store_name, store_email, store_phone, store_organization, variable_name, email_receive, entered_ip, date_entered) VALUES ('$store_num', '$store_name', '$store_email', '$store_phone', '$store_organization', '$variable_name', '$email_receive', '$entered_ip', '$currentday')";
		
		if (mysqli_query($conn, $ins_sql)) { ?>
			<script>window.location = "adminstores.php";</script>
		<?php }

	}

	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM stores WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "adminstores.php";</script>
	<?php }	

	}

	//Updating or editing existing data
	if ( isset($_POST['edit_data']) ) {
		
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_store_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_name']));
		$edit_store_email = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_email']));
		$edit_store_phone = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_phone']));
		$edit_store_organization = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_organization']));
		$edit_variable_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_variable_name']));
		$edit_email_receive = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email_receive']));
		$edited_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE stores SET store_num = '$edit_store_num', store_name = '$edit_store_name', store_email = '$edit_store_email', store_phone = '$edit_store_phone', store_organization = '$edit_store_organization', variable_name = '$edit_variable_name', email_receive = '$edit_email_receive', edited_ip = '$edited_ip', date_edited = '$currentday' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'adminstores.php';</script>
		<?php } 

	}

?>