<?php
	include("header.php");
	include("connection.php");
	
	$idValue=0;
	if(isset($_GET["id"]))
	{
		$idValue=$_GET["id"];
	}
	
	if($idValue > 0 && $_GET["action"]=="delete")
	{
		$query="DELETE FROM feedback WHERE id=$idValue";
		mysql_query($query);
		header("Location:managefeedback.php");
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
                <h2><i class="glyphicon glyphicon-plus"></i> Manage Feedback</h2>
            </div>
            <div class="box-content">
                <table class="table table-bordered table-striped responsive" style="width:100%;">
                    <tbody>
					<?php
					/*$query="SELECT ad.*,c.cname 'categoryName',sc.subcategoryname 'subcategoryName'
								FROM addposttbl  ad
								LEFT JOIN category c ON c.cid=ad.cid
								LEFT JOIN subcategory sc ON sc.subcategoryid = ad.subcategoryid
								WHERE ad.status=0";*/
					$query="SELECT * FROM feedback";			
					$returnVal=mysql_query($query);
					if(mysql_num_rows($returnVal) > 0)
					{
						while($row=mysql_fetch_array($returnVal))
						{
					?>
                    <tr>
                        
                        <td style="width:85%;">
                            
							<b>Name:</b><?php echo $row["name"]; ?></br>
							<b>Email:</b><?php echo $row["email"]; ?></br>
							<b>Query:</b><?php echo $row["query"]; ?></br>
							
							
                        </td>
						<td style="width:15%;">
							
							<a  class="btn btn-info btn-setting" href="managefeedback.php?id=<?php echo $row["id"]; ?>&action=delete">Remove Feedback</a>
						</td>
                    </tr>
					<?php
						}
					}
					else
					{
						echo "<h3>No any post found...</h3>";
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
	include("footer.php");
?>