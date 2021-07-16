<?php
  include("Header.php");
  include("connection.php");
 $Name="";
 $Email="";
 $Query="";
 if(isset($_POST["btnsub"]))
 {
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Query=$_POST["txtquery"];
	$query= "INSERT INTO feedback(name,email,query,status) VALUES('$Name','$Email','$Query',1)";
	$returnVal=mysql_query($query);
    
 }
?>
 <div class="container">
                     <div class="row">
                        <div class="col-md-12" style="margin-top:15px";>
                           <header class="content-title">
                              <h1 class="title">Feedback</h1>
							  <div class="md-margin"></div>
                           </header>
                           <div class="row">
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 
                                 <div class="xs-margin"></div>
                                 <form id="feedback-form" method="post">
                                    <div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Name</span></span> <input type="text" name="txtname" id="txtname" required class="form-control input-lg" placeholder="Your name"></div>
                                    
									
									<div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Email</span></span> <input type="text" name="txtemail" id="txtemail" required class="form-control input-lg" placeholder="Your email"></div>
                                    
									
									<div class="input-group xs-margin"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">query</span></span> <textarea  name="txtquery" id="txtquery" cols="25" rows="5" class="form-control input-lg" placeholder="Your Query"></textarea></div>
                                    <input type="submit" name="btnsub" id="btnsub" class="btn btn-custom-2" value="Feedback" onclick="validateCtrl()">
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
		var Email=document.getElementById("txtemail").value;
		var Query=document.getElementById("txtquery").value;
		//alert(Name);
		//alert(Email);
		alert(Query);
		
		if(Name == "")
		{
			alert("Enter valid Username");
			return false;
		}
		else if(Email == "")
		{
			alert("Enter valid Email address");
			return false;
		}
		else if(Query == "")
		{
			alert("Enter valid query ");
			return false;
		}
		return false;
	}
	
	
</script>	
	<?php
	include("Footer.php");
?>	