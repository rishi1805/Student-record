<?php

require('db.php');
include("auth.php");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>Emp ID</strong></th><th><strong>Employee Name</strong></th><th><strong>Attendance</strong></th><th><strong>Leave</strong></th><th><strong>Feedback</strong></th><th><strong>Complain</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from employee_detail ORDER BY empid desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["employeename"]; ?></td><td align="center"><?php echo $row["attendance"]; ?></td><td align="center"><?php echo $row["leave"]; ?></td><td align="center"><?php echo $row["feedback"]; ?></td><td align="center"><?php echo $row["complain"]; ?></td><td align="center"><a href="edit.php?empid=<?php echo $row["empid"]; ?>">Edit</a></td><td align="center"><a href="delete.php?empid=<?php echo $row["empid"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>


</div>
</body>
</html>
