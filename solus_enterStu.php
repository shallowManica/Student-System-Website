<!-- // Purpose: To enter student information into database
// Author:  Songyu Yang  -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Student Management System</title>
        <link rel="stylesheet" type = "text/css" href="main.css">
        <link rel="stylesheet" type = "text/css" href="Table_CSS.css">
    </head>
<body>
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
<?php
include 'solus_connectdb.php';
// Get the id from the url
$id = isset($_GET['id'])?$_GET['id']:'';
if(!empty($id)){
    // Get the student information from the database
    $sql = "select * from  student where id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $info = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div>
    <div  style="display: flex">
        <div style="margin: auto">
            <h1>Welcome to Solus</h1>
            <h3>Add a Student Information</h3>
        </div>
    </div>

    <div class="header" style="display: flex;">
        <div style="margin: auto">
        <form action="solus_enterStuInfo.php" method="post">
            <table>
                <tr>
                    <div >
                        <td class="labelClass"><label for="id">ID:</label></td>
                        <td><input type="text" id="id" name="id" class="textClass" value="<?=isset($info['id'])?$info['id']:''?>"><em>Please enter 8 Numeral numbers</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="firstName">First Name:</label></td>
                        <td><input type="text" id="firstName" name="firstName" class="textClass" value="<?=isset($info['id'])?$info['first']:''?>"><em>Please do not enter special characters and spaces</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="middleName">Middle Name:</label></td>
                        <td><input type="text" id="middleName" name="middleName" class="textClass"  value="<?=isset($info['id'])?$info['middleName']:''?>"><em>Please do not enter special characters and spaces</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="lastName">Last Name:</label></td>
                        <td><input type="text" id="lastName" name="lastName" class="textClass"  value="<?=isset($info['id'])?$info['lastName']:''?>"><em>Please do not enter special characters and spaces</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="gender">Gender:</label></td>
                        <td><input type="text" id="gender" name="gender" class="textClass"  value="<?=isset($info['id'])?$info['gender']:''?>"><em>Please enter 'Male' or 'Female' or 'NA'</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="netid">NetID:</label></td>
                        <td><input type="text" id="netid" name="netid" class="textClass"  value="<?=isset($info['id'])?$info['netid']:''?>"><em>Please enter 6 characters netid</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="citizenship">Citizenship:</label></td>
                        <td><input type="text" id="citizenship" name="citizenship" class="textClass"  value="<?=isset($info['id'])?$info['citizenship']:''?>"><em>Please enter the country e.g.Canada</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="visaStatus">Visa Status:</label></td>
                        <td><input type="text" id="visaStatus" name="visaStatus" class="textClass"  value="<?=isset($info['id'])?$info['visaStatus']:''?>"><em>Please enter 'valid' or 'null'</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="phone">Phone:</label></td>
                        <td><input type="text" id="phone" name="phone" class="textClass"  value="<?=isset($info['id'])?$info['phone']:''?>"><em>Please enter your phone number</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="localStreetAddress">Local Street Address:</label></td>
                        <td><input type="text" id="localStreetAddress" name="localStreetAddress" class="textClass"  value="<?=isset($info['id'])?$info['localStreetAddress']:''?>"><em>Please enter your local street address</em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="localCity">Local City:</label></td>
                        <td><input type="text" id="localCity" name="localCity" class="textClass"  value="<?=isset($info['id'])?$info['localCity']:''?>"><em>Please enter your local city<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="localProvince">Local Province:</label></td>
                        <td><input type="text" id="localProvince" name="localProvince" class="textClass"  value="<?=isset($info['id'])?$info['localProvince']:''?>"><em>Please enter your province<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="localPC">Local Postal Code:</label></td>
                        <td><input type="text" id="localPC" name="localPC" class="textClass"  value="<?=isset($info['id'])?$info['localPC']:''?>"><em>Please enter your 6 characters post code with a space in the middle<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="permStreetAddress">Permanent Street Address:</label></td>
                        <td><input type="text" id="permStreetAddress" name="permStreetAddress" class="textClass"  value="<?=isset($info['id'])?$info['permStreetAddress']:''?>"><em>Please enter your permanent street address<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="permCity">Permanent City:</label></td>
                        <td><input type="text" id="permCity" name="permCity" class="textClass"  value="<?=isset($info['id'])?$info['permCity']:''?>"><em>Please enter your permanent city<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="permProvince">Permanent Province:</label></td>
                        <td><input type="text" id="permProvince" name="permProvince" class="textClass"  value="<?=isset($info['id'])?$info['permProvince']:''?>"><em>Please enter your permanent province<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="permPC">Permanent Postal Code:</label></td>
                        <td><input type="text" id="permPC" name="permPC" class="textClass"  value="<?=isset($info['id'])?$info['permPC']:''?>"><em>Please enter your permanent street address<em></td>
                    </div>
                </tr>

                <tr>
                    <div >
                        <td class="labelClass"><label for="emergencyContactNumber">Emergency Contact Number:</label></td>
                        <td><input type="text" id="emergencyContactNumber" name="emergencyContactNumber" class="textClass"  value="<?=isset($info['id'])?$info['emergencyContactNumber']:''?>"><em>Please enter your permanent contact number<em></td>
                    </div>
                </tr>
            </table>

            <div class="">
                <div>
                    <div style="margin-left: 50px;margin-top: 10px">
                        <?php 
                        // if the id is empty, it means that the user is adding a new student
                        if(empty($id)){?>
                            <input type="submit" value="Add Student" style="height: 28px">&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php }else
                        // if the id is not empty, it means that the user is editing a student
                        { ?>
                            <input type="submit" value="Eidt Student" style="height: 28px">&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php } ?>
                        <a href="index.php" style="padding: 2px 6px;background: #54c4e5;color: white">Home</a>
                    </div>

                </div>

            </div>
<!--          <input type="submit" value="Next">-->

          </form>
        </div>
    </div>
</div>
</body>
</html>