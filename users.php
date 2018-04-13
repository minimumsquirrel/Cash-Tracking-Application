<?php
	 // Connects to the Database 
 	include "sql_connection.php";
  	require "login/loginheader.php";
  	include "header.php";
  	include "globalformat.php";
	 
	if($_SESSION['username'] == 'admin') {
		// your variable equals 'yes' do something
	}
	
	if($_SESSION['username'] != 'admin') {
		// your variable does not equal 'yes' do something
		return header("location:index.php");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 	<body>
 		<div class="container">
 			<div>
 				<br></br>
 				<h2 class="col-md-6">Admin Controlled User Entry Form</h2>
 			</div>

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM members WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$username = $rows['username'];
 						$password = $rows['password'];
 						$email = $rows['email'];
 						$contactnum = $rows['contactnum'];
 						$verified = $rows['verified'];
 						$realname = $rows['realname'];
 						
 					}
 					?>

 					<h3 class='col-md-6'>Edit</h3>
	 		<form class="col-md-6" method="post">
	 			<div class="form-group">
	 				<label>Username</label>
	 				<input type ="text" name="edit_username" value="<?php echo $username; ?>" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Password</label>
	 				<input type ="password" name="edit_password" value="<?php echo $password; ?>" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Email</label>
	 				<input type ="email" name="edit_email" value="<?php echo $email; ?>" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Contact Number</label>
	 				<input type ="test" name="edit_contactnum" value="<?php echo $contactnum; ?>" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Verified</label>
	 				<select name="edit_verified" class="form-control" required>
	 						<option value="1">Yes</option>
	 						<option value="0">No</option>
	 				</select>
	 			</div>
	 			<div class="form-group">
	 				<label>Name</label>
	 				<input type ="text" name="edit_realname" value="<?php echo $realname; ?>" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
	 				<input type ="submit" value="Edit Complete" name="edit_user" class="btn btn-submit">
	 			</div>
	 		</form>
	 			
 	 		<?php } else { ?> 


 	 		<form class="col-md-6" method="post">
	 			<div class="form-group">
	 				<label>Username</label>
	 				<input type ="text" name="username" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Password</label>
	 				<input type ="password" name="password" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Email</label>
	 				<input type ="email" name="email" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Contact Number</label>
	 				<input type ="text" name="contactnum" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<label>Verified</label>
	 				<select class="form-control" name="verified" required>
	 						<option value="1">Yes</option>
	 						<option value="0">No</option>
	 				</select>
	 			</div>
	 			<div class="form-group">
	 				<label>Name</label>
	 				<input type ="text" name="realname" class="form-control" required>
	 			</div>
	 			<div class="form-group">
	 				<input type ="submit" name="submit_user" class="btn btn-primary">
	 			</div>
	 		</form>

	 	<?php } 

	 			$sql = "SELECT * FROM members";
				$run = mysqli_query($conn, $sql);
	
				echo "
					<table class='table'>
						<thead>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Email</th>
								<th>Contact Number</th>
								<th>Verified</th>
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
						<td>$rows[username]</td>
						<td>$rows[password]</td>
						<td>$rows[email]</td>
						<td>$rows[contactnum]</td>
						<td>$rows[verified]</td>
						<td>$rows[realname]</td>
						<td><a href='users.php?edit_id=$rows[id]' class='btn btn-primary'>Edit</a></td>
						<td><a href='users.php?del_id=$rows[id]' class='btn btn-secondary'>Delete</a></td>
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
		$contactnum = mysqli_real_escape_string($conn, strip_tags($_POST['contactnum']));
		$verified = mysqli_real_escape_string($conn, strip_tags($_POST['verified']));
		$realname = mysqli_real_escape_string($conn, strip_tags($_POST['realname']));
		$ins_sql2 = "INSERT INTO members (username, password, email, contactnum, verified, realname) VALUES ('$username', '$password', '$email', '$contactnum', '$verified', '$realname')";
		
		if (mysqli_query($conn, $ins_sql2)) { ?>
			<script>window.location = "users.php";</script>
		<?php }

	}

	//Deleting a user

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM members WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "users.php";</script>
	<?php }	

	}

	//Updating or editing existing user 
	if ( isset($_POST['edit_user']) ) {
		$edit_username = mysqli_real_escape_string($conn, strip_tags($_POST['edit_username']));
		$edit_password = password_hash($_POST['edit_password'], PASSWORD_DEFAULT);
		$edit_email = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email']));
		$edit_contactnum = mysqli_real_escape_string($conn, strip_tags($_POST['edit_contactnum']));
		$edit_verified = mysqli_real_escape_string($conn, strip_tags($_POST['edit_verified']));
		$edit_realname = mysqli_real_escape_string($conn, strip_tags($_POST['edit_realname']));
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE members SET username = '$edit_username', password = '$edit_password', email = '$edit_email', contactnum = '$edit_contactnum', verified = '$edit_verified', realname = '$edit_realname' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'users.php';</script>
		<?php } 

	}

?>