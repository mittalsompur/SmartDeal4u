<?php
  include("Header.php");
  include("connection.php");
 $Name="";
 $Email="";
 $Query="";
 
 if(isset($_POST["btnsub"]))
 {
	$Name=$_POST["txtname"];
	
	$query= "INSERT INTO feedback(name,email,query,status) VALUES('$Name','$Email','$Query',1)";
	//echo $query;exit;
    $returnVal=mysql_query($query);
    
 }
?>
 <div class="container">
                     <div class="row">
                        <div class="col-md-12" style="margin-top:15px";>
                           <header class="content-title">
                              <h1 class="title">Forgot Password Here</h1>
							  <div class="md-margin"></div>
                           </header>
                           <div class="row">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 
                                 <div class="xs-margin"></div>
                                 <form id="feedback-form" method="post">
                                    <div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Enter your Email ID </span></span> <input type="text" name="txtname" id="txtname" required class="form-control input-lg" placeholder="Your email id"></div>
                                    
									
									
                                    
									
									
                                    <input type="submit" name="btnsub" id="btnsub" onclick="validateCtrl()" class="btn btn-custom-2" value="Forgot password" onclick="validateCtrl()">
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
		var Name=document.getElementById("txtname").value;
		
		
		if(Name == "")
		{
			alert("Enter valid Email ID");
			return false;
		}
		
		return false;
	}
	
	
</script>	
	<?php
	include("Footer.php");
?>	