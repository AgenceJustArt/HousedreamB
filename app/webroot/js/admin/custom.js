$(document).ready(function(){

$( "#menu" ).accordion({ heightStyle: "content" });

$('input.datepicker').datepicker({
            dateFormat:'dd/mm/yy',
            dayNamesMin: ['D','L','M','M','J','V','S'],
            monthNames: ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"]
        });

/*************Redactor Editor****************/
/************ Redactor Editor****************/

$('#redactor-shortContent').redactor({ focus: false,autoresize: true,css: 'redactor.css',lang: 'fr' }); 
$('#redactor-content').redactor({ focus: false,autoresize: true,css: 'redactor.css',lang: 'fr' }); 
	

	

});