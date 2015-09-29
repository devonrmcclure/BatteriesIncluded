$(function() {
	$('.delete').click(function(e) {
		e.preventDefault();

		var id = $(this).parent().data('id');
		var name = $(this).parent().data('name');
    	$('<p>Are you sure you want to delete <b>' + name + '</b>?</p>').appendTo('.modal-body');
    	$('.confirmDelete').parent().parent().attr('action', '/admin/products/' + id);
    	//$('.confirmDelete').parent().parent().attr('method', 'delete');
	});
});

$(function() {
	$('.cancelDelete').click(function(e) {
		e.preventDefault();
		$('.modal-title').empty();
		$('.modal-body').empty();
	});
});

$(function() {
	$('.confirmDelete').click(function(e) {
		$('form#deleteForm').submit();
	});
});