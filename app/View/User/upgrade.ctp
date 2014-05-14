<?php debug(AuthComponent::user()); ?>
<?php $url = $_SERVER['HTTP_HOST'].'/argonne'; ?>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6PUGZFB78QP4N">
<input type="image" src="https://www.sandbox.paypal.com/fr_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
<img alt="" border="0" src="https://www.sandbox.paypal.com/fr_XC/i/scr/pixel.gif" width="1" height="1">
</form>
