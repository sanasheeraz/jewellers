<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div style="margin : 40px;">
<h1><b><i>User Page</b></i></h1>
<form method="POST">

<label>Enter User Name :</label>
<input type="text" name="txtUser" placeholder="Enter User" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<br>
<label>Enter Email :</label>
<input type="text" name="txtEmail" placeholder="Enter Email" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<br>
<label>Enter Passsword :</label>
<input type="text" name="txtPassword" placeholder="Enter Password" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<br>
<label>Enter Contact_No :</label>
<input type="text" name="txtContactNo" placeholder="Enter Contact" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<br>
<label>Enter Address :</label>
<input type="text" name="txtAdderss" placeholder="Enter Address" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<br>
<input type="submit" name="btnSubmit" value="Add User" style="width:10%; margin:20px 0px; border-radius:50px;text-align:center";>
</form>

<?php

include 'connection.php';
if(isset($_POST['btnUser']))
{
    $UserName=$_POST['txtUser'];
    $UserEmail=$_POST['txtEmail'];
    $UserPassword=$_POST['txtPassword'];
    $UserContactNo=$_POST['txtContactNo'];
    $UserAddress=$_POST['txtAddress'];

    $query="Insert into user(U_Name,U_Email,U_Password,U_ContactNo,U_Address) values('$UserName','$UserEmail','$UserPassword','$UserContactNo','$UserAddress')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "Data Inserted";
    }else
    {
        echo "Failed !".mysqli_error($conn);
    }
}

?>

<?php
include 'footer.php';

?>