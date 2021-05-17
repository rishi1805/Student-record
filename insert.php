<?php
 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$employeename =$_REQUEST['employeename'];
$attendance = $_REQUEST['attendance'];
$leave = $_REQUEST['leave'];
$feedback = $_REQUEST['feedback'];
$complain = $_REQUEST['complain'];
$submittedby = $_SESSION["username"];
$insert="insert into 'employee_detail' (`employeename`,`attendance`,`leave`, 'feedback', 'complain') values ('$employeename','$attendance','$leave', '$feedback', '$complain')";
mysqli_query($con, $insert);
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="employeename" placeholder="Employee Name" required /></p>
<p><input type="number" name="attendance" placeholder="Attendance" required /></p>
<p><input type="number" name="leave" placeholder="Leave" required /></p>
<p><input type="text" name="feedback" placeholder="Feedback"  /></p>
<p><input type="text" name="complain" placeholder="Complain"  /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>


</div>
</div>
</body>
</html>
