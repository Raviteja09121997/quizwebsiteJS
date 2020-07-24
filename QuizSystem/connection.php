<?php
    $host = "localhost";
    $db_user= "root";
    $db_pass= "";
    $db_name= "dbconfig";

    $con = mysqli_connect($host,$db_user,$db_pass,$db_name)or die("Could not connect to mysql".mysqli_error($con));
?>