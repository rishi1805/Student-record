<?php

require('db.php');
$id=$_REQUEST['empid'];
$query = "DELETE FROM employee_detail WHERE empid=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>