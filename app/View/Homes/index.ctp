<!-- start subheader -->
<section class="sliderControls">
    <div>
        <span class="slider-prev"></span>
        <span class="slider-next"></span>
    </div>
</section>

<section class="subHeader home bxslider">
    <div id="slide1">
        <div class="container">
            <div class="col-lg-6">
                <h1><span>580</span> Main St</h1>
                <div class="sliderTextBox">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam 
                eu nisl et lectus tempor pretium pellentesque rhoncus nisl. Sed 
                cursus ante eget orci lorem ipsum sodales.</p>
                <a class="buttonGrey large" href="#"><span class="icon-button-arrow"></span><span class="buttonText">VIEW DETAILS</span></a>
                <span class="or">OR</span>
                <a class="buttonColor" href="#"><span class="icon-button-user"></span><span class="buttonText">CONTACT AGENT</span></a>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-3"><h1 class="sliderPrice">$525,000</h1></div>
        </div>
    </div>
    <div id="slide2">
        <div class="container">
            <div class="col-lg-6">
                <h1><span>134</span> Smith Avenue</h1>
                <div class="sliderTextBox">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam 
                eu nisl et lectus tempor pretium pellentesque rhoncus nisl. Sed 
                cursus ante eget orci lorem ipsum sodales.</p>
                <a class="buttonGrey large" href="#"><span class="icon-button-arrow"></span><span class="buttonText">VIEW DETAILS</span></a>
                <span class="or">OR</span>
                <a class="buttonColor" href="#"><span class="icon-button-user"></span><span class="buttonText">CONTACT AGENT</span></a>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-3"><h1 class="sliderPrice">$85,000</h1></div>
        </div>
    </div>
    <div id="slide3">
        <div class="container">
            <div class="col-lg-6">
                <h1><span>834</span> Pratt Sreet</h1>
                <div class="sliderTextBox">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam 
                eu nisl et lectus tempor pretium pellentesque rhoncus nisl. Sed 
                cursus ante eget orci lorem ipsum sodales.</p>
                <a class="buttonGrey large" href="#"><span class="icon-button-arrow"></span><span class="buttonText">VIEW DETAILS</span></a>
                <span class="or">OR</span>
                <a class="buttonColor" href="#"><span class="icon-button-user"></span><span class="buttonText">CONTACT AGENT</span></a>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset-3"><h1 class="sliderPrice">$498,000</h1></div>
        </div>
    </div>
</section>

<!-- start horizontal filter -->
<section class="filter">
    <div class="container">
        <div class="filterHeader">
            <ul class="filterNav tabs">
                <li><a class="current triangle" href="#tab1">ALL PROPERTIES</a></li>
                <li><a href="#tab2">FOR SALE</a></li>
                <li><a href="#tab3">FOR RENT</a></li>
            </ul>
            <div class="filterHeadButton"><a class="buttonGrey" href="#">VIEW ALL LISTINGS</a></div>
        </div>
        <div class="filterContent" id="tab1">
            <form method="post" action="#">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="propertyType">Property Type</label><br/>
                        <select name="property type" id="propertyType" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Family Home">Family Home</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="Villa">Villa</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="location">Location</label><br/>
                        <select name="location" id="location" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                            <label for="price-min">Price Range</label><br/>
                            <div style="float:right; margin-top:-25px;">
                                <div class="priceInput"><input type="text" name="price min" id="price-min" class="priceInput" /></div>
                                <span style="float:left; margin-right:10px; margin-left:10px;">-</span>
                                <div class="priceInput"><input type="text" name="price max" id="price-max" class="priceInput" /></div>
                            </div><br/>
                            <div class="priceSlider"></div>
                            <div class="priceSliderLabel"><span>0</span><span style="float:right;">800,000</span></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="beds">Beds</label><br/>
                        <select name="beds" id="beds" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="baths">Baths</label><br/>
                        <select name="baths" id="baths" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="area">Area (Sq Ft)</label><br/>
                        <select name="area" id="area" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                            <input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div><!-- END TAB1 -->
        <div class="filterContent" id="tab2">
            <p>Filter content for tab 2</p>
             <form method="post" action="#">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="propertyType2">Property Type</label><br/>
                        <select name="property type" id="propertyType2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Family Home">Family Home</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="Villa">Villa</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="location2">Location</label><br/>
                        <select name="location" id="location2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="formBlock">
                        <label for="priceMinDropDown">Min Price</label><br/>
                        <select name="priceMinDropdown" id="priceMinDropDown" class="formDropdown">
                            <option value="">Any</option>
                            <option value="$100,000">$100,000</option>
                            <option value="$200,000">$200,000</option>
                            <option value="$300,000">$300,000</option>
                            <option value="$400,000">$400,000</option>
                            <option value="$500,000">$500,000</option>
                            <option value="$600,000">$600,000</option>
                            <option value="$800,000">$800,000</option>
                            <option value="$900,000">$900,000</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="formBlock">
                        <label for="priceMaxDropdown">Max Price</label><br/>
                        <select name="priceMaxDropdown" id="priceMaxDropdown" class="formDropdown">
                            <option value="">Any</option>
                            <option value="$200,000">$200,000</option>
                            <option value="$300,000">$300,000</option>
                            <option value="$400,000">$400,000</option>
                            <option value="$500,000">$500,000</option>
                            <option value="$600,000">$600,000</option>
                            <option value="$700,000">$700,000</option>
                            <option value="$900,000">$900,000</option>
                            <option value="$1,000,000">$1,000,000</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="beds2">Beds</label><br/>
                        <select name="beds" id="beds2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="baths2">Baths</label><br/>
                        <select name="baths" id="baths2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="4">5</option>
                            <option value="4">6</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="area2">Area (Sq Ft)</label><br/>
                        <select name="area" id="area2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                            <input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div><!-- END TAB 2 -->
        <div class="filterContent" id="tab3">
            <p>Filter content for tab 3</p>
             <form method="post" action="#">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="propertyType3">Property Type</label><br/>
                        <select name="property type" id="propertyType3" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Family Home">Family Home</option>
                            <option value="Apartment">Apartment</option>
                            <option value="Condo">Condo</option>
                            <option value="Villa">Villa</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="formBlock">
                        <label for="location3">Location</label><br/>
                        <select name="location" id="location3" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="formBlock">
                        <label for="priceMinDropDown2">Min Price</label><br/>
                        <select name="priceMinDropdown" id="priceMinDropDown2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="$100,000">$100,000</option>
                            <option value="$200,000">$200,000</option>
                            <option value="$300,000">$300,000</option>
                            <option value="$400,000">$400,000</option>
                            <option value="$500,000">$500,000</option>
                            <option value="$600,000">$600,000</option>
                            <option value="$800,000">$800,000</option>
                            <option value="$900,000">$900,000</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3">
                        <div class="formBlock">
                        <label for="priceMaxDropdown2">Max Price</label><br/>
                        <select name="priceMaxDropdown" id="priceMaxDropdown2" class="formDropdown">
                            <option value="">Any</option>
                            <option value="$200,000">$200,000</option>
                            <option value="$300,000">$300,000</option>
                            <option value="$400,000">$400,000</option>
                            <option value="$500,000">$500,000</option>
                            <option value="$600,000">$600,000</option>
                            <option value="$700,000">$700,000</option>
                            <option value="$900,000">$900,000</option>
                            <option value="$1,000,000">$1,000,000</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="beds3">Beds</label><br/>
                        <select name="beds" id="beds3" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="baths3">Baths</label><br/>
                        <select name="baths" id="baths3" class="formDropdown">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                        <label for="area3">Area (Sq Ft)</label><br/>
                        <select name="area" id="area3" class="formDropdown">
                            <option value="">Any</option>
                            <option value="Option 1">Option 1</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                            <option value="Option 4">Option 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="formBlock">
                            <input class="buttonColor" type="submit" value="FIND PROPERTIES" style="margin-top:24px;">
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
        </div><!-- END TAB 3 -->
    </div><!-- END CONTAINER -->
</section>
<!-- end horizontal filter -->

<!-- start big message -->
<section class="bigMessage">
    <div class="container">
        <h1>Easy, fast & <span>affordable</span> real estate.</h1><br/>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet sagittis erat. Maecenas suscipit ut quam id condimentum. 
        Pellentesque cursus lacinia sapien et laoreet. Ut mattis ultricies sem id elementum. Vestibulum blandit consectetur nibh.</p>
    </div>
</section>
<!-- end big message -->

<!-- start recent properties -->
<section class="properties">
    <div class="container">
        <h3>RECENT PROPERTIES</h3>
        <div class="divider"></div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
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
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
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
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a class="propertyType" href="#">CONDO</a>
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
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="propertyItem">
                    <div class="propertyContent">
                        <a class="propertyType" href="#">VILLA</a>
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
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end recent properties -->

<!-- start services section -->
<section class="services">
    <div class="container">
        <h1>We make your life <span>easy</span>. Here’s how.</h1><br/><br/>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?php echo $this->Html->image('template/listings-icon.png'); ?><br/><br/>
                <h4>HOTTEST LISTINGS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing. 
                In metus diam, fermentum in orci sit amet, lobortis 
                congue diam. Interdum et malesuada fames ac ante 
                ipsum primis in faucibus. </p>
                <?php echo $this->Html->image('template/arrow.png',array('class'=>'serviceArrow')); ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?php echo $this->Html->image('template/listings-icon.png'); ?><br/><br/>
                <h4>KNOWLEDGABLE AGENTS</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing. 
                In metus diam, fermentum in orci sit amet, lobortis 
                congue diam. Interdum et malesuada fames ac ante 
                ipsum primis in faucibus. </p>
                <?php echo $this->Html->image('template/arrow.png',array('class'=>'serviceArrow')); ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <?php echo $this->Html->image('template/listings-icon.png'); ?><br/><br/>
                <h4>EXPERTISE & GUIDANCE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing. 
                In metus diam, fermentum in orci sit amet, lobortis 
                congue diam. Interdum et malesuada fames ac ante 
                ipsum primis in faucibus. </p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end services section -->

<!-- start top agents section -->
<section class="topAgents">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php echo $this->Html->image('template/agent1.png',array('class'=>'agentImg'));?><br/><br/>
                <h4>JOHN DOE</h4>
                <p>Lorem ipsum dolor amet, consectetur 
                adipiscing elit. Sed purus eget nunc.</p>
                <ul class="socialIcons">
                    <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php echo $this->Html->image('template/agent2.png',array('class'=>'agentImg'));?><br/><br/>
                <h4>STEVE SMITH</h4>
                <p>Lorem ipsum dolor amet, consectetur 
                adipiscing elit. Sed purus eget nunc.</p>
                <ul class="socialIcons">
                    <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php echo $this->Html->image('template/agent3.png',array('class'=>'agentImg'));?><br/><br/>
                <h4>WALTER WHITE</h4>
                <p>Lorem ipsum dolor amet, consectetur 
                adipiscing elit. Sed purus eget nunc.</p>
                <ul class="socialIcons">
                    <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <?php echo $this->Html->image('template/agent4.png',array('class'=>'agentImg'));?><br/><br/>
                <h4>SARAH PARKER</h4>
                <p>Lorem ipsum dolor amet, consectetur 
                adipiscing elit. Sed purus eget nunc.</p>
                <ul class="socialIcons">
                    <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
                    <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end top agents section -->

<!-- start widgets section -->
<section class="genericSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3>RECENT BLOG POSTS</h3>
                <div class="divider"></div>
                <div class="recentBlogPost">
                    <img class="blogThumb" src="images/112x112.gif" alt="" />
                    <div class="recentBlogContent">
                    <h4><a href="blog_single.html">AWESOME DREAM HOUSE IN A GREAT LOCATION</a></h4>
                    <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque 
                    eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
                    <a class="buttonGrey" href="#">READ MORE</a>
                    <div class="date"><p>Feb 5, 2014</p></div>
                    </div>
                </div>
                <div class="divider thin" style="margin-top:5px; margin-bottom:20px;"></div>
                <div class="recentBlogPost">
                    <img class="blogThumb" src="images/112x112.gif" alt="" />
                    <div class="recentBlogContent">
                    <h4><a href="blog_single.html">AWESOME DREAM HOUSE IN A GREAT LOCATION</a></h4>
                    <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque 
                    eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
                    <a class="buttonGrey" href="#">READ MORE</a>
                    <div class="date"><p>Feb 5, 2014</p></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3>TESTIMONIALS</h3>
                <div class="divider"></div>
                <div>
                <img class="blogThumb" src="images/112x112.gif" alt="" />
                <h4>JOHN DOE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi 
                vehicula dapibus mauris, quis ullamcorper enim aliquet sed. 
                Maecenas eget tellus dui. Vivamus condimentum egestas nulla 
                quis vehicula. Sed justo turpis, commodo sit amet.</p>
                </div>
                <div class="divider thin" style="margin-top:20px; margin-bottom:20px;"></div>
                <div>
                <img class="blogThumb" src="images/112x112.gif" alt="" />
                <h4>JOHN DOE</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi 
                vehicula dapibus mauris, quis ullamcorper enim aliquet sed. 
                Maecenas eget tellus dui. Vivamus condimentum egestas nulla 
                quis vehicula. Sed justo turpis, commodo sit amet.</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- end widgets section -->