
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Browse</title>
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

    <h1>Search Your Orders</h1>
    <div id="topnav">
        <ul>
            <li><a class="active" href="index.php"><img src="images/logo.jpeg" alt="Logo"
                        style="height: 100%; width: 45px; float: left; margin: auto;"></a></li>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a class="active" href="browse.php">Browse</a></li>
            <li><a class="active" href="order_request.php">Orders</a></li>
        </ul>
    </div>

<form action="https://authentic-threads.herokuapp.com/view_orders.php" onsubmit = 'return validate()'>

<div class='bar'>

Enter your username and password here:
    <input type="text" placeholder="username" name="username" value="" id='theusername'>
    <input type="password" placeholder="password" name="password" value="" id='thepassword'>


<input type='submit' value='SUBMIT REQUEST' onclick="validate()">

<br>




</div>
    </form>

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

</script>

</body>
</html>