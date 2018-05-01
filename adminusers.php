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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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


  </head>
 	<body>
	 	<br></br>
 		<div class="container">
		 <div class="col-md-12">
					<h3>
						Cash Tracking Program:
						<small class="text-muted">Member Enrollment</small>
					</h3>
					<hr>
				</div>

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM members WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$username = $rows['username'];
 						$password = $rows['password'];
						$email = $rows['email'];
						$organization = $rows['organization'];
 						$contactnum = $rows['contactnum'];
 						$verified = $rows['verified'];
						$realname = $rows['realname'];
						$default_store = $rows['default_store'];
 						
 					}
 					?>

 			
	 		<form method="post">
			 	<div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Username</label>
							<input type ="text" name="edit_username" autocomplete="off" value="<?php echo $username; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type ="password" name="edit_password" autocomplete="off" value="<?php echo $password; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input type ="text" name="edit_contactnum" value="<?php echo $contactnum; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Organization</label>
							<input type ="text" name="edit_organization" placeholder="Organization" value="<?php echo $organization; ?>" class="form-control" required>
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Name</label>
							<input type ="text" name="edit_realname" value="<?php echo $realname; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type ="email" name="edit_email" value="<?php echo $email; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Verified</label>
							<select name="edit_verified" class="form-control" required>
									<option value="1">Yes</option>
									<option value="0">No</option>
							</select>
						</div>
						<div class="form-group">
							<label>Default Store</label>
							<input type ="text" name="edit_default_store" value="<?php echo $default_store; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<hr>
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_user" class="btn btn-submit">
						</div>
					</div>
	 			</form>
	 			
 	 		<?php } else { ?> 


 	 		<form method="post">
			  <div class="row row-grid">
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Username</label>
							<input type ="text" name="username" autocomplete="off" placeholder="Username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type ="password" name="password" autocomplete="off" placeholder="Password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Contact Number</label>
							<input type ="text" name="contactnum" placeholder="Contact Number" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Organization</label>
							<input type ="text" name="organization" placeholder="Organization" class="form-control" required>
						</div>
					</div>
					<div class="form-group col md-6">
						<div class="form-group">
							<label>Name</label>
							<input type ="text" name="realname" placeholder="Name" class="form-control" required>
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input type ="email" name="email" placeholder="Email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Verified</label>
							<select class="form-control" name="verified" required>
									<option value="1">Yes</option>
									<option value="0">No</option>
							</select>
						</div>
						<div class="form-group">
							<label>Default Store</label>
							<input type ="text" name="default_store" placeholder="Default Store" class="form-control" required>
						</div>
						<div class="form-group">
						<hr>
							<input type ="submit" name="submit_user" class="btn btn-submit">
						</div>
					</div>
	 		</form>

	 	<?php } 

	 			$sql = "SELECT * FROM members ORDER BY organization, username";
				$run = mysqli_query($conn, $sql);
	
				echo "
					<table class='table table-striped table-hover table-sm w-auto'>
						<thead>
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Organization</th>
								<th>Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td class='align-middle'>$rows[username]</td>
						<td class='align-middle'>$rows[email]</td>
						<td class='align-middle'>$rows[contactnum]</td>
						<td class='align-middle'>$rows[organization]</td>
						<td class='align-middle'>$rows[realname]</td>
						<td class='align-middle'><a href='adminusers.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
						<td class='align-middle'><a href='adminusers.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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

	//Inserting new user

	if( isset($_POST['submit_user']) ) {

		$username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
		$organization = mysqli_real_escape_string($conn, strip_tags($_POST['organization']));
		$contactnum = mysqli_real_escape_string($conn, strip_tags($_POST['contactnum']));
		$verified = mysqli_real_escape_string($conn, strip_tags($_POST['verified']));
		$realname = mysqli_real_escape_string($conn, strip_tags($_POST['realname']));
		$default_store = mysqli_real_escape_string($conn, strip_tags($_POST['default_store']));
		$ins_sql2 = "INSERT INTO members (username, password, email, organization, contactnum, verified, realname, default_store) VALUES ('$username', '$password', '$email', '$organization', '$contactnum', '$verified', '$realname', '$default_store')";
		
		if (mysqli_query($conn, $ins_sql2)) { ?>
			<script>window.location = "adminusers.php";</script>
		<?php }

	}

	//Deleting a user

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM members WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "adminusers.php";</script>
	<?php }	

	}

	//Updating or editing existing user 
	if ( isset($_POST['edit_user']) ) {
		$edit_username = mysqli_real_escape_string($conn, strip_tags($_POST['edit_username']));
		$edit_password = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);
		$edit_email = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email']));
		$edit_organization = mysqli_real_escape_string($conn, strip_tags($_POST['edit_organization']));
		$edit_contactnum = mysqli_real_escape_string($conn, strip_tags($_POST['edit_contactnum']));
		$edit_verified = mysqli_real_escape_string($conn, strip_tags($_POST['edit_verified']));
		$edit_realname = mysqli_real_escape_string($conn, strip_tags($_POST['edit_realname']));
		$edit_default_store = mysqli_real_escape_string($conn, strip_tags($_POST['edit_default_store']));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE members SET username = '$edit_username', password = '$edit_password', email = '$edit_email', organization= '$edit_organization', contactnum = '$edit_contactnum', verified = '$edit_verified', realname = '$edit_realname', default_store = '$edit_default_store' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'adminusers.php';</script>
		<?php } 

	}

//Access Log Recording

	$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$stored_num;
	$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
	$ins_sql2 = isset($ins_sql) ? $ins_sql:'';
	$query = mysqli_real_escape_string($conn, strip_tags($ins_sql2));
	$edit_sql2 = isset($edit_sql) ? $edit_sql:'';
	$edit = mysqli_real_escape_string($conn, strip_tags($edit_sql2));

		$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization) VALUES ('$entered_ip', '$username_data', 'AdminUsers.php', '$store_num', '$query', '$edit', '$user_organization')";

	mysqli_query($conn, $ins_sql);

?>