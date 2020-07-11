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
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    include 'connection.php';
    $query="Select * from product where P_Id='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_row($result);
}
?>
<div class="container">    
<table class="table">
    <tr>
        <th>Name</th>
        <td><?php echo $row[1]?></td>
    </tr>
    <tr>
        <th>Category</th>
        <td><?php echo $row[2]?></td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td><?php echo $row[3]?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $row[4]?></td>
    </tr>
    <tr>
        <th>Image</th>
        <td><?php echo $row[5]?></td>
    </tr>
    <tr>
        <th>Price</th>
        <td><?php echo $row[6]?></td>
    </tr>
</table>
</div>
</body>
</html>