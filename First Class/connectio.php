<?php

$conn= mysqli_connect("localhost","root","","student");

if($conn)
{
	echo"success";
}
else
{
	echo"failed";
}

?>