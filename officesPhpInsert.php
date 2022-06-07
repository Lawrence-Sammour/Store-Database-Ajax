<?php
 //get the worker name from the posted data from the browser
 $country = $_POST['country'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $officeCode = $_POST['officeCode'];


$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 
$sql = "INSERT INTO offices VALUES (";

$query2 = "SELECT * FROM  `offices`  WHERE `officeCode`= $officeCode";
    $result2 = mysqli_query($connection, $query2);
    if (!mysqli_num_rows($result2)){

    if(empty($country) || empty($city) || empty($officeCode) ){


      
        if(empty($country)){

            echo "this field is required";
            return "";
         }
         if(empty($city)){

            echo "this field is required";
            return "";
         }
         if(empty($officeCode)){

            echo "this field is required";
            return "";
         }
    }
    else{

        if(!is_numeric($officeCode) || empty($officeCode)){
            echo"Please enter a numeric value";
            return"";
        }else {
            $sql .= $officeCode. ",";
        }
if(empty($city)){
            return"";
        }else{
            $sql .= "' " . $city . "' , ";
        }
        if(empty($state)){
            $sql .=  " 'Null', ";
        }else{
            $sql .= "' " . $state . "' , ";
        }

        
        if(empty($country)){
            return"";
        }else{
            $sql .= "' " . $country . "' ); ";
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
