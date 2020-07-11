<?php
include 'navbar.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    include 'connection.php';
    $query="Select * from user where U_Id='$id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_row($result);
}
?>
<div class="container">
    <table class="table">
            <tr>
                <th>Name : </th>
                <td><?php echo $row[1]?></td>
            </tr>
            <tr>
                <th>Email : </th>
                <td><?php echo $row[2]?></td>
            </tr>
            <tr>
                <th>Password : </th>
                <td><?php echo $row[3]?></td>
            </tr>
            <tr>
                <th>Contact_No : </th>
                <td><?php echo $row[4]?></td>
            </tr>
            <tr>
                <th>Address : </th>
                <td><?php echo $row[5]?></td>
            </tr>
    </table>
</div>
<?php
include 'footer.php';

?>