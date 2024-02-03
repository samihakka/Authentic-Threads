<html>

<head>
    <meta charset="utf-8">
    <title>Authentic Threads</title>

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

        #jerseys {
            width: 33%;
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

        a:hover img {
            opacity: 0.5;
        }
    </style>
</head>

<body>

    <h1>Authentic Threads</h1>

    <!-- NAV BAR -->
    <div id="topnav">
        <ul>
            <li><a class="active" href="index.php"><img src="images/logo.jpeg" alt="Logo"
                        style="width: 45px; float: left; margin: auto; height: 100%;"></a></li>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a class="active" href="browse.php">Browse</a></li>
            <li><a class="active" href="order_request.php">Orders</a></li>
        </ul>
    </div>
    <!-- END NAV BAR -->

    <h2>Here are all of the recent world cup scores biotchhhhh!</h2>

    <?php
    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
        CURLOPT_URL => 'https://www.thesportsdb.com/api/v1/json/2/eventsseason.php?id=4429&s=2022',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($response, true);
    $events = $data['events'];
    $dateStrings = array();
    $toDisplay = array();


    // Output the table headers
    echo "<table>\n";
    echo "<tr>\n";
    echo "<th>Date:</th>\n";
    echo "<th>Home Team:</th>\n";
    echo "<th>Away Team:</th>\n";
    echo "<th>Score:</th>\n";
    echo "</tr>\n";

    // Loop through the data and display the fields in the table
    foreach ($events as $game) {
        // if ($game['strStatus'] == "Match Finished") {
        //     $dateStrings[] = $game['dateEvent'];
        // }
        if (strtotime($game['dateEvent']) >= strtotime('December 3rd')) {
            $dateStrings[] = $game['dateEvent'];
            echo "<tr>\n";
            echo "<td>" . $game['dateEvent'] . "</td>\n";
            echo "<td>" . $game['strHomeTeam'] . "</td>\n";
            echo "<td>" . $game['strAwayTeam'] . "</td>\n";
            echo "<td>" . $game['intHomeScore'] . " - " . $game['intAwayScore'] .
                "</td>\n";
            echo "</tr>\n";
        }
    }

    // Close the table
    echo "</table>\n";

    // Convert the date strings into timestamps using strtotime
    $timestamps = array_map('strtotime', $dateStrings);

    // Find the maximum timestamp using the max function
    $maxTimestamp = max($timestamps);

    // Convert the maximum timestamp back into a date string using date
    $mostRecentDate = date('Y-m-d', $maxTimestamp);

    foreach ($events as $game) {
        if ($game["dateEvent"] < $mostRecentDate) {
            $toDisplay[] = $game['strHomeTeam'];
            echo $game['strHomeTeam'];
            $toDisplay[] = $game['strAwayTeam'];
        }
    }

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
    echo "<h2>Rep Your Favorite Squad! The teams below have upcoming matches!</h2>";
    foreach ($toDisplay as $country) {
        echo "<p style='text-align:center;'>$country:";
        $sql = "SELECT url FROM jerseys where country='$country'";
        $result = $conn->query($sql);
        $i = 0;
        echo "<table style='text-align:center; width:33%;'>"; // center the table
        echo "<tr>"; // start a new table row
        while ($row = $result->fetch_array()) //get URLs and countries from database
        {
            $url[$i] = $row[0];
            // show the image and country name in a table cell
            // set the width and height of the table cell and image to 200px
            echo "<td style='width:200px;height:200px;'>
              <a href='browse.php'><img src='$url[$i]' style='max-width:100%;height:auto;width:200px;height:200px;'></a>
              </td>";
            // End the table row and start a new one every two elements
            $i++;
            if ($i % 2 == 0) {
                echo "</tr><tr>";
            }
        }
        echo "</tr></table>"; // end the table
    }
    ?>
</body>

</html>