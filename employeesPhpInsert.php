<?php
 //get the worker name from the posted data from the browser
 $employeeNumber = $_POST['employeeNumber'];
 $lastName = $_POST['lastName'];
 $firstName = $_POST['firstName'];
 $officeCode = $_POST['officeCode'];
 $reportsTo = $_POST['reportsTo'];
 $jobTitle = $_POST['jobTitle'];

$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));

$sql = "INSERT INTO employees VALUES(";

$query2 = "SELECT * FROM  `employees`  WHERE `employeeNumber`=$employeeNumber ";
    $result2 = mysqli_query($connection, $query2);
    if (!mysqli_num_rows($result2)){

    if(empty($employeeNumber) || empty($lastName) || empty($firstName) || empty($officeCode) || empty($jobTitle)){


        if(empty($employeeNumber)){

           echo "employeeNumber field is required";
           return "";
        }
        if(empty($lastName)){

            echo "lastName field is required";
            return "";
         }
         if(empty($firstName)){

            echo "firstName field is required";
            return "";
         }
         if(empty($officeCode)){

            echo "officeCode field is required";
            return "";
         }

         if(empty($jobTitle)){

            echo "jobTitle field is required";
            return "";
         }
    }
    else{

        $sql .=  "'" . $employeeNumber . "',";

        $sql .= "'" . $lastName . "',";

        $sql .= "'" . $firstName . "',";

        $sql .= "'" .$officeCode . "',";

        if(!empty($reportsTo)){
            
            $sql .= "'". $reportsTo . "',";

        } else{

            
        }

        $sql .= "'". $jobTitle . "')";

    echo $sql;        
    }
} else{
    echo"Primary key is in use";
    return "";
}

 $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
    mysqli_error($connection));

echo  $result;
