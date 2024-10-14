<?php 
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "edutasker");
    mysqli_query($con,query: "SET NAMES UTF8");
?>
