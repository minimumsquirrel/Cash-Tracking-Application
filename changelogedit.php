<?php
	 // Connects to the Database 
   include "sql_connection.php";
   require "login/loginheader.php";
   include "header.php";
   include "globalformat.php";

   if($_SESSION['access_level'] == 'admin') {
    // your variable equals 'yes' do something
}

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
			<br></br> 
			<div class="form-row"> 
						<div class="col-md-12">
              <div class="alert alert-dismissible alert-primary">								
								<strong><center>Changelog</strong> tracks all the changes made to the tracking system. Any updates to the system
                will be recorded here. </center>
              </div>									
						</div>
      </div> 
 		
  <div class="row">
    <div class="col-md-6 col-md-offset-5"></div>
      <br></br>
      <h3>Changelog</h3>
    </div>
  <form method="post">
        <?php 
          $sql = "SELECT * FROM changelog WHERE id = '1'";
 					$run = mysqli_query($conn, $sql);
 					while ( $rows = mysqli_fetch_assoc($run) ) {
 						$changelog = $rows['changelog'];
 					}
 				?>
    <div class="form-group col-md-12">
      <textarea name="edit_changelog" rows="20" class="form-control" placeholder="Changelog" required><?php echo $changelog; ?></textarea>
    </div>
 
    <div class="col-md-offset-5">
            <div class="form-group">
              <hr>
							<input type ="hidden" value="<?php echo $_GET['edit_id']?>" name="edit_id">
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
	//Inserting new data

  if ( isset($_POST['edit_data']) ) {
		$edit_changelog = mysqli_real_escape_string($conn, strip_tags($_POST['edit_changelog']));
	  
		$edit_sql = "UPDATE changelog SET changelog = '$edit_changelog' WHERE id = '1' ";
		if(mysqli_query($conn, $edit_sql)) { ?> 
			<script>window.location = 'changelog.php';</script>
		<?php } 

	}


	

?>
