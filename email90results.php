<?php 

 // Connects to the Database 
 include "sql_connection.php";
 include "globalformat.php";
 require "login/loginheader.php";

  //Queries that control the information emailed

  $report90days1 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store1' ORDER BY date_worked DESC";
  $run = mysqli_query($conn, $report90days1);

  $report90days2 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store2' ORDER BY date_worked DESC";
  $run2 = mysqli_query($conn, $report90days2);

  $report90days3 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store3' ORDER BY date_worked DESC";
  $run3 = mysqli_query($conn, $report90days3);

  $report90days4 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store4' ORDER BY date_worked DESC";
  $run4 = mysqli_query($conn, $report90days4);

  $report90days5 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store5' ORDER BY date_worked DESC";
  $run5 = mysqli_query($conn, $report90days5);

  $report90days6 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store6' ORDER BY date_worked DESC";
  $run6 = mysqli_query($conn, $report90days6);

  $report90days7 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store7' ORDER BY date_worked DESC";
  $run7 = mysqli_query($conn, $report90days7);

  $report90days8 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store8' ORDER BY date_worked DESC";
  $run8 = mysqli_query($conn, $report90days8);

  $report90days9 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store9' ORDER BY date_worked DESC";
  $run9 = mysqli_query($conn, $report90days9);

  $report90days10 = "SELECT id, store_num, employee_name, date_hired, active, DATEDIFF('$currentday', date_hired) AS date_worked FROM employees WHERE DATEDIFF('$currentday', date_hired) BETWEEN 1 AND 90 AND store_num = '$store10' ORDER BY date_worked DESC";
  $run10 = mysqli_query($conn, $report90days10);

  //End of the Queries
  
  $body ="
    <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    
    <h3><center>$store1 $store1name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Date Hired</th>
    <th>Days Worked</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run) ) {
  $body .="<tr>";
  
  $body .="<td>$rows[store_num]</td>";
  $body .="<td>$rows[employee_name]</td>";
  $body .="<td>$rows[date_hired]</td>";
  $body .="<td>$rows[date_worked]</td>";
  
  $body .="</tr>";
  }
  $body .="</table>";

  //_________________________Store 2____________________

  $body2 ="
  
    <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    <h3><center>$store2 $store2name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Date Hired</th>
    <th>Days Worked</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run2) ) {
  $body2 .="<tr>";
  
  $body2 .="<td>$rows[store_num]</td>";
  $body2 .="<td>$rows[employee_name]</td>";
  $body2 .="<td>$rows[date_hired]</td>";
  $body2 .="<td>$rows[date_worked]</td>";
  
  $body2 .="</tr>";
  }
  $body2 .="</table>";

    //_________________________Store 3____________________

    $body3 ="
  
    <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    <h3><center>$store3 $store3name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Date Hired</th>
    <th>Days Worked</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run3) ) {
  $body3 .="<tr>";
  
  $body3 .="<td>$rows[store_num]</td>";
  $body3 .="<td>$rows[employee_name]</td>";
  $body3 .="<td>$rows[date_hired]</td>";
  $body3 .="<td>$rows[date_worked]</td>";
  
  $body3 .="</tr>";
  }
  $body3 .="</table>";

  //_________________________Store 4____________________

  $body4 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store4 $store4name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run4) ) {
  $body4 .="<tr>";
    
  $body4 .="<td>$rows[store_num]</td>";
  $body4 .="<td>$rows[employee_name]</td>";
  $body4 .="<td>$rows[date_hired]</td>";
  $body4 .="<td>$rows[date_worked]</td>";
    
  $body4 .="</tr>";
  }
  $body4 .="</table>";

  //_________________________Store 5____________________

  $body5 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store5 $store5name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run5) ) {
  $body5 .="<tr>";
    
  $body5 .="<td>$rows[store_num]</td>";
  $body5 .="<td>$rows[employee_name]</td>";
  $body5 .="<td>$rows[date_hired]</td>";
  $body5 .="<td>$rows[date_worked]</td>";
    
  $body5 .="</tr>";
  }
  $body5 .="</table>";

    //_________________________Store 6____________________

  $body6 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store6 $store6name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run6) ) {
  $body6 .="<tr>";
    
  $body6 .="<td>$rows[store_num]</td>";
  $body6 .="<td>$rows[employee_name]</td>";
  $body6 .="<td>$rows[date_hired]</td>";
  $body6 .="<td>$rows[date_worked]</td>";
    
  $body6 .="</tr>";
  }
  $body6 .="</table>";


    //_________________________Store 7____________________

  $body7 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store7 $store7name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run7) ) {
  $body7 .="<tr>";
    
  $body7 .="<td>$rows[store_num]</td>";
  $body7 .="<td>$rows[employee_name]</td>";
  $body7 .="<td>$rows[date_hired]</td>";
  $body7 .="<td>$rows[date_worked]</td>";
    
  $body7 .="</tr>";
  }
  $body7 .="</table>";  

    //_________________________Store 8____________________

  $body8 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store8 $store8name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run8) ) {
  $body8 .="<tr>";
    
  $body8 .="<td>$rows[store_num]</td>";
  $body8 .="<td>$rows[employee_name]</td>";
  $body8 .="<td>$rows[date_hired]</td>";
  $body8 .="<td>$rows[date_worked]</td>";
    
  $body8 .="</tr>";
  }
  $body8 .="</table>"; 

    //_________________________Store 9____________________

  $body9 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store9 $store9name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run9) ) {
  $body9 .="<tr>";
    
  $body9 .="<td>$rows[store_num]</td>";
  $body9 .="<td>$rows[employee_name]</td>";
  $body9 .="<td>$rows[date_hired]</td>";
  $body9 .="<td>$rows[date_worked]</td>";
    
  $body9 .="</tr>";
  }
  $body9 .="</table>"; 


      //_________________________Store 10____________________

  $body10 ="
  
  <h2><center><b>Results of the Cash Tracking System: Employees under 90 days</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store10 $store10name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Date Hired</th>
  <th>Days Worked</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run10) ) {
  $body10 .="<tr>";
    
  $body10 .="<td>$rows[store_num]</td>";
  $body10 .="<td>$rows[employee_name]</td>";
  $body10 .="<td>$rows[date_hired]</td>";
  $body10 .="<td>$rows[date_worked]</td>";
    
  $body10 .="</tr>";
  }
  $body10 .="</table>"; 

   


// After all the rows are fetched, send the message.

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$bodycombined = "$body $body2 $body3 $body4 $body5 $body6 $body7 $body8 $body9 $footersmonthly"; 

if ($storeadminreceive > "0") {
  mail("$administrators",$emailsubject90,$bodycombined,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_admin = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', 'ALL', 'ALL', '$administrators')";

if ($storeadminreceive > "0") {
    
  mysqli_query($conn, $ins_sql_admin);

}

//Store 1 Email
$bodycombined10 = "$body $footers";

if ($store1receive > "0") {
  mail("$store1email",$emailsubject90,$bodycombined10,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store1 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store1', '$store1name', '$store1email')";

if ($store1receive > "0") {
    
  mysqli_query($conn, $ins_sql_store1);

}

//Store 2 Email
$bodycombined2 = "$body2 $footers"; 

if ($store2receive > "0") {
  mail("$store2email",$emailsubject90,$bodycombined2,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store2 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store2', '$store2name', '$store2email')";

if ($store2receive > "0") {
    
  mysqli_query($conn, $ins_sql_store2);

}

//Store 3 Email
$bodycombined3 = "$body3 $footers"; 

if ($store3receive > "0") {
  mail("$store3email",$emailsubject90,$bodycombined3,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store3 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store3', '$store3name', '$store3email')";

if ($store3receive > "0") {
    
  mysqli_query($conn, $ins_sql_store3);

}

//Store 4 Email
$bodycombined4 = "$body4 $footers"; 

if ($store4receive > "0") {
  mail("$store4email",$emailsubject90,$bodycombined4,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store4 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store4', '$store4name', '$store4email')";

if ($store4receive > "0") {
    
  mysqli_query($conn, $ins_sql_store4);

}

//Store 5 Email
$bodycombined5 = "$body5 $footers"; 

if ($store5receive > "0") {
  mail("$store5email",$emailsubject90,$bodycombined5,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store5 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store5', '$store5name', '$store5email')";

if ($store5receive > "0") {
    
  mysqli_query($conn, $ins_sql_store5);

}

//Store 6 Email
$bodycombined6 = "$body6 $footers"; 

if ($store6receive > "0") {
  mail("$store6email",$emailsubject90,$bodycombined6,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store6 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store6', '$store6name', '$store6email')";

if ($store6receive > "0") {
    
  mysqli_query($conn, $ins_sql_store6);

}

//Store 7 Email
$bodycombined7 = "$body7 $footers"; 

if ($store7receive > "0") {
  mail("$store7email",$emailsubject90,$bodycombined7,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store7 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store7', '$store7name', '$store7email')";

if ($store7receive > "0") {
    
  mysqli_query($conn, $ins_sql_store7);

}

//Store 8 Email
$bodycombined8 = "$body8 $footers"; 

if ($store8receive > "0") {
  mail("$store8email",$emailsubject90,$bodycombined8,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store8 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store8', '$store8name', '$store8email')";

if ($store8receive > "0") {
    
  mysqli_query($conn, $ins_sql_store8);

}

//Store 9 Email
$bodycombined9 = "$body9 $footers"; 

if ($store9receive > "0") {
  mail("$store9email",$emailsubject90,$bodycombined9,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store9 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store9', '$store9name', '$store9email')";

if ($store9receive > "0") {
    
  mysqli_query($conn, $ins_sql_store9);

}

//Store 10 Email
$bodycombined10 = "$body10 $footers"; 

if ($store10receive > "0") {
  mail("$store10email",$emailsubject90,$bodycombined10,$headers);
}

$entered_ip = mysqli_real_escape_string($conn, strip_tags($_SERVER["REMOTE_ADDR"]));
$type = "$email_report_type_90";
$ins_sql_store10 = "INSERT INTO email_reports (ip, type, date, store, store_name, email_address) VALUES ('$entered_ip', '$type', '$currentday', '$store10', '$store10name', '$store10email')";

if ($store10receive > "0") {
    
  mysqli_query($conn, $ins_sql_store10);

}


?>
  