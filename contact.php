<?php
	 // Connects to the Database 
  include "sql_connection.php";
  require "login/loginheader.php";
  include "header.php";
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
 		<div  class="container">
 			
      <div>
        <br></br>
      <div class="form-group col-md-8"> 

    <?php
      $statusMsg = '';
      $msgClass = '';
      if(isset($_POST['submit'])){
          // Get the submitted form data
          $email = $_POST['email'];
          $name = $_POST['name'];
          $subject = $_POST['subject'];
          $message = $_POST['message'];
          
          // Check whether submitted data is not empty
          if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
              
              if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                  $statusMsg = 'Please enter your valid email.';
                  $msgClass = 'errordiv';
              }else{
                  // Recipient email
                  $toEmail = $adminemail;
                  $emailSubject = 'Contact Request Submitted by '.$name;
                  $htmlContent = '<h2>Contact Request Submitted</h2>
                      <h4>Name</h4><p>'.$name.'</p>
                      <h4>Email</h4><p>'.$email.'</p>
                      <h4>Subject</h4><p>'.$subject.'</p>
                      <h4>Message</h4><p>'.$message.'</p>';
                  
                  // Set content-type header for sending HTML email
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  
                  // Additional headers
                  $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
                  
                  // Send email
                  if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                      $statusMsg = 'Your contact request has been submitted successfully !';
                      $msgClass = 'succdiv';
                  }else{
                      $statusMsg = 'Your contact request submission failed, please try again.';
                      $msgClass = 'errordiv';
                  }
              }
          }else{
              $statusMsg = 'Please fill all the fields.';
              $msgClass = 'errordiv';
          }
      }
    ?>


        <div class="col-md-12">
            <br></br>
            <h3>
              Cash Tracking System:
              <small class="text-muted">Contact Form</small>
            </h3>
            <hr>
				</div> 


        <div class="form-group">
          <div class="form-group">
              <?php if(!empty($statusMsg)){ ?>
                  <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
              <?php } ?>

          <form action="" method="post">
            <div class="row row-grid">
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="form-group">
                  <label>Email </label>
                  <input type="email" name="email" class="form-control" placeholder="email@example.com" required="">
                </div>
                <br></br>
                
                <input type="submit" class="btn btn-submit" name="submit" value="Submit">
                <div class="clear"> </div>
              </div>
              <div class="form-group col-md-6">
                <div class="form-group">
                  <label>Subject</label>
                  <select class="form-control" name="subject" required>
                          <option value=''>Select One</option>
                          <option value="Broken Feature">Broken Feature</option>
                          <option value="Login Issue">Login Issue</option>
                          <option value="Request">Request</option>
                          <option value="Suggestion">Suggestion</option>
                          <option value="Other">Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea name="message" rows="6" class="form-control" placeholder="Write your message here" required=""> </textarea>
                </div>
              </div>
            </div>
          </form>
        </div>
        <hr>
      </div>
      

      


	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>

<?php
	//Inserting new data

	if( isset($_POST['submit']) ) {
		
		$sender_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
		$name = mysqli_real_escape_string($conn, strip_tags($_POST['name']));
		$email = mysqli_real_escape_string($conn, strip_tags($_POST['email']));
		$subject = mysqli_real_escape_string($conn, strip_tags($_POST['subject']));
		$message = mysqli_real_escape_string($conn, strip_tags($_POST['message']));
		
		$ins_sql = "INSERT INTO contact_records (sender_ip, name, email, subject, message, date) VALUES ('$sender_ip', '$name', '$email', '$subject', '$message', '$currentday')";
		
		if (mysqli_query($conn, $ins_sql)) { ?>
			<script>window.location = "dailyentry.php";</script>
		<?php }

	}
