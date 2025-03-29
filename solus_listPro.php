<!-- // Purpose: Display the degree plan list
// Author: Songyu Yang -->
<?php
session_start();
include 'solus_connectdb.php';

$pageSize = 3;
if(isset($_GET['submit'])) {
    // The first step in paging: calculate the total number of records
    $text = $_GET['search'];
    $sql = "select count(*) as num from degreeplan where code = ?";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$text]);
}else{
    // The second step in paging: calculate the total number of records
    $sql = "select count(*) as num from degreeplan";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
}
// Get the number of data
$count = $stmt->fetch(PDO::FETCH_ASSOC);
$number = $count['num'];
// Calculate the total number of pages
$class = '';
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
    <title>Degree</title>
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
    .hide {
        display: none!important;
    }
</style>
<body style="background: ">
<div class="box">
    <div class="child">
        <form method="GET" action="solus_listPro.php">
            Please Input Degree Plan Code:<input type="text" name="search" value="<?=isset($_GET['search'])?$_GET['search']:''?>" >
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
                <th>name</th>
                <th>automaticAcceptanceGPA</th>
                <th>pendingListAcceptanceGPA</th>
                <th class="<?php echo $class;?>">Operate</th>
            <tr>
            <?php
// The first step: calculate the total number of pages
$page = isset($_GET['p']) ? $_GET['p'] : 1;
// Calculate the offset = (current page -1) * Number of bars displayed per page
$pageLimit = ($page - 1) * $pageSize;

// Query statement
if(isset($_GET['submit']))
{
    $sql_where = '';
    if (isset($text)) {
        // if the search box is not empty, then search the database
        $sql_where = " where `code` = ?";
        $searchTotal = $connection->prepare("SELECT count(*) FROM `degreeplan`{$sql_where}");
        $searchTotal->execute([$text]);
        $row = $searchTotal->fetch(PDO::FETCH_ASSOC);
        if ($row['count(*)'] == 0) {
            // if the search result is empty, then prompt the user
            echo "<script>alert('Not found!');location.href='solus_enterPro.php'</script>";
            exit;
        }
    }
    $searchQ = $connection->prepare("SELECT * FROM `degreeplan`{$sql_where} LIMIT $pageLimit,$pageSize");
    $searchQ->execute([$text]);
    while($search= $searchQ->fetch(PDO::FETCH_ASSOC)){
        // Display the search results
        echo " <tr>
                    <td align='center'>".$search['code']."</td>
                   <td align='center'>".$search['name']."</td>
                   <td align='center'>".$search['automaticAcceptanceGPA']."</td>
                   <td align='center'>".$search['pendingListAcceptanceGPA']."</td>
                   <td align='center' class='{$class}'> <a class='btn' href='solus_editPro.php?id={$search['code']}&bookname={$search['name']}'>edit</a>&nbsp;|&nbsp;<a class='btn' href='solus_enterPro.php'>add</a></td>
                  </tr>";
    }
}
else
{
    // The second step: calculate the total number of pages
    $sql = "SELECT * FROM degreeplan LIMIT $pageLimit,$pageSize";
    $bookQ = $connection->query($sql);
    while($book = $bookQ->fetch(PDO::FETCH_ASSOC)) {
        // Display the search results
        echo " <tr>
                     <td align='center'>".$book['code']."</td>
                    <td align='center'>".$book['name']."</td>
                    <td align='center'>".$book['automaticAcceptanceGPA']."</td>
                    <td align='center'>".$book['pendingListAcceptanceGPA']."</td>
                   <td align='center' class='{$class}'> <a class='btn' href='solus_editPro.php?id={$book['code']}'>edit</a>&nbsp;|&nbsp;<a class='btn' href='solus_enterPro.php'>add</a></td>
                   </tr>";
                    }

                }
                ?>
        </table>
        <ul class="pagination <?php if (!$number || !isset($text)) {echo 'hide';} ?>" style="display: flex;list-style: none">
            <!--    previous-->
            <li style="width: 15px"><a href="solus_listPro.php?p=<?php echo $upPage?>">&laquo;</a></li>
            <?php
            for ($i = 1; $i <= $pageNum; $i++) {
                // Display the page number
                ?>
                <li><a href="solus_listPro.php?p=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php
            }
            ?>
            <!--    next-->
            <li><a href="solus_listPro.php?p=<?php echo $nextPage?>">&raquo;</a></li>
        </ul>
    </div>
</div>

</body>
</html>