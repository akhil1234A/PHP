<?php
require "connectio.php";
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$date=$_POST['date'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	
	
	$sql="insert into student_registration(name,gender,email,date,phone,address)values('$name','$gender','$email','$date','$phone','$address')";
	  $result=mysqli_query($conn,$sql);
	
}

?>
