<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}
/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<div class="container">
<div class="login-form">
<form method="POST" enctype="multipart/form-data">
<div id="id01" >
  <form class="modal-content" action="/action_page.php">
    <div class="container">
    <Center><h1 style="font-size:50px;"><b><i>Sign Up </b></i></h1></Center>
      <p>Please fill in this form to create an account.</p>
      <hr>

<div class="form-group">
    <label for="psw-repeat"><b>User Name</b></label>
    <input type="text" class="form-control" placeholder="UserName" required="required" name="UName">
  </div>
  <div class="form-group">
  <label for="psw-repeat"><b>Email</b></label>
    <input type="text" class="form-control" placeholder="Email" required="required" name="UEmail">
  </div>
  <div class="form-group">
  <label for="psw-repeat"><b>Password</b></label>
    <input type="password" class="form-control" placeholder="Password" required="required" name="UPassword">
  </div>
  <div class="form-group">
  <label for="psw-repeat"><b>Contact</b></label>
    <input type="text" class="form-control" placeholder="Contact" required="required" name="UContact">
  </div>
  <div class="form-group">
  <label for="psw-repeat"><b>Address</b></label>
    <input type="text" class="form-control" placeholder="Address" required="required" name="UAddress">
  </div>
  <label>
    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
  </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

  <div class="clearfix">
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    <button type="submit" class="signupbtn" name="btnSubmit">Sign Up</button>
  </div>
</form>
</div>
</div>

<?php
include 'connection.php';

$query="Select * from user";
$result=mysqli_query($conn,$query);
if(isset($_POST['btnSubmit']))
{
    $name=$_POST['UName'];
    $email=$_POST['UEmail'];
    $password=$_POST['UPassword'];
    $contact=$_POST['UContact'];
    $Address=$_POST['UAddress'];
    $query1="Insert into user (U_Name,U_Email,U_Password,Contact_No,U_Address) values('$name','$email','$password','$contact','$Address')";
    $result1=mysqli_query($conn,$query1);
    if($result1)
    {
      header ("Location:index.php");
    }
    else {
        echo "Error :".mysqli_error($conn);
    }
    
}
?>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



