<?php
 //get the worker name from the posted data from the browser
 $customer_country = $_POST['country'];
 $customer_city = $_POST['city'];
 $customer_number = $_POST['number'];
 $customer_salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
 $customer_creditLimit = $_POST['creditLimit'];
 $customer_name = $_POST['name'];

$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 
$sql = "INSERT INTO customers VALUES(";

$query2 = "SELECT * FROM  `customers`  WHERE `customerNumber`=$customer_number ";
    $result2 = mysqli_query($connection, $query2);
    if (!mysqli_num_rows($result2)){

    if(empty($customer_country) || empty($customer_city) || empty($customer_number) || empty($customer_name)){


        if(empty($customer_name)){

           echo "this field is required";
           return "";
        }
        if(empty($customer_country)){

            echo "this field is required";
            return "";
         }
         if(empty($customer_city)){

            echo "this field is required";
            return "";
         }
         if(empty($customer_number)){

            echo "this field is required";
            return "";
         }
    }
    else{

        if(!is_numeric($customer_number) || empty($customer_number)){
            echo"Please enter a numeric value";
            return"";
        }else {
            $sql .= $customer_number . ",";
        }

        if(empty($customer_name)){
            return"";
        }else{
            $sql .= "' " . $customer_name . "' , ";
        }

        if(empty($customer_city)){
            return"";
        }else{
            $sql .= "' " . $customer_city . "' , ";
        }
        if(empty($customer_country)){
            return"";
        }else{
            $sql .= "' " . $customer_country . "' , ";
        }

        if($customer_salesRepEmployeeNumber == ""){
            $sql .=  " 'Null', ";
        }else{
            $sql .= $customer_salesRepEmployeeNumber . " , ";
        }
        if(empty($customer_creditLimit)){
            $sql .=  " 'Null')";
        }else if(!empty($customer_creditLimit)){

            if(!is_numeric($customer_creditLimit)){

              echo"Please enter a numeric value";
              return "";
            } else{

                $sql .=  $customer_creditLimit . " );";
            }

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
