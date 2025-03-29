<!-- Purpose: Edit a course information
Author:  Songyu Yang -->
<?php
// Include the database connection file
include 'solus_connectdb.php';
// Get the course code
$id = isset($_GET['id']) ? $_GET['id'] : '';
// Check if the form is submitted
if (!empty($id)) {
    $sql = "select * from  course where code = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(['id' => $id]);
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <link rel="stylesheet" type = "text/css" href="main.css">
    <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
</head>
<!-- <link rel="stylesheet" href="./css/common.css"> -->
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
            <h3>Eidt a Course Information</h3>
        </div>

    </div>
    <div class="header" style="display: flex;">

        <div style="margin: auto">

            <form method="post" action="solus_enterCouInfo.php">
                <table>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="code">Code:</label></td>
                            <td><input type="text" id="code" name="code" class="textClass" readonly value="<?=isset($info['code'])?$info['code']:''?>"></td>
                            <input type="hidden" name="type" value="1">
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="units">Units:</label></td>
                            <td><input type="number" id="units" name="units" class="textClass" value="<?=isset($info['units'])?$info['units']:''?>"></td>
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="learningHours">Learning Hours:</label></td>
                            <td><input type="number" id="learningHours" name="learningHours" class="textClass" value="<?=isset($info['learningHours'])?$info['learningHours']:''?>"></td>
                        </div>
                    </tr>
                    <tr>
                        <div >
                            <td class="labelClass"><label for="description">Description:</label></td>
                            <td><textarea name="description" id="" cols="40" rows="10"><?=isset($info['description'])?$info['description']:''?></textarea></td>
                        </div>
                    </tr>
                </table>

                <div class="">
                    <div>
                        <div style="margin-left: 50px;margin-top: 10px">
                            <input type="submit" value="Edit Course" style="height: 28px">&nbsp;&nbsp;&nbsp;&nbsp;
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