<div class="sixteen columns">
	<?php echo $this->element('menu_profil', array(
		"helptext" => "Oh, this text is very helpful."
	));?>
</div>
<div class="clear"></div>
<div id="profil">

	<div class="one-third column">
		<h1>Votre compte</h1>
		<?php echo $this->Form->create('User',array('url'=>array('controller'=>'user','action'=>'profil'))); ?>
			<?php echo $this->Form->input('User.pseudo',array('label'=>'Pseudo :')); ?>
			<?php echo $this->Form->input('User.mail',array('label'=>'Mail :')); ?>
			<?php echo $this->Form->input('User.pwdA',array('label'=>'Changer de mot de passe :')); ?>
			<?php echo $this->Form->input('User.pwdB',array('label'=>'Confirmer le nouveau mot de passe :')); ?>
			<?php echo $this->Form->input('Type.type',array('value'=>'A','type'=>'hidden')); ?>
			
		<?php echo $this->Form->end("Enregistrer"); ?>
	</div>
	
	<div class="one-third column">
		<h1>Informations du titulaire</h1>
		<?php echo $this->Form->create('Profile',array('url'=>array('controller'=>'user','action'=>'profil'))); ?>
			<?php echo $this->Form->input('Profile.last_name',array('label'=>'Nom :')); ?>
			<?php echo $this->Form->input('Profile.first_name',array('label'=>'Prènom :')); ?>
			<?php echo $this->Form->input('Profile.city',array('label'=>'Ville :')); ?>
			<?php echo $this->Form->input('Profile.cp',array('label'=>'Code postal :')); ?>
			<?php  $country = array(
'Afghanistan'=>'Afghanistan','Albania'=>'Albania','Algeria'=>'Algeria','American Samoa'=>'American Samoa','Andorra'=>'Andorra','Angola'=>'Angola','Anguilla'=>'Anguilla','Antarctica'=>'Antarctica','Antigua And Barbuda'=>'Antigua And Barbuda','Argentina'=>'Argentina','Armenia'=>'Armenia','Aruba'=>'Aruba','Australia'=>'Australia','Austria'=>'Austria','Azerbaijan'=>'Azerbaijan','Bahamas'=>'Bahamas','Bahrain'=>'Bahrain','Bangladesh'=>'Bangladesh','Barbados'=>'Barbados','Belarus'=>'Belarus','Belgium'=>'Belgium','Belize'=>'Belize','Benin'=>'Benin','Bermuda'=>'Bermuda','Bhutan'=>'Bhutan','Bolivia'=>'Bolivia','Bosnia And Herzegovina'=>'Bosnia And Herzegovina','Botswana'=>'Botswana','Bouvet Island'=>'Bouvet Island','Brazil'=>'Brazil','British Indian Ocean Territory'=>'British Indian Ocean Territory','Brunei'=>'Brunei','Bulgaria'=>'Bulgaria','Burkina Faso'=>'Burkina Faso','Burundi'=>'Burundi','Cambodia'=>'Cambodia','Cameroon'=>'Cameroon','Canada'=>'Canada','Cape Verde'=>'Cape Verde','Cayman Islands'=>'Cayman Islands','Central African Republic'=>'Central African Republic','Chad'=>'Chad','Chile'=>'Chile','China'=>'China','Christmas Island'=>'Christmas Island','Cocos (Keeling) Islands'=>'Cocos (Keeling) Islands','Columbia'=>'Columbia','Comoros'=>'Comoros','Congo'=>'Congo','Cook Islands'=>'Cook Islands','Costa Rica'=>'Costa Rica','Cote D\'Ivorie (Ivory Coast)'=>'Cote D\'Ivorie (Ivory Coast)','Croatia (Hrvatska)'=>'Croatia (Hrvatska)','Cuba'=>'Cuba','Cyprus'=>'Cyprus','Czech Republic'=>'Czech Republic','Democratic Republic Of Congo (Zaire)'=>'Democratic Republic Of Congo (Zaire)','Denmark'=>'Denmark','Djibouti'=>'Djibouti','Dominica'=>'Dominica','Dominican Republic'=>'Dominican Republic','East Timor'=>'East Timor','Ecuador'=>'Ecuador','Egypt'=>'Egypt','El Salvador'=>'El Salvador','Equatorial Guinea'=>'Equatorial Guinea','Eritrea'=>'Eritrea','Estonia'=>'Estonia','Ethiopia'=>'Ethiopia','Falkland Islands (Malvinas)'=>'Falkland Islands (Malvinas)','Faroe Islands'=>'Faroe Islands','Fiji'=>'Fiji','Finland'=>'Finland','France'=>'France','France, Metropolitan'=>'France, Metropolitan','French Guinea'=>'French Guinea','French Polynesia'=>'French Polynesia','French Southern Territories'=>'French Southern Territories','Gabon'=>'Gabon','Gambia'=>'Gambia','Georgia'=>'Georgia','Germany'=>'Germany','Ghana'=>'Ghana','Gibraltar'=>'Gibraltar','Greece'=>'Greece','Greenland'=>'Greenland','Grenada'=>'Grenada','Guadeloupe'=>'Guadeloupe','Guam'=>'Guam','Guatemala'=>'Guatemala','Guinea'=>'Guinea','Guinea-Bissau'=>'Guinea-Bissau','Guyana'=>'Guyana','Haiti'=>'Haiti','Heard And McDonald Islands'=>'Heard And McDonald Islands','Honduras'=>'Honduras','Hong Kong'=>'Hong Kong','Hungary'=>'Hungary','Iceland'=>'Iceland','India'=>'India','Indonesia'=>'Indonesia','Iran'=>'Iran','Iraq'=>'Iraq','Ireland'=>'Ireland','Israel'=>'Israel','Italy'=>'Italy','Jamaica'=>'Jamaica','Japan'=>'Japan','Jordan'=>'Jordan','Kazakhstan'=>'Kazakhstan','Kenya'=>'Kenya','Kiribati'=>'Kiribati','Kuwait'=>'Kuwait','Kyrgyzstan'=>'Kyrgyzstan','Laos'=>'Laos','Latvia'=>'Latvia','Lebanon'=>'Lebanon','Lesotho'=>'Lesotho','Liberia'=>'Liberia','Libya'=>'Libya','Liechtenstein'=>'Liechtenstein','Lithuania'=>'Lithuania','Luxembourg'=>'Luxembourg','Macau'=>'Macau','Macedonia'=>'Macedonia','Madagascar'=>'Madagascar','Malawi'=>'Malawi','Malaysia'=>'Malaysia','Maldives'=>'Maldives','Mali'=>'Mali','Malta'=>'Malta','Marshall Islands'=>'Marshall Islands','Martinique'=>'Martinique','Mauritania'=>'Mauritania','Mauritius'=>'Mauritius','Mayotte'=>'Mayotte','Mexico'=>'Mexico','Micronesia'=>'Micronesia','Moldova'=>'Moldova','Monaco'=>'Monaco','Mongolia'=>'Mongolia','Montserrat'=>'Montserrat','Morocco'=>'Morocco','Mozambique'=>'Mozambique','Myanmar (Burma)'=>'Myanmar (Burma)','Namibia'=>'Namibia','Nauru'=>'Nauru','Nepal'=>'Nepal','Netherlands'=>'Netherlands','Netherlands Antilles'=>'Netherlands Antilles','New Caledonia'=>'New Caledonia','New Zealand'=>'New Zealand','Nicaragua'=>'Nicaragua','Niger'=>'Niger','Nigeria'=>'Nigeria','Niue'=>'Niue','Norfolk Island'=>'Norfolk Island','North Korea'=>'North Korea','Northern Mariana Islands'=>'Northern Mariana Islands','Norway'=>'Norway','Oman'=>'Oman','Pakistan'=>'Pakistan','Palau'=>'Palau','Panama'=>'Panama','Papua New Guinea'=>'Papua New Guinea','Paraguay'=>'Paraguay','Peru'=>'Peru','Philippines'=>'Philippines','Pitcairn'=>'Pitcairn','Poland'=>'Poland','Portugal'=>'Portugal','Puerto Rico'=>'Puerto Rico','Qatar'=>'Qatar','Reunion'=>'Reunion','Romania'=>'Romania','Russia'=>'Russia','Rwanda'=>'Rwanda','Saint Helena'=>'Saint Helena','Saint Kitts And Nevis'=>'Saint Kitts And Nevis','Saint Lucia'=>'Saint Lucia','Saint Pierre And Miquelon'=>'Saint Pierre And Miquelon','Saint Vincent And The Grenadines'=>'Saint Vincent And The Grenadines','San Marino'=>'San Marino','Sao Tome And Principe'=>'Sao Tome And Principe','Saudi Arabia'=>'Saudi Arabia','Senegal'=>'Senegal','Seychelles'=>'Seychelles','Sierra Leone'=>'Sierra Leone','Singapore'=>'Singapore','Slovak Republic'=>'Slovak Republic','Slovenia'=>'Slovenia','Solomon Islands'=>'Solomon Islands','Somalia'=>'Somalia','South Africa'=>'South Africa','South Georgia And South Sandwich Islands'=>'South Georgia And South Sandwich Islands','South Korea'=>'South Korea','Spain'=>'Spain','Sri Lanka'=>'Sri Lanka','Sudan'=>'Sudan','Suriname'=>'Suriname','Svalbard And Jan Mayen'=>'Svalbard And Jan Mayen','Swaziland'=>'Swaziland','Sweden'=>'Sweden','Switzerland'=>'Switzerland','Syria'=>'Syria','Taiwan'=>'Taiwan','Tajikistan'=>'Tajikistan','Tanzania'=>'Tanzania','Thailand'=>'Thailand','Togo'=>'Togo','Tokelau'=>'Tokelau','Tonga'=>'Tonga','Trinidad And Tobago'=>'Trinidad And Tobago','Tunisia'=>'Tunisia','Turkey'=>'Turkey','Turkmenistan'=>'Turkmenistan','Turks And Caicos Islands'=>'Turks And Caicos Islands','Tuvalu'=>'Tuvalu','Uganda'=>'Uganda','Ukraine'=>'Ukraine','United Arab Emirates'=>'United Arab Emirates','United Kingdom'=>'United Kingdom','United States'=>'United States','United States Minor Outlying Islands'=>'United States Minor Outlying Islands','Uruguay'=>'Uruguay','Uzbekistan'=>'Uzbekistan','Vanuatu'=>'Vanuatu','Vatican City (Holy See)'=>'Vatican City (Holy See)','Venezuela'=>'Venezuela','Vietnam'=>'Vietnam','Virgin Islands (British)'=>'Virgin Islands (British)','Virgin Islands (US)'=>'Virgin Islands (US)','Wallis And Futuna Islands'=>'Wallis And Futuna Islands','Western Sahara'=>'Western Sahara','Western Samoa'=>'Western Samoa','Yemen'=>'Yemen','Yugoslavia'=>'Yugoslavia','Zambia'=>'Zambia','Zimbabwe'=>'Zimbabwe'
);

?> 
			<?php 
				if(!empty($this->request->data['Profile']['country'])){ 
					echo $this->Form->input('Profile.country',array('label'=>'Pays :','type'=>'select','options'=>$country)); 
				}else{
					echo $this->Form->input('Profile.country',array('label'=>'Pays :','type'=>'select','options'=>$country,'value'=>'France')); 
				}
			?>
            
			<?php 
				$year = array();
				$begin = date('Y')-100;
				$end = $begin+82;
				for($i=$end;$i>=$begin;$i--){
					$year[$i]=$i;	
				}
			?>
			<?php echo $this->Form->input('Profile.bornyear',array('label'=>'Année de naissance :','type'=>'select','options'=>$year)); ?>
			<?php echo $this->Form->input('Profile.work',array('label'=>'Profession :')); ?>
			<?php echo $this->Form->input('Type.type',array('value'=>'B','type'=>'hidden')); ?>
			
		<?php echo $this->Form->end("Enregistrer"); ?>
	</div>
	
	<div class="one-third column">
		<h1>Appréciation</h1>
		<?php echo $this->Form->create('Profile',array('url'=>array('controller'=>'user','action'=>'profil'))); ?>
			<?php echo $this->Form->input('Profile.like',array('label'=>'Ce que j\'aime sur le site :','type'=>'textarea')); ?>
			<?php echo $this->Form->input('Profile.dislike',array('label'=>'Ce que je n\'aime pas sur le site :','type'=>'textarea')); ?>
			<?php echo $this->Form->input('Type.type',array('value'=>'B','type'=>'hidden')); ?>
			
		<?php echo $this->Form->end("Enregistrer"); ?>
	</div>
</div>