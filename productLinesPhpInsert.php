<?php
//get the worker name from the posted data from the browser
$productLine = $_POST['productLine'];
$textDescription = $_POST['textDescription'];

$connection = mysqli_connect("localhost", "root", "", "webproject") or die("Error " .
    mysqli_error($connection));

$sql = "INSERT INTO productlines VALUES(";

$query2 = "SELECT * FROM  `productlines`  WHERE `productLine`= '$productLine'";
$result2 = mysqli_query($connection, $query2);
if (!mysqli_num_rows($result2)) {

    if (empty($productLine)) {

        echo "productLine is required";
        return "";
    } else {

        $sql .= "'" . $productLine . "',";

        if ($textDescription != "") {

            $sql .= "'" . $textDescription . "')";
        } else {

            $sql .= "'null')";
        }
    }

    echo $sql;
} else {
    echo "Primary key is in use";
    return "";
}

$result = mysqli_query($connection, $sql) or die("Error in Selecting " .
    mysqli_error($connection));

echo  $result;
