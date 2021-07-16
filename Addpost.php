<?php
 include("Header.php");
 include("connection.php");
 $category="";
 $subcategory="";
 $city="";
 $locality="";
 $title="";
 $description="";
 $photo="";
 $itemtype="";
 $keyword="";
 $mobno="";
 $price="";
 $uploadimage="";
 $idValue=0;
	if(isset($_GET["id"]))
	{
		$idValue=$_GET["id"];
	}
 
	if(isset($_POST["btnsub"]))
	{
		$category=$_POST["txtcat"];
		$subcategory=$_POST["txtsubcat"];
		$city=$_POST["txtcity"];
		$locality=$_POST["txtlocality"];
		$title=$_POST["txttitle"];
		$description=$_POST["txtdesc"];
		
		$itemtype=$_POST["txtitem"];
		$keyword=$_POST["txtkeyword"];
		$mobno=$_POST["txtmobno"];
		$price=$_POST["txtprice"];
		
		$photo = explode(".",$_FILES['imageupload']['name']);
		$extension = $photo[1];
				if(($extension == "jpg" || $extension == "png" || $extension == "gif"))
				{
					$UserId=$_SESSION["userid"];
					$imagename = time().'_'.rand(10000,99999).'_Img.'.$extension;
					$sourcepath = $_FILES['imageupload']['tmp_name'];
					$destpath = "AddpostImages/".$imagename;
					move_uploaded_file($sourcepath,$destpath);
					$query="INSERT INTO addposttbl(cid,userid,subcategoryid,city,locality,title,description,photo,itemtype,keyword,mobileno,price,postdate,status) VALUES('$category',$UserId,'$subcategory','$city','$locality','$title','$description','$imagename','$itemtype','$keyword','$mobno','$price',NOW(),0)";
					$returnVal=mysql_query($query);
				}
	  } 
	  else if(isset($_POST["btnupdate"]))
	  {
		  $imagepath="";
		$category=$_POST["txtcat"];
		$subcategory=$_POST["txtsubcat"];
		$city=$_POST["txtcity"];
		$locality=$_POST["txtlocality"];
		$title=$_POST["txttitle"];
		$description=$_POST["txtdesc"];
		
		$itemtype=$_POST["txtitem"];
		$keyword=$_POST["txtkeyword"];
		$mobno=$_POST["txtmobno"];
		$price=$_POST["txtprice"];
		if(is_uploaded_file($_FILES['imageupload']['tmp_name']))
		{
			$photo = explode(".",$_FILES['imageupload']['name']);
			$extension = $photo[1];
			if(($extension == "jpg" || $extension == "png" || $extension == "gif"))
			{
				$UserId=$_SESSION["userid"];
				$imagename = time().'_'.rand(10000,99999).'_Img.'.$extension;
				$sourcepath = $_FILES['imageupload']['tmp_name'];
				$destpath = "AddpostImages/".$imagename;
				move_uploaded_file($sourcepath,$destpath);
				$imagepath = ",imagename='$imagename'";
			}
			if(isset($_POST["hiddentxt"]))
			{
				unlink("../AddpostImages/".$_POST["hiddentxt"]);
			}
		}
		
		$query="UPDATE addposttbl SET cid='$category',subcategoryid='$subcategory',city='$city',locality='$locality',title='$title',description='$description' $imagepath,itemtype='$itemtype',keyword='$keyword',mobileno='$mobno',price='$price' WHERE postid=$idValue";
		$returnVal=mysql_query($query);
		//echo $query;
		//header("Location: ManageUserPost.php");
	}
	 if($idValue > 0 && $_GET["action"]=="edit")
	{
		
		$query="SELECT * FROM addposttbl WHERE postid=$idValue";
		
		$returnVal=mysql_query($query);
		
		if(mysql_num_rows($returnVal))
			
		{
				$row=mysql_fetch_array($returnVal);
				$category=$row["cid"];
				$subcategory=$row["subcategoryid"];
				$city=$row["city"];
				$locality=$row["locality"];
				$title=$row["title"];
				$description=$row["description"];
				$photo=$row["photo"];
				$itemtype=$row["itemtype"];
				$keyword=$row["keyword"];
				$mobno=$row["mobileno"];
				$price=$row["price"];
				
		}
	}
 ?>
  <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                           <header class="content-title" style="margin-top:15px";>
                              <h1 class="title">Add free post</h1>
                              <p class="title-desc">Place your advertise here. <a href="#"></a>.</p>
                           </header>
                           <div class="xs-margin"></div>
                           <form action="#" id="register-form"  method="post" enctype="multipart/form-data">
						   <input type="hidden" name="hiddentxt" value="<?php echo $uploadimage; ?>">
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <fieldset>
                                       <h2 class="sub-title">ADD POST DETAILS</h2>
                                       <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Category</span></span>
									   <select id="txtcat" name="txtcat"  value="<?php echo $category; ?>" class="form-control">
                                                <option value="0">Select Category</option>
												<?php
                                                $query="SELECT * FROM category WHERE status=1";
												$returnVal=mysql_query($query);
												if(mysql_num_rows($returnVal) > 0)
												{
													while($row=mysql_fetch_array($returnVal)) 
													{
														if($idValue > 0 && $_GET["action"]=="edit")
														{
															if($category==$row["cid"])
															{
																echo '<option value="'.$row["cid"].'" selected>'.$row["cname"].'</option>';
															}
															else
															{
																echo '<option value="'.$row["cid"].'">'.$row["cname"].'</option>';
															}
															
														}
														else
														{
															echo '<option value="'.$row["cid"].'">'.$row["cname"].'</option>';
														}
													}
												}	
												?>
                                             </select>
									   </div>
                                       <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Subcategory</span></span>
											<?php
												if($idValue > 0 && $_GET["action"]=="edit")
												{
													?>
													<select  name="txtsubcat"  id="txtsubcat" class="form-control">
													<option value="0">Select subcategory</option>
													<?php
													$query="SELECT * FROM subcategory WHERE cid=$category";
													$returnVal=mysql_query($query);
													if(mysql_num_rows($returnVal) > 0)
													{
														while($row=mysql_fetch_array($returnVal)) 
														{
															if($subcategory==$row["subcategoryid"])
															{
																echo '<option value="'.$row["subcategoryid"].'" selected>'.$row["subcategoryname"].'</option>';
															}
															else
															{
																echo '<option value="'.$row["subcategoryid"].'">'.$row["subcategoryname"].'</option>';
															}
														}
													}
													?>
													</select>
													<?php
												}
												else
												{
											?>
											<select  name="txtsubcat"  id="txtsubcat" value="<?php echo $subcategory; ?>" class="form-control">
                                                <option value="0">Select subcategory</option>
                                            </select>
											<?php												
												}
											?>
									   </div>
									    <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Select city</span></span>
										 <select  name="txtcity"  id="txtcity" value="<?php echo $city; ?>" class="form-control">
										 <option value="0">Select city</option>
										 <?php
											$CityArray=Array("Ahmedabad","Surat","Baroda","Gandhinagar");
											
											for($i=0;$i<count($CityArray);$i++)
											{
												if($city != "")
												{
													if($city == $CityArray[$i])
													{
														echo "<option value='".$CityArray[$i]."' selected>".$CityArray[$i]."</option>";
													}
													else
													{
														echo "<option value='".$CityArray[$i]."'>".$CityArray[$i]."</option>";
													}
												}
												else
												{
													echo "<option value='".$CityArray[$i]."'>".$CityArray[$i]."</option>";
												}
											}
										?>
                                               
                                             </select>
										
										</div>
                                       <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Locality</span></span> <input type="text" required id="txtlocality" name="txtlocality"
									  value="<?php echo $locality; ?>" class="form-control input-lg" ></div>
                                       <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Title</span></span> <input type="text" required name="txttitle"id="txttitle" 
									   value="<?php echo $title; ?>" class="form-control input-lg" ></div>
                                       <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Description</span></span> <textarea  name="txtdesc"id="txtdesc" class="form-control input-lg" ><?php echo $description ; ?></textarea></div>
									   <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Photo</span></span> <input type="file" name="imageupload" value="<?php echo $photo; ?>"    class="form-control input-lg" ></div>
									   <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Itemtype</span></span>
									     <select  name="txtitem"  id="ddlSubCategory" value="<?php echo $itemtype; ?>" class="form-control">
                                                <option value="0">Select Item Type</option>
												<?php
											$ItemArray=Array("used","new");
											
											for($i=0;$i<count($ItemArray);$i++)
											{
												if($itemtype != "")
												{
													if($itemtype == $ItemArray[$i])
													{
														echo "<option value='".$ItemArray[$i]."' selected>".$ItemArray[$i]."</option>";
													}
													else
													{
														echo "<option value='".$ItemArray[$i]."'>".$ItemArray[$i]."</option>";
													}
												}
												else
												{
													echo "<option value='".$ItemArray[$i]."'>".$ItemArray[$i]."</option>";
												}
											}
										?>
												
										 </select>		
												
									   </div>
									   <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Keyword</span></span> <input type="text" name="txtkeyword"  value="<?php echo $keyword; ?>" class="form-control input-lg" ></div>
									   <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Mobno</span></span> <input type="text" name="txtmobno" value="<?php echo $mobno; ?>" class="form-control input-lg" ></div>
									   <div class="input-group"><span class="input-group-addon"><span></span><span class="input-text">Price</span></span> <input type="text" name="txtprice" value="<?php echo $price; ?>" class="form-control input-lg" ></div> 
									   
									   <?php
									   if($idValue > 0 && $_GET["action"]=="edit")
									   {
										?>
										<input type="submit" name="btnupdate" value="UPDATE" class="btn btn-custom-2 md-margin">
										<?php
									   }
									   else
										{
										   ?>
									   
											<input type="submit" name="btnsub" onclick="validateCtrl()" value="SUBMIT" class="btn btn-custom-2 md-margin">
									   <?php
										}
									   ?>
                                    </fieldset>
                                    
                                 </div>
                                                           
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </section>
<script type="text/javascript">
	$("#ddlCategory").change(function(){
		var catId=$("#ddlCategory").val();
		var req="GetSubCategory";
		$("#ddlSubCategory").empty();
		$.get("GetPostData.php",{categoryId:catId,pageReq:req},function(responseText){
			//alert(responseText);
			$("#ddlSubCategory").append(responseText);
		});
	});

</script>
<script type="text/javascript">
	function validateCtrl()
	{
		var Category=document.getElementById("txtcat").value;
		//var subcategory=document.getElementById("txtsubcat").value;
		var city=document.getElementById("txtcity").value;
		var locality=document.getElementById("txtlocality").value;
		var title=document.getElementById("txttitle").value;
		var description=document.getElementById("txtdesc").value;
		//alert(Category);
		//alert(subcategory);
		//alert(city);
		//alert(locality);
		//alert(title);
		//alert(description);
	if(Category <=0)
		{
			alert("Enter valid Category");
			return false;
		}
	  /* else if(subcategory <=0)
		{
			alert("Enter valid subcategory");
			return false;
		}*/
	   else if(city <=0)
		{
			alert("Enter valid cityname");
			return false;
		}
		
	    else if( locality == "")
		{
			alert("Enter valid  locality");
			return false;
		}
		else if(title == "")
		{
			alert("Enter valid title");
			return false;
		}
		else if( description== "")
		{
			alert("Enter valid title");
			return false;
		}
		
		return false;
	}
	
	
</script>				   
 <?php
 include("Footer.php");
 ?>