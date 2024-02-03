<!-- this will add a jersey to your cart-->

<?php
session_start();
// $cookie_name = "user";
// $cookie_value = "John Doe";
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>


<head>
    <meta charset="utf-8">
    <title>Final Browse</title>

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
            height: 30%;
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>Past Orders</h1>
    <div id='topnav' ; style='width:100%'>
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
$total = $_GET['total'];
echo "<div class='bar';> Here's what you ordered, $username!</div>";


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


$sql = "SELECT jerseys.url, jerseys.country, total_cart.amount, total_cart.total FROM total_cart INNER JOIN jerseys ON total_cart.jerseyID = jerseys.jerseyID where total_cart.userID = '$username' AND total_cart.pw = '$password'";
$result = $conn->query($sql);

$url = [];
$type = [];
$amt = [];
$total = [];
$i = 0;
echo "<div id='contain'; style='text-align:center; font-size: 30px; font-family:Verdana, Geneva, Tahoma, sans-serif'>";
echo " <ol> ";
while ($row = $result->fetch_array()) //get food and costs from database
{
    $url[$i] = $row[0];
    $type[$i] = $row[1];
    $amt[$i] = $row[2];
    $total[$i] = $row[3];
    echo ("<li> $type[$i]");

    echo ("<img src='$url[$i]'>"); //show image
    echo "x $amt[$i] for a total of: $ $total[$i]</br></br></br>";
    echo ("</li>");

    $i++;


}

echo " </ol> ";

$conn->close();
echo "</div>";

?>


    <footer>
        <div class='bar'>
            Thanks for Visiting Us! <br>

            <a href="index.php">Go Home</a>


        </div>
        <br><br>
        </div>
    </footer>

</html>

<script>



</script>