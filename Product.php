<?php

include 'navbar.php';
include 'connection.php';
$query1="Select * from category";
$result1=mysqli_query($conn,$query1);


if(isset($_POST['btnSubmit']))
{
    $pName=$_POST['txtProduct'];
    $Cat=$_POST['ddCategory'];
    $pQuantity=$_POST['txtQuantity'];
    $pDescription=$_POST['txtDescription'];
    $pPrice=$_POST['txtPrice'];
    
    $imageName=$_FILES['img']['name'];
    
    $target='img/'.basename($imageName);

    if(move_uploaded_file($_FILES['img']['tmp_name'],$target))
    {
    $query="Insert into product (P_Name,C_Id,P_Quantity,P_Description,P_Image,P_Price) values('$pName','$Cat','$pQuantity','$pDescription','$imageName','$pPrice')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "Data Inserted";
    }else
    {
        echo "Failed !".mysqli_error($conn);
    }
}
}


?>


<div style="margin : 40px;">
<h1><b><i>Product Page</b></i></h1>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
<label> Product Name :</label>
<input type="text" name="txtProduct" placeholder="Enter Product" style="width:40%; margin:10px 0px; background-color:transparent; border-radius:30px; text-align:center";>
<div>
<br>
<div class="form-group">
<label>Enter Category :</label>
<Select name="ddCategory" style="width:20%; background-color:transparent; border-radius:30px; text-align:center";>
<?php

if($result1)
{
    while($row=mysqli_fetch_array($result1))
    {
        ?>
        <option value="<?php echo $row['C_Id'];?>"><?php echo $row['C_Name']?></option>
        <?php
    }
}

?>
</Select>
</div>
<br>
<div class="form-group">
<label>Product Quantity :</label>
<input type="text" name="txtQuantity" placeholder="Enter Quantity"style="width:40%; background-color:transparent; border-radius:30px; text-align:center";>
</div>
<br>
<div class="form-group">
<label>Product Description :</label>
<input type="text" name="txtDescription" placeholder="Enter Description"style="width:40%; background-color:transparent; border-radius:30px; text-align:center";>
</div>
<br>
<div class="form-group">
<label>Product Image :</label>
<input type="file" name="img">
</div>
<br>
<div class="form-group">
<label>Product Price :</label>
<input type="text" name="txtPrice" placeholder="Enter Price"style="width:40%; background-color:transparent; border-radius:30px; text-align:center";>
</div>
<br>
<input type="submit" name="btnSubmit" value="Add Product" style="width:10%; margin:20px 0px; border-radius:50px;text-align:center";>
</form>
    

<?php

include 'footer.php'

?>