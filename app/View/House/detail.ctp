<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
        <h1>Property Single</h1>
        <form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content section -->
<section class="properties">
    <div class="container">
        
        <div class="row">

            <!-- start content -->
            <div class="col-lg-9 col-md-9">
                <div class="gallery">
                    <ul class="bxslider2">
                      <li><?php echo $this->Html->image('template/1600x670.gif',array('width'=>'100%')); ?></li>
                    </ul>

                    <div id="bx-pager">
                      <a data-slide-index="0" href=""><?php echo $this->Html->image('template/112x112.gif'); ?></a>
                      <a data-slide-index="1" href=""><?php echo $this->Html->image('template/112x112.gif'); ?></a>
                      <a data-slide-index="2" href=""><?php echo $this->Html->image('template/112x112.gif'); ?></a>
                      <a data-slide-index="3" href=""><?php echo $this->Html->image('template/112x112.gif'); ?></a>
                    </div>
                    <div class="sliderControls">
                        <span class="slider-prev"></span>
                        <span class="slider-next"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="overview">
                        <h4>DESCRIPTION</h4>
                        <ul class="overviewList">
                            <li>Type de propriété <span>FAMILLIALE</span></li>
                            <li>Transaction <span>À VENDRE</span></li>
                            <li>Lieux <span>REIMS, FRANCE</span></li>
                            <li>Superficie <span>200M</span></li>
                            <li>Chambres <span>5</span></li>
                            <li>Salle de bains <span>3</span></li>
                            <li>Garages <span>1</span></li>
                        </ul>
                        </div>
                        <div id="map-canvas-one-pin" class="mapSmall"></div>
                    </div>
                    <div class="col-lg-8">
                        <p class="price" style="float:right;">$687,000</p>
                        <p class="forSale" style="float:right; margin-right:20px;">FOR SALE</p>
                        <h1>587 Smith Avenue</h1>
                        <p>Baltimore, MD</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus 
                        mauris, quis ullamcorper enim aliquet sed. Maecenas quis eget tellus dui. Vivamus 
                        condimentum egestas.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod 
                        sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices 
                        erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque 
                        iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, 
                        consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. 
                        Nunc commodo volutpat semper.</p><br/>
                        <h4>GENERAL AMENTITIES</h4>
                        <div class="divider thin"></div>
                        <table class="amentitiesTable">
                            <tr>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?> Air Conditioning</td>
                                <td><?php echo $this->Html->image('template/icon-cross.png',array('class'=>'icon')); ?>Coffee Pot</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Heating</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Parking</td>
                            </tr>
                            <tr>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Balcony</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Dishwasher</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Internet</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Pool</td>
                            </tr>
                            <tr>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Bedding</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Fridge</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Microwave</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Terrance</td>
                            </tr>
                            <tr>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Cable TV</td>
                                <td><?php echo $this->Html->image('template/icon-cross.png',array('class'=>'icon')); ?>Grill</td>
                                <td><?php echo $this->Html->image('template/icon-check.png',array('class'=>'icon')); ?>Oven</td>
                                <td><?php echo $this->Html->image('template/icon-cross.png',array('class'=>'icon')); ?>Toaster</td>
                            </tr>
                        </table><br/>
                    </div><!-- end col -->
                </div><!-- end row -->

                <!-- start related properties -->
                <h4>RELATED PROPERTIES</h4>
                <div class="divider thin"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="propertyItem">
                            <div class="propertyContent">
                                <a class="propertyType" href="#">FAMILY HOME</a>
                                <a href="property_single.html" class="propertyImgLink"><img class="propertyImg" src="images/768x507.gif" alt="" /></a>
                                <h4><a href="property_single.html">587 Smith Avenue</a></h4>
                                <p>Baltimore, MD</p>
                                <div class="divider thin"></div>
                                <p class="forSale">FOR SALE</p>
                                <p class="price">$687,000</p>
                            </div>
                            <table border="1" class="propertyDetails">
                                <tr>
                                <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" />2,412m</td>
                                <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" />6 Beds</td>
                                <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" />3 Baths</td>
                                </tr>
                            </table> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="propertyItem">
                            <div class="propertyContent">
                                <span class="openHouse">OPEN HOUSE</span>
                                <a class="propertyType" href="#">APARTMENT</a>
                                <a href="property_single.html" class="propertyImgLink"><img class="propertyImg" src="images/768x507.gif" alt="" /></a>
                                <h4><a href="property_single.html">587 Smith Avenue</a></h4>
                                <p>Baltimore, MD</p>
                                <div class="divider thin"></div>
                                <p class="forSale">FOR RENT</p>
                                <p class="price">$1,200/mo</p>
                            </div>
                            <table border="1" class="propertyDetails">
                                <tr>
                                <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" />2,412m</td>
                                <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" />6 Beds</td>
                                <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" />3 Baths</td>
                                </tr>
                            </table> 
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="propertyItem">
                            <div class="propertyContent">
                                <a class="propertyType" href="#">FAMILY HOME</a>
                                <a href="property_single.html" class="propertyImgLink"><img class="propertyImg" src="images/768x507.gif" alt="" /></a>
                                <h4><a href="property_single.html">587 Smith Avenue</a></h4>
                                <p>Baltimore, MD</p>
                                <div class="divider thin"></div>
                                <p class="forSale">FOR SALE</p>
                                <p class="price">$687,000</p>
                            </div>
                            <table border="1" class="propertyDetails">
                                <tr>
                                <td><img src="images/icon-area.png" alt="" style="margin-right:7px;" />2,412m</td>
                                <td><img src="images/icon-bed.png" alt="" style="margin-right:7px;" />6 Beds</td>
                                <td><img src="images/icon-drop.png" alt="" style="margin-right:7px;" />3 Baths</td>
                                </tr>
                            </table> 
                        </div>
                    </div>
                </div><!-- end related properties row -->

            </div><!-- end content -->
        
            <!-- start sidebar -->
            <div class="col-lg-3 col-md-3">

                <!-- start network widget -->
                <h3>AGENT</h3>
                <div class="divider"></div>
                <div class="filterContent sidebarWidget">
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                               
                                    <div class="propertyContent">
                                        <a href="agent_single.html" class="propertyImgLink"><img class="propertyImg" src="images/768x507.gif" alt="" /></a>
                                        <h4><a href="agent_single.html">John Doe</a></h4>
                                        <p>Lorem ipsum dolor amet, vel nunc vel
                                        consectetur adipiscing. Quisque lorem
                                        eget ante vel nunc posuere.</p>

                                    </div>
                                    
                                    <a href="agent_single.html" class="buttonGrey">VOIR LE PROFIL</a>
                                
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                    <input class="buttonColor" type="submit" value="METTRE EN RELATION" style="margin-top:24px;">
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                    </form><!-- end form -->
                </div><!-- end network widget -->

                <!-- start quick search widget -->
                <h3>QUICK SEARCH</h3>
                <div class="divider"></div>
                <div class="filterContent sidebarWidget">
                    <form method="post" action="#">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="propertyType">Property Type</label><br/>
                                <select name="property type" id="propertyType" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Family Home</option>
                                    <option value="Country3">Apartment</option>
                                    <option value="Country4">Condo</option>
                                    <option value="Country5">Villa</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="location">Location</label><br/>
                                <select name="location" id="location" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Option 1</option>
                                    <option value="Country3">Option 2</option>
                                    <option value="Country4">Option 3</option>
                                    <option value="Country5">Option 4</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="price">Price Range</label><br/>
                                <select name="price" id="price" class="formDropdown">
                                    <option value="">Any</option>
                                    <option value="Country2">Option 1</option>
                                    <option value="Country3">Option 2</option>
                                    <option value="Country4">Option 3</option>
                                    <option value="Country5">Option 4</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                    <input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div><!-- end row -->
                    </form><!-- end form -->
                </div><!-- end quick search widget -->

                <!-- start recent posts widget -->
                <h3>RECENT POSTS</h3>
                <div class="divider"></div>
                <div class="recentPosts sidebarWidget">
                    <h4><a href="#">AWESOME DREAM HOUSE IN A GREAT LOCATION</a></h4>
                    <a href="#">READ MORE</a>
                    <p class="date">Feb 5, 2014</p>
                    <div style="clear:both;"></div>
                    <div class="divider thin"></div>
                    <h4><a href="#">AWESOME DREAM HOUSE IN A GREAT LOCATION</a></h4>
                    <a href="#">READ MORE</a>
                    <p class="date">Feb 5, 2014</p>
                    <div style="clear:both;"></div>
                    <div class="divider thin"></div>
                    <h4><a href="#">AWESOME DREAM HOUSE IN A GREAT LOCATION</a></h4>
                    <a href="#">READ MORE</a>
                    <p class="date">Feb 5, 2014</p>
                    <div style="clear:both;"></div>
                </div>
                <!-- end recent posts widget -->

                <!-- start property types widget -->
                <h3>PROPERTY TYPES</h3>
                <div class="divider"></div>
                <div class="propertyTypesWidget sidebarWidget">
                    <ul>
                        <li><h4><a href="#">FAMILY HOUSE</a></h4></li>
                        <li><h4><a href="#">SINGLE HOUSE</a></h4></li>
                        <li><h4><a href="#">APARTMENT</a></h4></li>
                        <li><h4><a href="#">CONDO</a></h4></li>
                        <li><h4><a href="#">VILLA</a></h4></li>
                        <li><h4><a href="#">OFFICE BUILDING</a></h4></li>
                    </ul>
                </div>
                <!-- end property types widget -->

            </div><!-- end col -->
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<!-- end main content -->