$(document).ready(function() {
	$(".href-product a").click(function(){
		
		var href=$(this).attr('href');
		var querystring=href.slice(href.indexOf('?') +1);
		$.get('all_view_product.php', querystring, processRes);
		return false;
		function processRes(data) {
			var newHTML;
			newHTML = data;
			$('.nows1').html(newHTML);
		}
		})
})