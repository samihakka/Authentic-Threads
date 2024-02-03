<html>


<head>
    <meta charset="utf-8">
    <title>Browse</title>

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
    <h1>Our Jerseys</h1>
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
    echo "<form action='https://authentic-threads.herokuapp.com/orderReciept.php' onsubmit = 'return validate()'>";

    $username = $_GET['username'];
    $password = $_GET['password'];
    // echo "<h2 id='welcome'> Welcome, user: $username </h2>";


    echo "<div class='bar'> Each jersey is $50</div>";



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

    
    // Connect to the database and execute the SQL query to retrieve the images
    $sql = "SELECT url, country FROM jerseys";
    $result = $conn->query($sql);
 
 
    // Start a table
    echo "<table>";
 
    // Set up a table row for each image
    echo "<tr>";
    $i = 0;
    while ($row = $result->fetch_array()) {
        // Show the image in a table cell
        echo "<td><img src='$row[0]'>$row[1]</td>";
 
        // Show the options in a table cell
        echo "<td>
    <select name='jersey$i'>";
        for ($x = 0; $x < 5; $x++) {
            echo "<option>" . $x . "</option>";
        }
        echo "</select>";
        echo "</td>";
 
        // End the table row and start a new one every two elements
        $i++;
        if ($i % 2 == 0) {
            echo "</tr><tr>";
        }
    }
 
    // End the table
    echo "</tr></table>";
 
    // Close the database connection
    $conn->close();
    ?>

    

        


    </div>
    <div>


    <div class='bar'>

        Enter your username and password here:
        <input type="text" placeholder="username" name="username" value="" id='theusername'>
        <input type="password" placeholder="password" name="password" value="" id='thepassword'>


        <input type='submit' value='SUBMIT ORDER'>

        <br>




    </div>



    </form>


</html>

<script>

    function validate() {

        

        if (document.getElementById('theusername').value == "") {
            alert("Please enter username");
            return false;
        }

        if (document.getElementById('thepassword').value == "") {
            alert("Please enter password");
            return false;
        }


        
        

        var go = confirm("Confirm order? OK/Cancel:");
            if (go == true) {
            // The user clicked "YES"
            // Do something, such as submit the form
            document.querySelector("submit").submit();
        } else {
            // The user clicked "Cancel"
            return false;
        }
    }

</script>