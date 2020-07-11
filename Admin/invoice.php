<?php

include 'Header.php';
include 'connection.php';

$query1="Select * from order";
$result1=mysqli_query($conn,$query1);


$query2="Select * from product";
$result2=mysqli_query($conn,$query2);


if(isset($_POST['btnSubmit']))
{
    $Order=$_POST['ddOrder'];
    $Product=$_POST['ddProduct'];
    $ProName=$_POST['txtProduct'];
    $ProPrice=$_POST['txtPrice'];
    $ProQuantity=$_POST['txtQuantity'];

    $query="Insert into invoice(O_Id,P_Id,P_Name,P_Name,P_Quantity,P_Price) values('$Order','$Product','$ProName','$ProPrice','$ProQuantity')";
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

<div id="page-wrapper" >
<div class="header">
<div id="page-inner"> 
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-8">
<div class="card">
<div class="card-action">

Invoice Page
</div>
<div class="card-content">
<form class="col s12" method="POST" enctype="multipart/form-data">
<div class="row">
                                
<div class="input-field col s6">
<label for="last_name">Enter Order :</label>
<Select id="last_name" class="validate" name="ddOrder">
<?php

if($result1)
{
    while($row=mysqli_fetch_array($result1))
    {
        ?>
        <option value="<?php echo $row['O_Id'];?>"><?php echo $row['O_Name']?></option>
        <?php
    }
}

?>
</Select>
</div>
<br>
<div class="input-field col s6">
<label for="last_name">Enter Product :</label>
<Select id="last_name" class="validate" name="ddProduct">
<?php

if($result2)
{
    while($row=mysqli_fetch_array($result2))
    {
        ?>
        <option value="<?php echo $row['P_Id'];?>"><?php echo $row['P_Name']?></option>
        <?php
    }
}

?>
</Select>
</div>
<br>
<div class="form-group">
<label for="last_name">Enter Product Name :</label>
<input id="last_name" class="validate" type="text" name="txtProduct">
</div>
<br>
<div class="form-group">
<label for="last_name">Enter Product Price :</label>
<input id="last_name" class="validate" type="text" name="txtPrice">
</div>
<br>
<div class="form-group">
<label for="last_name">Enter Product Quantity :</label>
<input id="last_name" class="validate" type="text" name="txtQuantity">
</div>
<br>
<input type="submit" name="btnSubmit" value="Add Invoice" class="waves-effect waves-light btn">
</form>
<div class="clearBoth"></div>
                        </div>
            </div>
            </div>	
            
            <div class="col-lg-2"></div>
</div>


</div>
</div>    


<?php

include 'footer.php'

?>