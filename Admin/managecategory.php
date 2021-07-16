<?php
  include("header.php");
	include("connection.php");
	
	$category="";
	$uploadimage="";
	
	$idValue=0;
	if(isset($_GET["id"]))
	{
	  $idValue=$_GET["id"];
	}
	if(isset($_POST["subbtn"]))
	{
		$category=$_POST["txtcat"];
		$filename = explode(".",$_FILES['imageupload']['name']);
		$extension = $filename[1];
	 if(($extension == "jpg" || $extension == "png" || $extension == "gif"))
	  {
		$imagename = time().'_'.rand(10000,99999).'_Img.'.$extension;
		$sourcepath = $_FILES['imageupload']['tmp_name'];
		$destpath = "../CategoryImages/".$imagename;
		move_uploaded_file($sourcepath,$destpath);
		 $query="INSERT INTO category(cname,imagename,status) VALUES('$category','$imagename',1)";
		$returnVal=mysql_query($query);
	    
	  }
	 	 else
	  {
		 echo "Please choose imagefile";
	  }
	   
		
	}
	else if($idValue > 0 && $_GET["action"]=="Active")
	{
         $query="UPDATE category SET status=0 WHERE cid=$idValue";
		 $returnval=mysql_query($query);
         //header("Location: managecategory.php");
	}
	else if($idValue > 0 && $_GET["action"]=="Inactive")
	{
		$query="UPDATE category SET status=1 WHERE cid=$idValue";
		$returnval=mysql_query($query);
         //header("Location: managecategory.php");
	}
	
	else if(isset($_POST["btnUpdate"]))
	{
		$imagepath="";
		$category=$_POST["txtcat"];
		if(is_uploaded_file($_FILES['imageupload']['tmp_name']))
		{
			$filename = explode(".",$_FILES['imageupload']['name']);
			$extension = $filename[1];
			if(($extension == "jpg" || $extension == "png" || $extension == "gif"))
			{
				$imagename = time().'_'.rand(10000,99999).'_Img.'.$extension;
				$sourcepath = $_FILES['imageupload']['tmp_name'];
				$destpath = "../CategoryImages/".$imagename;
				move_uploaded_file($sourcepath,$destpath);
				$imagepath = ",imagename='$imagename'";
			}
			if(isset($_POST["hiddentxt"]))
			{
				unlink("../CategoryImages/".$_POST["hiddentxt"]);
			}
		}
		
		$query="UPDATE category SET cname='$category' $imagepath WHERE cid=$idValue";
		$returnVal=mysql_query($query);
		header("Location: managecategory.php");
	}
	else if($idValue > 0 && $_GET["action"]=="edit")
	{
		$query="SELECT * FROM category WHERE cid=$idValue";
		$returnVal=mysql_query($query);
		if(mysql_num_rows($returnVal))
			
		{
			$row=mysql_fetch_array($returnVal);
			$category=$row["cname"];
			$uploadimage=$row["imagename"];
		}
	}
	else if($idValue > 0 && $_GET["action"]=="delete")
	{
		$que="SELECT * FROM category WHERE cid=$idValue";
		$returnVal=mysql_query($que);
		if(mysql_num_rows($returnVal))
		{
			$row=mysql_fetch_array($returnVal);
			$uploadimage = $row["imagename"];
			unlink("../CategoryImages/".$uploadimage);
		}	
		$query="DELETE FROM category WHERE cid=$idValue";
		mysql_query($query);
		//echo "data deleted";
		header("Location: managecategory.php");
		
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
                <h2><i class="glyphicon glyphicon-edit"></i> Manage Category</h2>
            </div>
            <div class="box-content">
                <form role="form" method="post" enctype="multipart/form-data">
				<input type="hidden" name="hiddentxt" value="<?php echo $uploadimage; ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control"  name="txtcat" placeholder="Category" value="<?php echo $category; ?>">
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input type="file" class="form-control"  name="imageupload">
                    </div>
                   <?php
				if($idValue > 0 && $_GET["action"]=="edit")
				{
					?>
					<input type="submit" name="btnUpdate" value="Update" class="btn btn-default"/>
					<?php
				}
				else
				{
					?>
					<input type="submit" name="subbtn" value="Insert" class="btn btn-default"/>
					<?php
				}
			?>
					<button type="Reset"  name="resetbtn" class="btn btn-default">Clear</button>
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
		<th>Category Image</th>
        <th>Status</th>
		<th>Actions</th>
    </tr>
    </thead>
    <tbody>
	
	
	<?php
		$query="SELECT * FROM category";
		$returnVal=mysql_query($query);
		if(mysql_num_rows($returnVal) > 0)
		{
			while($row=mysql_fetch_array($returnVal))
			{
			?>
			<tr>
			
				<td><?php echo $row["cname"]; ?></td>
				<td><img src="../CategoryImages/<?php echo $row["imagename"]; ?>" height="150" width="150"></td>
				
				<td class="center">
           
			<?php
			//$msg=$row["status"];
			
			 if($row["status"]==1)
			 { 
		     ?>
			<a href="managecategory.php?id=<?php echo $row["cid"]; ?>&action=Active">
		    <span class="label-success label label-default" >Active</span></a>
		   
			<?php	 
			 }
			 else
			 {  
		       ?> 
			   
			   <a href="managecategory.php?id=<?php echo $row["cid"]; ?>&action=Inactive">
             <span class="label-danger label label-default" >Inactive</span></a>
				<?php 
			 }
			 ?>
			 </td>
			</span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="managecategory.php?id=<?php echo $row["cid"]; ?>&action=edit">
                <i class="glyphicon glyphicon-edit icon-white" ></i>
                Edit
            </a>
            <a class="btn btn-danger" href="managecategory.php?id=<?php echo $row["cid"]; ?>&action=delete">
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
<?php
 include("footer.php");
 ?>