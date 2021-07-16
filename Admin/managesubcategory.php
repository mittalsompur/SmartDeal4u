<?php
	include("header.php");
	include("connection.php");
	$ddlcategory="";
	$subcategory="";
	
	$idValue=0;
	if(isset($_GET["id"]))
	{
		$idValue=$_GET["id"];
	}
	if(isset($_POST["btnsub"]))
	{
		$ddlCategory=$_POST["ddlCategory"];
		$subcategory=$_POST["txtsubcat"];
		$query="INSERT INTO subcategory( cid,subcategoryname,status) VALUES($ddlCategory ,'$subcategory',1)";
		$returnVal=mysql_query($query);
	}
	else if($idValue > 0 && $_GET["action"]=="Active")
	{
         $query="UPDATE subcategory SET status=0 WHERE subcategoryid=$idValue";
		 $returnval=mysql_query($query);
         header("Location: managesubcategory.php");
	}
	else if($idValue > 0 && $_GET["action"]=="Inactive")
	{
		$query="UPDATE subcategory SET status=1 WHERE subcategoryid=$idValue";
		$returnval=mysql_query($query);
         header("Location: managesubcategory.php");
	}
	else if(isset($_POST["btnupdate"]))
	{
		$ddlCategory=$_POST["ddlCategory"];
		$subcategory=$_POST["txtsubcat"];
		$query= "UPDATE subcategory SET  cid=$ddlCategory,subcategoryname='$subcategory' WHERE subcategoryid=$idValue";
		$returnVal=mysql_query($query);
		header("Location : managesubcategory.php");
	}
	else if($idValue > 0 && $_GET["action"]=="delete")
	{
		$query= "DELETE FROM subcategory WHERE subcategoryid=$idValue";
		mysql_query($query);
		header("Location : managesubcategory.php");
	}
	else if($idValue > 0 && $_GET["action"]=="edit")
	{
		$query= "SELECT * FROM subcategory WHERE subcategoryid = $idValue";
		 $returnVal= mysql_query($query);
		 if(mysql_num_rows($returnVal) > 0)
		 {
			 while($row=mysql_fetch_array($returnVal))
			 { 
		         $ddlcategory =  $row["cid"];
				 $subcategory = $row["subcategoryname"];
			 }
		 }
		
	}
?>	

<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Manage Sub-Category</h2>
            </div>
            <div class="box-content">
                <form role="form" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
						
						
                       <select class="form-control" id="ddlCategory" name="ddlCategory" >
					   <option>select category</option>
					         <?php
							 
							 $query="SELECT * FROM category";
							 $returnVal=mysql_query($query);
				             if(mysql_num_rows($returnVal) > 0)
				             {
					              while($row=mysql_fetch_array($returnVal)) 
					              {
							  
							        if($idValue > 0 && $_GET["action"]=="edit")
									{
										if($ddlcategory==$row["cid"])
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
					<div class="form-group">
                        <label for="exampleInputEmail1">SubCategory</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $subcategory;?>" name="txtsubcat" placeholder="SubCategory">
                    </div>
					<?php
					if( $idValue > 0 && $_GET["action"]=="edit")
					{
						?>
						<button type="submit" class="btn btn-default" name="btnupdate">Update</button>
						<?php
					}
					else
					{ 
				        ?>
						<button type="submit" class="btn btn-default" name="btnsub">Submit</button>
						<?php
					}
					
                    ?>
					<button type="Reset" class="btn btn-default">Clear</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Category List</h2>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>Category Name</th>
		<th>SubCategory Name</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	
	<?php
		$query="SELECT c.cname,sc.* FROM subcategory sc
               INNER JOIN category c ON c.cid = sc.cid;";
		$returnVal=mysql_query($query);
		if(mysql_num_rows($returnVal) > 0)
		{
			while($row=mysql_fetch_array($returnVal))
			{
			?> 
			<tr>
			    <td><?php echo $row["cname"];?></td>
				<td><?php echo $row["subcategoryname"]; ?></td>
				<td class="center">
				<?php
				 if($row["status"]==1)
			 { 
		     ?>
			<a href="managesubcategory.php?id=<?php echo $row["subcategoryid"]; ?>&action=Active">
		    <span class="label-success label label-default" >Active</span></a>
		   
			<?php	 
			 }
			 else
			 {  
		       ?> 
			   
			   <a href="managesubcategory.php?id=<?php echo $row["subcategoryid"]; ?>&action=Inactive">
             <span class="label-danger label label-default" >Inactive</span></a>
				<?php 
			 }
			 ?>
            
               </td>
        <td class="center">
            <a class="btn btn-info" href="managesubcategory.php?id=<?php echo $row["subcategoryid"]; ?>&action=edit">
                <i class="glyphicon glyphicon-edit icon-white" ></i>
                Edit
            </a>
            <a class="btn btn-danger" href="managesubcategory.php?id=<?php echo $row["subcategoryid"]; ?>&action=delete">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
		
			</tr>
			<?php
			}
		}
	?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>
<?php
 include("footer.php");
 ?>