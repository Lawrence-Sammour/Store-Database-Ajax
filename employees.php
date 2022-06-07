<?php

$user = 'root';
$pass = 'root';
$db = 'webproject';


$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


$sql = "SELECT * FROM employees";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
	
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	 
	  <style>
* {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 100%; /* Should be removed. Only for demonstration */
}

.left {
  width: 25%;
  
}

.right {
  width: 75%;
 

}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
	 
	  </head>
	<body>
	<a href="index.html"><img style= "height: 30px; padding : 2px 2px 2px 2px; width: 30px;" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a>
	<div class="row">
	<div class="column left" style = " padding: 30px 75px 0px 90px;">

	<div class="container" >
	
	  <form action="/action_page.php">
		<div class="form-group" >
		</br>
		  <label for="num">Employee Number:</label>
		  <input style="width: 170px;" class="form-control" id="emp" placeholder="Enter employee number" name="num" required>
		</div>
		
		 <div class="form-group">
		   <label for="lastname">Last Name:</label>
		  <input   style="width: 170px;" class="form-control" id="lname" placeholder="Enter employee last name" name="lname" required>
		</div>
		
		  <div class="form-group">
		   <label for="firstname">First Name:</label>
		  <input  style="width: 170px;" class="form-control" id="fname" placeholder="Enter employee first name" name="fname" required>
		</div>
		
		 
	   
	
	   <div class="form-group">
		   <label for="job">Job Title:</label>
		  <input  style="width: 170px;"  class="form-control" id="job" placeholder="Enter employee job title" name="job" required>
		</div>
		
		<button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default">Search</button>
		</br>
		</br>
		<button style="width: 170px;background-color: #002db3;color: white;" type="submit" class="btn btn-blue">Add</button>
		</br>
		</br>
	
		
		</form>
	</div>
	
	</div>
	<div class="column right" >
	';
	echo '<div class="m-4">
	<table class="table" style =" margin: 35px 65px; width: 90%;">';

	echo '  <th class="table-light">employeeNumber </th>';
	echo '  <th class="table-light" >lastName</th>';
	echo '  <th class="table-light" >firstName </th>';
	echo '  <th class="table-light" >officeCode </th>';
	echo '  <th class="table-light" >reportsTo </th>';
	echo '  <th class="table-light" >jobTitle </th>';


	while ($row = $result->fetch_assoc()) {

		echo "<tr>";
		echo "<td >" . $row["employeeNumber"] . "</td>";
		echo "<td >" . $row["lastName"] . "</td>";
		echo "<td >" . $row["firstName"] . "</td>";
		echo "<td >" . $row["officeCode"] . "</td>";
		echo "<td >" . $row["reportsTo"] . "</td>";
		echo "<td >" . $row["jobTitle"] . "</td> ";
		echo "</tr>";
	}
	echo '</table> </div> </div></body>
	</html>';
} else {
	echo "0 results";
}
