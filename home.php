<?php
include('dbcon.php');

		$sql="SELECT COUNT(*) FROM customers";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);

		$sql2="SELECT COUNT(*) FROM transfers";
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($result2);
?>
<html>
<head>

<title>Task 1</title>
<link rel="stylesheet" type="text/css" href="task1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"></title>
</head>


<body>
<div class="p-3 mb-2 bg-light text-dark" style="height:75px;"><center><h2 style="color:white;background-color:black">Banking System</h2></center></div>

<div id="dash"><h4>Dashboard</h4></div>
	<div class="cards">
		<div class="card">
	  		<div class="container">     
					<h4><b><img src="beye.gif">Users:  <?php echo "  ".$row[0]; ?>  </b></h4>
			</div>
		</div>
	
		<div class="card">
	  		<div class="container">
				<h4><b><img src="trans.gif">Transactions:  <?php echo "  ".$row2[0]; ?> </b></h4></div>
			</div>
		</div>


<div id="dash"><h4>Services</h4></div>
	<div class="options" style="height:450px">
		<div class="cardone" style="height:400px">
  			<img id="opt" src="trabs.png">
  			<div class="container">
    			<h4><b>Transfer Money</b></h4>
    			<center><button type="button" class="btn btn-dark" onclick="transfer_money()">Transfer Money</button></center>
  			</div>
		</div>

		<div class="cardone" style="height:400px">
  			<img id="opt" src="users.png">
  				<div class="container">
    				<h4><b>View All Customers</b></h4>
   					<center><button type="button" class="btn btn-dark" onclick="users()">See Users here</button></center>
  				</div>
		</div>

<div class="cardone" style="height:400px">
  	<img id="opt" src="hist.png">
  	<div class="container">
    	<h4><b>Transaction History</b></h4>
    	<center><button type="button" class="btn btn-dark" onclick="trans_hist()">See Transaction History</button></center>
  	</div>
</div>
</div>


<script type="text/javascript">
	function users()
	{
		window.location = "view_users.php";
	}
	function trans_hist()
	{
		window.location = "history.php";
	}
	function transfer_money()
	{
		window.location = "tmoney.php";
	}

</script>

<div class="footer-copyright text-center py-3" style="background-color:skyblue">Made by Swapnil Sapre
<p><b>Intern at The Sparks Foundation</b></p>
</div>
</body>
</html>