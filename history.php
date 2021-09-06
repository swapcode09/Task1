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

<div class="p-3 mb-2 bg-info text-dark">Transaction History</div>

<?php

$result2 = mysqli_query($conn,"SELECT * FROM transfers");

echo "<table class='table table-success table-striped'>
<tr>
<th>Sender</th>
<th>Reciever</th>
<th>Amount</th>
</tr>";

while($row2 = mysqli_fetch_array($result2))
{
	echo "<tr>";
	echo "<td>" . $row2['sendername'] . "</td>";
	echo "<td>" . $row2['recievername'] . "</td>";
	echo "<td>" . $row2['amount'] . "</td>";
	echo "</tr>";
}
echo "</table>";
?>

</body>
</html>