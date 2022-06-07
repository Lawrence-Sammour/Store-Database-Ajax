<?php
 //get the worker name from the posted data from the browser
 $productCode = $_POST['productCode'];
 $productName = $_POST['productName'];
 $productLine = $_POST['productLine'];
 $productDescription = $_POST['productDescription'];
 $quantityInStock = $_POST['quantityInStock'];
 $buyPrice = $_POST['buyPrice'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM products";

if(!empty($productCode) || !empty($productName) || !empty($productLine) || !empty($productDescription) ||
   !empty($quantityInStock) || !empty($buyPrice)){
      $sql .= " WHERE ";

if($productCode != "")
   $sql .= " productCode like '%$productCode%' AND";

if($productName != "")
      $sql .= " city like '%$productName%' AND";

      if($productLine != "")
      $sql .= " productLine like '%$productLine%' AND";

if($productDescription != ""){

   $sql .= " productDescription like '%$productDescription%' AND";
}

if($quantityInStock != ""){

   if(is_numeric($quantityInStock)){

      $sql .= " quantityInStock = '$quantityInStock' AND";
   } else if(!is_numeric($quantityInStock)){
     
      return;
   }
}

if($buyPrice != ""){

   if(is_numeric($buyPrice)){

      $sql .= " buyPrice ='$buyPrice' AND";
   }
   else if(!is_numeric($buyPrice)){
      alert("enter numeric");
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
