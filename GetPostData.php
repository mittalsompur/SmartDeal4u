<?php
	$pageReq=$_GET["pageReq"];
	include("connection.php");
	if($pageReq=="GetSubCategory")
	{
		$catId=$_GET["categoryId"];
		
		$query="SELECT * FROM subcategory WHERE cid=$catId AND status=1";
		$result=mysql_query($query);
		echo "<option value='0'>Select SubCategory</option>";
		if(mysql_num_rows($result) > 0)
		{
			while($row=mysql_fetch_array($result))
			{
				echo "<option value='".$row["subcategoryid"]."'>".$row["subcategoryname"]."</option>";
			}
		}
	}
?>