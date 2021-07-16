<?php
	include("header.php");
	include("connection.php");
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
                        <label for="exampleInputEmail1">Start Date</label><br/>
						<input type="date" name="startdate" class="form-control" >
						
                    </div>
					<div class="form-group">
                        <label for="exampleInputEmail1">End Date</label><br/>
						<input type="date" name="enddate"  class="form-control">
						 
                    </div>
					
						<button type="submit" class="btn btn-default" name="btnsub">Generate Report</button>
						<button type="submit" class="btn btn-default" name="submit">View in Exl</button>
				</form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->
<?php
	if(isset($_POST["btnsub"]))
	{
?>
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
        <th>Photo</th>
		<th>UserName</th>
		 <th>City</th>
		<th>Locality</th>
		 <th>Title</th>
		<th>Description</th>
		 <th>Itemtype</th>
		 <th>Keyword</th>
		<th>Mobileno</th>
		 <th>Price</th>
    </tr>
    </thead>
    <tbody>
	
	<?php
		$query="SELECT addp.*, r.name 'UserName'
				FROM addposttbl addp
				INNER JOIN registertbl r ON r.id=addp.userid
				WHERE addp.postdate BETWEEN '".$_POST["startdate"]."' AND '".$_POST["enddate"]."'";
			
		$returnVal=mysql_query($query);
		if(mysql_num_rows($returnVal) > 0)
		{
			while($row=mysql_fetch_array($returnVal))
			{
			?> 
			<tr>
			    <td><img src="../AddpostImages/<?php echo $row["photo"]; ?>" width="100" height="100"/></td>
				<td><?php echo $row["UserName"];?></td>
				<td><?php echo $row["city"];?></td>
				<td><?php echo $row["locality"];?></td>
				<td><?php echo $row["title"];?></td>
				<td><?php echo $row["description"];?></td>
				<td><?php echo $row["itemtype"];?></td>
				<td><?php echo $row["keyword"];?></td>
				<td><?php echo $row["mobileno"];?></td>
				<td><?php echo $row["price"];?></td>
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
<?php
	}
?>
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
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
<?php
 include("footer.php");
 ?>