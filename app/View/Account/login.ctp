<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Login Form</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start main content -->
<section class="properties">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-lg-offset-4">
                <h3>LOGIN</h3>
                <div class="divider"></div>
                <p style="font-size:13px;">Don't have an account yet? <a href="register.html">Register here!</a></p>
                <!-- start login form -->
                <div class="filterContent sidebarWidget">
                    <?php echo $this->Form->create('User', array('url' => array('controller' => 'account', 'action' => 'login')));?>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="login">Login</label><br/>
                                <?php echo $this->Form->input('mail',array('label'=>false)); ?>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="formBlock">
                                <label for="pass">Password</label><br/>
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
