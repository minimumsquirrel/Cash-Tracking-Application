<?php
	 // Connects to the Database 
 	include "sql_connection.php";
 	include "header.php";
   require "login/loginheader.php";
   include "globalformat.php";
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
    

  </head>
 	<body>
 		<div class="container">
		 	<div class="col-md-12">
       <br></br>
				<h3>
					Cash Tracking Program:
					<small class="text-muted">Settings</small>
				</h3>
				<hr>
			</div>
      
      <form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
              <h4>Daily Entry Settings</h4>
						  <div class="form-group">
								<label># Monthly Records Displayed</label>
								<input type ="text" name="edit_recordsdisplayed" value="<?php echo $recordsdisplayed; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label># Daily Entry Records Displayed</label>
								<input type ="text" name="edit_dailyentrydisplayed" value="<?php echo $dailyentrydisplayed; ?>" class="form-control" required>
							</div>
              <div class="form-group">
								<label>Admin Email</label>
								<input type ="text" name="edit_adminemail" value="<?php echo $adminemail; ?>" class="form-control" required>
							</div>
              <div class="form-group">
									<label>Administrator Emails</label>
									<textarea name="edit_administrators" rows="7" class="form-control" placeholder="Administrator Emails" required><?php echo $administrators; ?></textarea>
							</div>
					</div>
          <div class="form-group col-md-6">
              <h4>Email Reporting Settings</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Cash Missing Value</label>
                  <input type ="text" name="edit_cashmissingvalue" value="<?php echo $cashmissingvalue; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Cash Missing Label</label>
                  <input type ="text" name="edit_cashmissinglabel" value="<?php echo $cashmissinglabel; ?>" class="form-control" disabled>
                </div>
              </div>
              <div class="form-group">
                <label>Promo Value</label>
                <input type ="text" name="edit_promovalue" value="<?php echo $promovalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Refund Value</label>
                <input type ="text" name="edit_refundsvalue" value="<?php echo $refundsvalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>TRed Value</label>
                <input type ="text" name="edit_tredsvalue" value="<?php echo $tredsvalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Daily Email Subject</label>
                <input type ="text" name="edit_emailsubject" value="<?php echo $emailsubject; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Monthly Email Subject</label>
                <input type ="text" name="edit_emailsubjectmonthly" value="<?php echo $emailsubjectmonthly; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <hr>
                <input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
                <input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
          </div>
        </div>
			</form>
      <form method="post">
				<div class="row row-grid">
					<div class="form-group col-md-6">
              <h4>Daily Entry Settings</h4>
						  <div class="form-group">
								<label># Monthly Records Displayed</label>
								<input type ="text" name="edit_recordsdisplayed" value="<?php echo $recordsdisplayed; ?>" class="form-control" required>
							</div>
							<div class="form-group">
								<label># Daily Entry Records Displayed</label>
								<input type ="text" name="edit_dailyentrydisplayed" value="<?php echo $dailyentrydisplayed; ?>" class="form-control" required>
							</div>
              <div class="form-group">
								<label>Admin Email</label>
								<input type ="text" name="edit_adminemail" value="<?php echo $adminemail; ?>" class="form-control" required>
							</div>
              <div class="form-group">
									<label>Administrator Emails</label>
									<textarea name="edit_administrators" rows="7" class="form-control" placeholder="Administrator Emails" required><?php echo $administrators; ?></textarea>
							</div>
					</div>
          <div class="form-group col-md-6">
              <h4>Email Reporting Settings</h4>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Cash Missing Value</label>
                  <input type ="text" name="edit_cashmissingvalue" value="<?php echo $cashmissingvalue; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label>Cash Missing Label</label>
                  <input type ="text" name="edit_cashmissinglabel" value="<?php echo $cashmissinglabel; ?>" class="form-control" disabled>
                </div>
              </div>
              <div class="form-group">
                <label>Promo Value</label>
                <input type ="text" name="edit_promovalue" value="<?php echo $promovalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Refund Value</label>
                <input type ="text" name="edit_refundsvalue" value="<?php echo $refundsvalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>TRed Value</label>
                <input type ="text" name="edit_tredsvalue" value="<?php echo $tredsvalue; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Daily Email Subject</label>
                <input type ="text" name="edit_emailsubject" value="<?php echo $emailsubject; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Monthly Email Subject</label>
                <input type ="text" name="edit_emailsubjectmonthly" value="<?php echo $emailsubjectmonthly; ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <hr>
                <input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
                <input type ="submit" value="Edit Complete" name="edit_data" class="btn btn-submit">
						</div>
          </div>
        
			</form>
      
		</div>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>

<?php 

	if ( isset($_POST['edit_data']) ) {
    $edit_recordsdisplayed = mysqli_real_escape_string($conn, strip_tags($_POST['edit_recordsdisplayed']));
    $edit_dailyentrydisplayed = mysqli_real_escape_string($conn, strip_tags($_POST['edit_dailyentrydisplayed']));
    $edit_adminemail = mysqli_real_escape_string($conn, strip_tags($_POST['edit_adminemail']));
    $edit_cashmissingvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_cashmissingvalue']));
    $edit_promovalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promovalue']));
    $edit_refundsvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refundsvalue']));
    $edit_tredsvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tredsvalue']));
    $edit_emailsubject = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailsubject']));
    $edit_emailsubjectmonthly = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailsubjectmonthly']));
    

    $edit_sql = "UPDATE globalformat SET variable_value = CASE 
    
    WHEN variable_name='recordsdisplayed' THEN '$edit_recordsdisplayed' 
    WHEN variable_name='dailyentrydisplayed' THEN '$edit_dailyentrydisplayed'
    WHEN variable_name='cashmissingvalue' THEN '$edit_cashmissingvalue'
    WHEN variable_name='promovalue' THEN '$edit_promovalue'
    WHEN variable_name='refundsvalue' THEN '$edit_refundsvalue'
    WHEN variable_name='tredsvalue' THEN '$edit_tredsvalue'
    WHEN variable_name='emailsubject' THEN '$edit_emailsubject'
    WHEN variable_name='emailsubjectmonthly' THEN '$edit_emailsubjectmonthly'
    ELSE variable_value END";
    
    
    
    if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'globalformatinput.php';</script>
		<?php } 

	}
