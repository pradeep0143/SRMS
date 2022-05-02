<?php
include("init.php");
include("session.php");
error_reporting(0);

$rollno=$_GET['rn'];
echo $rollno;
//$names=$_GET['nm'];
$cls_name=$_GET['cnam'];
//echo $cls_name;
if($rollno&&$cls_name)
{
	//$query=mysqli_query($conn,"DELETE FROM result,students WHERE rno='$rollno' AND class='$cls_name' AND class_name='$cls_name' ");
    $data=mysqli_query($conn,"DELETE FROM result WHERE rno='$rollno' AND class='$cls_name'");
	$da=mysqli_query($conn,"DELETE FROM students WHERE rno='$rollno' AND class_name='$cls_name'");
}


if($data&&$da)
{
	echo "<H4>Record Deleted</h4>";
}
else
{
		echo "<H4>Failed to Delete</h4>";
}
?>
