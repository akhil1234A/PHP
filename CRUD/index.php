
<?php
$conn=mysqli_connect("localhost","root","","student");


if($conn)
{
	echo"success";
}
else
{
	echo "Error: ";
}

//Operation 1 Insert: Insert Records
if(isset($_POST['submit']))
{
	
	$name=$_POST['name'];
	$dept=$_POST['dept'];
	$number=$_POST['number'];
	$open=$_POST['open'];
	
	
	$sql="insert into open(name,dept,number,open)values('$name','$dept','$number','$open')";
		$result=mysqli_query($conn,$sql);

}

//Operation 2 Read: Dispaly all records
$result_read_query = "SELECT * FROM open";
$result_read = mysqli_query($conn, $result_read_query);


//Operation 3 Update: Update selected records

//Step 1: retrieve data
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query_update = "SELECT * FROM open WHERE id = $id";
    $get_ = mysqli_query($conn, $query_update);
    if ($row = mysqli_fetch_array($get_)) {
		$name=$row['name'];
		$dept=$row['dept'];
		$number=$row['number'];
		$open=$row['open'];
    }
}

//Step 2: update data

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $number = $_POST['number'];
	$open = $_POST['open'];

    $update_q = "UPDATE open SET name = '$name', 
                dept ='$dept', 
                number = '$number',
				open = '$open' WHERE id = $id";
    mysqli_query($conn, $update_q);
}

//Operation 4 Delete: Delete Selected Records
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $delete_q = "DELETE FROM open WHERE id = $id";
    mysqli_query($conn, $delete_q);
}

 ?>
<html>
<head>

	<title>Open Course of BCA Students</title>


</head>
<body>

<h1>Open Course of BCA Students</h1>

<?php if (!isset($_GET['id'])) : ?>
	<form action="" method="post">
		<label>Name: </label> <input type="text" name="name"/> <br>
		<label>Department: </label> <input type="text" name="dept"/> <br>
		<label>Reg Number: </label> <input type="number" name="number"/> <br>
		<label>Open Course: </label> <input type="text" name="open"/> <br>

		<input type="submit" value="submit" name="submit"/>
	</form>
		<br>


<?php else : ?>
	<form action="" method="post">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="text" value="<?= $name ?>" name="name" placeholder="Enter your Name"><br><br>
            <input type="text" value="<?= $dept?>" name="dept" placeholder="Enter your Department"><br><br>
            <input type="number" value="<?= $number ?>" name="number" placeholder="Enter your Register Number"><br><br>
			<input type="text" value="<?= $open ?>" name="open" placeholder="Enter your Open Course"><br><br>
            <input type="submit" value="update" name="update"/>
        
	</form>
<?php endif; ?>
<br>
<table border="1" cellspacing="1">

<tr>

<th>Name</th>
<th>Dept</th>
<th>Number</th>
<th>Open</th>

</tr>
 <?php while ($row = mysqli_fetch_assoc($result_read)) : ?>
            <tr>
                <th><?= $row['name']; ?></th>
                <th><?= $row['dept']; ?></th>
                <th><?= $row['number']; ?></th>
				<th><?= $row['open'];?></th>
                <th>
					<form action="" method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button name="delete">Delete</button>
                    </form>
                </th>
                <th>
                 <form action="" method="get">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button>Update</button>
                 </form>
                </th>
            </tr>
<?php endwhile; ?>


</table>
</body>
</html>