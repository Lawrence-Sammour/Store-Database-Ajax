<?php
 //get the worker name from the posted data from the browser
 $customer_country = $_POST['customer_country'];
 $customer_city = $_POST['customer_city'];
 $customer_number = $_POST['customer_number'];
 $customer_salesRepEmployeeNumber = $_POST['customer_salesRepEmployeeNumber'];
 $customer_creditLimit = $_POST['customer_creditLimit'];
 $customer_name = $_POST['custoemr_name'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM customers";

if(!empty($customer_country) || !empty($customer_city) || !empty($customer_number) || !empty($customer_salesRepEmployeeNumber) ||
   !empty($customer_creditLimit) || !empty($customer_name)){
      $sql .= " WHERE ";

if($customer_country != "")
   $sql .= " country like '%$customer_country%' AND";

if($customer_city != "")
      $sql .= " city like '%$customer_city%' AND";

if($customer_number != ""){

   if(is_numeric($customer_number)){

      $sql .= " customerNumber = '$customer_number' AND";
   } else if(!is_numeric($customer_number)){

      return;
   }
}

if($customer_name != ""){

   $sql .= " customerName like '%$customer_name%' AND";
}

if($customer_salesRepEmployeeNumber != ""){

   if(is_numeric($customer_salesRepEmployeeNumber)){

      $sql .= " salesRepEmployeeNumber = '$customer_salesRepEmployeeNumber' AND";
   } else if(!is_numeric($customer_salesRepEmployeeNumber)){

      return;
   }
}

if($customer_creditLimit != ""){

   if(is_numeric($customer_creditLimit)){

      $sql .= " creditLimit ='$customer_creditLimit' AND";
   }
   else if(!is_numeric($customer_creditLimit)){
      return;
   }
}



   $removeAnd = strrpos($sql, 'AND');
   $sql = substr($sql, 0, $removeAnd);

}
 //echo $sql;
 $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
    mysqli_error($connection));

 $array = array();
 while($row = mysqli_fetch_assoc($result)){
 $array[] = $row;
 }

 echo json_encode($array);
 //close the db connection
 mysqli_close($connection);
 ?>
