<?php
require "config.php";
if(isset($_POST['submit']))
 {
	 //print_r($_POST);
	 $name=$_POST['name'];
	 $phone=$_POST['phone'];
	 $email=$_POST['email'];
	  $password=$_POST['password'];
	  $confirmpassword=$_POST['confirmpassword'];
	  
	  $asd=mysqli_query($conn,"SELECT * FROM regi WHERE name='$name' OR phone='$phone' OR email='$email'");
	  if(mysqli_num_rows($asd)>0){
		  echo "<script>alert('name or phone or email already taken');</script>";
	  }
	  else{
		  if($password==$confirmpassword){
			   $sql="insert into regi(name,phone,email,password)values('$name','$phone','$email','$password')";
	  $result=mysqli_query($conn,$sql);
	  echo "<script>alert('success');</script>";
		  }
		  else{
			   echo "<script>alert(' pswrd doesnot match');</script>";
		  }
	  
	  }
 }
?>
<!doctype html>
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	 <link rel="stylesheet" href="style.css">
</head>
<body>


  <div class="container">
  
    <form action="register.php" method="post">
<div class="form-group">
<input type="text"  class="form-control" name="name" placeholder="name">
</div>

<div class="form-group">
<input type="text"  class="form-control" name="phone" placeholder="phone">
</div>
<div class="form-group">
<input type="text"  class="form-control" name="email" placeholder="email">
</div>
<div class="form-group">
<input type="text"  class="form-control" name="password" placeholder="password">
</div>
<div class="form-group">
<input type="text"  class="form-control" name="confirmpassword" placeholder="confirmpassword">
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="register" name="submit">
</div>
</form>
<a href="test.php">login</a>
</div>
</body>
</html>