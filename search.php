<?php
	include("Header.php");
    include("connection.php");
?>
<section id="content">
  <div class="container">
	 <div class="row">
		<div class="col-md-12">
		   <div class="row">
			  <div class="col-md-9 col-sm-8 col-xs-12 main-content">
				 <div class="category-toolbar clearfix">
					Show Post
				</div>
				 <div class="md-margin"></div>
				 <div class="category-item-container category-list-container">
					<?php
						$query="SELECT ad.*,c.cname 'categoryName',sc.subcategoryname 'subcategoryName'
								FROM addposttbl  ad
								LEFT JOIN category c ON c.cid=ad.cid
								LEFT JOIN subcategory sc ON sc.subcategoryid = ad.subcategoryid
								WHERE ad.status=1 AND ad.keyword LIKE '%".$_POST["txtSearch"]."%'";
								
						$returnVal=mysql_query($query);
						if(mysql_num_rows($returnVal) > 0)
						{
							while($row=mysql_fetch_array($returnVal))
							{
					?>
					<div class="item item-list clearfix">
					   <div class="item-image-container">
						  <figure><a href="Subcategotydetail.php?postId"><img src="AddpostImages/<?php echo $row["photo"] ?>" alt="item1" class="item-image" height="400" width="400"> </a></figure>
						  <div class="item-price-container"></span> <span class="item-price"><i class="fa fa-inr"></i> <?php echo $row["price"] ;?></span></div>
						  
					   </div>
					   <div class="item-meta-container">
						  <h3 class="item-name"><a href="Subcategotydetail.php?postId"><?php echo $row["title"]; ?></a></h3>
						  <div class="ratings-container">
							 <div class="ratings">
								<div class="ratings-result" data-result="70"></div>
							 </div>
							 <span class="ratings-amount"><?php echo $row["categoryName"]; ?> -> <?php echo $row["subcategoryName"]; ?></span>
						  </div>
						  <p><?php echo $row["description"] ;?></p>
						  <div class="item-action">
						  <?php
						     
						     if(isset($_SESSION["userid"]))
									{
										?>
							 <a href="Subcategorydetail.php?postId=<?php echo $row["postid"]; ?>" class="item-add-btn"><span class="icon-cart-text">View More Information</span></a>
							 <?php
									}
									
							else
							{
								?>
								<a href="Register.php" class="item-add-btn"><span class="icon-cart-text">Register FOR Information</span></a>
								
								<?php
							}
								?>		
							
						  </div>
					   </div>
					</div>
					<?php
							}
						}
						else
						{
							echo "<h3>Sorry!... <br/> No any advertise found.</h3>";
						}
				    ?>
				</div>
			</div>
		   </div>
		</div>
	 </div>
  </div>
</section>

<?php
   include("Footer.php");
?>