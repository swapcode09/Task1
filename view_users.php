<?php
include('dbcon.php');
?>

<html>
<head>

<title>Task 1</title>
<link rel="stylesheet" type="text/css" href="task1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"></title>
</head>

<body>

<nav class="navbar navbar-light bg-light">
	<div class="container-fluid">
  		<div class="p-3 mb-2 bg-light text-dark" style="height:75px;"><center><h2 style="color:white;background-color:black">Banking System</h2></center></div>
    		<a class="navbar-brand" href="home.php">Home Page</a>
    </div>
</nav>
<br>

<?php
	$result = mysqli_query($conn,"SELECT * FROM customers");
	echo "<table class='table table-success table-striped'>
	<tr>
	<th>Sr No.</th>
	<th>Name</th>
	<th>Email</th>
	<th>Balance</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['customer_id'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Email'] . "</td>";
		echo "<td>" . $row['Balance'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

mysqli_close($conn);

?>


</body>
</html>