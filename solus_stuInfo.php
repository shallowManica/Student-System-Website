<!-- // Purpose: Display student information
// Author:  Songyu Yang -->
<?php
include 'solus_connectdb.php';
// check if the id exists
if ($_GET['id']) {
    // check if the student exists
    $result = $connection->query("select * from student where id='{$_GET['id']}'");
    $row = $result->fetch();
    if (!$row) {
        // if not, redirect to the search page
        echo "<script>alert('Not found!');location.href='solus_searchStu.php'</script>";exit;
    }
} else {
    exit('Missing parameter ID!');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title>Student Info</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css">
    <meta name="generator" content="Hexo 4.2.1">
</head>
<body>
<main id="page_main">
    <div class="page user-info" itemscope itemtype="http://schema.org/CreativeWork">
        <div class="card-wrap" itemscope itemtype="http://schema.org/Person">
            <div class="user-avatar"><img class="avatar-img" src="img/profile.png" alt="avatar">
            </div>
            <div class="user-discrip"><h3><?php echo $row['first']  . ' ' . $row['middleName'] . ' '  . $row['lastName']; ?></h3>
                <p class="user-bio"><?php echo 'Gender: ' . $row['gender']  . '&nbsp;&nbsp;&nbsp;&nbsp;Phone: '  . $row['phone']; ?></p></div>
        </div>
    </div>
    <div class="page user-info2" itemscope itemtype="http://schema.org/CreativeWork">
        <article><h1 id="H1"><a href="#H1" class="headerlink" title="H1 Overview"></a>Account Overview</h1>
            <p><b>NetID:</b> <?php echo $row['netid'];?> </p>
            <p><b>Citizenship:</b> <?php echo $row['citizenship'];?> </p>
            <p><b>Visa Status:</b> <?php echo $row['visaStatus'];?> </p>
            <p><b>Local Street Address:</b> <?php echo $row['localStreetAddress'];?> </p>
            <p><b>Local City:</b> <?php echo $row['localCity'];?> </p>
            <p><b>Local Province:</b> <?php echo $row['localProvince'];?> </p>
            <p><b>Local Postal Code:</b> <?php echo $row['localPC'];?> </p>
            <p><b>Permanent Street Address:</b> <?php echo $row['permStreetAddress'];?> </p>
            <p><b>Permanent City:</b> <?php echo $row['permCity'];?> </p>
            <p><b>Permanent Province:</b> <?php echo $row['permProvince'];?> </p>
            <p><b>Permanent Postal Code:</b> <?php echo $row['permPC'];?> </p>
            <p><b>Emergency Contact Number:</b> <?php echo $row['emergencyContactNumber'];?> </p>

            <h2 id="H2"><a href="#H2" class="headerlink" title="H2 Example"></a>Operate</h2>
            <a href="solus_editStu.php?id=<?php echo $_GET['id']; ?>">Edit</a>
        </article>
    </div>
</main>

<div class="nav-wrap">
    <div class="nav">
        <button class="site-nav">
            <div class="navicon"></div>
        </button>
        <ul class="nav_items">
            <li class="nav_item"><a class="nav-page" href="https://www.queensu.ca">Plan</a></li>
            <li class="nav_item"><a class="nav-page" href="https://www.queensu.ca">Classes</a></li>
            <li class="nav_item"><a class="nav-page" href="https://www.queensu.ca">Degree</a></li>
            <li class="nav_item"><a class="nav-page" href="https://www.queensu.ca">Records</a></li>
            <li class="nav_item"><a class="nav-page" href="https://www.queensu.ca">Financial</a></li>
        </ul>
    </div>
    <div class="cd-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
</div>



<footer id="page_footer">
    <div class="footer-nav">
        <a href="solus_searchStu.php">Search Student</a>
        <a href="index.php">Home</a>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-pjax@latest/jquery.pjax.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>