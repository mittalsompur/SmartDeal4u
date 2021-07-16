<?php
 include("Header.php");
 include("connection.php");
 $errorMsg="";
 if(isset($_POST["btnsub"]))
 {   
    $Email = $_POST['txtemail'];
	$Password = $_POST['txtpassword'];
	 
	$query="SELECT * FROM registertbl WHERE email='$Email' && password='$Password'";
	$returnVal=mysql_query($query);
	if(mysql_num_rows($returnVal))
	{
		$row=mysql_fetch_array($returnVal);
		session_start();
		$_SESSION["userid"]=$row["id"];
		$_SESSION["username"]=$row["name"];
		header("Location:index.php");
	}
	else
	{
		$errorMsg= "Invalid username and password";
		//header("Location:Login.php");
		
	}
	//header("Location:index.php"); 
 } 
 ?>
 <div class="container">
	 <div class="row">
		<div class="col-md-12" style="margin-top:15px";>
		   <header class="content-title">
			  <h1 class="title">Login or Create An Account</h1>
			  <div class="md-margin"></div>
		   </header>
		   <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
				 <h2>New Customer</h2>
				 <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
				 <div class="md-margin"></div>
				 <a href="Register.php" class="btn btn-custom-2">Create An Account</a>
				 <div class="lg-margin"></div>
			  </div>
			  <div class="col-md-6 col-sm-6 col-xs-12">
						 <h2>Registered Customers</h2>
						 <?php
			if($errorMsg != "")
			{
				echo $errorMsg;
			}
			else
			{
				?>
				<p>If you have an account with us, please log in.</p>
				<?php
			}
		?>
				 <div class="xs-margin"></div>
				 <form id="login-form" method="post">
					<div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email&#42;</span></span> <input type="text" id="txtemail" name="txtemail" required class="form-control input-lg" placeholder="Your Email"></div>
					<div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password&#42;</span></span> <input type="password" id="txtpassword"name="txtpassword" required class="form-control input-lg" placeholder="Your Password"></div>
					<span class="help-block text-right"><a href="Forgetpassword.php">Forgot your password?</a></span> <input type="submit" name="btnsub" onclick="validateCtrl()" class="btn btn-custom-2" value="Login">
				 </form>
				 <br/>
				 <span style="color:red;font-weight:bold;"><?php echo $errorMsg; ?></span>
				 <div class="sm-margin"></div>
			  </div>
		   </div>
		</div>
	 </div>
  </div>
</section>
<script type="text/javascript">
	function validateCtrl()
	{
		var Email=document.getElementById("txtemail").value;
		var Pword=document.getElementById("txtpassword").value;
		//alert(Email);
		//alert(Pword);
		if(Email == "")
		{
			alert("Enter valid email address");
			return false;
		}
		else if(Pword == "")
		{
			alert("Enter valid password");
			return false;
		}
		return false;
	}
</script>    
<?php
	include("Footer.php");
?>
 