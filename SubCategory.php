<?php
 include("Header.php");
 include("connection.php");
 
 ?>
 <section id="content">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <header class="content-title">
						   <div class="title-bg">
							  <h2 class="title">Sub Menus</h2>
						   </div>
						</header>
						<?php
						$query="SELECT * FROM subcategory WHERE cid=".$_GET["catId"]." AND status=1";
						$returnVal=mysql_query($query);
						if(mysql_num_rows($returnVal) > 0)
							{
								while($row=mysql_fetch_array($returnVal))
									{
						?>
						 		<a href="SubCategoryList.php?subCatId=<?php echo $row["subcategoryid"];?>"><b><?php echo $row["subcategoryname"] ;?></b></a>
								<br/>								
						 <?php
						}
							}
						
				          ?>
						</div>
					 </div>
               </div>
            </div>
         </section>
 
 <?php
 include("Footer.php");
 ?>