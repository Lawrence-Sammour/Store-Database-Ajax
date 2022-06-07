<?php
 //get the worker name from the posted data from the browser
 $customer_city = $_POST['customer_city'];
 $customer_country = $_POST['customer_country'];
//  echo $customer_city;
 //open connection to mysql db
 $connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
 if($customer_city == "" && $customer_country==""){
     exit();
 }else{
     //"SELECT COUNT(DISTINCT customers.creditLimit) AS NumberOfCustomersWithACreditRange FROM customers where customers.creditLimit > "+ min.getText() + " AND customers.creditLimit < " + max.getText() + ";";
    $sql = "SELECT COUNT(DISTINCT customers.creditLimit) AS NumberOfCustomersWithACreditRange FROM customers where customers.creditLimit > $customer_city  AND customers.creditLimit < $customer_country ; ";
 }
 $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
mysqli_error($connection));
 //create an array
 $worker_array = array();
 while($row =mysqli_fetch_assoc($result)){
 $worker_array[] = $row;
 }
 echo json_encode($worker_array);
 //close the db connection
 mysqli_close($connection);?>
