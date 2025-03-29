<!-- // Purpose: Display all courses and search for courses
// Author: Songyu Yang -->
<?php
session_start();
// Display data
include 'solus_connectdb.php';
$pageSize = 3;
$where = '';
if(isset($_GET['submit'])) {
    // The first step in paging: calculate the total number of records
    $text = $_GET['search'];
    $sql = "select count(*) as num from course where code = '$text'";
}else{
    $sql = "select count(*) as num from course ";
}
// The second step in paging: calculate the total number of records
$res = $connection->query($sql);
$count = $res->fetch(PDO::FETCH_ASSOC);
$number = $count['num'];

$class = '';
// The third step in paging: calculate the total number of pages
if ($_SESSION['role'] == 1) {
    $class = "hide";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
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
    .pagination li{
        width: 15px;
    }
    .btn{
        padding: 2px 6px;
        background: #2daecf;
        text-decoration: none;
        color: #ffffff;
    }
    .hide {
        display: none!important;
    }
</style>
<body style="background: ">
<div class="box">
    <div class="child">
        <form method="GET" action="solus_listCou.php">
            Please Input Course Code:<input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search']:''?>" >
            <input type="submit" name="submit" value="search">
            <a href='index.php'>Home</a>
        </form>
    </div>
</div>

<div class="box">
    <div class="child">
        <table border="1" bordercolor="a0c6e5" style="border-collapse: collapse;" class="table <?php if (!$number || !isset($text)) {echo 'hide';} ?>">
            <tr>
                <th>code</th>
                <th>units</th>
                <th>learningHours</th>
                <th>description</th>
                <th class="<?php echo $class;?>">Operate</th>

            <tr>
            <?php
// The third step in paging: Get the current page
$page = isset($_GET['p']) ? $_GET['p'] : 1;
// The fourth step in paging: Calculate the offset = (current page -1) * Number of bars displayed per page
$pageLimit = ($page - 1) * $pageSize;

// SQL statement
$sql = "select * from course limit $pageLimit,$pageSize";
$bookQ = $connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// Calculate the number of pages: ceil(total records/number of pages displayed)
$pageNum = ceil($number / $pageSize);
// Calculate the previous page number = current page -1, but not less than 1
$upPage = $page - 1 < 1 ? 1 : $page - 1;
// Calculate the page number of the next page = current page +1, but less than the total number of pages
$nextPage = $page + 1 > $pageNum ? $pageNum : $page + 1;

if(isset($_GET['submit'])) {
    // Search
    $searchTotal = $connection->query("SELECT count(*) FROM `course` where `code` = '$text'")->fetch(PDO::FETCH_ASSOC);
    if ($searchTotal['count(*)'] == 0) {
        // if the search result is empty, prompt the user and return to the previous page
        echo "<script>alert('Not found!');location.href='solus_enterCou.php'</script>";
        exit;
    }
    // search the specified course
    $searchQ = $connection->query("SELECT * FROM `course` where `code` = '$text'")->fetchAll(PDO::FETCH_ASSOC);
    foreach($searchQ as $search) {
        echo "<tr>
                    <td align='center'>".$search['code']."</td>
                   <td align='center'>".$search['units']."</td>
                   <td align='center'>".$search['learningHours']."</td>
                   <td align='center'>".$search['description']."</td>
                   <td align='center' class='{$class}'> <a class='btn' href='solus_editCou.php?id={$search['code']}'>edit</a>&nbsp;|&nbsp;<a class='btn' href='solus_enterCou.php'>add</a></td>
                  </tr>";
    }
} else {
    // Display all courses
    foreach($bookQ as $book) {
        echo "<tr>
                     <td align='center'>".$book['code']."</td>
                    <td align='center'>".$book['units']."</td>
                    <td align='center'>".$book['learningHours']."</td>
                    <td align='center'>".$book['description']."</td>
                   <td align='center' class='{$class}'> <a class='btn' href='solus_editCou.php?id={$book['code']}'>edit</a>&nbsp;|&nbsp;<a class='btn' href='solus_enterCou.php'>add</a></td>
                   </tr>";
    }
}
?>
        </table>
        <ul class="pagination <?php if (!$number || !isset($text)) {echo 'hide';} ?>" style="display: flex;list-style: none">
            <!--    previous-->
            <li style="width: 15px"><a href="solus_listCou.php?p=<?php echo $upPage?>">&laquo;</a></li>
            <?php
            // The fifth step in paging: Display the page number
            for ($i = 1; $i <= $pageNum; $i++) {
                // The sixth step in paging: Highlight the current page
                ?>
                <li><a href="solus_listCou.php?p=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
            }
            ?>
            <!--    next page-->
            <li><a href="solus_listCou.php?p=<?php echo $nextPage?>">&raquo;</a></li>
        </ul>
    </div>
</div>

</body>
</html>