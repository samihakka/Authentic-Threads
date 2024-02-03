<html>

<head>
    <meta charset="utf-8">
    <title>Order Summary</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
    <link type="text/css" rel="stylesheet" href="style.css">
    <style type='text/css'>
        html,
        body,
        select {
            font-size: 25px;
        }

        table {
            text-align: center;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            font-size: 20px;
            line-height: 2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: rgba(70, 66, 66, 0.61);
            border: 3px solid;
            border-color: #416f9a;
        }

        th {
            border: 1px solid;
            text-align: center;
        }

        td {
            border: 1px solid;
            padding-left: 5px;
        }

        #topnav {
            background-color: skyblue;
        }

        #topnav ul {
            display: flex;
        }

        #topnav li {
            list-style-type: none;
            padding: 0 10px;
        }

        #topnav li:hover {
            background-color: white;
        }

        #topnav li:first-child:hover {
            background-color: transparent;
        }

        img {
            height: 250px;
        }
    </style>
</head>

<body>



    <h1>Order Summary</h1>

    <div id="topnav">
        <ul>
            <li><a class="active" href="index.php"><img src="images/logo.jpeg" alt="Logo"
                        style="height: 100%; width: 45px; float: left; margin: auto;"></a></li>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a class="active" href="browse.php">Browse</a></li>
            <li><a class="active" href="order_request.php">Orders</a></li>
        </ul>
    </div>

    <?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    echo "<div class=bar>Thanks for your order, $username!</div>";
    // echo "<h2 id='welcome'> Thanks for your order, $username!</h2>";

    $servername = "localhost";
    $userid = "uudug5nc5vgis";
    $pw = "1sg2/@13dGin";
    $db = "dbigb8vos983zi";

    // Create connection
    $conn = new mysqli($servername, $userid, $pw);
    $conn->select_db($db);
    if ($conn->connect_error) {
        echo "error: ";
        echo $conn->connect_error;
    }

    //view the order
    $totalOrder = 0;
    $jerseyTotal = 50;
    $sql = "SELECT url, country FROM jerseys";
    $result = $conn->query($sql);
    $i = 0;
    while ($row = $result->fetch_array()) //get food and costs from database
    {
        $url[$i] = $row[0];
        $country[$i] = $row[1];
        $i++;

    }
    for ($x = 0; $x < $i; $x++) {
        $jerseyxamt[$x] = $_GET['jersey' . $x];
        if ($jerseyxamt[$x] != 0) {
            $totalOrder = 50 * $jerseyxamt[$x];
            // echo $total;
            $jerseyTotal *= $jerseyxamt[$x];
            echo ("<img src='$url[$x]'>"); //show image
            echo "$country[$x] x $jerseyxamt[$x] <br>";

            //insert the order
            $sql = "INSERT INTO `total_cart` (`userID`, `pw`, `jerseyID`, `amount`, `total`) VALUES ('$username', '$password', '$x','$jerseyxamt[$x]', '$jerseyTotal')";
            // $sql = "SELECT * FROM jerseys";
            $result = $conn->query($sql);

        }
    }

    
    echo "<h2>Order Total: $ $totalOrder</h2>";

    $conn->close();

    ?>

    <form action="https://authentic-threads.herokuapp.com/view_orders.php">


        <div class=bar>
            Check out your orders:
            <input type="text" placeholder="username" name="username" value="<?php if (isset($username)) { echo $username; } ?>" id='theusername'>
            <input type="password" placeholder="password" name="password" value="<?php if (isset($password)) { echo $password; } ?>" id='thepassword'>

            
            
            <input type="submit" value="View Orders">
        </div>
    </form>

</html>

<script>

</script>