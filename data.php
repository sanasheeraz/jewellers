<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css"/>
</head>
<body>

<script>
$(document).ready( function () {
    alert("Hello");
    $('#example').DataTable();
});
</script>
<?php
include 'connection.php';
$query="Select * from product";
$result=mysqli_query($conn,$query);
?>

<table  id="example">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if($result)
    {
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
            <td><?php echo $row['P_Id']?></td>
            <td><?php echo $row['P_Name']?></td>
        </tr>
      <?php  
      }
    }
    ?>
     </tbody>
</table>
    
</body>
</html>