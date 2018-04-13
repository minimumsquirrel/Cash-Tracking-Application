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
	self.location='customersend.php?store_num=' + val ;
	}

	</script>
	<!-- End of drop down script for employee names by store number -->


  </head>
 	<body>

		<div class="container">
			<br></br> 
			<div class="form-row"> 
						<div class="col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 1.</strong> Customer Recovery Entry. <a href="customerentry.php" class="alert-link">Enter details on this page</a> and the appropriate manager will review it.
							</div>								
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-secondary">								
								<strong>Step 2.</strong> Customer Recovery Review. <a href="customerreview.php" class="alert-link">Review details on this page</a> before submitting to office for final review.
							</div>					
						</div>
						<div class="form-group col-md-4">
							<div class="alert alert-dismissible alert-primary">								
								<strong>Step 3.</strong> Customer Recovery Office Review. <a href="customersend.php" class="alert-link">For Office Use Only</a>. This is the final step before sending coupons!
							</div>					
						</div>
					</div>	
		
			<div class="container">
				<div class="col-md-12">
					<h3>
						Customer Recovery Program:
						<small class="text-muted">Office Review</small>
					</h3>
					<hr>
				</div>

		</div>	

 			<?php 
 			
 				if( isset($_GET['edit_id']) ){ 
 					$sql = "SELECT * FROM customer_recovery WHERE id = '$_GET[edit_id]'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$store_num = $rows['store_num'];
 						$manager_taking = $rows['manager_taking'];
 						$date = $rows['date'];
						$customer_name = $rows['customer_name'];
						$customer_phone = $rows['customer_phone']; 
 						$customer_street = $rows['customer_street'];
 						$customer_city = $rows['customer_city'];
						$customer_postal = $rows['customer_postal'];
						$details = $rows['details']; 
						$date_error = $rows['date_error'];
						$time_error = $rows['time_error'];
						$manager_onduty = $rows['manager_onduty'];
						$flag_reviewed = $rows['flag_reviewed'];
						$date_reviewed = $rows['date_reviewed'];
						$manager_comments = $rows['manager_comments'];
						$date_sent = $rows['date_sent'];
						$flag_sent = $rows['flag_sent'];
						$sent_by = $rows['sent_by'];
						$office_comments = $rows['office_comments']; 
 					}
 					?>

 					
	 				<form class="row row-grid" method="post">
			 			<div class="form-group col-md-6">
						<h4>Any Manager Entry</h4>
						<hr> 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Store Number</label>
									<input type ="text" name="edit_store_num" value="<?php echo $store_num; ?>" class="form-control" required>
								</div>
								<div class="form-group col-md-6">
									<label>Date of Complaint (yyyy-mm-dd)</label>
									<input type ="date" name="edit_date" value="<?php echo $date; ?>" class="form-control" placeholder="Date yyyy-mm-dd" required>
								</div>
							</div>
							<div class="form-group">
									<label>Manager Taking Complaint</label>
									<input type ="text" name="edit_manager_taking" value="<?php echo $manager_taking; ?>" class="form-control" placeholder="Manager Taking" required>
							</div>				 			
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Customer Name</label>
									<input type ="text" name="edit_customer_name" value="<?php echo $customer_name; ?>" class="form-control" placeholder="Customer Name"required>
								</div>
								<div class="form-group col-md-6">
									<label>Phone Number</label>
									<input type ="text" name="edit_customer_phone" value="<?php echo $customer_phone; ?>" class="form-control" placeholder="Phone Number" required>
								</div>
							</div> 
							<div class="form-group">
								<label>Mailing Address</label>
								<input type ="text" name="edit_customer_street" value="<?php echo $customer_street; ?>" class="form-control" placeholder="Customer Address" required>
							</div>
							<div class="form-row">   
								<div class="form-group col-md-6">
									<label>Town/City</label>
									<input type ="text" name="edit_customer_city" value="<?php echo $customer_city; ?>" class="form-control" placeholder="Town/City" required>
								</div>  
								<div class="form-group col-md-6">
									<label>Postal Code</label>
									<input type ="text" name="edit_customer_postal" value="<?php echo $customer_postal; ?>" class="form-control" placeholder="Postal Code" required>
								</div>						
							</div>
							<div class="form-group">
									<label>Details of Error (750 Characters)</label>
									<textarea name="edit_details" rows="5" class="form-control" placeholder="Details of Error" required><?php echo $details; ?></textarea>
							</div>		 			
							<div class="form-row">   
								<div class="form-group col-md-4">
									<label>Date of Error</label>
									<input type ="date" name="edit_date_error" value="<?php echo $date_error; ?>" class="form-control" placeholder="Date of Error" required>
								</div>  
								<div class="form-group col-md-4">
									<label>Time of Error</label>
									<input type ="text" name="edit_time_error" value="<?php echo $time_error; ?>" class="form-control" placeholder="Time of Error" required>
								</div>
								<div class="form-group col-md-4">
									<label>Manager on Duty</label>
									<input type ="text" name="edit_manager_onduty" value="<?php echo $manager_onduty; ?>" class="form-control" placeholder="Manager on Duty" required>
								</div>					
							</div>
						</div>
					 	
						<div class="form-row col-md-6">
							<div class="form-group col-md-12">
							<h4>Office Review</h4>
							<hr>
								<div class="form-row">
									<div class="form-group col-md-6">
											<label>Coupons Sent (Y/N)</label>
											<select class="form-control" name="edit_flag_sent" required>
												<option value=''>Select One</option>
												<option value="Y">Yes</option>
												<option value='N'>No</option>
											</select>
									</div> 
									<div class="form-group col-md-6">
										<label>Date Sent</label>
										<input type ="date" name="edit_date_sent" value="<?php echo $date_sent; ?>" class="form-control" placeholder="Date Sent" required>
									</div>
								</div>
								<div class="form-group">
									<label>Office Staff Reviewed By</label>
									<input type ="text" name="edit_sent_by" value="<?php echo $sent_by; ?>" class="form-control" placeholder="Sent By" required>
								</div>							
								<div class="form-group">
										<label>Office Comments</label>
										<textarea name="edit_office_comments" rows="5" class="form-control" placeholder="Office Comments" required><?php echo $office_comments; ?></textarea>
								</div>		 		 	 							
								

							<h4>Store Manager Review</h4>
							<hr>
								<div class="form-row">
									<div class="form-group col-md-6">
											<label>Store Manager Reviewed (Y/N)</label>
											<input type ="text" name="edit_flag_reviewed" value="<?php echo $flag_reviewed; ?>" class="form-control" placeholder="Flag Reviewed" required>
									</div> 
									<div class="form-group col-md-6">
										<label>Date Reviewed</label>
										<input type ="date" name="edit_date_reviewed" value="<?php echo $date_reviewed; ?>" class="form-control" placeholder="Date Reviewed" required>
									</div>
								</div>							
								<div class="form-group">
										<label>Additional Comments</label>
										<textarea name="edit_manager_comments" rows="5" class="form-control" placeholder="Additional Comments" required><?php echo $manager_comments; ?></textarea>
								</div>
								<hr>		 		 	 							
								<div class="form-group">
									<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
									<input type ="submit" value="Review Complete" name="edit_data" class="btn btn-submit">
								</div>
						</div>	
					</form>
				</div>
	 			
 	 		<?php } else { ?> 

			

		 	<?php } 

				
	 			$sql = "SELECT * FROM customer_recovery WHERE flag_reviewed = 'Y' and NOT flag_sent = 'Y' AND NOT flag_sent = 'N' ORDER BY date DESC LIMIT 0, 150";
				$run = mysqli_query($conn, $sql);

				echo "
					<table class='table'>
						<thead>
							<tr>
								<th>Store</th>
								<th>Date</th>
								<th>Customer Name</th>
								<th>Customer Phone</th>
								<th>Customer City</th>
								<th>Date of Error</th>									
								<th>Review</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
			
				";
				while($rows = mysqli_fetch_assoc($run) ) {
				echo "
					<tr>
						<td>$rows[store_num]</td>
						<td>$rows[date]</td>
						<td>$rows[customer_name]</td>
						<td>$rows[customer_phone]</td>
						<td>$rows[customer_city]</td>
						<td>$rows[date_error]</td>																	
						<td><a href='customersend.php?edit_id=$rows[id]' class='btn btn-primary'>Review</a></td>
						<td><a href='customersend.php?del_id=$rows[id]' class='btn btn-secondary'>Delete</a></td>
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
		$del_sql = "DELETE FROM customer_recovery WHERE id = '$_GET[del_id]' ";
		if(mysqli_query($conn, $del_sql)) { ?>
			<script>window.location = "customersend.php";</script>
	<?php }	

	}

	if ( isset($_POST['edit_data']) ) {
		$edit_store_num = mysqli_real_escape_string($conn, strip_tags($_POST['edit_store_num']));
		$edit_manager_taking = mysqli_real_escape_string($conn, strip_tags($_POST['edit_manager_taking']));
		$edit_date = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date']));
		$edit_customer_name = mysqli_real_escape_string($conn, strip_tags($_POST['edit_customer_name']));
		$edit_customer_phone = mysqli_real_escape_string($conn, strip_tags($_POST['edit_customer_phone']));
		$edit_customer_street = mysqli_real_escape_string($conn, strip_tags($_POST['edit_customer_street']));
		$edit_customer_city = mysqli_real_escape_string($conn, strip_tags($_POST['edit_customer_city']));
		$edit_customer_postal = mysqli_real_escape_string($conn, strip_tags($_POST['edit_customer_postal']));
		$edit_details = mysqli_real_escape_string($conn, strip_tags($_POST['edit_details']));
		$edit_date_error = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_error']));
		$edit_time_error = mysqli_real_escape_string($conn, strip_tags($_POST['edit_time_error']));
		$edit_manager_onduty = mysqli_real_escape_string($conn, strip_tags($_POST['edit_manager_onduty']));
		$edit_flag_reviewed = mysqli_real_escape_string($conn, strip_tags($_POST['edit_flag_reviewed']));
		$edit_date_reviewed = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_reviewed']));
		$edit_manager_comments = mysqli_real_escape_string($conn, strip_tags($_POST['edit_manager_comments']));
		$edit_flag_sent = mysqli_real_escape_string($conn, strip_tags($_POST['edit_flag_sent']));
		$edit_date_sent = mysqli_real_escape_string($conn, strip_tags($_POST['edit_date_sent']));
		$edit_sent_by = mysqli_real_escape_string($conn, strip_tags($_POST['edit_sent_by']));
		$edit_office_comments = mysqli_real_escape_string($conn, strip_tags($_POST['edit_office_comments']));



		$edit_id = $_POST['edit_user_id'];
		$edit_sql = "UPDATE customer_recovery SET store_num = '$edit_store_num', manager_taking = '$edit_manager_taking', date = '$edit_date', customer_name = '$edit_customer_name', customer_phone = '$edit_customer_phone', customer_street = '$edit_customer_street', customer_city = '$edit_customer_city', customer_postal = '$edit_customer_postal', details = '$edit_details', date_error = '$edit_date_error', time_error = '$edit_time_error', manager_onduty = '$edit_manager_onduty', flag_reviewed = '$edit_flag_reviewed', date_reviewed = '$edit_date_reviewed', manager_comments = '$edit_manager_comments', flag_sent = '$edit_flag_sent', date_sent = '$edit_date_sent', sent_by = '$edit_sent_by', office_comments = '$edit_office_comments' WHERE id = '$edit_id' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'customersend.php';</script>
		<?php } 

	}


	

?>