
        

                    
    
    
          <?php

            /*
            $serveurs = array(
                'tpeweb.paybox.com',
                'tpeweb1.paybox.com'
            );

            $serveurOK = "";
            phpinfo();
            foreach ($serveurs as $serveur) {
                $doc = new DOMDocument();
                $doc->loadHTMLFile('https://'.$serveur.'/load.html');
                $server_status ="";
                $element = $doc->getElementById('server_status');
                if($element){
                    $server_status = $element->textContent;
                }
                if($server_status == "ok"){
                    $serveurOK = $serveur;
                    break;
                }
            }
            curl_close($ch);
            if(!$serveurOK){ die('Erreur'); }
            */ 

            
            $data = array(
                'montant'=>100*$choice['total'],
                'email'=>$user['mail'],
                'url_retour'=>$this->Html->url(array('controller'=>'checkout','action'=>'order'),true),
                'url_ipn'=>$this->Html->url(array('controller'=>'checkout','action'=>'ipnpass'),true),
                'url_annule'=>$this->Html->url(array('controller'=>'account','action'=>'order','customer'=>true),true)
            );
            

            

            // On récupère la date au format ISO-8601
            $dateTime = date("c");

            //login 199988832
            // mdp 19998881
            // 1111 2222 3333 4444
            // 06/14
            // 123

            // On crée la chaîne à hacher sans URLencodage
            $msg = "PBX_SITE=1999888".
            "&PBX_RANG=32".
            "&PBX_IDENTIFIANT=1686319".
            "&PBX_TOTAL=".$data['montant'].
            "&PBX_TYPEPAIEMENT=".$type.
            "&PBX_TYPECARTE=".$card.
            "&PBX_DEVISE=978".
            "&PBX_CMD=".$choice['ref'].
            "&PBX_PORTEUR=".$data['email'].
            "&PBX_RETOUR=ref:R;montant:M;trans:T;auto:A;pays:I;bank:Y;code:E;sign:K".
            "&PBX_ANNULE=".$data['url_annule'].
            "&PBX_EFFECTUE=".$data['url_retour'].
            "&PBX_REPONDRE_A=".$data['url_ipn'].
            "&PBX_HASH=sha512".
            "&PBX_TIME=".$dateTime;




         
            // Clé secrète HMAC
            $keyTest = '0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF0123456789ABCDEF';

            // Si la clé est en ASCII on la transforme en binaire
            $binKey = pack("H*",$keyTest);
          

            // Calcule de l'empreinte grâce à la fonction hash_hmac et la clé binaire.
            //print_r(hash_algos());
            $hmac = strtoupper(hash_hmac('sha512', $msg, $binKey));

            // Création du formulaire d'envoie
            ?>
            <div id="gocheckout" class="right">
                <form method="POST" action="https://preprod-tpeweb.paybox.com/cgi/MYchoix_pagepaiement.cgi">
                    <input type="hidden" name="PBX_SITE" value="1999888">
                    <input type="hidden" name="PBX_RANG" value="32">
                    <input type="hidden" name="PBX_IDENTIFIANT" value="1686319">
                    <input type="hidden" name="PBX_TOTAL" value="<?php echo $data['montant']; ?>">
                    <input type="hidden" name="PBX_TYPEPAIEMENT" value="<?php echo $type; ?>">
                    <input type="hidden" name="PBX_TYPECARTE" value="<?php echo $card; ?>">
                    <input type="hidden" name="PBX_DEVISE" value="978">
                    <input type="hidden" name="PBX_CMD" value="<?php echo $choice['ref']; ?>">
                    <input type="hidden" name="PBX_PORTEUR" value="<?php echo $data['email']; ?>">
                    <input type="hidden" name="PBX_RETOUR" value="ref:R;montant:M;trans:T;auto:A;pays:I;bank:Y;code:E;sign:K">
                    <input type="hidden" name="PBX_ANNULE" value="<?php echo $data['url_annule']; ?>">
                    <input type="hidden" name="PBX_EFFECTUE" value="<?php echo $data['url_retour']; ?>">
                    <input type="hidden" name="PBX_REPONDRE_A" value="<?php echo $data['url_ipn']; ?>">
                    <input type="hidden" name="PBX_HASH" value="sha512">
                    <input type="hidden" name="PBX_TIME" value="<?php echo $dateTime; ?>">
                    <input type="hidden" name="PBX_HMAC" value="<?php echo $hmac; ?>">
                    <input type="submit" class="button" value="Payer">
                </form>
            </div>
				
</div>


