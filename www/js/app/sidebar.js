$(".sidebar-toggle").click(function(e) {
    e.preventDefault();
    $(".sidebar").toggleClass("toggled");
    $(".content").toggleClass("col-md-offset-2");
    $(".content").toggleClass("col-md-offset-1");

});

$(".fab-toggle").click(function(e) {
	e.preventDefault();
	$(".fab-item").toggleClass("hidden");
});