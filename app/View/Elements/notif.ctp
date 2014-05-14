<style>
.error-barre { background-color:#990033; color:white; padding:5px; font-weight:bold; background-image: url(http://www.just-art.fr/final/app/webroot/img/arrow.png); background-position: 20px 10px; padding-left:40px; background-repeat: no-repeat;}
.error {  color:#990033; padding:5px; font-weight:bold; }
.error-message { font-size:10px;}
.valid-barre { background-color: #A8AF3F; color:white; padding:5px; font-weight:bold; background-image: url(http://www.just-art.fr/final/app/webroot/img/arrow.png); background-position: 20px 10px; padding-left:40px; background-repeat: no-repeat;}
.quit { background-image: url(http://www.just-art.fr/final/app/webroot/img/quit.png); background-repeat: no-repeat; width:10px; height:10px; display:inline-block; float:right; margin:5px; cursor:pointer;}
.notif { margin-bottom:40px;}
</style>
<script type="text/javascript">
$(function(){
	$('span.quit').click(function(){ $(this).parent().slideUp();});	
});
</script>
<?php if(isset($type)){ ?>
<div class="sixteen columns notif">
	<p class="error-barre"><?php echo $message; ?><span class="quit"></span></p>

</div>    
<?php }else{ ?>

<div class="sixteen columns notif">
	<p class="valid-barre"><?php echo $message; ?><span class="quit"></span></p>
</div>   
<?php } ?>