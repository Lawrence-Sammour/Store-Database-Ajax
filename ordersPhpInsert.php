<?php
 //get the worker name from the posted data from the browser
 
 

 $orderNumber = $_POST['orderNumber'];
 $customerNumber = $_POST['customerNumber'];

 $orderDate = $_POST['orderDate'];

$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 
$sql = "INSERT INTO orders VALUES(";

$query2 = "SELECT * FROM  `orders`  WHERE `orderNumber`=$orderNumber ";
    $result2 = mysqli_query($connection, $query2);
    if (!mysqli_num_rows($result2)){

    if( empty($customerNumber) || empty($orderNumber) || empty($orderDate)){


        if(empty($orderDate)){

           echo "this field is required";
           return "";
        }
        if(empty($customerNumber)){

            echo "this field is required";
            return "";
         }
         if(empty($orderNumber)){

            echo "this field is required";
            return "";
         }
    }
    else{

        if(!is_numeric($orderNumber) || empty($orderNumber)){
            echo"Please enter a numeric value";
            return"";
        }else {
            $sql .= $orderNumber . ",";
        }

        if(empty($orderDate)){
            return"";
        }else{
            $sql .= "' " . $orderDate . "' , ";
        }

        if($customerNumber == ""){
            return"";
        }else{
            $sql .= $customerNumber . " );";
        }
       

    echo $sql;        
    }
} else{
    echo"Primary key is in use";
    return "";
}

 $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
    mysqli_error($connection));

echo  $result;
