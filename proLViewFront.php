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
    <a href="index.php"><img style="height: 30px; padding : 2px 2px 2px 2px; width: 30px;" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a>
    <div class="row">
        <div class="column left" style=" padding: 30px 75px 0px 90px;">
            <div class="container">
                <label for="productLine">productLine:</label>
                <input style="width: 170px;" type="text" id="productLine" name="productLine"><br><br>
                <label for="textDescription">Description:</label>
                <input style="width: 170px;" type="text" id="textDescription" name="textDescription"><br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-search">Search</button>
                <br><br>
                <button style="width: 170px;background-color: #002db3;color: white;" class="btn btn-default" id="btn-insert"> INSERT</button>

                <script>
                    $(document).ready(function() {
                        $("#btn-search").click(function() {
                            let productLine = $('#productLine').val();
                            let textDescription = $('#textDescription').val();
                            $.ajax({
                                url: "productLinesPhp.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    productLine: productLine,
                                    textDescription: textDescription
                                },
                                success: function(result) {
                                    //console.log(result, "hello world");
                                    const myObj = JSON.parse(result);
                                    let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>productLine</th><th>textDescription</th></tr>"
                                    for (let x in myObj) {
                                        text += "<tr>" +
                                            "<td class='table-light'>" + myObj[x].productLine + "</td>" +
                                            "<td class='table-light'>" + myObj[x].textDescription + "</td>" +
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
                            let productLine = $('#productLine').val();
                            let textDescription = $('#textDescription').val();
                            $.ajax({
                                url: "productLinesPhpInsert.php",
                                cache: false,
                                timeout: 2000,
                                type: "POST",
                                data: {
                                    'productLine': productLine,
                                    'textDescription': textDescription
                                },
                                success: function(result) {
                                    alert(result);
                                    // loadAllData();
                                    
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert("Error:\n" + thrownError)
                                }
                            });
                        });

                        // function loadAllData() {
                        //     $.ajax({
                        //         url: "productLinesPhp.php",
                        //         cache: false,
                        //         timeout: 2000,
                        //         type: "POST",
                        //         data: {
                        //             productLine = "",
                        //             textDescription = ""
                        //         },
                        //         success: function(result) {
                        //             // console.log(result, "hello world");
                        //             const myObj = JSON.parse(result);
                        //             let text = "<table class='table' style =' margin: 35px 65px; width: 90%;'><tr><th>productLine</th><th>textDescription</th></tr>"
                        //             for (let x in myObj) {
                        //                 text += "<tr>" +
                        //                     "<td class='table-light'>" + myObj[x].productLine + "</td>" +
                        //                     "<td class='table-light'>" + myObj[x].textDescription + "</td>" +
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
                            <th class="table-light">productLine</th>
                            <th class="table-light">textDescription</th>
                        </tr>
                </div>


                </script>

</body>

</html>