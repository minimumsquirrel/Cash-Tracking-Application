<?php

  // Admin email address  

  $sql21 = "SELECT * FROM globalformat WHERE variable_name = 'adminemail'";
   $run21 = mysqli_query($conn, $sql21);
   while ( $rows = mysqli_fetch_assoc($run21) ) {
     $adminemail = $rows['variable_value'];
   }

  $sql22 = "SELECT * FROM globalformat WHERE variable_name = 'administrators'";
  $run22 = mysqli_query($conn, $sql22);
  while ( $rows = mysqli_fetch_assoc($run22) ) {
    $administrators = $rows['variable_value'];
  }


// All Stores - Store Number, Store Name, and Store Email all requested from database table 'Stores'
  
  
  $sql = "SELECT * FROM stores WHERE variable_name = 'store1'";
   $run = mysqli_query($conn, $sql);
   while ( $rows = mysqli_fetch_assoc($run) ) {
     $store1 = $rows['store_num'];
     $store1name = $rows['store_name'];
     $store1email = $rows['store_email'];
     $store1receive = $rows['email_receive'];
     $store1phone = $rows['store_phone'];
   }
 
  $sql2 = "SELECT * FROM stores WHERE variable_name = 'store2'";
  $run2 = mysqli_query($conn, $sql2);
   while ( $rows = mysqli_fetch_assoc($run2) ) {
     $store2 = $rows['store_num'];
     $store2name = $rows['store_name'];
     $store2email = $rows['store_email'];
     $store2receive = $rows['email_receive'];
     $store2phone = $rows['store_phone'];
   }

  $sql3 = "SELECT * FROM stores WHERE variable_name = 'store3'";
  $run3 = mysqli_query($conn, $sql3);
   while ( $rows = mysqli_fetch_assoc($run3) ) {
     $store3 = $rows['store_num'];
     $store3name = $rows['store_name'];
     $store3email = $rows['store_email'];
     $store3receive = $rows['email_receive'];
     $store3phone = $rows['store_phone'];
   }

  $sql4 = "SELECT * FROM stores WHERE variable_name = 'store4'";
  $run4 = mysqli_query($conn, $sql4);
   while ( $rows = mysqli_fetch_assoc($run4) ) {
     $store4 = $rows['store_num'];
     $store4name = $rows['store_name'];
     $store4email = $rows['store_email'];
     $store4receive = $rows['email_receive'];
     $store4phone = $rows['store_phone'];
   }
  
  $sql5 = "SELECT * FROM stores WHERE variable_name = 'store5'";
  $run5 = mysqli_query($conn, $sql5);
   while ( $rows = mysqli_fetch_assoc($run5) ) {
     $store5 = $rows['store_num'];
     $store5name = $rows['store_name'];
     $store5email = $rows['store_email'];
     $store5receive = $rows['email_receive'];
     $store5phone = $rows['store_phone'];
   }

  $sql6 = "SELECT * FROM stores WHERE variable_name = 'store6'";
  $run6 = mysqli_query($conn, $sql6);
   while ( $rows = mysqli_fetch_assoc($run6) ) {
     $store6 = $rows['store_num'];
     $store6name = $rows['store_name'];
     $store6email = $rows['store_email'];
     $store6receive = $rows['email_receive'];
     $store6phone = $rows['store_phone'];
   }

  $sql7 = "SELECT * FROM stores WHERE variable_name = 'store7'";
  $run7 = mysqli_query($conn, $sql7);
   while ( $rows = mysqli_fetch_assoc($run7) ) {
     $store7 = $rows['store_num'];
     $store7name = $rows['store_name'];
     $store7email = $rows['store_email'];
     $store7receive = $rows['email_receive'];
     $store7phone = $rows['store_phone'];
   }
  
  $sql8 = "SELECT * FROM stores WHERE variable_name = 'store8'";
  $run8 = mysqli_query($conn, $sql8);
   while ( $rows = mysqli_fetch_assoc($run8) ) {
     $store8 = $rows['store_num'];
     $store8name = $rows['store_name'];
     $store8email = $rows['store_email'];
     $store8receive = $rows['email_receive'];
     $store8phone = $rows['store_phone'];
   }

  $sql9 = "SELECT * FROM stores WHERE variable_name = 'store9'";
  $run9 = mysqli_query($conn, $sql9);
   while ( $rows = mysqli_fetch_assoc($run9) ) {
     $store9 = $rows['store_num'];
     $store9name = $rows['store_name'];
     $store9email = $rows['store_email'];
     $store9receive = $rows['email_receive'];
     $store9phone = $rows['store_phone'];
   }
    
  $sql10 = "SELECT * FROM stores WHERE variable_name = 'store10'";
  $run10 = mysqli_query($conn, $sql10);
   while ( $rows = mysqli_fetch_assoc($run10) ) {
     $store10 = $rows['store_num'];
     $store10name = $rows['store_name'];
     $store10email = $rows['store_email'];
     $store10receive = $rows['email_receive'];
     $store10phone = $rows['store_phone'];
   } 

   $sql11 = "SELECT * FROM globalformat WHERE variable_name = 'storeadminreceive'";
   $run11 = mysqli_query($conn, $sql11);
    while ( $rows = mysqli_fetch_assoc($run11) ) {
      $storeadminreceive = $rows['variable_value'];
    } 
  
  // Function to email all stores at once
  
   $allstores = "$store1email,";
   $allstores .= "$store2email,";
   $allstores .= "$store3email,";
   $allstores .= "$store4email,";
   $allstores .= "$store5email,";
   $allstores .= "$store6email,";
   $allstores .= "$store7email,";
   $allstores .= "$store8email,";
   $allstores .= "$store9email,";
   $allstores .= "$store10email";

  
  

    

 
  // End of all e-mail addresses

  // Email Report Variables

    // Cash missing value and label

      $sql13 = "SELECT * FROM globalformat WHERE variable_name = 'cashmissingvalue'";
      $run13 = mysqli_query($conn, $sql13);
      while ( $rows = mysqli_fetch_assoc($run13) ) {
        $cashmissingvalue = $rows['variable_value'];
        $cashmissinglabel = $rows['variable_value2'];
        
      } 

    // Treds value and label

      $sql14 = "SELECT * FROM globalformat WHERE variable_name = 'tredsvalue'";
      $run14 = mysqli_query($conn, $sql14);
      while ( $rows = mysqli_fetch_assoc($run14) ) {
        $tredsvalue = $rows['variable_value'];
        $tredslabel = $rows['variable_value'];
        
      } 
    
    // Promo value and label

      $sql15 = "SELECT * FROM globalformat WHERE variable_name = 'promovalue'";
      $run15 = mysqli_query($conn, $sql15);
      while ( $rows = mysqli_fetch_assoc($run15) ) {
        $promovalue = $rows['variable_value'];
        $promolabel = $rows['variable_value'];
        
      } 
    
    // Refunds value and label

      $sql16 = "SELECT * FROM globalformat WHERE variable_name = 'refundsvalue'";
      $run16 = mysqli_query($conn, $sql16);
      while ( $rows = mysqli_fetch_assoc($run16) ) {
        $refundsvalue = $rows['variable_value'];
        $refundslabel = $rows['variable_value'];
        
      } 
    
    // Values for Labels

      $currentday = date("Y-m-d");
      $previousday = date("F j, Y", strtotime( '-1 days' ) );
      $previousmonth = date("F, Y", strtotime( '-1 month' ) );
      $username_data = $_SESSION['username'];
    
    // Daily Email Subject

      $sql17 = "SELECT * FROM globalformat WHERE variable_name = 'emailsubject'";
      $run17 = mysqli_query($conn, $sql17);
      while ( $rows = mysqli_fetch_assoc($run17) ) {
        $emailsubject = $rows['variable_value'];
        
      } 

    // Monthly Email Subject

      $sql18 = "SELECT * FROM globalformat WHERE variable_name = 'emailsubjectmonthly'";
      $run18 = mysqli_query($conn, $sql18);
      while ( $rows = mysqli_fetch_assoc($run18) ) {
        $emailsubjectmonthly = $rows['variable_value'];
        
      }
      
    // Header value
    
      $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Footer

      $footers =" 
        <br></br>
        <p><i><center>Please do not reply to this e-mail. For any inquiries please contact the administrator of this application at
        <a href='mailto:$adminemail?Subject=Cash Tracking System'>$adminemail</a></center></i></p>";

// End of Email Variables

// Records.php Variables

  //Number of Records Displayed

    $sql19 = "SELECT * FROM globalformat WHERE variable_name = 'recordsdisplayed'";
    $run19 = mysqli_query($conn, $sql19);
    while ( $rows = mysqli_fetch_assoc($run19) ) {
      $recordsdisplayed = $rows['variable_value'];
      
    } 

//End of Records.php Variables

// DailyEntry.php Variables

  // Number of Entries displayed in the table

    $sql20 = "SELECT * FROM globalformat WHERE variable_name = 'dailyentrydisplayed'";
    $run20 = mysqli_query($conn, $sql20);
    while ( $rows = mysqli_fetch_assoc($run20) ) {
      $dailyentrydisplayed = $rows['variable_value'];
      
    } 

//End of DailyEntry.php Variables


?>
  
