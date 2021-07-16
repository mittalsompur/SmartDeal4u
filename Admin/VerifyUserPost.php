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
		$query="DELETE FROM addposttbl WHERE postid=$idValue";
		mysql_query($query);
		header("Location:VerifyUserPost.php");
	}
	else if($idValue > 0 && $_GET["action"]=="verify")
	{
		$query="UPDATE addposttbl SET status=1 WHERE postid=$idValue";
		mysql_query($query);
		header("Location:VerifyUserPost.php");
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
                <h2><i class="glyphicon glyphicon-plus"></i> Verify User Post</h2>
            </div>
            <div class="box-content">
                <table class="table table-bordered table-striped responsive" style="width:100%;">
                    <tbody>
					<?php
					$query="SELECT ad.*,c.cname 'categoryName',sc.subcategoryname 'subcategoryName'
								FROM addposttbl  ad
								LEFT JOIN category c ON c.cid=ad.cid
								LEFT JOIN subcategory sc ON sc.subcategoryid = ad.subcategoryid
								WHERE ad.status=0";
					$returnVal=mysql_query($query);
					if(mysql_num_rows($returnVal) > 0)
					{
						while($row=mysql_fetch_array($returnVal))
						{
					?>
                    <tr>
                        <td style="width:20%;">
							<img src="../AddpostImages/<?php echo $row["photo"]; ?>" style="height:200px;width:200px;"/>
						</td>
                        <td style="width:65%;">
                            
							Category:<?php echo $row["categoryName"]; ?></br>
							Subcategory:<?php echo $row["subcategoryName"]; ?></br>
							Title:<?php echo $row["title"]; ?></br>
							City:<?php echo $row["city"]; ?></br>
							Locality:<?php echo $row["locality"]; ?></br>
							Description:<?php echo $row["description"]; ?></br>
							Keyword:<?php echo $row["keyword"]; ?></br>
							Item type:<?php echo $row["itemtype"]; ?></br>
							Price:<?php echo $row["price"]; ?></br>
							Mobile no:<?php echo $row["mobileno"]; ?></br>
							
                        </td>
						<td style="width:15%;">
							<a href="VerifyUserPost.php?id=<?php echo $row["postid"]; ?>&action=verify" class="btn btn-info btn-setting">Verify Post</a>
							<br/><br/>
							<a  class="btn btn-info btn-setting" href="VerifyUserPost.php?id=<?php echo $row["postid"]; ?>&action=delete">Remove Post</a>
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