<?php
include 'navbar.php';
include 'connection.php';
if(isset($_POST['btnLogin']))
{
    $email=$_POST['uemail'];
    $password=$_POST['psw'];

    $query="Select * from user where U_Email='$email' && U_Password='$password'";
    $result=mysqli_query($conn,$query);
    $row =mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);
    if($count)
    {
      $_SESSION['user']=$row[0];
      header("Location:index.php");
    }
    else 
    {
      echo mysqli_error($conn);
      echo "Invalid Credientals";
    }
}
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="email" name="uemail" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="psw" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btnLogin">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
<?php
include 'footer.php';
?>