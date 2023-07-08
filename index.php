<html>
<head>
<title>Student Registration Form</title>
</head>

<body>

<h1>Student Registration Form</h1>
<form action="insert.php" method="post"> 

<label>Name: </label><input type="text" name="name"><br>
<label>Gender:</label> <input type="radio" name="gender" id="male" value="m" checked />Male  <input type="radio" name="gender" id="female" value="f"/>Female<br>
<label>Email: </label ><input type="email" name="email"><br>
<label>Date of Birth</label> <input type="date" name="date"><br>
<label>Phone Number: </label><input type="number" name="phone"><br>
<label>Address:</label> <br> <textarea name="address"></textarea><br>
<input type="submit" value="touch"/ name="submit">

</form>


</body>
</html>