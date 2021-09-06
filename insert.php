<?php
include('dbcon.php');
$id= $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM customers WHERE NOT customer_id=$id");
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
  		<div class="p-3 mb-2 bg-light text-dark" style="height:75px;"><center><h2 style="color:white;background-color:black">Banking System</h2></center>
  		</div>
    		<a class="navbar-brand" href="home.php">Home Page</a>
    </div>
</nav>

<div class="p-3 mb-2 bg-info text-dark">Payment Dashboard</div>
	<div class="card" style="height:250px">
  		<div class="card-body">
   			<p><b>Choose name of the person to transfer money</b></p>
   				<form method="POST">
   					<select class="form-select" aria-label="Default select example" name="recv"> 
		
		<?php
			while($row = mysqli_fetch_array($result))
			{
		?>
		  		<option value='<?php echo $row['Name']; ?>' selected> <?php echo $row['Name']; ?></option>
		<?php
		
			}
		?>

					</select><br>
  					<input type="text" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Amount (e.g. &#8377 500.0)" required>
  			<br>
  					<button name="Send" class="btn-dark btn">Transfer Money</button>
   	 			</form>
  		</div>
</div>


<br>
<div class="footer-copyright text-center py-3" style="background-color:skyblue">Made by Swapnil Sapre</div>
</body>
</html>


<?php

if (isset($_POST['Send']))
{
	if (isset($_POST['amount']))
	{
		$rec =  $_POST['recv'];
		$a = $_POST['amount'];
		
		
		$sender =  mysqli_query($conn,"SELECT Name FROM customers WHERE customer_id='$id'"); //get name of reciever
    	while ($rownew = mysqli_fetch_array($sender)) 
		{
	    	$fetchedname = $rownew['Name'];
		}


		$sql = ("INSERT INTO transfers (amount, sendername, recievername) VALUES ('$a','$fetchedname','$rec')"); 


		 $sql2 = "SELECT balance FROM customers WHERE Name='$rec'"; //get name of reciever
    	 $result = mysqli_query($conn, $sql2);		
		 $row = mysqli_fetch_assoc($result);

		if ($row['balance'] > 0) 
    	mysqli_query($conn, "UPDATE customers SET balance=balance+$a WHERE Name='$rec'");		//update amount of reciever

		$sql3 = "SELECT balance FROM customers WHERE customer_id='$id'";		// get id of sender
    	$result3 = mysqli_query($conn, $sql3);
		$row3 = mysqli_fetch_assoc($result3);
    	mysqli_query($conn, "UPDATE customers SET balance=balance-$a WHERE customer_id='$id'");	//update amount of sender


		if ($conn->query($sql) === TRUE) 
		{
			  echo "<center>New record created successfully</center>";
		} 
		header("location:history.php");
	}
}
?>