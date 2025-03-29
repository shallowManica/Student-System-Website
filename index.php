<!-- Purpose: Entrance of the system
Author:  Songyu Yang -->

<?php
// start session
session_start();
include('solus_connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type = "text/css" href="main.css">
</head>

<body>
<style>
    .a2 li{
        list-style: none;
        padding: 4px 10px;
        width: 240px;
        background: #54c4e5;
        margin-left: 20px;
        border-radius: 5px;
        text-align: center;
    }
    .a2 li:first-child {
        margin-left: 0;
    }
    .a2{
        display: flex;
        padding: 0;
    }
    .a2 li a{
        color: white;
    }
    .entrance {
        display: flex;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<nav>
    <div class="entrance">
        <div style="margin: auto">
            <ul class='a2'>
                <li><a href="home.php?role=1">Students Entrance</a></li>
                <li><a href="home.php?role=2">Administrator Entrance</a></li>
            </ul>
        </div>
    </div>

</nav>
</body>
</html>
