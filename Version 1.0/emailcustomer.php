<?php
	 // Connects to the Database 
 	include "sql_connection.php";
  include "header.php";
  include "globalformat.php";
  require "login/loginheader.php";
   



  $result = "SELECT * FROM customer_recovery WHERE flag_reviewed = 'Y' and NOT flag_sent = 'Y' AND NOT flag_sent = 'N' ORDER BY date_error";
  $run = mysqli_query($conn, $result);
  
  
  $subject = "Results from query";
  $body = "
    <table border='1'>
    <tr>
    <th>Store</th>
    <th>Date of Error</th>
    <th>Customer Name</th>
    <th>Street</th>
    <th>City</th>
    <th>Postal</th>
    <th>Details</th>
    <th>Store Manager Comments</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run) ) {
  $body .="<tr>";
  
  $body .="<td>$rows[store_num]</td>";
  $body .="<td>$rows[date_error]</td>";
  $body .="<td>$rows[customer_name]</td>";
  $body .="<td>$rows[customer_street]</td>";
  $body .="<td>$rows[customer_city]</td>";
  $body .="<td>$rows[customer_postal]</td>";
  $body .="<td>$rows[details]</td>";
  $body .="<td>$rows[manager_comments]</td>";
 
  $body .="</tr>";
  }
  $body .="</table>";
  
  
  
// After all the rows are fetched, send the message.

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Customer Recovery Program <no-reply@cashtracking.ca>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

mail("$allemailaddresses","Customer Recovery Results",$body,$headers);


?>
