<?php 

 // Connects to the Database 
 include "sql_connection.php";
 include "globalformat.php";
 require "login/loginheader.php";

  //Queries that control the information emailed

  $cashmissing = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store1 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
  $run = mysqli_query($conn, $cashmissing);

  $refundsover = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store1 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
  $run2 = mysqli_query($conn, $refundsover);

  $tredsover = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store1 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
  $run3 = mysqli_query($conn, $tredsover);

  $promoover = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store1 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
  $run4 = mysqli_query($conn, $promoover);

  //End of the Queries
  
  $body ="
    <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
    <h3><center><i>$store1</i></center></h3>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    <br></br>
    <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
    <table border='1' align='center'>
    <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run) ) {
  $body .="<tr>";
  
  $body .="<td>$rows[store_num]</td>";
  $body .="<td>$rows[date]</td>";
  $body .="<td>$rows[employee_name]</td>";
  $body .="<td>$rows[cash]</td>";
  $body .="<td>$rows[refunds]</td>";
  $body .="<td>$rows[value_refundsavg]</td>";
  $body .="<td>$rows[promo]</td>";
  $body .="<td>$rows[value_promoavg]</td>";
  $body .="<td>$rows[tred]</td>";
  $body .="<td>$rows[value_tredavg]</td>";
  
  $body .="</tr>";
  }
  $body .="</table>";

  $body2 ="
  
  <h2><center>Refunds Over $$refundslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run2) ) {
  $body2 .="<tr>";
  
  $body2 .="<td>$rows[store_num]</td>";
  $body2 .="<td>$rows[date]</td>";
  $body2 .="<td>$rows[employee_name]</td>";
  $body2 .="<td>$rows[cash]</td>";
  $body2 .="<td>$rows[refunds]</td>";
  $body2 .="<td>$rows[value_refundsavg]</td>";
  $body2 .="<td>$rows[promo]</td>";
  $body2 .="<td>$rows[value_promoavg]</td>";
  $body2 .="<td>$rows[tred]</td>";
  $body2 .="<td>$rows[value_tredavg]</td>";
  
  $body2 .="</tr>";
  }
  $body2 .="</table>";

  $body3 ="
  
    <h2><center>TReds Over $$tredslabel</center></h2>
    <table border='1' align='center'>
    <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run3) ) {
  $body3 .="<tr>";
  
  $body3 .="<td>$rows[store_num]</td>";
  $body3 .="<td>$rows[date]</td>";
  $body3 .="<td>$rows[employee_name]</td>";
  $body3 .="<td>$rows[cash]</td>";
  $body3 .="<td>$rows[refunds]</td>";
  $body3 .="<td>$rows[value_refundsavg]</td>";
  $body3 .="<td>$rows[promo]</td>";
  $body3 .="<td>$rows[value_promoavg]</td>";
  $body3 .="<td>$rows[tred]</td>";
  $body3 .="<td>$rows[value_tredavg]</td>";
  
  $body3 .="</tr>";
  }
  $body3 .="</table>";

  $body4 ="
  
    <h2><center>Promo Over $$promolabel</center></h2>
    <table border='1' align='center'>
    <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
  
  while($rows = mysqli_fetch_assoc($run4) ) {
  $body4 .="<tr>";
  
  $body4 .="<td>$rows[store_num]</td>";
  $body4 .="<td>$rows[date]</td>";
  $body4 .="<td>$rows[employee_name]</td>";
  $body4 .="<td>$rows[cash]</td>";
  $body4 .="<td>$rows[refunds]</td>";
  $body4 .="<td>$rows[value_refundsavg]</td>";
  $body4 .="<td>$rows[promo]</td>";
  $body4 .="<td>$rows[value_promoavg]</td>";
  $body4 .="<td>$rows[tred]</td>";
  $body4 .="<td>$rows[value_tredavg]</td>";
  
  $body4 .="</tr>";
  }
  $body4 .="</table>";
  
// After all the rows are fetched, send the message.

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$bodycombined = "$body $body2 $body3 $body4 $footers"; 

if ($store1receive > "0") {
  mail("$store1email",$emailsubject,$bodycombined,$headers);
}


// ______________________________________Store #2__________________________________________ --> 


$cashmissing2 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store2 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run5 = mysqli_query($conn, $cashmissing2);

$refundsover2 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store2 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run6 = mysqli_query($conn, $refundsover2);

$tredsover2 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store2 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run7 = mysqli_query($conn, $tredsover2);

$promoover2 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store2 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run8 = mysqli_query($conn, $promoover2);

//End of the Queries

$body6 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store2</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run5) ) {
$body6 .="<tr>";

$body6 .="<td>$rows[store_num]</td>";
  $body6 .="<td>$rows[date]</td>";
  $body6 .="<td>$rows[employee_name]</td>";
  $body6 .="<td>$rows[cash]</td>";
  $body6 .="<td>$rows[refunds]</td>";
  $body6 .="<td>$rows[value_refundsavg]</td>";
  $body6 .="<td>$rows[promo]</td>";
  $body6 .="<td>$rows[value_promoavg]</td>";
  $body6 .="<td>$rows[tred]</td>";
  $body6 .="<td>$rows[value_tredavg]</td>";

$body6 .="</tr>";
}
$body6 .="</table>";

$body7 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run6) ) {
$body7 .="<tr>";

$body7 .="<td>$rows[store_num]</td>";
  $body7 .="<td>$rows[date]</td>";
  $body7 .="<td>$rows[employee_name]</td>";
  $body7 .="<td>$rows[cash]</td>";
  $body7 .="<td>$rows[refunds]</td>";
  $body7 .="<td>$rows[value_refundsavg]</td>";
  $body7 .="<td>$rows[promo]</td>";
  $body7 .="<td>$rows[value_promoavg]</td>";
  $body7 .="<td>$rows[tred]</td>";
  $body7 .="<td>$rows[value_tredavg]</td>";

$body7 .="</tr>";
}
$body7 .="</table>";

$body8 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run7) ) {
$body8 .="<tr>";

$body8 .="<td>$rows[store_num]</td>";
  $body8 .="<td>$rows[date]</td>";
  $body8 .="<td>$rows[employee_name]</td>";
  $body8 .="<td>$rows[cash]</td>";
  $body8 .="<td>$rows[refunds]</td>";
  $body8 .="<td>$rows[value_refundsavg]</td>";
  $body8 .="<td>$rows[promo]</td>";
  $body8 .="<td>$rows[value_promoavg]</td>";
  $body8 .="<td>$rows[tred]</td>";
  $body8 .="<td>$rows[value_tredavg]</td>";

$body8 .="</tr>";
}
$body8 .="</table>";

$body9 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run8) ) {
$body9 .="<tr>";

$body9 .="<td>$rows[store_num]</td>";
  $body9 .="<td>$rows[date]</td>";
  $body9 .="<td>$rows[employee_name]</td>";
  $body9 .="<td>$rows[cash]</td>";
  $body9 .="<td>$rows[refunds]</td>";
  $body9 .="<td>$rows[value_refundsavg]</td>";
  $body9 .="<td>$rows[promo]</td>";
  $body9 .="<td>$rows[value_promoavg]</td>";
  $body9 .="<td>$rows[tred]</td>";
  $body9 .="<td>$rows[value_tredavg]</td>";

$body9 .="</tr>";
}
$body9 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined2 = "$body6 $body7 $body8 $body9 $footers"; 

if ($store2receive > "0") {
  mail("$store2email",$emailsubject,$bodycombined2,$headers);
}


// ______________________________________Store #3__________________________________________ --> 


$cashmissing3 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store3 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run9 = mysqli_query($conn, $cashmissing3);

$refundsover3 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store3 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run10 = mysqli_query($conn, $refundsover3);

$tredsover3 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store3 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run11 = mysqli_query($conn, $tredsover3);

$promoover3 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store3 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run12 = mysqli_query($conn, $promoover3);

//End of the Queries

$body10 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store3</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run9) ) {
$body10 .="<tr>";

$body10 .="<td>$rows[store_num]</td>";
  $body10 .="<td>$rows[date]</td>";
  $body10 .="<td>$rows[employee_name]</td>";
  $body10 .="<td>$rows[cash]</td>";
  $body10 .="<td>$rows[refunds]</td>";
  $body10 .="<td>$rows[value_refundsavg]</td>";
  $body10 .="<td>$rows[promo]</td>";
  $body10 .="<td>$rows[value_promoavg]</td>";
  $body10 .="<td>$rows[tred]</td>";
  $body10 .="<td>$rows[value_tredavg]</td>";

$body10 .="</tr>";
}
$body10 .="</table>";

$body11 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run10) ) {
$body11 .="<tr>";

$body11 .="<td>$rows[store_num]</td>";
  $body11 .="<td>$rows[date]</td>";
  $body11 .="<td>$rows[employee_name]</td>";
  $body11 .="<td>$rows[cash]</td>";
  $body11 .="<td>$rows[refunds]</td>";
  $body11 .="<td>$rows[value_refundsavg]</td>";
  $body11 .="<td>$rows[promo]</td>";
  $body11 .="<td>$rows[value_promoavg]</td>";
  $body11 .="<td>$rows[tred]</td>";
  $body11 .="<td>$rows[value_tredavg]</td>";

$body11 .="</tr>";
}
$body11 .="</table>";

$body12 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run11) ) {
$body12 .="<tr>";

$body12 .="<td>$rows[store_num]</td>";
  $body12 .="<td>$rows[date]</td>";
  $body12 .="<td>$rows[employee_name]</td>";
  $body12 .="<td>$rows[cash]</td>";
  $body12 .="<td>$rows[refunds]</td>";
  $body12 .="<td>$rows[value_refundsavg]</td>";
  $body12 .="<td>$rows[promo]</td>";
  $body12 .="<td>$rows[value_promoavg]</td>";
  $body12 .="<td>$rows[tred]</td>";
  $body12 .="<td>$rows[value_tredavg]</td>";

$body12 .="</tr>";
}
$body12 .="</table>";

$body13 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run12) ) {
$body13 .="<tr>";

$body13 .="<td>$rows[store_num]</td>";
  $body13 .="<td>$rows[date]</td>";
  $body13 .="<td>$rows[employee_name]</td>";
  $body13 .="<td>$rows[cash]</td>";
  $body13 .="<td>$rows[refunds]</td>";
  $body13 .="<td>$rows[value_refundsavg]</td>";
  $body13 .="<td>$rows[promo]</td>";
  $body13 .="<td>$rows[value_promoavg]</td>";
  $body13 .="<td>$rows[tred]</td>";
  $body13 .="<td>$rows[value_tredavg]</td>";

$body13 .="</tr>";
}
$body13 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined3 = "$body10 $body11 $body12 $body13 $footers"; 

if ($store3receive > "0") {
  mail("$store3email",$emailsubject,$bodycombined3,$headers);
}



// ______________________________________Store #4__________________________________________ --> 


$cashmissing4 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store4 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run13 = mysqli_query($conn, $cashmissing4);

$refundsover4 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store4 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run14 = mysqli_query($conn, $refundsover4);

$tredsover4 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store4 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run15 = mysqli_query($conn, $tredsover4);

$promoover4 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store4 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run16 = mysqli_query($conn, $promoover4);

//End of the Queries

$body14 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store4</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run13) ) {
$body14 .="<tr>";

$body14 .="<td>$rows[store_num]</td>";
  $body14 .="<td>$rows[date]</td>";
  $body14 .="<td>$rows[employee_name]</td>";
  $body14 .="<td>$rows[cash]</td>";
  $body14 .="<td>$rows[refunds]</td>";
  $body14 .="<td>$rows[value_refundsavg]</td>";
  $body14 .="<td>$rows[promo]</td>";
  $body14 .="<td>$rows[value_promoavg]</td>";
  $body14 .="<td>$rows[tred]</td>";
  $body14 .="<td>$rows[value_tredavg]</td>";

$body14 .="</tr>";
}
$body14 .="</table>";

$body15 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run14) ) {
$body15 .="<tr>";

$body15 .="<td>$rows[store_num]</td>";
  $body15 .="<td>$rows[date]</td>";
  $body15 .="<td>$rows[employee_name]</td>";
  $body15 .="<td>$rows[cash]</td>";
  $body15 .="<td>$rows[refunds]</td>";
  $body15 .="<td>$rows[value_refundsavg]</td>";
  $body15 .="<td>$rows[promo]</td>";
  $body15 .="<td>$rows[value_promoavg]</td>";
  $body15 .="<td>$rows[tred]</td>";
  $body15 .="<td>$rows[value_tredavg]</td>";

$body15 .="</tr>";
}
$body15 .="</table>";

$body16 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run15) ) {
$body16 .="<tr>";

$body16 .="<td>$rows[store_num]</td>";
  $body16 .="<td>$rows[date]</td>";
  $body16 .="<td>$rows[employee_name]</td>";
  $body16 .="<td>$rows[cash]</td>";
  $body16 .="<td>$rows[refunds]</td>";
  $body16 .="<td>$rows[value_refundsavg]</td>";
  $body16 .="<td>$rows[promo]</td>";
  $body16 .="<td>$rows[value_promoavg]</td>";
  $body16 .="<td>$rows[tred]</td>";
  $body16 .="<td>$rows[value_tredavg]</td>";

$body16 .="</tr>";
}
$body16 .="</table>";

$body17 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run16) ) {
$body17 .="<tr>";

$body17 .="<td>$rows[store_num]</td>";
  $body17 .="<td>$rows[date]</td>";
  $body17 .="<td>$rows[employee_name]</td>";
  $body17 .="<td>$rows[cash]</td>";
  $body17 .="<td>$rows[refunds]</td>";
  $body17 .="<td>$rows[value_refundsavg]</td>";
  $body17 .="<td>$rows[promo]</td>";
  $body17 .="<td>$rows[value_promoavg]</td>";
  $body17 .="<td>$rows[tred]</td>";
  $body17 .="<td>$rows[value_tredavg]</td>";

$body17 .="</tr>";
}
$body17 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined4 = "$body14 $body15 $body16 $body17 $footers"; 

if ($store4receive > "0") {
  mail("$store4email",$emailsubject,$bodycombined4,$headers);
}


// ______________________________________Store #5__________________________________________ --> 



$cashmissing5 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store5 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run17 = mysqli_query($conn, $cashmissing5);

$refundsover5 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store5 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run18 = mysqli_query($conn, $refundsover5);

$tredsover5 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store5 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run19 = mysqli_query($conn, $tredsover5);

$promoover5 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store5 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run20 = mysqli_query($conn, $promoover5);

//End of the Queries

$body18 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store5</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run17) ) {
$body18 .="<tr>";

$body18 .="<td>$rows[store_num]</td>";
  $body18 .="<td>$rows[date]</td>";
  $body18 .="<td>$rows[employee_name]</td>";
  $body18 .="<td>$rows[cash]</td>";
  $body18 .="<td>$rows[refunds]</td>";
  $body18 .="<td>$rows[value_refundsavg]</td>";
  $body18 .="<td>$rows[promo]</td>";
  $body18 .="<td>$rows[value_promoavg]</td>";
  $body18 .="<td>$rows[tred]</td>";
  $body18 .="<td>$rows[value_tredavg]</td>";

$body18 .="</tr>";
}
$body18 .="</table>";

$body19 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run18) ) {
$body19 .="<tr>";

$body19 .="<td>$rows[store_num]</td>";
  $body19 .="<td>$rows[date]</td>";
  $body19 .="<td>$rows[employee_name]</td>";
  $body19 .="<td>$rows[cash]</td>";
  $body19 .="<td>$rows[refunds]</td>";
  $body19 .="<td>$rows[value_refundsavg]</td>";
  $body19 .="<td>$rows[promo]</td>";
  $body19 .="<td>$rows[value_promoavg]</td>";
  $body19 .="<td>$rows[tred]</td>";
  $body19 .="<td>$rows[value_tredavg]</td>";

$body19 .="</tr>";
}
$body19 .="</table>";

$body20 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run19) ) {
$body20 .="<tr>";

$body20 .="<td>$rows[store_num]</td>";
  $body20 .="<td>$rows[date]</td>";
  $body20 .="<td>$rows[employee_name]</td>";
  $body20 .="<td>$rows[cash]</td>";
  $body20 .="<td>$rows[refunds]</td>";
  $body20 .="<td>$rows[value_refundsavg]</td>";
  $body20 .="<td>$rows[promo]</td>";
  $body20 .="<td>$rows[value_promoavg]</td>";
  $body20 .="<td>$rows[tred]</td>";
  $body20 .="<td>$rows[value_tredavg]</td>";

$body20 .="</tr>";
}
$body20 .="</table>";

$body21 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run20) ) {
$body21 .="<tr>";

$body21 .="<td>$rows[store_num]</td>";
  $body21 .="<td>$rows[date]</td>";
  $body21 .="<td>$rows[employee_name]</td>";
  $body21 .="<td>$rows[cash]</td>";
  $body21 .="<td>$rows[refunds]</td>";
  $body21 .="<td>$rows[value_refundsavg]</td>";
  $body21 .="<td>$rows[promo]</td>";
  $body21 .="<td>$rows[value_promoavg]</td>";
  $body21 .="<td>$rows[tred]</td>";
  $body21 .="<td>$rows[value_tredavg]</td>";

$body21 .="</tr>";
}
$body21 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined5 = "$body18 $body19 $body20 $body21 $footers"; 

if ($store5receive > "0") {
  mail("$store5email",$emailsubject,$bodycombined5,$headers);
}


// ______________________________________Store #6__________________________________________ --> 



$cashmissing6 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store6 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run21 = mysqli_query($conn, $cashmissing6);

$refundsover6 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store6 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run22 = mysqli_query($conn, $refundsover6);

$tredsover6 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store6 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run23 = mysqli_query($conn, $tredsover6);

$promoover6 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store6 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run24 = mysqli_query($conn, $promoover6);

//End of the Queries

$body22 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store6</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run21) ) {
$body22 .="<tr>";

$body22 .="<td>$rows[store_num]</td>";
  $body22 .="<td>$rows[date]</td>";
  $body22 .="<td>$rows[employee_name]</td>";
  $body22 .="<td>$rows[cash]</td>";
  $body22 .="<td>$rows[refunds]</td>";
  $body22 .="<td>$rows[value_refundsavg]</td>";
  $body22 .="<td>$rows[promo]</td>";
  $body22 .="<td>$rows[value_promoavg]</td>";
  $body22 .="<td>$rows[tred]</td>";
  $body22 .="<td>$rows[value_tredavg]</td>";

$body22 .="</tr>";
}
$body22 .="</table>";

$body23 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run22) ) {
$body23 .="<tr>";

$body23 .="<td>$rows[store_num]</td>";
  $body23 .="<td>$rows[date]</td>";
  $body23 .="<td>$rows[employee_name]</td>";
  $body23 .="<td>$rows[cash]</td>";
  $body23 .="<td>$rows[refunds]</td>";
  $body23 .="<td>$rows[value_refundsavg]</td>";
  $body23 .="<td>$rows[promo]</td>";
  $body23 .="<td>$rows[value_promoavg]</td>";
  $body23 .="<td>$rows[tred]</td>";
  $body23 .="<td>$rows[value_tredavg]</td>";

$body23 .="</tr>";
}
$body23 .="</table>";

$body24 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run23) ) {
$body24 .="<tr>";

$body24 .="<td>$rows[store_num]</td>";
  $body24 .="<td>$rows[date]</td>";
  $body24 .="<td>$rows[employee_name]</td>";
  $body24 .="<td>$rows[cash]</td>";
  $body24 .="<td>$rows[refunds]</td>";
  $body24 .="<td>$rows[value_refundsavg]</td>";
  $body24 .="<td>$rows[promo]</td>";
  $body24 .="<td>$rows[value_promoavg]</td>";
  $body24 .="<td>$rows[tred]</td>";
  $body24 .="<td>$rows[value_tredavg]</td>";

$body24 .="</tr>";
}
$body24 .="</table>";

$body25 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run24) ) {
$body25 .="<tr>";

$body25 .="<td>$rows[store_num]</td>";
  $body25 .="<td>$rows[date]</td>";
  $body25 .="<td>$rows[employee_name]</td>";
  $body25 .="<td>$rows[cash]</td>";
  $body25 .="<td>$rows[refunds]</td>";
  $body25 .="<td>$rows[value_refundsavg]</td>";
  $body25 .="<td>$rows[promo]</td>";
  $body25 .="<td>$rows[value_promoavg]</td>";
  $body25 .="<td>$rows[tred]</td>";
  $body25 .="<td>$rows[value_tredavg]</td>";

$body25 .="</tr>";
}
$body25 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined6 = "$body22 $body23 $body24 $body25 $footers"; 

if ($store6receive > "0") {
  mail("$store6email",$emailsubject,$bodycombined6,$headers);
}


// ______________________________________Store #7__________________________________________ --> 



$cashmissing7 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store7 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run25 = mysqli_query($conn, $cashmissing7);

$refundsover7 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store7 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run26 = mysqli_query($conn, $refundsover7);

$tredsover7 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store7 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run27 = mysqli_query($conn, $tredsover7);

$promoover7 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store7 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run28 = mysqli_query($conn, $promoover7);

//End of the Queries

$body26 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store7</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run25) ) {
$body26 .="<tr>";

$body26 .="<td>$rows[store_num]</td>";
  $body26 .="<td>$rows[date]</td>";
  $body26 .="<td>$rows[employee_name]</td>";
  $body26 .="<td>$rows[cash]</td>";
  $body26 .="<td>$rows[refunds]</td>";
  $body26 .="<td>$rows[value_refundsavg]</td>";
  $body26 .="<td>$rows[promo]</td>";
  $body26 .="<td>$rows[value_promoavg]</td>";
  $body26 .="<td>$rows[tred]</td>";
  $body26 .="<td>$rows[value_tredavg]</td>";

$body26 .="</tr>";
}
$body26 .="</table>";

$body27 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run26) ) {
$body27 .="<tr>";

$body27 .="<td>$rows[store_num]</td>";
  $body27 .="<td>$rows[date]</td>";
  $body27 .="<td>$rows[employee_name]</td>";
  $body27 .="<td>$rows[cash]</td>";
  $body27 .="<td>$rows[refunds]</td>";
  $body27 .="<td>$rows[value_refundsavg]</td>";
  $body27 .="<td>$rows[promo]</td>";
  $body27 .="<td>$rows[value_promoavg]</td>";
  $body27 .="<td>$rows[tred]</td>";
  $body27 .="<td>$rows[value_tredavg]</td>";

$body27 .="</tr>";
}
$body27 .="</table>";

$body28 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run27) ) {
$body28 .="<tr>";

$body28 .="<td>$rows[store_num]</td>";
  $body28 .="<td>$rows[date]</td>";
  $body28 .="<td>$rows[employee_name]</td>";
  $body28 .="<td>$rows[cash]</td>";
  $body28 .="<td>$rows[refunds]</td>";
  $body28 .="<td>$rows[value_refundsavg]</td>";
  $body28 .="<td>$rows[promo]</td>";
  $body28 .="<td>$rows[value_promoavg]</td>";
  $body28 .="<td>$rows[tred]</td>";
  $body28 .="<td>$rows[value_tredavg]</td>";

$body28 .="</tr>";
}
$body28 .="</table>";

$body29 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run28) ) {
$body29 .="<tr>";

$body29 .="<td>$rows[store_num]</td>";
  $body29 .="<td>$rows[date]</td>";
  $body29 .="<td>$rows[employee_name]</td>";
  $body29 .="<td>$rows[cash]</td>";
  $body29 .="<td>$rows[refunds]</td>";
  $body29 .="<td>$rows[value_refundsavg]</td>";
  $body29 .="<td>$rows[promo]</td>";
  $body29 .="<td>$rows[value_promoavg]</td>";
  $body29 .="<td>$rows[tred]</td>";
  $body29 .="<td>$rows[value_tredavg]</td>";

$body29 .="</tr>";
}
$body29 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined7 = "$body26 $body27 $body28 $body29 $footers"; 

if ($store7receive > "0") {
  mail("$store7email",$emailsubject,$bodycombined7,$headers);
}


// ______________________________________Store #8__________________________________________ --> 



$cashmissing8 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store8 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run29 = mysqli_query($conn, $cashmissing8);

$refundsover8 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store8 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run30 = mysqli_query($conn, $refundsover8);

$tredsover8 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store8 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run31 = mysqli_query($conn, $tredsover8);

$promoover8 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store8 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run32 = mysqli_query($conn, $promoover8);

//End of the Queries

$body30 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store8</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
  <th>Date</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Avg Refunds</th>
  <th>Promo</th>
  <th>Avg Promo</th>
  <th>Treds</th>
  <th>Avg Treds</th>
  </tr>";
while($rows = mysqli_fetch_assoc($run29) ) {
$body30 .="<tr>";

$body30 .="<td>$rows[store_num]</td>";
  $body30 .="<td>$rows[date]</td>";
  $body30 .="<td>$rows[employee_name]</td>";
  $body30 .="<td>$rows[cash]</td>";
  $body30 .="<td>$rows[refunds]</td>";
  $body30 .="<td>$rows[value_refundsavg]</td>";
  $body30 .="<td>$rows[promo]</td>";
  $body30 .="<td>$rows[value_promoavg]</td>";
  $body30 .="<td>$rows[tred]</td>";
  $body30 .="<td>$rows[value_tredavg]</td>";

$body30 .="</tr>";
}
$body30 .="</table>";

$body31 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run30) ) {
$body31 .="<tr>";

$body31 .="<td>$rows[store_num]</td>";
  $body31 .="<td>$rows[date]</td>";
  $body31 .="<td>$rows[employee_name]</td>";
  $body31 .="<td>$rows[cash]</td>";
  $body31 .="<td>$rows[refunds]</td>";
  $body31 .="<td>$rows[value_refundsavg]</td>";
  $body31 .="<td>$rows[promo]</td>";
  $body31 .="<td>$rows[value_promoavg]</td>";
  $body31 .="<td>$rows[tred]</td>";
  $body31 .="<td>$rows[value_tredavg]</td>";

$body31 .="</tr>";
}
$body31 .="</table>";

$body32 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run31) ) {
$body32 .="<tr>";

$body32 .="<td>$rows[store_num]</td>";
  $body32 .="<td>$rows[date]</td>";
  $body32 .="<td>$rows[employee_name]</td>";
  $body32 .="<td>$rows[cash]</td>";
  $body32 .="<td>$rows[refunds]</td>";
  $body32 .="<td>$rows[value_refundsavg]</td>";
  $body32 .="<td>$rows[promo]</td>";
  $body32 .="<td>$rows[value_promoavg]</td>";
  $body32 .="<td>$rows[tred]</td>";
  $body32 .="<td>$rows[value_tredavg]</td>";

$body32 .="</tr>";
}
$body32 .="</table>";

$body33 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run32) ) {
$body33 .="<tr>";

$body33 .="<td>$rows[store_num]</td>";
  $body33 .="<td>$rows[date]</td>";
  $body33 .="<td>$rows[employee_name]</td>";
  $body33 .="<td>$rows[cash]</td>";
  $body33 .="<td>$rows[refunds]</td>";
  $body33 .="<td>$rows[value_refundsavg]</td>";
  $body33 .="<td>$rows[promo]</td>";
  $body33 .="<td>$rows[value_promoavg]</td>";
  $body33 .="<td>$rows[tred]</td>";
  $body33 .="<td>$rows[value_tredavg]</td>";

$body33 .="</tr>";
}
$body33 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined8 = "$body30 $body31 $body32 $body33 $footers"; 

if ($store8receive > "0") {
  mail("$store8email",$emailsubject,$bodycombined8,$headers);
}


// ______________________________________Store #9__________________________________________ --> 



$cashmissing9 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store9 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run33 = mysqli_query($conn, $cashmissing9);

$refundsover9 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store9 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run34 = mysqli_query($conn, $refundsover9);

$tredsover9 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store9 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run35 = mysqli_query($conn, $tredsover9);

$promoover9 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store9 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run36 = mysqli_query($conn, $promoover9);

//End of the Queries

$body34 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store9</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run33) ) {
$body34 .="<tr>";

$body34 .="<td>$rows[store_num]</td>";
  $body34 .="<td>$rows[date]</td>";
  $body34 .="<td>$rows[employee_name]</td>";
  $body34 .="<td>$rows[cash]</td>";
  $body34 .="<td>$rows[refunds]</td>";
  $body34 .="<td>$rows[value_refundsavg]</td>";
  $body34 .="<td>$rows[promo]</td>";
  $body34 .="<td>$rows[value_promoavg]</td>";
  $body34 .="<td>$rows[tred]</td>";
  $body34 .="<td>$rows[value_tredavg]</td>";

$body34 .="</tr>";
}
$body34 .="</table>";

$body35 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run34) ) {
$body35 .="<tr>";

$body35 .="<td>$rows[store_num]</td>";
  $body35 .="<td>$rows[date]</td>";
  $body35 .="<td>$rows[employee_name]</td>";
  $body35 .="<td>$rows[cash]</td>";
  $body35 .="<td>$rows[refunds]</td>";
  $body35 .="<td>$rows[value_refundsavg]</td>";
  $body35 .="<td>$rows[promo]</td>";
  $body35 .="<td>$rows[value_promoavg]</td>";
  $body35 .="<td>$rows[tred]</td>";
  $body35 .="<td>$rows[value_tredavg]</td>";

$body35 .="</tr>";
}
$body35 .="</table>";

$body36 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run35) ) {
$body36 .="<tr>";

$body36 .="<td>$rows[store_num]</td>";
  $body36 .="<td>$rows[date]</td>";
  $body36 .="<td>$rows[employee_name]</td>";
  $body36 .="<td>$rows[cash]</td>";
  $body36 .="<td>$rows[refunds]</td>";
  $body36 .="<td>$rows[value_refundsavg]</td>";
  $body36 .="<td>$rows[promo]</td>";
  $body36 .="<td>$rows[value_promoavg]</td>";
  $body36 .="<td>$rows[tred]</td>";
  $body36 .="<td>$rows[value_tredavg]</td>";

$body36 .="</tr>";
}
$body36 .="</table>";

$body37 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run36) ) {
$body37 .="<tr>";

$body37 .="<td>$rows[store_num]</td>";
  $body37 .="<td>$rows[date]</td>";
  $body37 .="<td>$rows[employee_name]</td>";
  $body37 .="<td>$rows[cash]</td>";
  $body37 .="<td>$rows[refunds]</td>";
  $body37 .="<td>$rows[value_refundsavg]</td>";
  $body37 .="<td>$rows[promo]</td>";
  $body37 .="<td>$rows[value_promoavg]</td>";
  $body37 .="<td>$rows[tred]</td>";
  $body37 .="<td>$rows[value_tredavg]</td>";

$body37 .="</tr>";
}
$body37 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined9 = "$body34 $body35 $body36 $body37 $footers"; 

if ($store9receive > "0") {
  mail("$store9email",$emailsubject,$bodycombined9,$headers);
}


// ______________________________________Store #10__________________________________________ --> 



$cashmissing10 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store10 AND date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run38 = mysqli_query($conn, $cashmissing10);

$refundsover10 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store10 AND date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run39 = mysqli_query($conn, $refundsover10);

$tredsover10 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store10 AND date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run40 = mysqli_query($conn, $tredsover10);

$promoover10 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE store_num = $store10 AND date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run41 = mysqli_query($conn, $promoover10);

//End of the Queries

$body38 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center><i>$store10</i></center></h3>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run38) ) {
$body38 .="<tr>";

$body38 .="<td>$rows[store_num]</td>";
  $body38 .="<td>$rows[date]</td>";
  $body38 .="<td>$rows[employee_name]</td>";
  $body38 .="<td>$rows[cash]</td>";
  $body38 .="<td>$rows[refunds]</td>";
  $body38 .="<td>$rows[value_refundsavg]</td>";
  $body38 .="<td>$rows[promo]</td>";
  $body38 .="<td>$rows[value_promoavg]</td>";
  $body38 .="<td>$rows[tred]</td>";
  $body38 .="<td>$rows[value_tredavg]</td>";

$body38 .="</tr>";
}
$body38 .="</table>";

$body39 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run39) ) {
$body39 .="<tr>";

$body39 .="<td>$rows[store_num]</td>";
  $body39 .="<td>$rows[date]</td>";
  $body39 .="<td>$rows[employee_name]</td>";
  $body39 .="<td>$rows[cash]</td>";
  $body39 .="<td>$rows[refunds]</td>";
  $body39 .="<td>$rows[value_refundsavg]</td>";
  $body39 .="<td>$rows[promo]</td>";
  $body39 .="<td>$rows[value_promoavg]</td>";
  $body39 .="<td>$rows[tred]</td>";
  $body39 .="<td>$rows[value_tredavg]</td>";

$body39 .="</tr>";
}
$body39 .="</table>";

$body40 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run40) ) {
$body40 .="<tr>";

$body40 .="<td>$rows[store_num]</td>";
  $body40 .="<td>$rows[date]</td>";
  $body40 .="<td>$rows[employee_name]</td>";
  $body40 .="<td>$rows[cash]</td>";
  $body40 .="<td>$rows[refunds]</td>";
  $body40 .="<td>$rows[value_refundsavg]</td>";
  $body40 .="<td>$rows[promo]</td>";
  $body40 .="<td>$rows[value_promoavg]</td>";
  $body40 .="<td>$rows[tred]</td>";
  $body40 .="<td>$rows[value_tredavg]</td>";

$body40 .="</tr>";
}
$body40 .="</table>";

$body41 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run41) ) {
$body41 .="<tr>";

$body41 .="<td>$rows[store_num]</td>";
  $body41 .="<td>$rows[date]</td>";
  $body41 .="<td>$rows[employee_name]</td>";
  $body41 .="<td>$rows[cash]</td>";
  $body41 .="<td>$rows[refunds]</td>";
  $body41 .="<td>$rows[value_refundsavg]</td>";
  $body41 .="<td>$rows[promo]</td>";
  $body41 .="<td>$rows[value_promoavg]</td>";
  $body41 .="<td>$rows[tred]</td>";
  $body41 .="<td>$rows[value_tredavg]</td>";

$body41 .="</tr>";
}
$body41 .="</table>";

// After all the rows are fetched, send the message.

$bodycombined10 = "$body38 $body39 $body40 $body41 $footers";

if ($store10receive > "0") {
  mail("$store10email",$emailsubject,$bodycombined10,$headers);
}


// ---------------------------------------All stores combined Administrator Email--------------------------------------//

//Queries that control the information emailed

$cashmissing11 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE date = DATE(NOW() - INTERVAL 1 DAY) AND cash < $cashmissingvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run = mysqli_query($conn, $cashmissing11);

$refundsover11 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE date = DATE(NOW() - INTERVAL 1 DAY) AND refunds > $refundsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run2 = mysqli_query($conn, $refundsover11);

$tredsover11 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE date = DATE(NOW() - INTERVAL 1 DAY) AND tred > $tredsvalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run3 = mysqli_query($conn, $tredsover11);

$promoover11 = "SELECT store_num, employee_name, date, cash, refunds, refunds_num,  IFNULL(TRUNCATE((refunds)/(refunds_num),2),0) AS value_refundsavg, promo, IFNULL(TRUNCATE((promo)/(promo_num),2),0) AS value_promoavg, tred, tred_num, IFNULL(TRUNCATE((tred)/(tred_num),2),0) AS value_tredavg FROM dailyentry WHERE date = DATE(NOW() - INTERVAL 1 DAY) AND promo > $promovalue ORDER BY store_num DESC, employee_name LIMIT 0, 50";
$run4 = mysqli_query($conn, $promoover11);

//End of the Queries

$body42 ="
  <h2><center><b>Results of the Cash Tracking System for $previousday</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <br></br>
  <h2><center>Cash Missing More Than $$cashmissinglabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run) ) {
$body42 .="<tr>";

$body42 .="<td>$rows[store_num]</td>";
  $body42 .="<td>$rows[date]</td>";
  $body42 .="<td>$rows[employee_name]</td>";
  $body42 .="<td>$rows[cash]</td>";
  $body42 .="<td>$rows[refunds]</td>";
  $body42 .="<td>$rows[value_refundsavg]</td>";
  $body42 .="<td>$rows[promo]</td>";
  $body42 .="<td>$rows[value_promoavg]</td>";
  $body42 .="<td>$rows[tred]</td>";
  $body42 .="<td>$rows[value_tredavg]</td>";

$body42 .="</tr>";
}
$body42 .="</table>";

$body43 ="

<h2><center>Refunds Over $$refundslabel</center></h2>
<table border='1' align='center'>
<tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run2) ) {
$body43 .="<tr>";

$body43 .="<td>$rows[store_num]</td>";
  $body43 .="<td>$rows[date]</td>";
  $body43 .="<td>$rows[employee_name]</td>";
  $body43 .="<td>$rows[cash]</td>";
  $body43 .="<td>$rows[refunds]</td>";
  $body43 .="<td>$rows[value_refundsavg]</td>";
  $body43 .="<td>$rows[promo]</td>";
  $body43 .="<td>$rows[value_promoavg]</td>";
  $body43 .="<td>$rows[tred]</td>";
  $body43 .="<td>$rows[value_tredavg]</td>";

$body43 .="</tr>";
}
$body43 .="</table>";

$body44 ="

  <h2><center>TReds Over $$tredslabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";
while($rows = mysqli_fetch_assoc($run3) ) {
$body44 .="<tr>";

$body44 .="<td>$rows[store_num]</td>";
  $body44 .="<td>$rows[date]</td>";
  $body44 .="<td>$rows[employee_name]</td>";
  $body44 .="<td>$rows[cash]</td>";
  $body44 .="<td>$rows[refunds]</td>";
  $body44 .="<td>$rows[value_refundsavg]</td>";
  $body44 .="<td>$rows[promo]</td>";
  $body44 .="<td>$rows[value_promoavg]</td>";
  $body44 .="<td>$rows[tred]</td>";
  $body44 .="<td>$rows[value_tredavg]</td>";

$body44 .="</tr>";
}
$body44 .="</table>";

$body45 ="

  <h2><center>Promo Over $$promolabel</center></h2>
  <table border='1' align='center'>
  <tr><th>Store</th>
    <th>Date</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Avg Refunds</th>
    <th>Promo</th>
    <th>Avg Promo</th>
    <th>Treds</th>
    <th>Avg Treds</th>
    </tr>";

while($rows = mysqli_fetch_assoc($run4) ) {
$body45 .="<tr>";

$body45 .="<td>$rows[store_num]</td>";
  $body45 .="<td>$rows[date]</td>";
  $body45 .="<td>$rows[employee_name]</td>";
  $body45 .="<td>$rows[cash]</td>";
  $body45 .="<td>$rows[refunds]</td>";
  $body45 .="<td>$rows[value_refundsavg]</td>";
  $body45 .="<td>$rows[promo]</td>";
  $body45 .="<td>$rows[value_promoavg]</td>";
  $body45 .="<td>$rows[tred]</td>";
  $body45 .="<td>$rows[value_tredavg]</td>";

$body45 .="</tr>";
}
$body45 .="</table>";


// After all the rows are fetched, send the message.

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$bodycombined11 = "$body42 $body43 $body44 $body45 $footers"; 

if ($storeadminreceive > "0") {
  mail("$administrators",$emailsubject,$bodycombined11,$headers);
}

?>
  