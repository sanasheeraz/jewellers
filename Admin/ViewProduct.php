<?php
include 'Header.php';
include 'connection.php';
$query="Select * from product";
$result=mysqli_query($conn,$query);
?>
<div id="page-wrapper" >
<div class="header">
<h1><b><i>View Product Page</b></i></h1>
<script>
$(document).ready( function () {
    alert("Hello");
    $('#example').DataTable();
} );
</script>

<div class="container">    
<table class="table table-bordered" id="example">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Quantity</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
            <td><?php echo $row['P_Id']?></td>
            <td><?php echo $row['P_Name']?></td>
            <?php
                $cId=$row['C_Id'];
                $query1="Select * from category where C_Id='$cId'";
                $result1=mysqli_query($conn,$query1);
                
                    $row1=mysqli_fetch_row($result1);
                    ?>
                    <td><?php echo $row1[1];?></td>
                    <?php
                
            ?>
            <td><?php echo $row['P_Quantity']?></td>
            <td><?php echo $row['P_Description']?></td>
            <td><img src="../img/<?php echo $row['P_Image']?>" class="card-img-top" alt="..." width="100px"; height="100px";></td>
            <td><?php echo $row['P_Price']?></td>

            <?php
            if(isset($_POST['Product']))
            {
                ?>
                <a href="" class="btn btn-primary">Shop</a>
                <?php
            }
            ?>
            <td>
                <a href="View.php?id=<?php echo $row['P_Id']?>"><img src="view.png" width="20px" height="20px" /></a>
                <a href="edit.php?id=<?php echo $row['P_Id']?>"><img src="edit.png" width="20px" height="20px" /></a>
                <a href="delete.php?id=<?php echo $row['P_Id']?>"><img src="delete.png" width="20px" height="20px" /></a>
            </td>
            </tr>
            <?php
    }
    ?>
    </tbody>
</table>
</div>

<?php
include 'footer.php';
?>