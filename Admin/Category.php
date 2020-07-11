<?php

include 'Header.php';

?>
<div id="page-wrapper" >
<div class="header">
<div id="page-inner"> 
			 <div class="row">
             <div class="col-lg-2"></div>
			 <div class="col-lg-8">
			 <div class="card">
                        <div class="card-action">
                        Category Page
                        </div>
                        <div class="card-content">
                            <form class="col s12" method="POST">
                            <div class="row">
                                
                                <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate" name="txtCategory">
                                <label for="last_name">Enter Category Name :</label>
                                </div>
                            </div>
                            <input type="submit" name="btnSubmit" value="AddCategory" class="waves-effect waves-light btn">
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
include 'connection.php';

if(isset($_POST['btnSubmit']))
{
    $catName=$_POST['txtCategory'];
    $query="Insert into category(C_Name) values('$catName')";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "Data Inserted";
    }else
    {
        echo "Error : ".mysqli_error($conn);
    }
}

?>

<?php

include 'footer.php';

?>