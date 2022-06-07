<?php

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

</style>'; 
$user = 'root';
$pass = 'root';
$db = 'webproject';


$conn = new mysqli('localhost',$user , $pass, $db) or die("Unable to connect");


$sql = "SELECT offices.officeCode , payments.amount FROM offices,employees,customers,payments WHERE offices.officeCode = employees.officeCode AND employees.employeeNumber = customers.salesRepEmployeeNumber AND customers.customerNumber = payments.customerNumber GROUP BY offices.officeCode ORDER BY offices.officeCode ASC;";

$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    

		echo ' 
        <div class="column right" >
        <a href="queries.php"><img style= "height: 30px; padding : 2px 2px 2px 2px; width: 30px;" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a> 
        <div class="m-4">
	<table class="table" style =" margin: 35px 65px; width: 90%;">
        ';
   
		echo '  <th class="table-light" >officeCode  </th>';
		echo '  <th class="table-light" >amount</th>';
	
      

while ($row = $result->fetch_assoc()) {

   echo "<tr>";
   echo "<td >". $row["officeCode"] ."</td>" ;
   echo "<td >" . $row["amount"]. "</td>";

echo "</tr>";


  
}
echo '</table>'; 


   
   }else {
    echo "0 results";
}




?>