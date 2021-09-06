<?php
include('dbcon.php');
session_start();
?>

<html>
<head>

<title>Task 1</title>
<link rel="stylesheet" type="text/css" href="task1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"></title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
  	<div class="p-3 mb-2 bg-light text-dark" style="height:75px;"><center><h2 style="color:white;background-color:black">Banking System</h2></center></div>
    	<a class="navbar-brand" href="home.php">Home Page</a>
    </div>
</nav>
<br>

<center>
<div class="toast" data-autohide="false">
	<div class="toast-header">
    	<strong class="mr-auto text-primary">Note</strong>
    	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">  &times;</button>
  	</div>
  
  	<div class="toast-body">
    	This table is to select the name of sender. Click on 'Select' button to proceed.
  	</div>
</div>
</center>

<br>

<div class="p-3 mb-2 bg-info text-dark">List of Users</div>
	<div class="options" style="height:100%">

<?php	
	$result = mysqli_query($conn,"SELECT Name,Balance,customer_id FROM customers");
?>

<table class='table table-success table-striped'>
<tr>
<th>Name</th>
<th>Balance</th>
<th>Option</th>
</tr>

<?php
while($row = mysqli_fetch_array($result))
{
	?>
	<tr>
	<td> <?php echo $row['Name'] ?> </td>
	<td> <?php echo $row['Balance'] ?> </td>
    <td> <button class="btn-dark btn"> <a href="insert.php?id=<?php echo $row['customer_id'];?>" class="text-white" style="text-decoration: none">Select</a></button></td>
</tr>

<?php

}

?>
</table>
</div>



<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>


</body>
</html>