$(function() {
	$('.deleteProduct').click(function(e) {
		e.preventDefault();

		var productID = $(this).parent().data('product-id');
		var productName = $(this).parent().data('product-name');
    	$('<p>Are you sure you want to delete <b>' + productName + '</b>?</p>').appendTo('.modal-body');
    	$('.confirmDelete').attr('href', '/admin/products/delete/' + productID);
	});
});

$(function() {
	$('.cancelDelete').click(function(e) {
		e.preventDefault();
		$('.modal-title').empty();
		$('.modal-body').empty();
	});
});