<?php
session_start();
unset($_SESSION['writeEmail']);
header("location:index.php");

