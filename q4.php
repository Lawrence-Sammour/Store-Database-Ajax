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


$sql = "SELECT customers.customerName, products.productName FROM customers , orders , orderdetails , products WHERE customers.customerNumber = orders.customerNumber AND orders.orderNumber = orderdetails.orderNumber AND orderdetails.productCode = products.productCode;";

$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    

		echo '
        <div class="column right" >
        <a href="queries.php"><img style= "height: 30px; padding : 2px 2px 2px 2px; width: 30px;" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a>
        <div class="m-4">
	<table class="table" style =" margin: 35px 65px; width: 90%;">
        ';
   
		echo '  <th class="table-light" >customerName </th>';
		echo '  <th class="table-light" >productName</th>';
	
      

while ($row = $result->fetch_assoc()) {

   echo "<tr>";
   echo "<td >". $row["customerName"] ."</td>" ;
   echo "<td >" . $row["productName"]. "</td>";

echo "</tr>";


  
}
echo '</table>'; 


   
   }else {
    echo "0 results";
}




?>