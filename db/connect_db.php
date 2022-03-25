<?php
$serverHost = "localhost";
$serverUser = "root";
$serverPass = "";
$dbName = "qapp";
@$conn = mysqli_connect($serverHost, $serverUser, $serverPass, $dbName) or die("CAN NOT CONNECT TO SERVVER / DB NOT FOUND");

