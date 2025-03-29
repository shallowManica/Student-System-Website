<!-- Purpose: To enter a program information into the database
Author:  Songyu Yang -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
        <link rel="stylesheet" type = "text/css" href="main.css">
        <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
        
    </head>
    <style>
        .textClass{
            height: 25px;
            width: 360px;
        }
        .textClass label{
            /*width: 50px;*/
        }
        .textClass input{
            height: 25px;
        }
        .labelClass{
            width: 240px;
        }
    </style>
<body>

<?php
// Include the database connection file
include 'solus_connectdb.php';
?>
<div>
    <div  style="display: flex">
        <div style="margin: auto">
            <h1>Welcome to Solus</h1>
            <h3>Add a Program Information</h3>
        </div>
    </div>
    <div class="header" style="display: flex;">

        <div style="margin: auto">
            <form action="solus_enterProInfo.php" method="post">
                <table>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="code">Code:</label></td>
                            <td><input type="text" id="code" name="code" class="textClass"><em>The value cannot exceed 8 characters</em></td>
                        </div>
                    </tr>

                    <tr>
                        <div >
                            <td class="labelClass"><label for="name">Degree Plan Name:</label></td>
                            <td><input type="text" name="name" class="textClass"></td>
                        </div>
                    </tr>

                    <tr>
                        <div >
                            <td class="labelClass"><label for="automaticAcceptanceGPA">Automatic Acceptance GPA:</label></td>
                            <td><input type="text" name="automaticAcceptanceGPA" class="textClass"></td>
                        </div>
                    </tr>

                    <tr>
                        <div >
                            <td class="labelClass"><label for="pendingListAcceptanceGPA">Pending List Acceptance GPA:</label></td>
                            <td><input type="text" name="pendingListAcceptanceGPA" class="textClass"></td>
                        </div>
                    </tr>
                </table>

                <div class="">
                    <div>
                        <div style="margin-left: 50px;margin-top: 10px">
                            <input type="submit" value="Add Program" style="height: 28px">&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="index.php" style="padding: 2px 6px;background: #54c4e5;color: white">Home</a>
                        </div>

                    </div>

                </div>

            </form>
        </div>
    </div>
</div>


</body>
</html>