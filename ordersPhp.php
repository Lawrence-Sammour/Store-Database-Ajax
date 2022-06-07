<?php
 //get the worker name from the posted data from the browser

 $orderNumber = $_POST['orderNumber'];
 $customerNumber = $_POST['customerNumber'];
 $orderDate = $_POST['orderDate'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM orders";

if( !empty($orderNumber) || !empty($customerNumber) || !empty($orderDate)){
      $sql .= " WHERE ";


if($orderNumber != ""){

   if(is_numeric($orderNumber)){

      $sql .= " orderNumber = '$orderNumber
' AND";
   } else if(!is_numeric($orderNumber)){
      echo "<script type='text/javascript'>alert('please enter a numric value in customer number textfield');</script>";
      return;
   }
}

if($orderDate != ""){

   $sql .= " orderDate like '%$orderDate%' AND";
}

if($customerNumber != ""){

   if(is_numeric($customerNumber)){

      $sql .= " customerNumber = '$customerNumber' AND";
   } else if(!is_numeric($customerNumber)){
      echo"hi";
      return;
   }
}





   $removeAnd = strrpos($sql, 'AND');
   $sql = substr($sql, 0, $removeAnd);

}
function alert($msg) {
   echo "<script type='text/javascript'>alert('$msg');</script>";
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
