<?php
 //get the worker name from the posted data from the browser
 $country = $_POST['country'];
 $city = $_POST['city'];
 $officeCode = $_POST['officeCode'];
 $state = $_POST['state'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM offices";

if(!empty($country) || !empty($city) || !empty($officeCode) ||  !empty($state)){
      $sql .= " WHERE ";

if($country != "")
   $sql .= " country like '%$country%' AND";

if($city != "")
      $sql .= " city like '%$city%' AND";

if($officeCode != ""){

   if(is_numeric($officeCode)){

      $sql .= " officeCode = '$officeCode' AND";
   } else if(!is_numeric($officeCode)){
      echo "<script type='text/javascript'>alert('please enter a numric value in customer number textfield');</script>";
      return;
   }
}

if($state != ""){

   $sql .= " state like '%$state%' AND";
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
