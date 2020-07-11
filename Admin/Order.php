<?php
include 'Header.php';
include 'connection.php';

$query1="Select * from user";
$result1=mysqli_query($conn,$query1);

if(isset($_POST['btnSubmit']))
{
    $user=$_POST['ddUser'];
    $oa=$_POST['txtTotalAmount'];

    $query="Insert into order(U_Id,O_TotalAmount) values('$user','$oa')";
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
Order Page
</div>
<div class="card-content">
<form class="col s12" method="POST" enctype="multipart/form-data">
<div class="row">
                                
<div class="input-field col s6">
<label for="last_name">Enter User :</label>
<Select id="last_name" class="validate" name="ddUser">
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
</div>
<br>
<div class="input-field col s6">
<label for="last_name">Enter Total Amount :</label>
<input id="last_name" class="validate" type="text" name="txtTotalAmount">
</div>
<br>
<input type="submit" name="btnSubmit" value="Add Order"  class="waves-effect waves-light btn">
</form>
<div class="clearBoth">
</div>
</div>
</div>
</div>	
            
<div class="col-lg-2"></div>
</div>

<?php

include 'footer.php';
?>