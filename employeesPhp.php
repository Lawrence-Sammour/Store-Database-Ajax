<?php
 //get the worker name from the posted data from the browser
 $employeeNumber = $_POST['employeeNumber'];
 $lastName = $_POST['lastName'];
 $firstName = $_POST['firstName'];
 $officeCode = $_POST['officeCode'];
 $reportsTo = $_POST['reportsTo'];
 $jobTitle = $_POST['jobTitle'];

 //open connection to mysql db
$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 //fetch table rows from mysql db
$sql = "SELECT * FROM employees";

if(!empty($employeeNumber) || !empty($lastName) || !empty($firstName) || !empty($officeCode) ||
   !empty($reportsTo) || !empty($jobTitle)){
      $sql .= " WHERE ";

if($employeeNumber != "")
   $sql .= " employeeNumber like '%$employeeNumber%' AND";

if($firstName != "")
      $sql .= " firstName like '%$firstName%' AND";

if($officeCode != ""){

   if(is_numeric($officeCode)){

      $sql .= " officeCode = '$officeCode' AND";
   } else if(!is_numeric($officeCode)){
      echo "<script type='text/javascript'>alert('please enter a numric value in customer number textfield');</script>";
      return;
   }
}

if($jobTitle != ""){

   $sql .= " jobTitle like '%$jobTitle%' AND";
}

if($reportsTo != ""){

   if(is_numeric($reportsTo)){

      $sql .= " reportsTo = '$reportsTo' AND";
   } else if(!is_numeric($reportsTo)){
      echo"hi";
      return;
   }
}

if($lastName != ""){

    $sql .= " lastName like '%$lastName%' AND";
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
