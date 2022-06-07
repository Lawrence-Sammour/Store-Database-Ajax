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

                <label for="customerNumber">customerNumber:</label>
                <input style="width: 170px;" type="text" id="customerNumber" name="customerNumber"><br><br>
                <label for="customerName">customerName:</label>
                <input style="width: 170px;" type="text" id="customerName" name="customerName"><br><br>
                <label for="salesRepEmployeeNumber">salesRepEmployeeNumber:</label>
                <input style="width: 170px;" type="text" id="salesRepEmployeeNumber" name="salesRepEmployeeNumber" placeholder="use this text field for search"><br><br>
                <select name="salesRepNum" id="salesRepNum" style="width: 170px;">
                <option value="">use this for insertion</option>
                <option value="null">null</option>
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "webproject") or die("Error " .
                        mysqli_error($connection));
                    $sql = "SELECT `employeeNumber` FROM `employees` ";

                    //echo $sql;
                    $result = mysqli_query($connection, $sql) or die("Error in Selecting " .
                        mysqli_error($connection));

                    $array = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $var = $row['employeeNumber'];
                        echo "<option value='$var'>$var</option>";
                    }
                   // echo"<option> null </option>";
                    //close the db connection
                    mysqli_close($connection);

                    ?>
                </select>
                
<br><br>

<label for="country">country:</label>
                <input style="width: 170px;" type="text" id="country" name="country"><br><br>
                <label for="city">city:</label>
                <input style="width: 170px;" type="text" id="city" name="city"><br><br>
                <label for="creditLimit">creditLimit:</label>
                <input style="width: 170px;" type="text" id="creditLimit" name="creditLimit"><br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-search">Search</button>
                <br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-insert"> INSERT</button>



                <script>
                    $(document).ready(function() {
                        $("#btn-search").click(function() {
                            let country = $('#country').val();
                            let city = $('#city').val();
                            let customerNumber = $('#customerNumber').val();
                            let customerName = $('#customerName').val();
                            let salesRepEmployeeNumber = $('#salesRepEmployeeNumber').val();
                            let creditLimit = $('#creditLimit').val();
                            $.ajax({
                                url: "customersPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    customer_country: country,
                                    customer_city: city,
                                    customer_number: customerNumber,
                                    custoemr_name: customerName,
                                    customer_salesRepEmployeeNumber: salesRepEmployeeNumber,
                                    customer_creditLimit: creditLimit
                                },
                                success: function(result) {
                                    console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>customerNumber</th><th>customerName</th><th>city</th><th>country</th><th>salesRepEmployeeNumber</th><th>creditLimit</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                            "<td class='table-light'>" + myObj[x].customerNumber + "</td>" +
                                            "<td class='table-light'>" + myObj[x].customerName + "</td>" +
                                            "<td class='table-light'>" + myObj[x].city + "</td>" +
                                            "<td class='table-light'>" + myObj[x].country + "</td>" +
                                            "<td class='table-light'>" + myObj[x].salesRepEmployeeNumber + "</td>" +
                                            "<td class='table-light'>" + myObj[x].creditLimit + "</td>" +
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
                            let country = $('#country').val();
                            let city = $('#city').val();
                            let customerNumber = $('#customerNumber').val();
                            let customerName = $('#customerName').val();
                            let salesRepEmployeeNumber = $('#salesRepNum').find(":selected").text();
                            let creditLimit = $('#creditLimit').val();
                            $.ajax({
                                url: "customersPhpInsert.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    'country': country,
                                    'city': city,
                                    'number': customerNumber,
                                    'name': customerName,
                                    'salesRepEmployeeNumber': salesRepEmployeeNumber,
                                    'creditLimit': creditLimit
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
                                url: "customersPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    customer_country: "",
                                    customer_city: "",
                                    customer_number: "",
                                    custoemr_name: "",
                                    customer_salesRepEmployeeNumber: "",
                                    customer_creditLimit: ""
                                },
                                success: function(result) {
                                    console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>customerNumber</th><th>customerName</th><th>city</th><th>country</th><th>salesRepEmployeeNumber</th><th>creditLimit</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                            "<td class='table-light'>" + myObj[x].customerNumber + "</td>" +
                                            "<td class='table-light'>" + myObj[x].customerName + "</td>" +
                                            "<td class='table-light'>" + myObj[x].city + "</td>" +
                                            "<td class='table-light'>" + myObj[x].country + "</td>" +
                                            "<td class='table-light'>" + myObj[x].salesRepEmployeeNumber + "</td>" +
                                            "<td class='table-light'>" + myObj[x].creditLimit + "</td>" +
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
                            <th class="table-light">customerNumber</th>
                            <th class="table-light">customerName</th>
                            <th class="table-light">city</th>
                            <th class="table-light">state</th>
                            <th class="table-light">country</th>
                            <th class="table-light">salesRepEmployees</th>
                            <th class="table-light">creditLimit</th>
                        </tr>
                </div>


                </script>

</body>

</html>
