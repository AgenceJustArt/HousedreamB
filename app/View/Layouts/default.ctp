<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Easy Living - Responsive Real Estate Template">
<meta name="keywords" content="Themes, real estate, responsive, themeforest, Templates">
<meta name="author" content="Rype Pixel [Chris Gipple]">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Easy Living | Real Estate Template</title>
<!-- html5 support in IE8 and later -->
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<!-- CSS file links -->
<?php echo $this->Html->css('bootstrap.min.css',array('ref'=>'stylesheet','media'=>'screen')); ?>
<?php echo $this->Html->css('jquery.bxslider.css',array('ref'=>'stylesheet','media'=>'screen')); ?>
<?php echo $this->Html->css('style.css',array('ref'=>'stylesheet','media'=>'all','type'=>'text/css')); ?>
<?php echo $this->Html->css('responsive.css',array('ref'=>'stylesheet','media'=>'all','type'=>'text/css')); ?>
<?php echo $this->Html->css('yamm.css',array('ref'=>'stylesheet','media'=>'all','type'=>'text/css')); ?>
<?php echo $this->Html->css('jquery.nouislider.min.css',array('ref'=>'stylesheet','media'=>'all','type'=>'text/css')); ?>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>


</head>

<body>

<!-- Start Header -->
<header class="navbar yamm navbar-default navbar-fixed-top">
<div class="topBar">
    <div class="container">
        <p class="topBarText"><?php echo $this->Html->image('template/icon-phone.png',array('class'=>'icon')); ?>06 18 37 06 70</p>
        <p class="topBarText"><?php echo $this->Html->image('template/icon-mail.png',array('class'=>'icon')); ?>info@housedream.com</p>
        <ul class="socialIcons">
            <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
        </ul>
    </div>
</div>
<div class="container">
   	<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>"><?php echo $this->Html->image('template/logoBlue.jpg'); ?></a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="index.html" class="dropdown-toggle current" data-toggle="dropdown">HOME</a>
                <ul class="dropdown-menu">
                    <li><a href="index.html" class="current-sub">Home Horizontal Filter</a></li>
                    <li><a href="home_map.html">Home Map</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="portfolio_style1.html" class="dropdown-toggle" data-toggle="dropdown">LISTINGS</a>
                <ul class="dropdown-menu">
                    <li><a href="listing_grid.html">Listing Grid</a></li>
                    <li><a href="listing_grid_sidebar.html">Listing Grid Sidebar</a></li>
                    <li><a href="listing_grid_masonry.html">Listing Grid Masonry</a></li>
                    <li><a href="listing_row.html">Listing Row</a></li>
                    <li><a href="listing_row_sidebar.html">Listing Row Sidebar</a></li>
                    <li><a href="property_single.html">Property Single</a></li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Submissions</a>
                        <ul class="dropdown-menu">
                            <li><a href="my_properties.html">My Properties</a></li>
                            <li><a href="submit_property.html">Submit Property</a></li>
                            <li><a href="edit_property.html">Edit Property</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="blog_classic.html" class="dropdown-toggle" data-toggle="dropdown">OUR AGENTS</a>
                <ul class="dropdown-menu">
                    <li><a href="agent_listing_grid.html">Agent Listing Grid</a></li>
                    <li><a href="agent_listing_grid_sidebar.html">Agent Listing Grid Sidebar</a></li>
                    <li><a href="agent_listing_row.html">Agent Listing Row</a></li>
                    <li><a href="agent_listing_row_sidebar.html">Agent Listing Row Sidebar</a></li>
                    <li><a href="agent_single.html">Agent Single</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="blog_classic.html" class="dropdown-toggle" data-toggle="dropdown">BLOG</a>
                <ul class="dropdown-menu">
                    <li><a href="blog_classic.html">Blog Classic</a></li>
                    <li><a href="blog_single.html">Blog Single</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="left_sidebar.html" class="dropdown-toggle" data-toggle="dropdown">PAGES</a>
                <ul class="dropdown-menu">
                    <li><a href="about.html">About</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="left_sidebar.html">Left Sidebar</a></li>
                    <li><a href="right_sidebar.html">Right Sidebar</a></li>
                    <li><a href="404.html">404 Error</a></li>
                    <li><a href="login.html">Login Form</a></li>
                    <li><a href="register.html">Register Form</a></li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Headers</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Header 1 (default)</a></li>
                            <li><a href="index_header2.html">Header 2</a></li>
                            <li><a href="index_header3.html">Header 3</a></li>
                            <li><a href="index_headerMinimal.html">Header Minimal</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" data-toggle="dropdown">Footers</a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html#footer">Footer 1 (default)</a></li>
                            <li><a href="index_footer2.html#footer2">Footer 2</a></li>
                        </ul>
                    </li>
                    <li><a href="shortcodes.html">Shortcodes</a></li>
                </ul>
            </li>
            <li class="dropdown yamm-fw">
                <a href="#" class="dropdown-toggle">MEGA MENU</a>
                <ul class="dropdown-menu">
                    <li> 
                        <div class="yamm-content">
                            <div class="row">
                            <div class="col-lg-4">
                                <!-- start recent posts widget -->
                                    <h4>RECENT POSTS</h4>
                                    <div class="recentPosts megaMenu">
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
                            </div>
                            <div class="col-lg-4 map">
                                <h4>GOOGLE MAPS</h4>
                                <iframe class="googleMap" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=towson+md&amp;aq=&amp;sll=39.310394,-76.575394&amp;sspn=0.320357,0.676346&amp;ie=UTF8&amp;hq=&amp;hnear=Towson,+Baltimore,+Maryland&amp;ll=39.401495,-76.601912&amp;spn=0.019996,0.042272&amp;t=m&amp;z=14&amp;output=embed"></iframe><br/><br/>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut purus eget nunc ut dignissim cursus at a nisl. 
                                Mauris vitae turpis quis eros egestas tempor sit amet a arcu.</p>
                            </div>
                            <div class="col-lg-4">
                                <h4>TEXT WIDGET</h4>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut purus eget nunc ut dignissim cursus at a nisl. 
                                Mauris vitae turpis quis eros egestas tempor sit amet a arcu. Duis egestas hendrerit diam. Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut purus eget nunc ut dignissim cursus at a nisl. 
                                Mauris vitae turpis quis eros egestas tempor sit amet a arcu.</p>
                                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut purus eget nunc ut dignissim cursus at a nisl. 
                                Mauris vitae turpis quis eros egestas tempor sit amet a arcu. Duis egestas hendrerit diam. Lorem ipsum dolor amet.</p>
                            </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="contact.html" class="dropdown-toggle" data-toggle="dropdown">CONTACT</a>
                <ul class="dropdown-menu">
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="contact_wide.html">Contact Wide</a></li>
                </ul>
            </li>
            <li class="dropdown">
	            <ul class="nav navbar-nav userButtons">
	                <li><div class="verticalDivider"></div></li>
	                <li><button class="buttonGrey dropdown-toggle" data-toggle="modal" data-target="#myModal">Connexion</button>
	                </li>
	                <li><?php echo $this->Html->link('Inscription',array('controller'=>'account','action'=>'signup'),array('class'=>'dropdown-toggle buttonGrey','style'=>'margin-right:0px;')); ?></li></li>
	            </ul>
            </li>
        </ul>        
    </div><!--/.navbar-collapse -->
</div><!-- end header container -->
</header><!-- End Header -->


<?php echo $this->fetch('content'); ?>

<!-- start call to action -->
<section class="callToAction">
    <div class="container">
        <div class="ctaBox">
            <div class="col-lg-9">
                <h1>Get started today for a <span>free</span> home evaluation!</h1>
                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque eget ante vel nunc lorem ipsum rhoncus.</p>
            </div>
            <div class="col-lg-3">
                <a style="float:right; margin-top:15px;" class="buttonColor" href="#">CONTACT US</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</section>
<!-- end call to action -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4><a class="footerLogo" href="#">HOUSE <span>DREAM</span></a></h4>
                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut 
                purus eget nunc ut dignissim cursus at a nisl. Mauris vitae 
                turpis quis eros egestas tempor sit amet a arcu. Duis egestas 
                hendrerit diam.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>CONTACT</h4>
                <ul class="contactList">
                    <li><?php echo $this->Html->image('template/icon-pin.png',array('class'=>'icon')); ?> 123 Smith Drive, Arnold, Maryland</li>
                    <li><?php echo $this->Html->image('template/icon-phone.png',array('class'=>'icon')); ?> +1 234 567 8901</li>
                    <li><?php echo $this->Html->image('template/icon-mail.png',array('class'=>'icon')); ?> hello@thriveTheme.com</li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>TWITTER</h4>
                <ul>
                    <li><a href="#">@JohnDoe</a> Lorem ipsum dolor amet, 
                    adipiscing elit. Maecenas eget tellus.<br/><span>5 MINUTES AGO</span></li>
                    <li><a href="#">@JohnDoe</a> Lorem ipsum dolor amet, 
                    adipiscing elit. Maecenas eget tellus.<br/><span>5 MINUTES AGO</span></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <h4>NEWSLETTER</h4>
                <p>Lorem ipsum dolor amet, consectetur adipiscing elit. Sed ut 
                purus eget nunc ut dignissim cursus at a nisl.</p>
                <form class="subscribeForm" method="post" action="#">
                    <input type="text" name="email" value="Your email" class="input footer" />
                    <input type="submit" name="submit" value="SEND" class="buttonColor" />
                </form>
            </div>
        </div><!-- end row -->
    </div><!-- end footer container -->
</footer>

<div class="bottomBar">
    <div class="container">
        <p>3 PETITS COCHONS - COPYRIGHT 2013</p>
        <ul class="socialIcons">
            <li><a href="#"><?php echo $this->Html->image('template/icon-fb.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-twitter.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-google.png'); ?></a></li>
            <li><a href="#"><?php echo $this->Html->image('template/icon-rss.png'); ?></a></li>
        </ul>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <!-- start main content -->
		<section class="properties">
		    <div class="container">
		        <div class="row">

		            <div class="col-lg-8 col-lg-offset-2">
		                <h3>CONNEXION</h3>
		                <div class="divider"></div>
		                <p style="font-size:13px;">Pas encore inscrit ? <a href="register.html">Inscription ici!</a></p>
		                <!-- start login form -->
		                <div class="filterContent sidebarWidget">
		                    <?php echo $this->Form->create('User', array('url' => array('controller' => 'account', 'action' => 'login')));?>
		                        <div class="row">
		                            <div class="col-lg-12 col-md-12 col-sm-6">
		                                <div class="formBlock">
		                                <label for="login">E-mail</label><br/>
		                                <?php echo $this->Form->input('mail',array('label'=>false)); ?>
		                                </div>
		                            </div>
		                            <div class="col-lg-12 col-md-12 col-sm-6">
		                                <div class="formBlock">
		                                <label for="pass">Mot de passe</label><br/>
		                                <?php echo $this->Form->input('password',array('label'=>false,'type'=>'password')); ?>
		                                </div>
		                            </div>
		                            <div class="col-lg-12 col-md-12 col-sm-6">
		                                <div class="formBlock">
		                                    <?php $submit = array('label'=>'Se connecter','style'=>'margin-top:24px;','class'=>'buttonColor'); ?>
		                                    <?php echo $this->Form->end($submit); ?>
		                                </div>
		                            </div>
		                            <div style="clear:both;"></div>
		                        </div><!-- end row -->
		                    </form><!-- end form -->
		                </div><!-- end login form -->
		            </div><!-- end col -->
		            
		        </div>
		    </div><!-- end container -->
		</section>
		<!-- end main content -->
      </div>
    </div>
  </div>
</div>


<!-- JavaScript file links -->

<?php echo $this->Html->script('jquery.js'); ?><!-- Jquery -->
<?php echo $this->Html->script('bootstrap.min.js'); ?><!-- bootstrap 3.0 -->
<?php echo $this->Html->script('repond.js'); ?>
<?php echo $this->Html->script('jquery.bxslider.min.js'); ?><!-- bxslider -->
<?php echo $this->Html->script('tabs.js'); ?><!-- tabs -->
<?php echo $this->Html->script('jquery.nouislider.min.js'); ?><!-- price slider -->

<script>
//call bxslider for sub header section
$(document).ready(function(){
    $('.bxslider').bxSlider({
        auto: true,
        pager: false,
        nextSelector: '.slider-next',
        prevSelector: '.slider-prev',
        nextText: <?php echo "'".$this->Html->image('template/slider-next.png',array('alt'=>'slider next'))."'"; ?>, 
        prevText: <?php echo "'".$this->Html->image('template/slider-prev.png',array('alt'=>'slider prev'))."'"; ?>, 
    });
});
</script>

<script>
//Setup price slider 
var Link = $.noUiSlider.Link;

$(".priceSlider").noUiSlider({
     range: {
      'min': 0,
      'max': 800000
    }
    ,start: [150000, 550000]
    ,step: 1000
    ,margin: 100000
    ,connect: true
    ,direction: 'ltr'
    ,orientation: 'horizontal'
    ,behaviour: 'tap-drag'
    ,serialization: {
        lower: [
            new Link({
                target: $("#price-min")
            })
        ],

        upper: [
            new Link({
                target: $("#price-max")
            })
        ],

        format: {
        // Set formatting
            decimals: 0,
            thousand: ',',
            prefix: '$'
        }
    }
});
</script>

</body>
</html>

		
	



