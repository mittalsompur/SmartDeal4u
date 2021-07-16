<?php
 include("Header.php");
 $Name="";
 $Email="";
 $Password="";
 $Address="";
 $City="";
 $State="";
 $Country="";
 $Contactno="";
 include("connection.php");
 
 //echo "hhh";exit;
 if(isset($_POST["btnsub"]))
 {
	$Name=$_POST["txtname"];
	$Email=$_POST["txtemail"];
	$Password=$_POST["txtpassword"];
	$Address=$_POST["txtadd"];
	$City=$_POST["txtcity"];
	$State=$_POST["txtstate"];
	$Country=$_POST["txtcountry"];
	$Contactno=$_POST["txtno"]; 
	$query= "INSERT INTO registertbl(name,	email,password,address,city,state,country,contactno,status) VALUES('$Name','$Email','$Password','$Address','$City','$State','$Country','$Contactno',1)";
	//echo $query;exit;
    $returnVal=mysql_query($query);
    echo "data regestred successfully";
	header("Location :Login.php");
 }
 else if(isset($_POST["btnUpdate"]))
	{
		
		$Name=$_POST["txtname"];
	    $Address=$_POST["txtadd"];
	    $City=$_POST["txtcity"];
	    $State=$_POST["txtstate"];
	    $Country=$_POST["txtcountry"];
	    $Contactno=$_POST["txtno"];
		$query= "UPDATE registertbl SET  name='$Name',address='$Address',city='$City',state='$State',country='$Country',contactno='$Contactno'  WHERE id=".$_SESSION["userid"];
		
	    $returnVal=mysql_query($query);
		//echo $query ;
		
	}
 else if($idValue > 0 && $_GET["action"] == "edit")
 {
	 //echo "hhh";exit;
	 $query="SELECT * FROM registertbl WHERE id=".$_SESSION["userid"];
	 //echo $query;exit;
		$returnVal=mysql_query($query);
		if(mysql_num_rows($returnVal))
			
		{
			$row=mysql_fetch_array($returnVal);
			$Name=$row["name"];
			$Address=$row["address"];
			$City=$row["city"];
			$State=$row["state"];
			$Country=$row["country"];
			$Contactno=$row["contactno"];
			
		}
} 
 ?>
  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <header class="content-title" style="margin-top:15px";>
                              <h1 class="title">Register Account</h1>
                              <p class="title-desc">If you already have an account, please login at <a href="#">login page</a>.</p>
                           </header>
                           <div class="xs-margin"></div>
                           <form  method="post" action="#" id="register-form">
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
									
                                       <h2 class="sub-title">YOUR PERSONAL DETAILS</h2>
                                       <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text">Name</span></span> <input type="text" name="txtname" value="<?php echo $Name; ?>"required class="form-control input-lg" placeholder="Your First Name"></div>
									  
                                       <?php
										  if($idValue > 0 && $_GET["action"] != "edit")
											{
										?>
                                       <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text">Email</span></span> <input type="text" name="txtemail" value="<?php echo $Email; ?>" required class="form-control input-lg" placeholder="Your Email" ></div>
										<?php
											}
										?>
										
									   <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-phone"></span><span class="input-text">Contact_no</span></span> <input type="text"name="txtno" value="<?php echo $Contactno; ?>" required class="form-control input-lg" placeholder="Your Telephone"></div>
                                       
                                    </fieldset>
									<?php
										if($idValue > 0 && $_GET["action"] != "edit")
										{
									?>
                                    <fieldset>
                                       <h2 class="sub-title">YOUR PASSWORD</h2>
                                       <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Password</span></span> <input type="password" name="txtpassword" required class="form-control input-lg" placeholder="Your Password"></div>
                                       <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-password"></span><span class="input-text">Repassword</span></span> <input type="password" required class="form-control input-lg" placeholder="Your Password"></div>
                                    </fieldset>
									<?php
										}
									?>
								 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                       <h2 class="sub-title">YOUR ADDRESS</h2>
                                       
                                       
                                       <div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">Address</span></span> <input type="text" name="txtadd" value="<?php echo $Address; ?>"required class="form-control input-lg" placeholder="Your Address"></div>
                                        
										<div class="input-group"><span class="input-group-addon"><span class="input-icon input-icon-address"></span><span class="input-text">City</span></span> <input type="text" name="txtcity" value="<?php echo $City; ?>"required class="form-control input-lg" placeholder="Your City"></div>
                                        
										
                                       <div class="input-group">
                                          <span class="input-group-addon"><span class="input-icon input-icon-country"></span><span class="input-text" >Country</span></span>
                                          <div class="large-selectbox clearfix">
                                             <select id="country" value="<?php echo $Country; ?>"name="txtcountry"  class="form-control">
											 <option value="Select Country">Select Country</option>
												<?php
													$CountryArray=Array("India","China","Pakistan","Brazil");
													
												for($i=0;$i<count($CountryArray);$i++)
													{
														if($Country != "")
														{
															if($Country == $CountryArray[$i])
															{
																echo "<option value='".$CountryArray[$i]."' selected>".$CountryArray[$i]."</option>";
															}
															else
															{
																echo "<option value='".$CountryArray[$i]."'>".$CountryArray[$i]."</option>";
															}
														}
														else
														{
															echo "<option value='".$CountryArray[$i]."'>".$CountryArray[$i]."</option>";
														}
													}
												?>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="input-group">
                                          <span class="input-group-addon"><span class="input-icon input-icon-region"></span><span class="input-text">State</span></span>
                                          <div class="large-selectbox clearfix">
                                             <select id="state" name="txtstate" class="form-control"value="<?php echo $State; ?>" >
                                                <option value="Select state ">Select state</option>
                                                <?php
													$StateArray=Array("Texas","New york","Narnia","jamanji");
													
													for($i=0;$i<count($StateArray);$i++)
													{
														if($State != "")
														{
															if($State == $StateArray[$i])
															{
																echo "<option value='".$StateArray[$i]."' selected>".$StateArray[$i]."</option>";
															}
															else
															{
																echo "<option value='".$StateArray[$i]."'>".$StateArray[$i]."</option>";
															}
														}
														else
														{
															echo "<option value='".$StateArray[$i]."'>".$StateArray[$i]."</option>";
														}
													}
												?>
                                             </select>
                                          </div>
                                       </div>
                                    </fieldset>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
								   <?php
										if($idValue > 0 && $_GET["action"] == 'edit')
										{
									?>
									<input type="submit" action="post" name="btnUpdate" value="Update Account" class="btn btn-custom-2 md-margin">
									<?php
										}
										else
										{
									?>
									<input type="submit" action="post" name="btnsub" value="CREATE MY ACCCOUNT" class="btn btn-custom-2 md-margin">
									<?php
										}
									?>
									
								    
                                  
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </section>
 <?php
 include("Footer.php");
 ?>