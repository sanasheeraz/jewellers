<?php
include 'Header.php';
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
    
    $target='../img/'.basename($imageName);

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

<div id="page-wrapper" >
<div class="header">
<div id="page-inner"> 
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="card">
<div class="card-action">
Product Page
</div>
<div class="card-content">
<form class="col s12" method="POST" enctype="multipart/form-data">
<div class="row">
                                
<div class="input-field col s6">
<label for="last_name"> Product Name :</label>
<input id="last_name" class="validate" type="text" name="txtProduct">
<div>
<br>
<div class="input-field col s6">
<label for="last_name">Enter Category :</label>
<Select id="last_name" class="validate" name="ddCategory">
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
<div class="input-field col s6">
<label for="last_name">Product Quantity :</label>
<input id="last_name" class="validate" type="text" name="txtQuantity">
</div>
<br>
<div class="input-field col s6">
<label for="last_name">Product Description :</label>
<input id="last_name" class="validate" type="text" name="txtDescription">
</div>
<br>
<div class="input-field col s6">
<label for="last_name">Product Image :</label>
<input id="last_name" class="validate"  type="file" name="img">
</div>
<br>
<div class="input-field col s6">
<label for="last_name">Product Price :</label>
<input id="last_name" class="validate" type="text" name="txtPrice">
</div>
<br>
<input type="submit" name="btnSubmit" value="Add Product" class="waves-effect waves-light btn">
</form>
<div class="clearBoth">
</div>
</div>
</div>
</div>	
            
<div class="col-lg-2"></div>
</div>
    

<?php

include 'footer.php'

?>