<?php
 //get the worker name from the posted data from the browser
 $productCode = $_POST['productCode'];
 $productName = $_POST['productName'];
 $productLine = $_POST['productLine'];
 $productDescription = $_POST['productDescription'];
 $quantityInStock = $_POST['quantityInStock'];
 $buyPrice = $_POST['buyPrice'];

 $productCode = $_POST['productCode'];
 $productName = $_POST['productName'];
 $productLine = $_POST['productLine'];
 $productDescription = $_POST['productDescription'];
 $quantityInStock = $_POST['quantityInStock'];
 $buyPrice = $_POST['buyPrice'];

$connection = mysqli_connect("localhost","root","","webproject") or die("Error " .
mysqli_error($connection));
 
$query2 = "SELECT * FROM  `products`  WHERE `productCode` = '$productCode'";
   $result2 = mysqli_query($connection, $query2);
    if (!mysqli_num_rows($result2)){

    if(empty($productCode) || empty($productName) || empty($productLine) || empty($productDescription) || empty($quantityInStock) || empty($buyPrice)){


        if(empty($buyPrice)){

           echo "this field is required";
           return "";
        }
        if(empty($productCode)){

            echo "this field is required";
            return "";
         }
         if(empty($productName)){

            echo "this field is required";
            return "";
         }
         if(empty($productLine)){

            echo "this field is required";
            return "";
         }
         if(empty($productDescription)){

            echo "this field is required";
            return "";
         }
         if(empty($quantityInStock)){

            echo "this field is required";
            return "";
         }
    }
    else{

        $sql = "INSERT INTO products VALUES(";

        if(empty($productCode)){
            return"";
        }else{
            $sql .= "'" . $productCode . "' , ";
        }
        if(empty($productName)){
            return"";
        }else{
            $sql .= "'" . $productName . "' , ";
        }
        if(empty($productLine)){
            return"";
        }else{
            $sql .= "'" . $productLine . "' , ";
        }
        if(empty($productDescription)){
            return"";
        }else{
            $sql .= "'" . $productDescription . "' , ";
        }
        
        if(!is_numeric($quantityInStock) || empty($quantityInStock)){
            echo"Please enter a numeric value";
            return"";
        }else {
            $sql .= $quantityInStock . ",";
        }

        if(empty($buyPrice)){
            return"";
        }else{
            $sql .= "'" . $buyPrice . "')";
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
