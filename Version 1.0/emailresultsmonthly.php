<?php 

 // Connects to the Database 
 include "sql_connection.php";
 include "globalformat.php";
 require "login/loginheader.php";

  //Queries that control the information emailed

  $cashmissing = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store1 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run = mysqli_query($conn, $cashmissing);

  $cashmissing2 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store2 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run2 = mysqli_query($conn, $cashmissing2);

  $cashmissing3 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store3 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run3 = mysqli_query($conn, $cashmissing3);

  $cashmissing4 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store4 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run4 = mysqli_query($conn, $cashmissing4);

  $cashmissing5 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store5 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run5 = mysqli_query($conn, $cashmissing5);

  $cashmissing5 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store5 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run5 = mysqli_query($conn, $cashmissing5);

  $cashmissing6 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store6 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run6 = mysqli_query($conn, $cashmissing6);

  $cashmissing7 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store7 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run7 = mysqli_query($conn, $cashmissing7);

  $cashmissing8 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store8 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE()) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run8 = mysqli_query($conn, $cashmissing8);

  $cashmissing9 = "SELECT store_num, employee_name, IFNULL(TRUNCATE(SUM(cash),2),0) AS value_cash, IFNULL(TRUNCATE(SUM(refunds),2),0) AS value_refunds, IFNULL(TRUNCATE(SUM(refunds_num),0),0) AS value_refundsnum, IFNULL(TRUNCATE(SUM(promo),2),0) AS value_promo, IFNULL(TRUNCATE(SUM(tred),2),0) AS value_tred, IFNULL(TRUNCATE(SUM(tred_num),0),0) AS value_trednum, IFNULL(TRUNCATE(SUM(tred)/SUM(tred_num),2),0) AS value_tredavg, IFNULL(TRUNCATE(SUM(refunds)/SUM(refunds_num),2),0) AS value_refundsavg FROM dailyentry WHERE store_num = $store9 AND YEAR(date) = YEAR(CURRENT_DATE()) AND 
  MONTH(date) = MONTH(CURRENT_DATE()) GROUP BY employee_name  ORDER BY store_num, employee_name";
  $run9 = mysqli_query($conn, $cashmissing9);

  //End of the Queries
  
  $body ="
    <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    
    <h3><center>$store1 $store1name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Refunds #</th>
    <th>Refunds Avg</th>
    <th>Promo</th>
    <th>Treds</th>
    <th>Treds #</th>
    <th>Treds Avg</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run) ) {
  $body .="<tr>";
  
  $body .="<td>$rows[store_num]</td>";
  $body .="<td>$rows[employee_name]</td>";
  $body .="<td>$rows[value_cash]</td>";
  $body .="<td>$rows[value_refunds]</td>";
  $body .="<td>$rows[value_refundsnum]</td>";
  $body .="<td>$rows[value_refundsavg]</td>";
  $body .="<td>$rows[value_promo]</td>";
  $body .="<td>$rows[value_tred]</td>";
  $body .="<td>$rows[value_trednum]</td>";
  $body .="<td>$rows[value_tredavg]</td>";
  
  $body .="</tr>";
  }
  $body .="</table>";

  //_________________________Store 2____________________

  $body2 ="
  
    <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    <h3><center>$store2 $store2name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Refunds #</th>
    <th>Refunds Avg</th>
    <th>Promo</th>
    <th>Treds</th>
    <th>Treds #</th>
    <th>Treds Avg</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run2) ) {
  $body2 .="<tr>";
  
  $body2 .="<td>$rows[store_num]</td>";
  $body2 .="<td>$rows[employee_name]</td>";
  $body2 .="<td>$rows[value_cash]</td>";
  $body2 .="<td>$rows[value_refunds]</td>";
  $body2 .="<td>$rows[value_refundsnum]</td>";
  $body2 .="<td>$rows[value_refundsavg]</td>";
  $body2 .="<td>$rows[value_promo]</td>";
  $body2 .="<td>$rows[value_tred]</td>";
  $body2 .="<td>$rows[value_trednum]</td>";
  $body2 .="<td>$rows[value_tredavg]</td>";
  
  $body2 .="</tr>";
  }
  $body2 .="</table>";

    //_________________________Store 3____________________

    $body3 ="
  
    <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
    <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
    <h3><center>$store3 $store3name</center></h3>
    <table border='1' align='center'>
    <tr>
    <th>Store</th>
    <th>Employee</th>
    <th>Cash</th>
    <th>Refunds</th>
    <th>Refunds #</th>
    <th>Refunds Avg</th>
    <th>Promo</th>
    <th>Treds</th>
    <th>Treds #</th>
    <th>Treds Avg</th>
    </tr>";
  while($rows = mysqli_fetch_assoc($run3) ) {
  $body3 .="<tr>";
  
  $body3 .="<td>$rows[store_num]</td>";
  $body3 .="<td>$rows[employee_name]</td>";
  $body3 .="<td>$rows[value_cash]</td>";
  $body3 .="<td>$rows[value_refunds]</td>";
  $body3 .="<td>$rows[value_refundsnum]</td>";
  $body3 .="<td>$rows[value_refundsavg]</td>";
  $body3 .="<td>$rows[value_promo]</td>";
  $body3 .="<td>$rows[value_tred]</td>";
  $body3 .="<td>$rows[value_trednum]</td>";
  $body3 .="<td>$rows[value_tredavg]</td>";
  
  $body3 .="</tr>";
  }
  $body3 .="</table>";

  //_________________________Store 4____________________

  $body4 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store4 $store4name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run4) ) {
  $body4 .="<tr>";
    
  $body4 .="<td>$rows[store_num]</td>";
  $body4 .="<td>$rows[employee_name]</td>";
  $body4 .="<td>$rows[value_cash]</td>";
  $body4 .="<td>$rows[value_refunds]</td>";
  $body4 .="<td>$rows[value_refundsnum]</td>";
  $body4 .="<td>$rows[value_refundsavg]</td>";
  $body4 .="<td>$rows[value_promo]</td>";
  $body4 .="<td>$rows[value_tred]</td>";
  $body4 .="<td>$rows[value_trednum]</td>";
  $body4 .="<td>$rows[value_tredavg]</td>";
    
  $body4 .="</tr>";
  }
  $body4 .="</table>";

  //_________________________Store 5____________________

  $body5 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store5 $store5name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run5) ) {
  $body5 .="<tr>";
    
  $body5 .="<td>$rows[store_num]</td>";
  $body5 .="<td>$rows[employee_name]</td>";
  $body5 .="<td>$rows[value_cash]</td>";
  $body5 .="<td>$rows[value_refunds]</td>";
  $body5 .="<td>$rows[value_refundsnum]</td>";
  $body5 .="<td>$rows[value_refundsavg]</td>";
  $body5 .="<td>$rows[value_promo]</td>";
  $body5 .="<td>$rows[value_tred]</td>";
  $body5 .="<td>$rows[value_trednum]</td>";
  $body5 .="<td>$rows[value_tredavg]</td>";
    
  $body5 .="</tr>";
  }
  $body5 .="</table>";

    //_________________________Store 6____________________

  $body6 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store6 $store6name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run6) ) {
  $body6 .="<tr>";
    
  $body6 .="<td>$rows[store_num]</td>";
  $body6 .="<td>$rows[employee_name]</td>";
  $body6 .="<td>$rows[value_cash]</td>";
  $body6 .="<td>$rows[value_refunds]</td>";
  $body6 .="<td>$rows[value_refundsnum]</td>";
  $body6 .="<td>$rows[value_refundsavg]</td>";
  $body6 .="<td>$rows[value_promo]</td>";
  $body6 .="<td>$rows[value_tred]</td>";
  $body6 .="<td>$rows[value_trednum]</td>";
  $body6 .="<td>$rows[value_tredavg]</td>";
    
  $body6 .="</tr>";
  }
  $body6 .="</table>";


    //_________________________Store 7____________________

  $body7 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store7 $store7name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run7) ) {
  $body7 .="<tr>";
    
  $body7 .="<td>$rows[store_num]</td>";
  $body7 .="<td>$rows[employee_name]</td>";
  $body7 .="<td>$rows[value_cash]</td>";
  $body7 .="<td>$rows[value_refunds]</td>";
  $body7 .="<td>$rows[value_refundsnum]</td>";
  $body7 .="<td>$rows[value_refundsavg]</td>";
  $body7 .="<td>$rows[value_promo]</td>";
  $body7 .="<td>$rows[value_tred]</td>";
  $body7 .="<td>$rows[value_trednum]</td>";
  $body7 .="<td>$rows[value_tredavg]</td>";
    
  $body7 .="</tr>";
  }
  $body7 .="</table>";  

    //_________________________Store 8____________________

  $body8 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store8 $store8name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run8) ) {
  $body8 .="<tr>";
    
  $body8 .="<td>$rows[store_num]</td>";
  $body8 .="<td>$rows[employee_name]</td>";
  $body8 .="<td>$rows[value_cash]</td>";
  $body8 .="<td>$rows[value_refunds]</td>";
  $body8 .="<td>$rows[value_refundsnum]</td>";
  $body8 .="<td>$rows[value_refundsavg]</td>";
  $body8 .="<td>$rows[value_promo]</td>";
  $body8 .="<td>$rows[value_tred]</td>";
  $body8 .="<td>$rows[value_trednum]</td>";
  $body8 .="<td>$rows[value_tredavg]</td>";
    
  $body8 .="</tr>";
  }
  $body8 .="</table>"; 

    //_________________________Store 9____________________

  $body9 ="
  
  <h2><center><b>Results of the Cash Tracking System for $previousmonth</b></center></h2>
  <h3><center>To review these results in detail please <a href='https://www.cashtracking.ca'>click here</a></center></h3>
  <h3><center>$store9 $store9name</center></h3>
  <table border='1' align='center'>
  <tr>
  <th>Store</th>
  <th>Employee</th>
  <th>Cash</th>
  <th>Refunds</th>
  <th>Refunds #</th>
  <th>Refunds Avg</th>
  <th>Promo</th>
  <th>Treds</th>
  <th>Treds #</th>
  <th>Treds Avg</th>
  </tr>";
  while($rows = mysqli_fetch_assoc($run9) ) {
  $body9 .="<tr>";
    
  $body9 .="<td>$rows[store_num]</td>";
  $body9 .="<td>$rows[employee_name]</td>";
  $body9 .="<td>$rows[value_cash]</td>";
  $body9 .="<td>$rows[value_refunds]</td>";
  $body9 .="<td>$rows[value_refundsnum]</td>";
  $body9 .="<td>$rows[value_refundsavg]</td>";
  $body9 .="<td>$rows[value_promo]</td>";
  $body9 .="<td>$rows[value_tred]</td>";
  $body9 .="<td>$rows[value_trednum]</td>";
  $body9 .="<td>$rows[value_tredavg]</td>";
    
  $body9 .="</tr>";
  }
  $body9 .="</table>"; 


// After all the rows are fetched, send the message.

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Cash Tracking System <no-reply@cashtracking.ca>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$bodycombined = "$body $body2 $body3 $body4 $body5 $body6 $body7 $body8 $body9 $footersmonthly"; 

mail("$administrators",$emailsubjectmonthly,$bodycombined,$headers);

//Store 1 Email
$bodycombined10 = "$body1 $footersmonthly"; 
mail("$store1@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined1,$headers);

//Store 2 Email
$bodycombined2 = "$body2 $footersmonthly"; 
mail("$store2@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined2,$headers);

//Store 3 Email
$bodycombined3 = "$body3 $footersmonthly"; 
mail("$store3@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined3,$headers);

//Store 4 Email
$bodycombined4 = "$body4 $footersmonthly"; 
mail("$store4@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined4,$headers);

//Store 5 Email
$bodycombined5 = "$body5 $footersmonthly"; 
mail("$store5@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined5,$headers);

//Store 6 Email
$bodycombined6 = "$body6 $footersmonthly"; 
mail("$store6@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined6,$headers);

//Store 7 Email
$bodycombined7 = "$body7 $footersmonthly"; 
mail("$store7@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined7,$headers);

//Store 8 Email
$bodycombined8 = "$body8 $footersmonthly"; 
mail("$store8@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined8,$headers);

//Store 9 Email
$bodycombined9 = "$body9 $footersmonthly"; 
mail("$store9@post.mcdonalds.ca",$emailsubjectmonthly,$bodycombined9,$headers);

?>
  