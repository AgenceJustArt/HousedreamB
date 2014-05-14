<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Mes réponses</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start properties -->
<section class="properties">
    <div class="container">
    	<ul class="propertyCat_list option-set">
    		<li><a href="#" data-filter="*" class="current triangle">ALL</a></li>
    		<li><a href="#" data-filter=".sale">FOR SALE</a></li>
            <li><a href="#" data-filter=".rent">FOR RENT</a></li>
    	</ul>
    	<ul class="propertySort_list">
    		<li style="padding-right:0px;">
    			<form style="margin-top:-10px;">
    			<div class="formBlock">
                    <select name="property type" class="formDropdown" style="padding:6px;">
                        <option value="">Any</option>
                        <option value="Country2">Family Home</option>
                        <option value="Country3">Apartment</option>
                        <option value="Country4">Condo</option>
                        <option value="Country5">Villa</option>
                    </select>
                </div>
            	</form>
    		</li>
    		<li><p>Property Type:</p></li>
    		<li><div style="width:1px; height:45px; margin-top:-12px; background-color:#c5c5c5;"></div></li>
    		<li><a href="listing_grid.html"><?php echo $this->Html->image('template/icon-grid.png'); ?></a></li>
    		<li><a href="listing_row.html"><?php echo $this->Html->image('template/icon-row.png'); ?></a></li>
    	</ul>
        <div class="divider"></div>
        <div class="row">
            <div class="col-lg-9 col-md-9">
            <div class="row">
            	<?php 
				$i =0;
				while($i<7){ ?>
				<?php $link = $this->Html->url(array('controller'=>'house','action'=>'detail',3,'particulier'=>false,'pro'=>false),true); ?>
				<div class="col-lg-12 col-md-12">
                    <div class="propertyItem">
                        <div class="propertyContent row">
                            <div class="col-lg-5 col-md-4 col-sm-4">
                            <a class="propertyType" href="#">FAMILY HOME</a>
                            <a href="<?php echo $link; ?>" class="propertyImgLink"><?php echo $this->Html->image('house/house.jpg',array('class'=>'propertyImgRow')); ?></a>
                            </div>
                            <div class="col-lg-7 rowText">
                            <p class="price">$687,000</p>
                            <p class="forSale">FOR SALE</p>
                            <h4><a href="<?php echo $link; ?>">587 Smith Avenue</a></h4><br/>
                            <p>Baltimore, MD</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vehicula dapibus mauris, quis ullamcorper 
                            enim aliquet sed. Maecenas eget tellus dui. Vivamus condimentum egestas nulla quis vehicula. Sed justo 
                            turpis, commodo sit amet.</p>
                            <table border="1" class="propertyDetails">
                                <tr>

                                <td><?php echo $this->Html->image('template/icon-area.png',array('style'=>'margin-right:7px;')); ?>2,412m</td>
                                <td><?php echo $this->Html->image('template/icon-bed.png',array('style'=>'margin-right:7px;')); ?>6 Beds</td>
                                <td><?php echo $this->Html->image('template/icon-drop.png',array('style'=>'margin-right:7px;')); ?>3 Baths</td>
                                </tr>
                            </table> 
                            </div>
                        </div>
                    </div>
                </div>
				<?php $i++; } ?>

               
                <ul class="pageList">
                    <li><a href="#">&lt;</a></li>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div><!-- end row -->
            </div><!-- end col -->
        
            <!-- START SIDEBAR -->
            <div class="col-lg-3 col-md-3">
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
<!-- end properties -->




<script>
  $(function() {
  	var sliderPrice = $( "#slider-range-price" );
  	var amountPrice = $( "#amount-price" );
    sliderPrice.slider({
      range: true,
      min: 50000,
      max: 4000000,
      values: [ 100000, 300000 ],
      slide: function( event, ui ) {
        amountPrice.val( "" + ui.values[ 0 ] + " € - " + ui.values[ 1 ]+' €' );
      }
    });
    amountPrice.val( "" + sliderPrice.slider( "values", 0 ) +
      " € - " + sliderPrice.slider( "values", 1 )+' €' );

    var sliderLocal = $( "#slider-range-local" );
  	var amountLocal = $( "#amount-local" );
    sliderLocal.slider({
      range: true,
      min: 1,
      max: 1000,
      values: [ 10, 100 ],
      slide: function( event, ui ) {
        amountLocal.val( "" + ui.values[ 0 ] + " Km - " + ui.values[ 1 ]+' Km' );
      }
    });
    amountLocal.val( "" + sliderLocal.slider( "values", 0 ) +
      " Km - " + sliderLocal.slider( "values", 1 )+' Km' );

    var sliderPourcent = $( "#slider-range-pourcent" );
  	var amountPourcent = $( "#amount-pourcent" );
    sliderPourcent.slider({
      range: true,
      min: 0,
      max: 100,
      values: [ 70, 90 ],
      slide: function( event, ui ) {
        amountPourcent.val( "" + ui.values[ 0 ] + " % - " + ui.values[ 1 ]+' %' );
      }
    });
    amountPourcent.val( "" + sliderPourcent.slider( "values", 0 ) +
      " % - " + sliderPourcent.slider( "values", 1 )+' %' );
  });
  </script>