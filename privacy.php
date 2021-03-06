<?php
	 // Connects to the Database 
   include "sql_connection.php";
   require "login/loginheader.php";
   include "globalformat.php";
   include "header.php";
   
 	
 ?>
  
<html lang="en">
  <head>
    <meta charset="UTF-8">
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
					<h3>
            <br></br>
						Cash Tracking Program:
						<small class="text-muted">Privacy Agreement</small>
					</h3>
					<hr>
				</div>
      <div>
        
       
        <div>
          

<h5>Privacy Notice</h5>

This privacy notice discloses the privacy practices for (website address). This privacy notice applies solely to 
information collected by this website. It will notify you of the following:
<br></br>
<p class="text-center font-italic">What personally identifiable information is collected from you through the website, how it is used and with whom it 
may be shared.</p>
<p class="text-center font-italic">What choices are available to you regarding the use of your data.</p>
<p class="text-center font-italic">The security procedures in place to protect the misuse of your information.</p>
<p class="text-center font-italic">How you can correct any inaccuracies in the information.</p>

<hr>

<h5>Information Collection, Use, and Sharing</h5>

We are the sole owners of the information collected on this site. We only have access to/collect information that you 
voluntarily give us via email or other direct contact from you. We will not sell or rent this information to anyone.
<br></br>
We will use your information to respond to you, regarding the reason you contacted us. We will not share your information 
with any third party outside of our organization, other than as necessary to fulfill your request, e.g. to ship an order.
<br></br>
Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, 
or changes to this privacy policy.
<br></br>

<hr>

<h5>Your Access to and Control Over Information</h5>

You may opt out of any future contacts from us at any time. You can do the following at any time by contacting us via the 
email address or phone number given on our website:
<br></br>
<p class="text-center font-italic">See what data we have about you, if any.</p>
<p class="text-center font-italic">Change/correct any data we have about you.</p>
<p class="text-center font-italic">Have us delete any data we have about you.</p>
<p class="text-center font-italic">Express any concern you have about our use of your data.</p>

<hr>

<h5>Security</h5>

We take precautions to protect your information. When you submit sensitive information via the website, your information 
is protected both online and offline.
<br></br>
Wherever we collect sensitive information, that information is encrypted and transmitted to 
us in a secure way. You can verify this by looking for a lock icon in the address bar and looking for "https" at the 
beginning of the address of the Web page.
<br></br>
While we use encryption to protect sensitive information transmitted online, we also protect your information offline. 
Only employees who need the information to perform a specific job (for example, billing or customer service) are granted 
access to personally identifiable information. The computers/servers in which we store personally identifiable 
information are kept in a secure environment.
<br></br>
If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at 
902-441-0580 or via <a href="mailto:admin@cashtracking.ca">email</a>. 

<hr>    

        </div>

	  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 	</body>
</html>

<?php

//Access Log Recording

$store_num = isset($_GET['store_num']) ? $_GET['store_num']:$default_store;
$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$ins_sql2 = isset($ins_sql) ? $ins_sql:'';


  $ins_sql = "INSERT INTO access_logs (ip, username, page, selected_store, organization) VALUES ('$entered_ip', '$username_data', 'Privacy.php', '$stored_num', '$user_organization')";

mysqli_query($conn, $ins_sql);	

?>
