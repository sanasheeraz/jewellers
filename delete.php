<?php

if(isset($_GET['id']))
{
    $id=$_GET['id'];
    include 'connection.php';
    $query="Delete from product where P_Id='$id'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header("Location:ViewProduct.php");
    }else
    {
        echo "Error :".mysqli_error($conn);
    }
}
?>