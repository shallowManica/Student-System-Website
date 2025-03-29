<!-- // Purpose: Display student information
// Author: Songyu Yang -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" type = "text/css" href="main.css">
    <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
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
    .btn{
        padding: 2px 6px;
        background: #2daecf;
        text-decoration: none;
        color: #ffffff;
    }
</style>
<body style="background: ">
<div class="box">
    <div class="child">
        <form method="GET" action="solus_listStu.php">
            Please Input Your Student ID: <input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search']:''?>" >
            <input type="submit" name="submit" value="search">
            <a href='index.php'>Home</a>
        </form>
    </div>
</div>

<div class="box">
    <div class="child">
        <table border="1" bordercolor="a0c6e5" style="border-collapse: collapse;" class="table">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>NetID</th>
                <th>Citizenship</th>
                <th>Visa Status</th>
                <th>Phone</th>
                <th>Emergency Contact Number</th>
                <th>Operate</th>

            <tr>
                <?php
                // Display data
                include 'solus_connectdb.php';
                $pageSize = 3;

                // The second step in paging: calculate the total number of records
if(isset($_GET['submit'])) {
    $text = $_GET['search'];
    $sql = "select count(*) as num from student where id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':id' => $text));
} else {
    $sql = "select count(*) as num from student ";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}

$count = $stmt->fetch(PDO::FETCH_ASSOC);
$number = $count['num'];

// The third step in paging: Get the current page
$page = isset($_GET['p']) ? $_GET['p'] : 1;

// The fourth step in paging: Calculate the offset = (current page -1) * Number of bars displayed per page
$pageLimit = ($page - 1) * $pageSize;

// SQL statement for paging query
if(isset($_GET['submit'])) {
    $text = $_GET['search'];
    $sql = "select * from student where id = :id limit $pageLimit,$pageSize";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':id' => $text));
} else {
    $sql = "select * from student limit $pageLimit,$pageSize";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}
// Get the data of the current page
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate the number of pages: ceil(total records/number of pages displayed)
$pageNum = ceil($number / $pageSize);

// Calculate the previous page number = current page -1, but not less than 1
$upPage = $page - 1 < 1 ? 1 : $page - 1;

// Calculate the page number of the next page = current page +1, but less than the total number of pages
$nextPage = $page + 1 > $pageNum ? $pageNum : $page + 1;

if(isset($_GET['submit'])) {
    if ($number == 0) {
        echo "<script>alert('Not found!');location.href='solus_enterStu.php'</script>";
        exit;
    }

    $text=$_GET['search'];

    foreach ($students as $search) {
        // show the data
        echo " <tr>
                <td align='center'>".$search['id']."</td>
                <td align='center'>".$search['first']."</td>
                <td align='center'>".$search['middleName']."</td>
                <td align='center'>".$search['lastName']."</td>
                <td align='center'>".$search['gender']."</td>
                <td align='center'>".$search['netid']."</td>
                <td align='center'>".$search['citizenship']."</td>
                <td align='center'>".$search['visaStatus']."</td>
                <td align='center'>".$search['phone']."</td>
                <td align='center'>".$search['emergencyContactNumber']."</td>
                <td align='center'> <a class='btn' href='solus_editStu.php?id={$search['id']}'>edit</td>
            </tr>";
    }
                }
                else
                {
                    foreach ($students as $book) {
                        echo " <tr>
                     <td align='center'>".$book['id']."</td>
                    <td align='center'>".$book['first']."</td>
                    <td align='center'>".$book['middleName']."</td>
                    <td align='center'>".$book['lastName']."</td>
                    <td align='center'>".$book['gender']."</td>
                    <td align='center'>".$book['netid']."</td>
                    <td align='center'>".$book['citizenship']."</td>
                    <td align='center'>".$book['visaStatus']."</td>
                    <td align='center'>".$book['phone']."</td>
                    <td align='center'>".$book['emergencyContactNumber']."</td>
                   <td align='center'> <a class='btn' href='solus_stuInfo.php?id={$book['id']}'>detail</a>&nbsp;|&nbsp;<a class='btn' href='solus_editStu.php?id={$book['id']}'>edit</a>&nbsp;|&nbsp;<a class='btn' href='solus_enterStu.php'></a></td>
                   </tr>";
                    }

                }
                ?>
        </table>
        <ul class="pagination" style="display: flex;list-style: none">
            <!--    previous page-->
            <li style="width: 15px"><a href="solus_listStu.php?p=<?php echo $upPage?>">&laquo;</a></li>
            <?php
            for ($i = 1; $i <= $pageNum; $i++) {
                // Determine whether the current page is the current page
                ?>
                <li><a href="solus_listStu.php?p=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
            }
            ?>
            <!--    next page-->
            <li><a href="solus_listStu.php?p=<?php echo $nextPage?>">&raquo;</a></li>
        </ul>
    </div>
</div>

</body>
</html>