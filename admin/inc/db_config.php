<?php 

    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db   = 'bcrh';

    $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
    }

?>