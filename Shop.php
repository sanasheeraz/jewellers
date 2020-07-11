<?php

include 'navbar.php';
if(!isset($_SESSION['cart']))
{
  $_SESSION['cart']=array();
}

include 'connection.php';

$query="select * from product";
$result=mysqli_query($conn,$query);
?>
<div style="margin : 40px;">
<h1><b><i>Gallery Page</b></i></h1>
<div class="container">
  <h1><?php echo count($_SESSION['cart']);?></h1>
  <div class="row">
   <?php
   while($row=mysqli_fetch_array($result))
   {
       ?>
<div class="col-md-4">
      <div class="thumbnail">
        
          <img src="img/<?php echo $row['P_Image']?>" alt="Lights" style="width:100%">
          <div class="caption">
            <div class="row">
              <div class="col-lg-4">
              <?php echo $row['P_Name']?>
              </div>
              <div class="col-lg-4">
              <?php echo $row['P_Quantity']?>
              </div>
              <div class="col-lg-4">
              <?php echo $row['P_Description']?>
              </div>
              <div class="col-lg-4">
              <?php echo $row['P_Price']?>
              </div>
              <div class="col-lg-4">
              <a href="addCart.php?id=<?php echo $row['P_Id']?>"><button class="btn btn-success">+Cart</button></a>
              </div>
            </div>
          </div>
        
      </div>
    </div>
       <?php
   }
   
   ?> 
  

  </div>
</div>

<?php

include 'footer.php';

?>