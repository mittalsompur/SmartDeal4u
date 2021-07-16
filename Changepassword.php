<?php
 include("Header.php");
 include("connection.php");
 $errormsg="";
 
 if(isset($_POST["btnUpdate"]))
	{
		
		$password=$_POST["txtnewpassword"];
		
		
		$query="UPDATE  registertbl SET password='$password' WHERE id=".$_SESSION["userid"];
		$returnVal=mysql_query($query);
		if($returnVal)
		{
			$errormsg="Password change sussefully..";
		}
	}
 
 
 ?>
 <div class="container">
                     <div class="row">
                        <div class="col-md-12" style="margin-top:15px";>
                           
                           <div class="row">
                             
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <h2>Change Password</h2>
                                 <p>If you have an change the password..</p>
                                 <div class="xs-margin"></div>
                                 <form id="login-form" method="post">
                                    <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Old Password</span></span> <input type="text" name="txtoldpassword" id="txtoldpassword" required class="form-control input-lg" placeholder="Your Old Password"></div>
									
                                    <div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">New Password</span></span> <input type="password" name="txtnewpassword" id="txtnewpassword" required class="form-control input-lg" placeholder="Your New Password"></div>
									
									 <div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Confirm Password</span></span> <input type="password" name="txtcpassword" id="txtcpassword" required class="form-control input-lg" placeholder="Your Confirm Password"></div>
									 
                                    <span class="help-block text-right"><a href="Forgetpassword.php">Forgot your password?</a></span> <input type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-custom-2" value="Login" onclick="validateCtrl()">
								     <br><h4><?php echo $errormsg; ?></h4>
								
                                 </form>
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
		var oldpss=document.getElementById("txtoldpassword").value;
		var Newpword=document.getElementById("txtnewpassword").value;
	    var Cpword=document.getElementById("txtcpassword").value;
		//alert(oldpss);
		//alert(Newpword);
		//alert(Cpword);
		if(oldpss == "")
		{
			alert("Enter valid oldpassword");
			return false;
		}
		else if(Newpword == "")
		{
			alert("Enter valid Newpassword");
			return false;
		}
		else if(Cpword == "")
		{
			alert("Enter valid Confirmpassword");
			return false;
		}
		
		return false;
	}
</script>
 <?php
 include("Footer.php");
 ?>
 