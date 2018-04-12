<?php

  // Admin email address  

    $adminemail = "admin@cashtracking.ca";

  // All Stores

    $store1 = "1809";
    $store2 = "22722";
    $store3 = "29064";
    $store4 = "29147";
    $store5 = "3916";
    $store6 = "40334";
    $store7 = "40221";
    $store8 = "40242";
    $store9 = "5144";

    $store1name = "Main Street";
    $store2name = "Elmsdale";
    $store3name = "Fall River";
    $store4name = "Truro Walmart";
    $store5name = "Truro";
    $store6name = "Dartmouth Crossing";
    $store7name = "Walmart Dartmouth Crossing";
    $store8name = "Walmart New Glasgow";
    $store9name = "New Glasgow";

  // All email addresses included in the email sent
    
    $administrators = "$adminemail,";
    $administrators .= "sjonesmcd@eastlink.ca,";
    $administrators .= "jim.hanlon@post.mcdonalds.ca,";
    $administrators .= "cathy.hanlon@post.mcdonalds.ca,";
    $administrators .= "tracey.beamish@post.mcdonalds.ca,";
    $administrators .= "larry.swenson.ent@ns.sympatico.ca";

    $allstores = "$store1@post.mcdonalds.ca,";
    $allstores .= "$store2@post.mcdonalds.ca,";
    $allstores .= "$store3@post.mcdonalds.ca,";
    $allstores .= "$store4@post.mcdonalds.ca,";
    $allstores .= "$store5@post.mcdonalds.ca,";
    $allstores .= "$store6@post.mcdonalds.ca,";
    $allstores .= "$store7@post.mcdonalds.ca,";
    $allstores .= "$store8@post.mcdonalds.ca,";
    $allstores .= "$store9@post.mcdonalds.ca";

 
  // End of all e-mail addresses

  // Email Report Variables

    // Values for Queries

    $cashmissingvalue = "-2";
    $tredsvalue = "20";
    $promovalue = "50";
    $refundsvalue = "20"; 

    // Values for Labels

    $cashmissinglabel = "2";
    $tredslabel = "$tredsvalue";
    $promolabel = "$promovalue";
    $refundslabel = "$refundsvalue";
    $currentday = date("Y-m-d");
    $previousday = date("F j, Y", strtotime( '-1 days' ) );
    $previousmonth = date("F, Y", strtotime( '-1 month' ) );
    $emailsubject = "Daily Cash Tracking Results";
    $emailsubjectmonthly = "Monthly Cash Tracking Results";

    $headers =  'MIME-Version: 1.0' . "\r\n"; 
      $headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $footers =" 
      <br></br>
      <p><i><center>Please do not reply to this e-mail. For any inquiries please contact the administrator of this application at
      <a href='mailto:$adminemail?Subject=Cash Tracking System'>$adminemail</a></center></i></p>";

// End of Daily Email Variables

// Records.php Variables

  $recordsdisplayed = "1500"; 

//End of Records.php Variables

// DailyEntry.php Variables

  $dailyentrydisplayed = "100"; 

//End of DailyEntry.php Variables



 ?>
  
