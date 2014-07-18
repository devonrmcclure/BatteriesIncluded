$(function() {
  var path = window.location.pathname;
  var filename = path.match(/.*\/([^/]+)\.([^?]+)/i)[1]; // Get the filename of the current page. EG: "index"

  switch (filename) {

    case "index":
      $("a#home").addClass("active");
      break;
    case "catalog":
      $("a#catalog").addClass("active");
      break;
    case "servicing":
      $("a#servicing").addClass("active");
      break;
    case "faq":
      $("a#faq").addClass("active");
      break;
    case "locations_contact":
      $("a#locations-contact").addClass("active");
      break;
    default:
      //do nothing

  }
});