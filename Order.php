<?php
include 'navbar.php';
include 'connection.php';

$query1="Select * from user";
$result1=mysqli_query($conn,$query1);
?>
<div style="margin : 40px;">
<h1><b><i>Order Page</b></i></h1>
<form method="POST">
<label>Enter User :</label>
<Select name="ddlUser" placeholder="Select User" style="width:20%; margin:20px 0px;  border-radius:50px;text-align:center";>
<?php

if($result1)
{
    while($row=mysqli_fetch_array($result1))
    {
        ?>
        <option value="<?php echo $row['U_Id'];?>"><?php echo $row['U_Name']?></option>
        <?php
    }
}

?>
</Select>
<br>
<label>Enter Total Amount :</label>
<input type="text" name="txtAmount" placeholder="Enter Amount" style="width:40%;  border-radius:50px;text-align:center";>
<br>
<input type="submit" name="btnSubmit" value="AddOrder" style="width:10%; margin:20px 0px; border-radius:50px;text-align:center";>
</form>
    
<?php

if(isset($_POST['btnSubmit']))
{
    $User=$_POST['ddlUser'];
    $OrderAmount=$_POST['txtAmount'];

    $query="Insert into order(U_Id,O_totalAmount) values('$User','$OrderAmount')";
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