<!-- Purpose: To enter course information into the database
Author:  Songyu Yang -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" type = "text/css" href="main.css">
    <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
</head>

<style>
    .textClass{
        height: 25px;
        width: 260px;
    }
    .textClass label{
        /*width: 50px;*/
    }
    .textClass input{
        height: 25px;
    }
    .labelClass{
        width: 130px;
    }
</style>

<body>
<div>
    <div  style="display: flex">
        <div style="margin: auto">
            <h1>Welcome to Solus</h1>
            <h3>Add a Course Information</h3>
        </div>

    </div>
    <div class="header" style="display: flex;">

        <div style="margin: auto">

            <form method="post" action="solus_enterCouInfo.php">
                <table>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="code">Code:</label></td>
                            <td><input type="text" id="code" name="code" class="textClass"><em>The value cannot exceed 9 characters</em></td>
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="units">Units:</label></td>
                            <td><input type="number" id="units" name="units" class="textClass"></td>
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="learningHours">Learning Hours:</label></td>
                            <td><input type="number" id="learningHours" name="learningHours" class="textClass"></td>
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="description">Description:</label></td>
                            <td><textarea name="description" id="" cols="40" rows="10"></textarea></td>
                        </div>
                    </tr>
                </table>

                <div class="">
                    <div>
                        <div style="margin-left: 50px;margin-top: 10px">
                            <input type="submit" value="Add Course" style="height: 28px">&nbsp;&nbsp;&nbsp;&nbsp;
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