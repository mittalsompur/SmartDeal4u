<?php
    include("Header.php");
    include("connection.php");
?>
<section id="content">
 <?php 
	/*$query="SELECT ad.*,c.cname 'categoryName',sc.subcategoryname 'subcategoryName'
		FROM addposttbl  ad
		LEFT JOIN category c ON c.cid=ad.cid
		LEFT JOIN subcategory sc ON sc.subcategoryid = ad.subcategoryid
		WHERE ad.status=1 AND ad.postid=".$_GET["postId"];*/
		
		$q="SELECT ad.*,c.cname 'categoryName',sc.subcategoryname 'subcategoryName' FROM addposttbl ad LEFT JOIN category c ON c.cid=ad.cid LEFT JOIN subcategory sc ON sc.subcategoryid = ad.subcategoryid WHERE ad.status=1 AND ad.postid=".$_GET["postId"];
		//echo $q;exit;
							$returnVal=mysql_query($q);
							if(mysql_num_rows($returnVal) > 0)
							{
							    $row = mysql_fetch_array($returnVal);
								//echo $row;exit;
							}
							 
							
 ?>
 <div class="container" style="margin-top:30px;">
	 <div class="row">
		<div class="col-md-12">
		   <div class="row">
			  <div class="col-md-6 col-sm-12 col-xs-12 product-viewer clearfix">
				 
				 <div id="product-image-container">
					<figure>
					   <img src="AddpostImages/<?php  if(isset($row)) $row["photo"]; ?>"
                        data-zoom-image="images/products/big-item1.jpg" alt="Product Big image" id="product-image">
					   <figcaption class="item-price-container"><span class="item-price"><i class="fa fa-inr"></i><?php  if(isset($row)) $row["price"] ;?></span> </figcaption>
					</figure>
				 </div>
			  </div>
        
			  <div class="col-md-6 col-sm-12 col-xs-12 product">
				 <div class="lg-margin visible-sm visible-xs"></div>
				 <h1 class="product-name"><?php  if(isset($row)) $row["title"];?></h1>
				 <div class="ratings-container">
					<div class="ratings separator">
					   <div class="ratings-result" data-result="70"></div>
					</div>
				 </div>
				 <ul class="product-list">
					<li><span>Category :</span><?php  if(isset($row)) $row["categoryName"]; ?></li>
					<li><span>Subcategory:</span><?php  if(isset($row)) $row["subcategoryName"]; ?></li>
					<li><span>Brand:</span><?php   if(isset($row)) $row["title"];?></li>
					<li><span>Locality:</span><?php  if(isset($row)) $row["locality"];?></li>
					<li><span>City:</span></li>
					<li><span>Mobile no:</span><?php   if(isset($row)) $row["mobileno"];?></li>
					<li><span>Used type:</span></li>
				 </ul>
				  
				 <div class="product-add clearfix">
					
				 </div>
				 <div class="md-margin"></div>
				 
				 </div>
			</div>
		</div>
		   <div class="lg-margin2x"></div>
		   <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				 <div class="tab-content clearfix">
					   <h3>Description</h3>
					   <div class="tab-pane active" id="overview">
						  <p><?php  if(isset($row)) $row["description"]; ?></p>
					   </div>
					</div>	 
			  </div>
			  <div class="lg-margin2x visible-sm visible-xs"></div>
			</div>
		  
		</div>
	 </div>
  </div>
</section>

               <?php
							
 include("Footer.php");
 ?>