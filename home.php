<!-- Purpose: Home page for the manage section
Author:  Songyu Yang -->
<?php
// Start session
session_start();
include('solus_connectdb.php');
$role = isset($_GET['role'])?$_GET['role']:1;
$_SESSION['role'] = $role;
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
    .role {
        background: silver!important;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        width: 180px!important;
    }
</style>
<nav>
    <div style="margin: auto">
        <ul class='a2'>
            <?php 
            // if the user is a student
            if($role ==1){?>
                <li class="role">
                    <svg t="1677740887673" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2445" width="22" height="22"><path d="M79.23846992 961.89615371v-25.44230742c0-109.28076943 28.83461573-214.89230742 81.13846113-297.41538515 48.42692315-76.39615372 115.30384629-131.57307685 195.50769258-161.89615372A240.78461573 240.78461573 0 0 1 279.48846992 300.5c0-131.53846114 104.33076943-238.53461572 232.54615372-238.53461572s232.51153887 106.99615372 232.51153798 238.53461572a240.85384629 240.85384629 0 0 1-76.74230742 176.98846114c190.86923057 73.00384629 276.99230742 277.13076943 276.99230742 458.96538514v25.44230743H79.23846992zM694.90770049 300.5c0-103.43076943-82.03846114-187.61538427-182.87307686-187.61538427-100.83461573 0-182.87307685 84.18461573-182.87307685 187.61538427 0 103.46538427 82.03846114 187.65 182.87307685 187.65 100.83461573 0 182.87307685-84.18461573 182.87307686-187.65z m-79.16538516 213.50769258a226.45384629 226.45384629 0 0 1-103.7076917 25.0961537 225.93461572 225.93461572 0 0 1-104.12307686-25.30384628c-195.02307685 51.12692315-271.10769258 239.05384629-278.41153886 397.17692315h765.03461573c-7.99615372-167.4-95.22692315-347.74615372-278.79230831-396.96923057z m-143.41153799 37.2461537h79.40769258l39.73846114-8.48076943-45.24230742 65.66538429 30.6 227.52692313-64.8 56.90769258-69.19615372-56.90769258 40.53461485-227.52692313-50.78076944-65.66538429 39.73846201 8.48076944z" p-id="2446" fill="#ffffff"></path></svg>
                    Role:Students </a></li>
            <?php }
            // if the user is an administrator
            else{ ?>
                <li class="role">
                    <svg t="1677740887673" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2445" width="22" height="22"><path d="M79.23846992 961.89615371v-25.44230742c0-109.28076943 28.83461573-214.89230742 81.13846113-297.41538515 48.42692315-76.39615372 115.30384629-131.57307685 195.50769258-161.89615372A240.78461573 240.78461573 0 0 1 279.48846992 300.5c0-131.53846114 104.33076943-238.53461572 232.54615372-238.53461572s232.51153887 106.99615372 232.51153798 238.53461572a240.85384629 240.85384629 0 0 1-76.74230742 176.98846114c190.86923057 73.00384629 276.99230742 277.13076943 276.99230742 458.96538514v25.44230743H79.23846992zM694.90770049 300.5c0-103.43076943-82.03846114-187.61538427-182.87307686-187.61538427-100.83461573 0-182.87307685 84.18461573-182.87307685 187.61538427 0 103.46538427 82.03846114 187.65 182.87307685 187.65 100.83461573 0 182.87307685-84.18461573 182.87307686-187.65z m-79.16538516 213.50769258a226.45384629 226.45384629 0 0 1-103.7076917 25.0961537 225.93461572 225.93461572 0 0 1-104.12307686-25.30384628c-195.02307685 51.12692315-271.10769258 239.05384629-278.41153886 397.17692315h765.03461573c-7.99615372-167.4-95.22692315-347.74615372-278.79230831-396.96923057z m-143.41153799 37.2461537h79.40769258l39.73846114-8.48076943-45.24230742 65.66538429 30.6 227.52692313-64.8 56.90769258-69.19615372-56.90769258 40.53461485-227.52692313-50.78076944-65.66538429 39.73846201 8.48076944z" p-id="2446" fill="#ffffff"></path></svg>
                    Role:Administrator </a></li>
            <?php } ?>

        </ul>
    </div>
    <div class="entrance">
        <div style="margin: auto">
            <ul class='a2'>
                <?php 
                // if the user is a student, the student can only search for his/her own information
                if($role ==1){?>
                    <li><a href="solus_searchStu.php">Students Infomation</a></li>
                <?php }
                // if the user is an administrator, the administrator can search for all the students' information
                else{ ?>
                    <li><a href="solus_listStu.php">Students Infomation</a></li>
                <?php } ?>
                <li><a href="solus_listPro.php">Program Information</a></li>
                <li><a href="solus_listCou.php">Course Information</a></li>
            </ul>
        </div>
    </div>

</nav>
</body>
</html>
