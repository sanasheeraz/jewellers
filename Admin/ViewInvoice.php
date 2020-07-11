<?php
include 'Header.php';
include 'connection.php';
$query="Select * from invoice";
$result=mysqli_query($conn,$query);
?>

<h1><b><i>View Invoice Page</b></i></h1>
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
        <th>I_ID</th>
        <th>O_ID</th>
        <th>P_ID</th>
        <th>P_Name</th>
        <th>P_Price</th>
        <th>P_Quantity</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
        while($row=mysqli_fetch_array($result))
        {
            ?>
            <tr>
            <td><?php echo $row['I_Id']?></td>
            <td><?php echo $row['P_Name']?></td>
            <?php
                $oId=$row['O_Id'];
                $query2="Select * from order where O_Id='$oId'";
                $result2=mysqli_query($conn,$query2);
                
                    $row1=mysqli_fetch_row($result2);
                    ?>
                    <td><?php echo $row1[1];?></td>
                    <?php
                
            ?>
            
            <td><?php echo $row['P_Name']?></td>
            <td><?php echo $row['P_Price']?></td>
            <td><?php echo $row['P_Quantity']?></td>
            <?php
            if(isset($_POST['Invoice']))
            {
                ?>
                <a href="" class="btn btn-primary">Shop</a>
                <?php
            }
            ?>
            <td>
                <a href="View.php?id=<?php echo $row['I_Id']?>"><img src="view.png" width="20px" height="20px" /></a>
                <a href="edit.php?id=<?php echo $row['I_Id']?>"><img src="edit.png" width="20px" height="20px" /></a>
                <a href="delete.php?id=<?php echo $row['I_Id']?>"><img src="delete.png" width="20px" height="20px" /></a>
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