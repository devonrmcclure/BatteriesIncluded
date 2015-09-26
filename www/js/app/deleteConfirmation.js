$(function() {
	$('.deleteConfirm').click(function(e) {
		e.preventDefault();

		var id = $(this).parent().data('id');
		var name = $(this).parent().data('name');
    	$('<p>Are you sure you want to delete <b>' + name + '</b>?</p>').appendTo('.modal-body');
    	$('.confirmDelete').attr('href', '/admin/products/' + id);
	});
});

$(function() {
	$('.cancelDelete').click(function(e) {
		e.preventDefault();
		$('.modal-title').empty();
		$('.modal-body').empty();
	});
});