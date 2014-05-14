<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title name="Mint"><?php echo $title_for_layout;?></title>

<!-- Hotmail ignores some valid styling, so we have to add this -->
<style type="text/css">

/* iPad Text Smoother */
div, p, a, li, td { -webkit-text-size-adjust:none; }

/* This is the color to change the all the mind green content:  #67cbb0; */

.ReadMsgBody
{width: 100%; background-color: #ffffff;}
.ExternalClass
{width: 100%; background-color: #ffffff;}
body
{width: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;}
html
{width: 100%; }

@font-face {
    font-family: 'proxima_novalight';
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-light-webfont.eot');
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-light-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-light-webfont.woff') format('woff'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-light-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'proxima_nova_rgregular';
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-regular-webfont.eot');
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-regular-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-regular-webfont.woff') format('woff'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-regular-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'nexa_boldregular';
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/nexa_bold-webfont.eot');
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/nexa_bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/nexa_bold-webfont.woff') format('woff'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/nexa_bold-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}


@font-face {
    font-family: 'proxima_novasemibold';
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-semibold-webfont.eot');
    src: url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-semibold-webfont.eot?#iefix') format('embedded-opentype'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-semibold-webfont.woff') format('woff'),
         url('http://www.stampready.net/themeforest/templates/mint/src/font/proximanova-semibold-webfont.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;

}

table { font-size: 14px; font-family: 'proxima_nova_rgregular', Myriad Pro, helvetica, Arial, sans-serif; color: #9b9b9b; }
/*
.imgFull img {border-radius: 3px!important;}
.headerImg img {border-radius: 3px!important;}
*/
 td.navBg { background-image: url(http://www.just-art.fr/sympathy/app/webroot/img/newsletter/back.png); } 

/* With This Code you make a Newsletter Responsive */
@media only screen and (max-width: 640px) 
           {
        
        table[class=full] { width: 100%; clear: both; }
        table[class=mobile] { width: 100%; padding-left: 30px; padding-right: 30px; clear: both; }
        table[class=fullCenter] { width: 100%; text-align: center!important; clear: both; }
        td[class=fullCenter] { width: 100%; text-align: center!important; clear: both; }
        td[class=textCenter] { width: 100%; text-align: center!important; clear: both; }
        table[class=imgFull] {width: 100%!important; text-align: center!important; clear: both;}
        table[class=headerImg] {width: 100%!important; padding-left: 30px; padding-right: 30px; text-align: center!important; clear: both;}
        /*.imgFull img {border-radius: 3px!important;}*/
        .headerImg img {width: 100%!important; border-radius: 3px!important;}
        img[class=headerImg] {width: 100%!important;}
        td[class=height40] {height: 50px!important;}
        td[class=headerBG] {width: 100%!important; height: 140px!important; background-image: url(http://www.stampready.net/themeforest/templates/mint/src/images/header_bg.jpg); background-size: 100% 265px; background-repeat: repeat-x;}
         td[class=navBg] { background-image: url(http://www.just-art.fr/sympathy/app/webroot/img/newsletter/back.png); } 
        }
       
    
        
/* This Code is Extra for Mobile Version */     
        @media only screen and (max-width: 479px) 
           {
        img[class=fullImage] { width: 100%!important; height: auto!important; }
        /*.imgFull img {width: 100%!important; border-radius: 3px!important;}*/
        table[class=imgFull] {width: 100%!important; text-align: left!important; clear: both;}
        td[class=textCenter] { width: 100%; text-align: left!important; clear: both; }
        td[class=headerBG] {width: 100%!important; height: 120px!important; background-color: #ffffff; background-image: url(http://www.stampready.net/themeforest/templates/mint/src/images/header_bg.jpg); background-size: 100% 200px; background-repeat: repeat-x;}
         td[class=navBg] { background-image: url(http://www.just-art.fr/sympathy/app/webroot/img/newsletter/back.png); } 
        
        }
       
        
        


</style>
</head>
<body>
<!-- Wrapper 1 (Nav) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" name="1">
    <tbody><tr>
        <td bgcolor="" class="bgColorResult navBg">
        
            <!-- Nav Mobile Wrapper -->
            <table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tbody><tr>
                    <td width="100%">
                    
                        <!-- Start Nav -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tbody><tr>
                                <td width="100%" height="15"></td>
                            </tr>
                            <tr>
                                <td width="100%" valign="middle">
                                    
                                    <!-- Logo -->
                                    <table width="240" border="0" cellpadding="0" cellspacing="0" align="left" class="fullCenter">
                                        <tbody><tr>
                                            <td height="80" valign="middle" width="100%" style="text-align: left;" class="fullCenter">
                                                <a href="#"><img src="http://www.just-art.fr/sympathy/app/webroot/img/newsletter/logo.png" alt="" border="0"></a>
                                            </td>
                                        </tr>
                                    </tbody></table>
                                    
                                    <!-- Nav --> 
                                    <table width="300" border="0" cellpadding="0" cellspacing="0" align="right" style="text-align: right;" class="fullCenter">  
                                        <tbody><tr>
                                            <!--
                                            <td height="80" valign="middle" width="33%" style="font-family: 'proxima_novasemibold' Myriad Pro, helvetica, Arial, sans-serif;" class="navTd">
                                                <a href="http://www.sympathy-world.com/homes/history" style="text-decoration: none; color: #ffffff;">Notre histoire</a>
                                            </td>
                                            <td valign="middle" width="33%" style="font-family: 'proxima_novasemibold' Myriad Pro, helvetica, Arial, sans-serif;" class="navTd">
                                                <a href="http://www.sympathy-world.com/mag" style="text-decoration: none; color: #ffffff;">Sympathy News</a>
                                            </td>-->
                                        </tr>
                                    </tbody></table>
                                                                    
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" height="15"></td>
                            </tr>
                        </tbody></table><!-- End Nav -->
                        
                    </td>
                </tr>
            </tbody></table><!-- End Nav Mobile Wrapper -->
            
        </td>
    </tr>
</tbody></table><!-- End Wrapper 1 -->

<!-- Wrapper 2 (Header) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full" bgcolor="#ffffff" name="2">
    <tbody><tr>
        <td width="100%" valign="top" class="headerBG" style="">
        
            <!-- Start Header + Text -->
            <!--
            <table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="headerImg">
                <tbody><tr>
                    <td width="100%" height="38">                                   
                    </td>
                </tr>
                <tr>
                    <td width="100%" style="border-radius: 4px;">
                        <a href="#"><img class="headerImg" src="http://www.stampready.net/themeforest/templates/mint/src/images/header.png" alt="" border="0" style="display: block; border-radius: 4px!important;"></a>
                    </td>
                </tr>
            </tbody></table>
            -->
            <!-- Text Header -->
            <table width="590" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tbody><tr>
                    <td height="22"></td>
                </tr>
                <tr>
                    <td style="font-size: 18px; color: #363636; text-align: left; font-family: 'proxima_novasemibold', Myriad Pro, helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;" class="textCenter">
                       <?php echo $content_for_layout;?>                           
                    </td>
                </tr>
                
                <tr>
                    <td style="font-size: 12px; color: #a8a8a8; font-weight: normal; text-align: left; font-family: 'proxima_nova_rgregular', Helvetica, Arial, sans-serif; line-height: 18px; vertical-align: top;" class="textCenter">
                        <span style="text-decoration: none; color: #4a4a4a; font-family: 'proxima_novasemibold', Helvetica, Arial, sans-serif;" class="colorResult">A très bientôt !<br>
                        L'équipe Sympathy World.</span>
                        <!--<a href="#" style="text-decoration: none; color: #4a4a4a; font-family: 'proxima_novasemibold', Helvetica, Arial, sans-serif;" class="colorResult">En savoir plus</a>-->                     
                    </td>
                </tr>
            </tbody></table>
            
            <!-- Space -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                <tbody><tr>
                    <td width="100%" height="20">                                   
                    </td>
                </tr>
            </tbody></table>

        </td>
    </tr>
</tbody></table><!-- End Wrapper 2 -->











</body>
</html>
