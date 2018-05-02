<?php
	 // Connects to the Database 
 	include "sql_connection.php";
  require "login/loginheader.php";
  include "header.php";
  include "globalformat.php";

  if($_SESSION['access_level'] != 'admin') {
    if($_SESSION['access_level'] != 'superadmin') {
      // your variable does not equal 'yes' do something
      return header("location:index.php");
      exit;
    }
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
              <hr>
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
									<textarea name="edit_administrators" rows="7" class="form-control" placeholder="Administrator Emails"><?php echo $administrators; ?></textarea>
							</div>
					</div>
          <div class="form-group col-md-6">
              <h4>Email Reporting Settings</h4>
              <hr>
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
                <label>Employee Report: 90 Day Report Subject</label>
                <input type ="text" name="edit_emailsubject90" value="<?php echo $emailsubject90; ?>" class="form-control" required>
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
					<div class="form-group col-md-12">
            <hr>
            <h4>Store Settings</h4>
            <hr>
              <h5>Store 1</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename1" value="<?php echo $store1name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber1" value="<?php echo $store1; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber1" value="<?php echo $store1phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email1" value="<?php echo $store1email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive1" value="<?php echo $store1receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 2</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename2" value="<?php echo $store2name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber2" value="<?php echo $store2; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber2" value="<?php echo $store2phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email2" value="<?php echo $store2email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive2" value="<?php echo $store2receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 3</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename3" value="<?php echo $store3name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber3" value="<?php echo $store3; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber3" value="<?php echo $store3phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email3" value="<?php echo $store3email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive3" value="<?php echo $store3receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 4</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename4" value="<?php echo $store4name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber4" value="<?php echo $store4; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber4" value="<?php echo $store4phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email4" value="<?php echo $store4email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive4" value="<?php echo $store4receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 5</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename5" value="<?php echo $store5name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber5" value="<?php echo $store5; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber5" value="<?php echo $store5phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email5" value="<?php echo $store5email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive5" value="<?php echo $store5receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 6</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename6" value="<?php echo $store6name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber6" value="<?php echo $store6; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber6" value="<?php echo $store6phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email6" value="<?php echo $store6email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive6" value="<?php echo $store6receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 7</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename7" value="<?php echo $store7name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber7" value="<?php echo $store7; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber7" value="<?php echo $store7phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email7" value="<?php echo $store7email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive7" value="<?php echo $store7receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 8</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename8" value="<?php echo $store8name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber8" value="<?php echo $store8; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber8" value="<?php echo $store8phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email8" value="<?php echo $store8email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive8" value="<?php echo $store8receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 9</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename9" value="<?php echo $store9name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber9" value="<?php echo $store9; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber9" value="<?php echo $store9phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email9" value="<?php echo $store9email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive9" value="<?php echo $store9receive; ?>" class="form-control" required>
                </div>
              </div>

              <h5>Store 10</h5>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label>Store Name</label>
                  <input type ="text" name="edit_storename10" value="<?php echo $store10name; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Store Number</label>
                  <input type ="text" name="edit_storenumber10" value="<?php echo $store10; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Phone Number</label>
                  <input type ="text" name="edit_phonenumber10" value="<?php echo $store10phone; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-3">
                  <label>E-Mail</label>
                  <input type ="text" name="edit_email10" value="<?php echo $store10email; ?>" class="form-control" required>
                </div>
                <div class="form-group col-md-2">
                  <label>Email Reports (0=N 1=Y)</label>
                  <input type ="text" name="edit_emailreceive10" value="<?php echo $store10receive; ?>" class="form-control" required>
                </div>
              </div>
					</div>
          <div class="form-group col-md-6">
            <div class="form-group">
              <hr>
              <input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_user_id">
              <input type ="submit" value="Edit Complete" name="edit_data2" class="btn btn-submit">
              </div>
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
    $edit_administrators = mysqli_real_escape_string($conn, strip_tags($_POST['edit_administrators']));
    $edit_cashmissingvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_cashmissingvalue']));
    $edit_promovalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_promovalue']));
    $edit_refundsvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_refundsvalue']));
    $edit_tredsvalue = mysqli_real_escape_string($conn, strip_tags($_POST['edit_tredsvalue']));
    $edit_emailsubject = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailsubject']));
    $edit_emailsubjectmonthly = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailsubjectmonthly']));
    $edit_emailsubject90 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailsubject90']));
    

    $edit_sql = "UPDATE globalformat SET variable_value = CASE 
    
    WHEN variable_name='recordsdisplayed' THEN '$edit_recordsdisplayed' 
    WHEN variable_name='dailyentrydisplayed' THEN '$edit_dailyentrydisplayed'
    WHEN variable_name='adminemail' THEN '$edit_adminemail'
    WHEN variable_name='administrators' THEN '$edit_administrators'
    WHEN variable_name='cashmissingvalue' THEN '$edit_cashmissingvalue'
    WHEN variable_name='promovalue' THEN '$edit_promovalue'
    WHEN variable_name='refundsvalue' THEN '$edit_refundsvalue'
    WHEN variable_name='tredsvalue' THEN '$edit_tredsvalue'
    WHEN variable_name='emailsubject' THEN '$edit_emailsubject'
    WHEN variable_name='emailsubjectmonthly' THEN '$edit_emailsubjectmonthly'
    WHEN variable_name='emailsubject90' THEN '$edit_emailsubject90'
    ELSE variable_value END";
    
    
    
    if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'globalformatinput.php';</script>
		<?php } 

  }
  
  if ( isset($_POST['edit_data2']) ) {
    $edit_storename1 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename1']));
    $edit_storenumber1 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber1']));
    $edit_phonenumber1 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber1']));
    $edit_email1 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email1']));
    $edit_emailreceive1 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive1']));

    $edit_storename2 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename2']));
    $edit_storenumber2 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber2']));
    $edit_phonenumber2 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber2']));
    $edit_email2 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email2']));
    $edit_emailreceive2 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive2']));

    $edit_storename3 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename3']));
    $edit_storenumber3 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber3']));
    $edit_phonenumber3 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber3']));
    $edit_email3 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email3']));
    $edit_emailreceive3 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive3']));

    $edit_storename4 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename4']));
    $edit_storenumber4 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber4']));
    $edit_phonenumber4 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber4']));
    $edit_email4 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email4']));
    $edit_emailreceive4 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive4']));

    $edit_storename5 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename5']));
    $edit_storenumber5 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber5']));
    $edit_phonenumber5 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber5']));
    $edit_email5 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email5']));
    $edit_emailreceive5 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive5']));

    $edit_storename6 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename6']));
    $edit_storenumber6 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber6']));
    $edit_phonenumber6 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber6']));
    $edit_email6 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email6']));
    $edit_emailreceive6 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive6']));

    $edit_storename7 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename7']));
    $edit_storenumber7 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber7']));
    $edit_phonenumber7 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber7']));
    $edit_email7 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email7']));
    $edit_emailreceive7 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive7']));

    $edit_storename8 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename8']));
    $edit_storenumber8 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber8']));
    $edit_phonenumber8 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber8']));
    $edit_email8 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email8']));
    $edit_emailreceive8 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive8']));

    $edit_storename9 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename9']));
    $edit_storenumber9 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber9']));
    $edit_phonenumber9 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber9']));
    $edit_email9 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email9']));
    $edit_emailreceive9 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive9']));

    $edit_storename10 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storename10']));
    $edit_storenumber10 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_storenumber10']));
    $edit_phonenumber10 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_phonenumber10']));
    $edit_email10 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_email10']));
    $edit_emailreceive10 = mysqli_real_escape_string($conn, strip_tags($_POST['edit_emailreceive10']));
    
    

    $edit_sql2 = "UPDATE stores SET store_name = CASE 
    
    WHEN variable_name='store1' THEN '$edit_storename1' 
    WHEN variable_name='store2' THEN '$edit_storename2' 
    WHEN variable_name='store3' THEN '$edit_storename3' 
    WHEN variable_name='store4' THEN '$edit_storename4' 
    WHEN variable_name='store5' THEN '$edit_storename5' 
    WHEN variable_name='store6' THEN '$edit_storename6' 
    WHEN variable_name='store7' THEN '$edit_storename7' 
    WHEN variable_name='store8' THEN '$edit_storename8' 
    WHEN variable_name='store9' THEN '$edit_storename9' 
    WHEN variable_name='store10' THEN '$edit_storename10' 
    ELSE store_name END,
    
    store_num = CASE 
    
    WHEN variable_name='store1' THEN '$edit_storenumber1' 
    WHEN variable_name='store2' THEN '$edit_storenumber2'
    WHEN variable_name='store3' THEN '$edit_storenumber3'
    WHEN variable_name='store4' THEN '$edit_storenumber4'
    WHEN variable_name='store5' THEN '$edit_storenumber5'
    WHEN variable_name='store6' THEN '$edit_storenumber6'
    WHEN variable_name='store7' THEN '$edit_storenumber7'
    WHEN variable_name='store8' THEN '$edit_storenumber8'
    WHEN variable_name='store9' THEN '$edit_storenumber9'
    WHEN variable_name='store10' THEN '$edit_storenumber10' 
    ELSE store_num END,
    
    store_phone = CASE 
    
    WHEN variable_name='store1' THEN '$edit_phonenumber1' 
    WHEN variable_name='store2' THEN '$edit_phonenumber2'
    WHEN variable_name='store3' THEN '$edit_phonenumber3'
    WHEN variable_name='store4' THEN '$edit_phonenumber4'
    WHEN variable_name='store5' THEN '$edit_phonenumber5'
    WHEN variable_name='store6' THEN '$edit_phonenumber6'
    WHEN variable_name='store7' THEN '$edit_phonenumber7'
    WHEN variable_name='store8' THEN '$edit_phonenumber8'
    WHEN variable_name='store9' THEN '$edit_phonenumber9'
    WHEN variable_name='store10' THEN '$edit_phonenumber10' 
    ELSE store_phone END,
    
    store_email = CASE 
    
    WHEN variable_name='store1' THEN '$edit_email1' 
    WHEN variable_name='store2' THEN '$edit_email2'
    WHEN variable_name='store3' THEN '$edit_email3'
    WHEN variable_name='store4' THEN '$edit_email4'
    WHEN variable_name='store5' THEN '$edit_email5'
    WHEN variable_name='store6' THEN '$edit_email6'
    WHEN variable_name='store7' THEN '$edit_email7'
    WHEN variable_name='store8' THEN '$edit_email8'
    WHEN variable_name='store9' THEN '$edit_email9'
    WHEN variable_name='store10' THEN '$edit_email10' 
    ELSE store_email END";
    
    
    
    if(mysqli_query($conn, $edit_sql2)) { ?> 
			<script>window.location = 'globalformatinput.php';</script>
		<?php } 

  }

  //Access Log Recording

	$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$stored_num;
	$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
	$ins_sql2 = isset($edit_sql) ? $edit_sql:'';
	$query = mysqli_real_escape_string($conn, strip_tags($ins_sql2));
	$edit_sql2 = isset($edit_sql2) ? $edit_sql2:'';
  $edit = mysqli_real_escape_string($conn, strip_tags($edit_sql2));
  
  if ($_POST['edit_data']) {
		$edited = "Yes";
	  }

	if ($_POST['edit_data2']) {
		$edited = "Yes";
	  }

		$ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, query, edit, organization, edited, submitted) VALUES ('$entered_ip', '$username_data', 'GlobalFormatInput.php', '$store_num', '$query', '$edit', '$user_organization', '$edited', '$submitted')";
    
    mysqli_query($conn, $ins_sql);

