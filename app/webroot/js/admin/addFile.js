// JavaScript Document$(function(){
$(function(){
	$('input[type="file"]').live('change',function(){
		if(!$(this).hasClass('active')){
			var number = $(this).attr('name');
			number = parseInt(number.charAt((number.length)-2))+1;
			var content = $(this).parent().parent();
			content.append("<div class='input file'><label for='File"+number+"'></label><input type='file' name='data[File]["+number+"]' id='File"+number+"'></div>");
			$(this).addClass('active');
		}
	});
	
	
	
});