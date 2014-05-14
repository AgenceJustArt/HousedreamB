


<!-- start subheader -->
<section class="subHeader page">
    <div class="container">
    	<h1>Agent Listing Grid Sidebar</h1>
    	<form class="searchForm" method="post" action="#">
            <input type="text" name="search" value="Search our site" />
        </form>
    </div><!-- end subheader container -->
</section><!-- end subheader section -->

<!-- start properties -->
<section class="properties">
    <div class="container">

        <div class="row">
        	<!-- START SIDEBAR -->
            <div class="col-lg-3 col-md-3">
                

                <?php echo $this->element('menu_msgbox'); ?>

                

                

            </div><!-- end col -->
            <div class="col-lg-9 col-md-9">
            <div class="row">
            	
                <?php if($mailbox){ 
							echo $this->element('msgbox',array('mailbox'=>$mailbox,'trash'=>false,'index'=>true));
						}else{
						?>
								<tr>
									<td>Boite mail vide</td>	
								</tr>
						<?php } ?>
                <ul class="pageList">
                    <li><a href="#">&lt;</a></li>
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&gt;</a></li>
                </ul>
            </div><!-- end row -->
            </div><!-- end col -->
        
            
        </div><!-- end row -->

    </div><!-- end container -->
</section>
<!-- end properties -->
		


					


