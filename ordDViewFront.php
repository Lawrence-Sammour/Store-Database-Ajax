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
                <label for="orderNumber">orderNumber:</label>
                <input style="width: 170px;" type="text" id="orderNumber" name="orderNumber"><br><br>
                <label for="productCode">productCode:</label>
                <input style="width: 170px;" type="text" id="productCode" name="productCode"><br><br>
                <label for="quantityOrdered">quantityOrdered:</label>
                <input style="width: 170px;" type="text" id="quantityOrdered" name="quantityOrdered"><br><br>
                <label for="priceEach">priceEach:</label>
                <input style="width: 170px;" type="text" id="priceEach" name="priceEach"><br><br>
                <label for="orderLineNumber">orderLineNumber:</label>
                <input style="width: 170px;" type="text" id="orderLineNumber" name="orderLineNumber" placeholder="use this text field for search"><br><br>

                <br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-search">Search</button>


                <script>
                    $(document).ready(function() {
                        $("#btn-search").click(function() {
                            let orderNumber = $('#orderNumber').val();
                            let productCode = $('#productCode').val();
                            let quantityOrdered = $('#quantityOrdered').val();
                            let priceEach = $('#priceEach').val();
                            let orderLineNumber = $('#orderLineNumber').val();
                
                            $.ajax({
                                url: "orderDetailsPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    orderNumber: orderNumber,
                                    productCode: productCode,
                                    quantityOrdered: quantityOrdered,
                                    priceEach: priceEach,
                                    orderLineNumber: orderLineNumber
                                },
                                success: function(result) {
                                    //console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>orderNumber</th><th>productCode</th><th>quantityOrdered</th><th>priceEach</th><th>orderLineNumber</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                            "<td class='table-light'>" + myObj[x].orderNumber + "</td>" +
                                            "<td class='table-light'>" + myObj[x].productCode + "</td>" +
                                            "<td class='table-light'>" + myObj[x].quantityOrdered + "</td>" +
                                            "<td class='table-light'>" + myObj[x].priceEach + "</td>" +
                                            "<td class='table-light'>" + myObj[x].orderLineNumber + "</td>" +
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
                        // $("#btn-insert").click(function() {
                        //     let country = $('#country').val();
                        //     let city = $('#city').val();
                        //     let customerNumber = $('#customerNumber').val();
                        //     let customerName = $('#customerName').val();
                        //     let salesRepEmployeeNumber = $('#salesRepNum').find(":selected").text();
                        //     let creditLimit = $('#creditLimit').val();
                        //     $.ajax({
                        //         url: "customersPhpInsert.php",
                        //         cache: false,
                        //         timeout: 2000,
                        //         type: "POST",
                        //         data: {
                        //             'country': country,
                        //             'city': city,
                        //             'number': customerNumber,
                        //             'name': customerName,
                        //             'salesRepEmployeeNumber': salesRepEmployeeNumber,
                        //             'creditLimit': creditLimit
                        //         },
                        //         success: function(result) {
                        //             alert(result);
                        //             loadAllData();
                        //         },
                        //         error: function(xhr, ajaxOptions, thrownError) {
                        //             alert("Error:\n" + thrownError)
                        //         }
                        //     });
                        // });

                        // function loadAllData() {
                        //     $.ajax({
                        //         url: "customersPhp.php",
                        //         cache: false,
                        //         timeout: 2000,
                        //         type: "POST",
                        //         data: {
                        //             customer_country: "",
                        //             customer_city: "",
                        //             customer_number: "",
                        //             custoemr_name: "",
                        //             customer_salesRepEmployeeNumber: "",
                        //             customer_creditLimit: ""
                        //         },
                        //         success: function(result) {
                        //             console.log(result, "hello world");
                        //             const myObj = JSON.parse(result);
                        //             let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>customerNumber</th><th>customerName</th><th>city</th><th>country</th><th>salesRepEmployeeNumber</th><th>creditLimit</th></tr>"
                        //             for (let x in myObj) {
                        //                 text += "<tr>" +
                        //                     "<td class='table-light'>" + myObj[x].customerNumber + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].customerName + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].city + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].country + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].salesRepEmployeeNumber + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].creditLimit + "</td>" +
                        //                     "</tr>";
                        //             }
                        //             text += "</table>"
                        //             document.getElementById("div1").innerHTML = text;
                        //         },
                        //         error: function(xhr, ajaxOptions, thrownError) {
                        //             alert("Error:\n" + thrownError)
                        //         }
                        //     });

                        // }
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
                            <th class="table-light">orderNumber</th>
                            <th class="table-light">productCode</th>
                            <th class="table-light">quantityOrdered</th>
                            <th class="table-light">priceEach</th>
                            <th class="table-light">orderLineNumber</th>

                        </tr>
                </div>


                </script>

</body>

</html>