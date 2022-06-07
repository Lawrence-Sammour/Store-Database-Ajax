<?PHP
    session_start();

    if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

        header ("Location: login.php");
    }
?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            background-image: url(cool-background.png);
        }
        button {
            margin: 20px;
            margin-bottom: 10px;
            display: block;
            width: 250px;
            border-radius: 4px;
            width: 180px;
        }


        .grid-container {
            display: grid;
            grid-gap: auto;
            grid-template-columns: auto auto;
            width: 100vw;
            height: 100vh;
        }

        .grid-item {
            padding: 20px;
            font-size: 30px;
            text-align: center;
            border: 0.5px solid white;
        }

        p {
            text-align: center;
            font-size: 24px;
            color: white;
        }
        @media screen and (max-width: 600px) {
            .grid-container {
                display: grid;
                grid-gap: 10px;
                grid-template-columns: auto;
                padding: 10px;
                width: 100%;
                height: 100%;
            }
        }
    </style>

</head>

<body>
<a href="index.html"><img style= "height: 30px; padding : 2px 2px 2px 2px; width: 30px; color:white" src="https://cdn2.iconfinder.com/data/icons/simple-circular-icons-line/84/Left_Arrow_-512.png" alt="go back button"></a>
    <div class="grid-container">
        <div class="grid-item">
            <form action="q1.html" method="post">
                <button class="btn btn-secondary" type="submit" name="q1" value="q1"> Query 1</button>
                <p>Query to show products that had been ordered by customers from certain city or certain country.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q2.html" method="post">
                <button class="btn btn-secondary" type="submit" name="q2" value="q2">Query 2</button>
                <p>Query to show products details that its price is more than particular price</p>
            </form>
        </div>
        <div class="grid-item">
            <form action="q3.html" method="post">
                <button class="btn btn-secondary" type="submit" name="q3" value="q3"> Query 3 </button>
                <p>Query to show number of customers who their credit limits within a given range.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q4.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q4" value="q4"> Query 4 </button>
                <p>Query to show customers names and products names they had ordered.
                </p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q5.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q5" value="q5"> Query 5 </button>
                <p>Query of products that they have in the description some one or more keywords.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q6.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q6" value="q6"> Query 6</button>
                <p>Query to show employees names and the orders they facilitated.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q7.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q7" value="q7"> Query 7 </button>
                <p>Query to show employees names and total prices of products they sold.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q8.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q8" value="q8"> Query 8 </button>
                <p>Query to show offices names and amount of money earned through their sales representatives.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q9.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q9" value="q9"> Query 9</button>
                <p>Query to show employees names who don’t have sell any product.</p>
            </form>
        </div>

        <div class="grid-item">
            <form action="q10.php" method="post">
                <button class="btn btn-secondary" type="submit" name="q10" value="q10"> Query 10</button>
                <p>Query to show employees names who sold at least one product.</p>
            </form>
            <div>
            </div>

</body>

</html>