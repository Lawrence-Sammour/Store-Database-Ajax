<?php
//get the worker name from the posted data from the browser
$orderNumber = $_POST['orderNumber'];
$productCode = $_POST['productCode'];
$quantityOrdered = $_POST['quantityOrdered'];
$priceEach = $_POST['priceEach'];
$orderLineNumber = $_POST['orderLineNumber'];

//open connection to mysql db
$connection = mysqli_connect("localhost", "root", "", "webproject") or die("Error " .
    mysqli_error($connection));
//fetch table rows from mysql db
$sql = "SELECT * FROM orderdetails";

if (
    !empty($orderNumber) || !empty($productCode) || !empty($quantityOrdered) || !empty($priceEach) ||
    !empty($orderLineNumber)
) {
    $sql .= " WHERE ";

    if ($orderNumber != "") {

        if (is_numeric($orderNumber)) {

            $sql .= " orderNumber = '$orderNumber' AND";
        } else if (!is_numeric($orderNumber)) {
            echo "<script type='text/javascript'>alert('please enter a numric value in orderNumber textfield');</script>";
            return;
        }
    }

    if ($productCode != "")
        $sql .= " productCode like '%$productCode%' AND";

    if ($quantityOrdered != "") {

        if (is_numeric($quantityOrdered)) {

            $sql .= " quantityOrdered = '$quantityOrdered' AND";
        } else if (!is_numeric($quantityOrdered)) {
            echo "<script type='text/javascript'>alert('please enter a numric value in quantity number textfield');</script>";
            return;
        }
    }

    if ($priceEach != "") {

        if (is_numeric($priceEach)) {

            $sql .= " priceEach = '$priceEach' AND";
        } else if (!is_numeric($priceEach)) {
            echo "<script type='text/javascript'>alert('please enter a numric value in priceEach textfield');</script>";
            return;
        }
    }

    if ($orderLineNumber != "") {

        if (is_numeric($orderLineNumber)) {

            $sql .= " orderLineNumber ='$orderLineNumber' AND";
        } else if (!is_numeric($orderLineNumber)) {
            alert("You Entered a String in orderLineNumber");
            return;
        }
    }



    $removeAnd = strrpos($sql, 'AND');
    $sql = substr($sql, 0, $removeAnd);
}
function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
//echo $sql;
$result = mysqli_query($connection, $sql) or die("Error in Selecting " .
    mysqli_error($connection));

$array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $array[] = $row;
}

echo json_encode($array);
//close the db connection
mysqli_close($connection);
