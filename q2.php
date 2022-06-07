<?php
 //get the worker name from the posted data from the browser
 $customer_city = $_POST['customer_city'];
 
//  echo $customer_city;
 //open connection to mysql db
 $connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
 if($customer_city == "" ){
     exit();
 }
 else{
     //SELECT * FROM products WHERE products.buyPrice >" + price.getText() + ";"
 $sql = "SELECT * FROM products where products.buyPrice > $customer_city ;";
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
