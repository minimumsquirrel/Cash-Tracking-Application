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
	<!-- Script to check before deleting entries in the data table -->

		<script language="JavaScript" type="text/javascript">
			function checkDelete(){
				return confirm('Confirm that you want to delete this record?');
			}
		</script>

	<!-- End of script to check before deleting entries in the data table -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CTS</title>

    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/updated.css" rel="stylesheet">
    


    <script language=JavaScript>
	
	function reload(form)
	{
	var val=form.store_num.options[form.store_num.options.selectedIndex].value;
	self.location='phonebookentry.php?store_num=' + val ;
	}
	
	</script>




  </head>
 	<body>  		

		<div class="container">
			<br></br> 
			<div class="form-row"> 
						<div class="col-md-6">
							<div class="alert alert-dismissible alert-primary">								
								<strong>Step 1.</strong> Phonebook Entry. <a href="phonebookentry.php" class="alert-link">Enter phonebook entries on this page.</a> These entries will be stored in your stores phonebook but are able to be viewed by everyone in the market!
							</div>								
						</div>
						<div class="form-group col-md-6">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 2.</strong> Records Review. <a href="phonebookrecords.php" class="alert-link">Review all phonebook entries on this page.</a> You can search by any of the options listed. Other stores in your market may have numbers you can use.
							</div>					
						</div>
			</div> 

 		<div class="container">
		 	<div class="col-md-12">
				<h3>
					Phonebook:
					<small class="text-muted">Entry</small>
				</h3>
				<hr>
			</div>


 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM phonebook WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
						$store_num = $rows['store_num'];
						$contact_type = $rows['contact_type'];
						$name = $rows['name'];
 						$company_name = $rows['company_name'];
 						$email = $rows['email'];
 						$phone_num = $rows['phone_num']; 						
 						$comments = $rows['comments'];
						
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
							<label>Contact Type</label>
							<input type ="text" name="edit_contact_type" value="<?php echo $contact_type; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type ="text" name="edit_name" value="<?php echo $name; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Company Name</label>
							<input type ="text" name="edit_company_name" value="<?php echo $company_name; ?>" class="form-control">
						</div>
						<div class="form-group">
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
							<input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type ="email" name="edit_email" value="<?php echo $email; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type ="text" name="edit_phone_num" value="<?php echo $phone_num; ?>" class="form-control">
						</div>	 			
						<div class="form-group">
							<label>Comments</label>
							<textarea name="edit_comments" rows="5" class="form-control" placeholder="Comments"><?php echo $comments; ?></textarea>
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
						<div class="form-group">
							<label>Contact Type</label>
							<select class="form-control" name="contact_type" required><option value=''>Select One</option>

								<?php
								$menu=" "; 

								//selection query
								$sqli="SELECT contact_type FROM phonebookcontype"; 

								//odbc_exec($conn,$sqli);
								$rs = mysqli_query($conn, $sqli);
									
										if (mysqli_num_rows($rs) > 0) {
									// output data of each row
									while($row = mysqli_fetch_assoc($rs)) {
										$menu .= "<option value=".$row['contact_type'].">" . $row['contact_type']. "</option>";
											}
										}
										echo $menu;
											
								?> 
							</select>
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type ="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label>Company Name</label>
							<input type ="text" name="company_name" class="form-control">
						</div>
						<div class="form-group">
							<input type ="submit" name="submit_data" class="btn btn-submit">
						</div>
					</div>
					<div class="form-group col-md-6">
						<div class="form-group">
							<label>Email</label>
							<input type ="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label>Phone Number</label>
							<input type ="text" name="phone_num" class="form-control" required>
						</div>		 			
						<div class="form-group">
							<label>Comments</label>
							<textarea name="comments" rows="5" class="form-control" placeholder="Comments"></textarea>
						</div>
					</div>
				</div>	
		 	</form>
		</div>

		 	<?php } 

				$store_num = isset($_GET['store_num']) ? $_GET['store_num']:'*';
	 			$sql = "SELECT * FROM phonebook WHERE store_num = '$store_num'";
				$run = mysqli_query($conn, $sql);

				echo "
					<table class='table'>
						<thead>
							<tr>
								<hr>	
								<th>Contact Type</th>
								<th>Name</th>
								<th>Company Name</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Store Number</th>
								<th>Comments</th>								
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td>$rows[contact_type]</td>
						<td>$rows[name]</td>
						<td>$rows[company_name]</td>
						<td>$rows[email]</td>
						<td>$rows[phone_num]</td>
						<td>$rows[store_num]</td>
						<td>$rows[comments]</td>						
						<td><a href='phonebookentry.php?edit_id=$rows[id]' class='btn btn-submit'>Edit</a></td>
						<td><a href='phonebookentry.php?del_id=$rows[id]' class='btn btn-secondary' onclick='return checkDelete()'>Delete</a></td>
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
	//Inserting new data

	if( isset($_POST['submit_data']) ) {

		$store_num = mysqli_real_escape_string($conn, strip_tags($_POST['store_num']));
		$contact_type = mysqli_real_escape_string($conn, strip_tags($_POST['contact_type']));
		$name = mysqli_real_escape_string($conn, strip_tags($_POST['name']));
		$company_name = mysqli_real_escape_string($conn, strip_tags($_POST['company_name']));
		$email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
		$phone_num = mysqli_real_escape_string($conn, strip_tags($_POST['phone_num']));
		$comments = mysqli_real_escape_string($conn, strip_tags($_POST['comments']));		
		$ins_sql = "INSERT INTO phonebook (store_num, contact_type, name, company_name, email, phone_num, comments) VALUES ('$store_num', '$contact_type', '$name', '$company_name', '$email', '$phone_num', '$comments')";
		
		if (mysqli_query($conn, $ins_sql)) { ?>
			<script>window.location = "phonebookentry.php";</script>
		<?php }

	}

	//Deleting data

	if( isset($_GET['del_id']) ) {
		$del_sql = "DELETE FROM phonebook WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "phonebookentry.php";</script>
	<?php }	

	}

	//Updating or editing existing data
	if ( isset($_POST['edit_data']) ) {
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_contact_type = mysqli_real_escape_string($conn, strip_tags($_POST['edit_contact_type']));
		$edit_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_name']));
		$edit_company_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_company_name']));
		$edit_email = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email']));
		$edit_phone_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phone_num']));
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_comments = mysqli_real_escape_string($conn, strip_tags($_POST['edit_comments']));		
		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE phonebook SET store_num = '$edit_store_num', contact_type = '$edit_contact_type', name = '$edit_name',
		company_name = '$edit_company_name', email = '$edit_email', phone_num = '$edit_phone_num', store_num = '$edit_store_num', 
		comments = '$edit_comments' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'phonebookentry.php';</script>
		<?php } 

	}

	

?>