<?php
 //get the worker name from the posted data from the browser
 $productLine = $_POST['productLine'];
 $textDescription = $_POST['textDescription'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM productlines";

if(!empty($productLine) || !empty($textDescription)){
      $sql .= " WHERE ";

if($productLine != "")
   $sql .= " productLine like '%$productLine%' AND";

if($textDescription != ""){
      $sql .= " textDescription like '%$textDescription%'";
}

if($textDescription == ""){
   $removeAnd = strrpos($sql, 'AND');
   $sql = substr($sql, 0, $removeAnd);
}

}
function alert($msg) {
   echo "<script type='text/javascript'>alert('$msg');</script>";
}

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
