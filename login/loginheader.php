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

$sql2 = "SELECT * FROM members WHERE username = '$_SESSION[username]'";
   $run2 = mysqli_query($conn, $sql2);
   while ( $rows2 = mysqli_fetch_assoc($run2) ) {
     $user_organization = $rows2['organization'];
    
    }

    $_SESSION['user_organization'] = $user_organization;

$sql3 = "SELECT * FROM members WHERE username = '$_SESSION[username]'";
   $run3 = mysqli_query($conn, $sql3);
   while ( $rows3 = mysqli_fetch_assoc($run3) ) {
     $default_store = $rows3['default_store'];
    
    }

    $_SESSION['user_organization'] = $user_organization;






if (!isset($_SESSION['username'])) {
    return header("location:login/main_login.php");
}
