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
 }if($customer_city == ""){
 $sql = "SELECT * FROM customers where country like '$customer_country%' ";
 }
 elseif($customer_country == ""){
 $sql = "SELECT * FROM customers where city like '%$customer_city%'";
 }else{
    $sql = "SELECT * FROM customers where city like '%$customer_city%' OR country like '%$customer_country%' ";
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
