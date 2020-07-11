<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {font-family: Arial, Helvetica, sans-serif; width:400px; margin:5px 310px;}
form {border: 1px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 5px 0;
  display: inline-block;
  border: 3px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 10px 0 12px 0;
}

img.avatar {
  width: 45%;
  border-radius: 10%;
}

.container {
  padding: 10px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

</style>
</head>
<body>

<div class="container">
<div class="login-form">
<center><b><i><h1 class="text-center">Admin LogIn</h1></b></i></center>

<form  method="POST" enctype="multipart/form-data">

  <div class="imgcontainer">
    <img src="images/avatar2.gif" alt="Avatar" class="avatar">
  </div>

    <div class="form-group">
    <input type="text" class="form-control" placeholder="Enter Name" name="aname" required="required">
    </div>
    <div class="form-group">
    <input type="password" class="form-control" placeholder="Enter Password" name="password" required="required">
    </div>
    <div class="form-group">    
    <button type="submit" class="btn btn-primary " name="btnLogin">LogIn</button>
    </div>
    <div class="checkbox">
    <label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
    <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>
</div>
</div>

<?php
include 'connection.php';

if(isset($_POST['btnLogin']))
{
    $username=$_POST['aname'];
    $password=$_POST['password'];

    $query="Select * from admin where A_Name='$username' && A_Password='$password'";
    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count)
        {
          $_SESSION['admin']=$row[0];
          header("Location:navbar1.php");
        }
        else 
        {
          echo mysqli_error($conn);
          echo "Invalid Credientals";
        }
    }

?>

</body>
</html>
