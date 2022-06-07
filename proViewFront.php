<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two unequal columns that floats next to each other */
        .column {
            float: left;
            padding: 10px;
            height: 100%;
            /* Should be removed. Only for demonstration */
        }

        .left {
            width: 25%;

        }

        .right {
            width: 75%;


        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <a href="index.html"><img style="height: 30px; padding : 2px 2px 2px 2px; width: 30px;" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a>
    <div class="row">
        <div class="column left" style=" padding: 30px 75px 0px 90px;">
            <div class="container">
                <label for="productCode">productCode:</label>
                <input style="width: 170px;" type="text" id="productCode" name="productCode"><br><br>

                <label for="productName">productName:</label>
                <input style="width: 170px;" type="text" id="productName" name="productName"><br><br>

                <label for="productLine">productLine:</label>
                <input style="width: 170px;" type="text" id="productLine" name="productLine" placeholder="use this text field for search"><br><br>
                <select name="prodL" id="prodL" style="width: 170px;">
                    <small> Use this for insertion </small>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "webproject") or die("Error " .
                        mysqli_error($connection));
                    $sql = "SELECT `productLine` FROM `productlines` ";

                    //echo $sql;
                    $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
                        mysqli_error($connection));

                    $array = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $var = $row['productLine'];
                        echo "<option value='$var'>$var</option>";
                    }
                    // echo"<option> null </option>";
                    //close the db connection
                    mysqli_close($connection);
                    ?>
                </select> <br><br>

                <label for="productDescription">productDescription:</label>
                <input style="width: 170px;" type="text" id="productDescription" name="productDescription"><br><br>

                <label for="quantityInStock">quantityInStock:</label>
                <input style="width: 170px;" type="text" id="quantityInStock" name="quantityInStock"><br><br>



                <label for="buyPrice">buyPrice:</label>
                <input style="width: 170px;" type="text" id="buyPrice" name="buyPrice"><br><br>

                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-search">Search</button>
                <br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-insert"> INSERT</button>



                <script>
                    $(document).ready(function() {
                        $("#btn-search").click(function() {
                            let productCode = $('#productCode').val();
                            let productName = $('#productName').val();
                            let productLine = $('#productLine').val();
                            let productDescription = $('#productDescription').val();
                            let quantityInStock = $('#quantityInStock').val();
                            let buyPrice = $('#buyPrice').val();
                            $.ajax({
                                url: "productsPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    productCode: productCode,
                                    productName: productName,
                                    productDescription: productDescription,
                                    quantityInStock: quantityInStock,
                                    productLine: productLine,
                                    buyPrice: buyPrice
                                },
                                success: function(result) {
                                    console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productDescription</th><th>quantityInStock</th><th>buyPrice</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                            "<td class='table-light'>" + myObj[x].productCode + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productName + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productLine + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productDescription + "</td>" +
                                            "<td class='table-light'>" + myObj[x].quantityInStock + "</td>" +
                                            "<td class='table-light'>" + myObj[x].buyPrice + "</td>" +
                                            "</tr>";
                                    }
                                    text += "</table>"
                                    document.getElementById("div1").innerHTML = text;
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert("Error:\n" + thrownError)
                                }
                            });
                        });
                        //Seelctor.........................
                        $("#btn-insert").click(function() {
                            let productCode = $('#productCode').val();
                            let productName = $('#productName').val();
                            let productLine = $('#prodL').find(":selected").text();
                            let productDescription = $('#productDescription').val();
                            let quantityInStock = $('#quantityInStock').val();
                            let buyPrice = $('#buyPrice').val();

                            $.ajax({
                                url: "productsPhpInsert.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    'productCode': productCode,
                                    'productName': productName,
                                    'productLine': productLine,
                                    'productDescription': productDescription,
                                    'quantityInStock': quantityInStock,
                                    'buyPrice': buyPrice
                                },
                                success: function(result) {
                                    alert(result);
                                    loadAllData();
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert("Error:\n" + thrownError)
                                }
                            });
                        });

                        function loadAllData() {
                            $.ajax({
                                url: "productsPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    productCode: "",
                                    productName: "",
                                    productLine: "",
                                    productDescription: "",
                                    quantityInStock: "",
                                    buyPrice: ""
                                },
                                success: function(result) {
                                    console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>productCode</th><th>productName</th><th>productLine</th><th>productDescription</th><th>quantityInStock</th><th>buyPrice</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                        "<td class='table-light'>" + myObj[x].productCode + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productName + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productLine + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productDescription + "</td>" +
                                            "<td class='table-light'>" + myObj[x].quantityInStock + "</td>" +
                                            "<td class='table-light'>" + myObj[x].buyPrice + "</td>" +
                                            "</tr>";
                                    }
                                    text += "</table>"
                                    document.getElementById("div1").innerHTML = text;
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert("Error:\n" + thrownError)
                                }
                            });

                        }
                    });
                </script>


                <br><br><br><br><br>
            </div>

        </div>
        <div class="column right">
            <div class="m-4">
                <div id="div1">
                    <table class="table" style=" margin: 35px 65px; width: 90%;">
                        <tr>
                            <td class='table-light'> productName </td>
                            <td class='table-light'> productName </td>
                            <td class='table-light'> productLine </td>
                            <td class='table-light'> productDescription </td>
                            <td class='table-light'> quantityInStock </td>
                            <td class='table-light'> buyPrice </td>
                        </tr>
                </div>


                </script>

</body>

</html>