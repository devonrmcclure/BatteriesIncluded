$(function() {
	$('.delete').click(function(e) {
		e.preventDefault();

		var id = $(this).parent().data('id');
		var name = $(this).parent().data('name');
		var path = window.location.href.substring(window.location.href.lastIndexOf('/') + 1);

		if(path == "catalog") {
			path = "products";
		}

    	$('<p>Are you sure you want to delete "<b>' + name + '</b>"?</p>').appendTo('.modal-body');
    	$('.confirmDelete').parent().parent().attr('action', '/admin/' + path + '/' + id);
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