<?php

 
require('db.php');
include("auth.php");
$id=$_REQUEST['empid'];
$query = "SELECT * from employee_detail where empid='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['empid'];
$trn_date = date("Y-m-d H:i:s");
$employeename =$_REQUEST['employeename'];
$attendance = $_REQUEST['attendance'];
$leave = $_REQUEST['leave'];
$feedback = $_REQUEST['feedback'];
$complain = $_REQUEST['complain'];
$submittedby = $_SESSION["username"];
$update="update employee_detail set trn_date='".$trn_date."', employeename='".$employeename."', attendance='".$attendance."',leave='".$leave."',feedback='".$feedback."',complain='".$complain."', submittedby='".$submittedby."' where empid='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="empid" type="hidden" value="<?php echo $row['empid'];?>" />
<p><input type="text" name="employeename" placeholder="Employee Name" required value="<?php echo $row['employeename'];?>" /></p>
<p><input type="text" name="attendance" placeholder="attendance" required value="<?php echo $row['attendance'];?>" /></p>
<p><input type="text" name="leave" placeholder="leave" required value="<?php echo $row['leave'];?>" /></p>
<p><input type="text" name="feedback" placeholder="feedback" required value="<?php echo $row['feedback'];?>" /></p>
<p><input type="text" name="complain" placeholder="complain" required value="<?php echo $row['complain'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form> 
<?php } ?>


</div>
</div>
</body>
</html>
