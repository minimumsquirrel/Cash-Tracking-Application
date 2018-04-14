<?php
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE



ob_start();
session_start();

include "sql_connection.php";
$sql = "SELECT * FROM members WHERE username = '$_SESSION[username]'";
   $run = mysqli_query($conn, $sql);
   while ( $rows = mysqli_fetch_assoc($run) ) {
     $user_access = $rows['user_access'];
    
    }

    $_SESSION['access_level'] = $user_access;

if (!isset($_SESSION['username'])) {
    return header("location:login/main_login.php");
}
