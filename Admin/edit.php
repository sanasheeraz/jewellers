<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['id'])) 
{
$id=$_GET['id'];
include 'connection.php';
$query="Select * from product where P_Id='$id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);

$query1="Select * from category";
$result1=mysqli_query($conn,$query1);
if($result1){
?>
    <form method="POST">
    <label>Enter Product Name :</label>
    <input type="text" name="txtProduct" value="<?php echo $row[1];?>">
    <br>
    <label>Enter Category :</label>
    <Select name="ddCategory">
        
        <?php
        if($result1)
        {
            while ($row1 = mysqli_fetch_array($result1)) {
                if ($row1['C_Id'] == $row[2]) 
                {
                    ?>
                    <option value="<?php echo $row1['C_Id']; ?>" selected><?php echo $row1['C_Name'] ?></option>
        <?php
                }
                else{
                    ?>
                    <option value="<?php echo $row1['C_Id']; ?>"><?php echo $row1['C_Name'] ?></option>
        <?php       
                }
            }
        }
        ?>
    </Select>
    <br>
    <label>Enter Quantity :</label>
    <input type="text" name="txtQuantity" value="<?php echo $row[3];?>">
    <br>
    <label>Enter Description :</label>
    <input type="text" name="txtDescription" value="<?php echo $row[4];?>">
    <br>
    <label>Enter Image :</label>
    <input type="file" name="Image" value="<?php echo $row[5];?>">
    <br>
    <label>Enter Price :</label>
    <input type="text" name="txtPrice" value="<?php echo $row[6];?>">
    <br>
    <input type="submit" name="btnSubmit" value="Data Inserted">
    </form>

<?php

if(isset($_POST['btnSubmit']))
{
    $pName=$_POST['txtProduct'];
    $Cat=$_POST['ddCategory'];
    $pQuantity=$_POST['txtQuantity'];
    $pDescription=$_POST['txtDescription'];
    $pImage=$_POST['Image'];
    $pPrice=$_POST['txtPrice'];

    $query="Update product set P_Name='$pName',C_Id='$Cat',P_Quantity='$pQuantity',P_Description='$pDescription',P_Image='$pImage',P_Price='$pPrice' where P_Id='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header('Location:ViewProduct.php');
    }else
    {
        echo "Failed !".mysqli_error($conn);
    }
}
}
}
?>
</body>
</html>
