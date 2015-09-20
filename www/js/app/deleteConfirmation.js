$(function() {
	$('.deleteProduct').click(function(e) {
		e.preventDefault();
    	alert($(this).parent().data('product-id'));
	});
});