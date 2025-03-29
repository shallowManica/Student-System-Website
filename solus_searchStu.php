<!-- // Purpose: Search student information
// Author:  Songyu Yang -->
<?php

include 'solus_connectdb.php';
// if the form is submitted
if (isset($_GET['submit']) && $_GET['submit'] == 'SEARCH' && $_GET['search']) {
    // Query whether the student exists
    $result = $connection->query("select * from student where id='{$_GET['search']}'");
    $row = $result->fetch();
    if ($row) {
        // Find the student
        header("Location: solus_stuInfo.php?id={$row['id']}");exit;
    } else {
        // No student is found
        echo "<script>alert('Not found!');location.href='solus_enterStu.php'</script>";exit;
//        header("Location: solus_enterStu.php");exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" type = "text/css" href="main.css">
</head>
<style>
    .box {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center; 
    }
    .child {
        background: ;
        padding: 20px;
    }
    .table tr th{
        padding: 5px;
    }
    .table tr td{
        padding: 5px;
    }
    .table {
        /*border-collapse:collapse;*/
        /*border-style: solid;*/
        /*border-width: 1px;*/
    }
    .pagination li{
        width: 15px;
    }
    input[type="submit"]{
        height: 36px;
        padding: 4px 16px;
        background: #2daecf;
        text-decoration: none;
        color: #ffffff;
        outline: none;
        border: none;
        cursor: pointer;
    }
    .box {
        position: fixed;
        left: 50%;
        top: 45%;
        transform: translate(-50%, -50%);
    }
    .back {
        position: fixed;
        left: 50%;
        bottom: 2%;
        transform: translate(-50%, -50%);
    }
    .search-box {

    }
    .tip {
        font-size: 20px;
    }
    .input-box {
        margin-top: 36px;
    }
    .search-value {
        width: 260px;
        height: 30px;
        outline: none;
    }
</style>
<body>
<div class="box">
    <div class="child">
        <form method="GET" action="solus_searchStu.php">
            <div class="search-box">
                <div class="tip">
                    Please Input Your Student ID:
                </div>
                <div class="input-box">
                    <input type="text" name="search" class="search-value" value="<?=isset($_POST['search'])?$_POST['search']:''?>" />
                    <input type="submit" name="submit" value="SEARCH" />
                </div>
            </div>
        </form>
    </div>
</div>

<div class="back">
    <a href='index.php'>Home</a>
</div>

</body>
</html>