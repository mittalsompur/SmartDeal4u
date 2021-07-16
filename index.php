<?php
 include("Header.php");
 include("connection.php");
 
 ?>
 <section id="content">
            <div id="slider-rev-container">
               <div id="slider-rev">
                  <ul>
                     <li data-transition="fade" data-slotamount="6" data-masterspeed="600" data-saveperformance="on" data-title="Special Offers">
                        <img src="images/revslider/dummy.png" alt="slidebg1" data-lazyload="images/homeslider/slide1.png" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption rev-title lfr ltr" data-x="695" data-y="198" data-speed="1600" data-start="300" data-endspeed="300">SPECIAL OFFER -25%</div>
                        <div class="tp-caption rev-text lfr ltr" data-x="695" data-y="252" data-speed="1600" data-start="600" data-endspeed="550">Performance &amp; Design. Taken right<br>to the edge.</div>
                        <div class="tp-caption lfr ltr" data-x="695" data-y="332" data-speed="1600" data-start="900" data-endspeed="800"><a href="#" class="btn btn-custom-2">Learn More</a></div>
                        <div class="tp-caption lfl ltl" data-x="center" data-y="bottom" data-hoffset="-230" data-speed="2000" data-start="500" data-endspeed="800"><img src="images/homeslider/slide1_1.png" alt="Slide 1_1"></div>
                     </li>
                     <li data-transition="fade" data-slotamount="5" data-masterspeed="600" data-saveperformance="on" data-title="Learn More">
                        <img src="images/revslider/dummy.png" alt="slidebg2" data-lazyload="images/homeslider/slide2.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption rev-title lfr ltr" data-x="755" data-y="238" data-speed="1600" data-start="750" data-endspeed="300">The Next Big thing...</div>
                        <div class="tp-caption rev-text2 lfr ltr" data-x="755" data-y="290" data-speed="1600" data-start="1050" data-endspeed="550">Take, view and share photos with<br>the 13MP camera and stunning 5" display.</div>
                        <div class="tp-caption lfr ltr" data-x="755" data-y="360" data-speed="1600" data-start="1350" data-endspeed="800"><a href="#" class="btn btn-custom-2">Learn More</a></div>
                        <div class="tp-caption rev-price randomrotate randomrotateout" data-x="360" data-y="55" data-speed="1200" data-start="2000" data-endspeed="400">$1150</div>
                        <div class="tp-caption lfl ltl" data-x="center" data-y="center" data-hoffset="-204" data-speed="1750" data-start="400" data-endspeed="800"><img src="images/homeslider/slide2_2.png" alt="Slide 2_2"></div>
                        <div class="tp-caption lfr ltr" data-x="380" data-y="50" data-speed="1800" data-start="250" data-endspeed="800"><img src="images/homeslider/slide2_1.png" alt="Slide 2_1"></div>
                     </li>
                     <li data-transition="fade" data-slotamount="4" data-masterspeed="600" data-saveperformance="on" data-title="More Features">
                        <img src="images/revslider/dummy.png" alt="slidebg3" data-lazyload="images/homeslider/slide3.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption sfr str" data-x="24" data-y="bottom" data-speed="900" data-start="500" data-endspeed="300"><img src="images/homeslider/slide3_1.png" alt="Slide 3_1"></div>
                        <div class="tp-caption sfl stl" data-x="788" data-y="95" data-speed="1000" data-start="1200" data-endspeed="540"><img src="images/homeslider/slide3_3.png" alt="Slide 3_3"></div>
                        <div class="tp-caption sfl stl" data-x="700" data-y="260" data-speed="800" data-start="800" data-endspeed="420"><img src="images/homeslider/slide3_2.png" alt="Slide 3_2"></div>
                        <div class="tp-caption sfl stl" data-x="613" data-y="325" data-speed="600" data-start="400" data-endspeed="300"><img src="images/homeslider/slide3_4.png" alt="Slide 3_4"></div>
                        <div class="tp-caption rev-title sfr str" data-x="20" data-y="56" data-speed="600" data-start="1400" data-endspeed="200">CONTROL. NAVIGATE. BE RECOGNIZED.</div>
                        <div class="tp-caption rev-text long sfr str" data-x="20" data-y="110" data-speed="600" data-start="1650" data-endspeed="300">Smart Interaction lets you interact<br>with your TV as never before.</div>
                        <div class="tp-caption sfr str" data-x="20" data-y="190" data-speed="600" data-start="1900" data-endspeed="400"><a href="#" class="btn btn-custom-2">Learn More</a></div>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="md-margin2x"></div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <header class="content-title">
						   <div class="title-bg">
							  <h2 class="title">Category</h2>
						   </div>
						</header>
						<div class="col-md-12 col-sm-8 col-xs-12 main-content">
						<?php
						$query="SELECT * FROM category WHERE status=1";
						$returnVal=mysql_query($query);
						if(mysql_num_rows($returnVal) > 0)
							{
								while($row=mysql_fetch_array($returnVal))
									{
						?>
						
						   <div style="width: 188px;float: left;">
							<a href="SubCategory.php?catId=<?php echo $row["cid"];?>"><img src="CategoryImages/<?php echo $row["imagename"];	?> " alt="Brand Logo 1"></a>
							<div style="margin-top: -15px;text-align: center;width: 92%;">
								<b><?php echo $row["cname"] ;?></b> 
							</div>
						  </div>
						  <?php
						}
							}
						
				          ?>
						</div>
						<div class="col-md-12 col-sm-8 col-xs-12 main-content" style="margin-top: 35px;">
                           <header class="content-title">
                              <h2 class="title">Recently Added Adverties</h2>
                              <p class="title-desc">Save your money and time with our store. Here's the best part of our impressive assortment.</p>
                           </header>
                           <div id="products-tabs-content" class="row tab-content">
                              <div class="tab-pane active" id="all">
                                 <?php
									$query="SELECT * FROM addposttbl
									ORDER BY postid DESC
									LIMIT 9";
									$returnVal=mysql_query($query);
									if(mysql_num_rows($returnVal) > 0)
									{
										while($row=mysql_fetch_array($returnVal))
										{
								 ?>
								 <div class="col-md-4 col-sm-6 col-xs-12">
								 
                                    <div class="item">
                                       <div class="item-image-wrapper">
                                          <figure class="item-image-container"><a href="product.html"><img src="AddpostImages/<?php echo $row["photo"]; ?>" alt="item1" class="item-image"> <img src="AddpostImages/<?php echo $row["photo"]; ?>" alt="item1  Hover" class="item-image-hover"></a></figure>
                                          <div class="item-price-container"><span class="item-price"><i class="fa fa-inr"></i> <?php echo $row["price"] ;?></span></div>
                                          <span class="new-rect">New</span>
                                       </div>
                                       <div class="item-meta-container">
                                          <h3 class="item-name"><a href="product.html"><?php echo $row["title"] ;?></a></h3>
                                          <div class="item-action">
										   <a href="Subcategorydetail.php?postId=<?php echo $row["postid"]; ?>" class="item-add-btn"><span class="icon-cart-text">View More Details</span></a>
                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
								<?php
										}
									}
									else
									{
										echo "<h2>No advertise foud...</h2>";
									}
								?>
							  </div>
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