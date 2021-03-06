$(function() {

  $("label.bg-danger").hide();
  $("form").removeClass("noscript");
  $(".submit-button").click(function() {
    // validate and process form here
    var to;
    var location = $("select#location").val();
    var name     = $("input#name").val();
    var phone    = $("input#phone").val();
    var email    = $("input#email").val();
    var subject  = $("input#subject").val();
    var message  = $("textarea#message").val();
    // alert(location + name +  phone + email + subject + message); // Used for testing purposes.

    switch(location){
      case "surrey":
        to = "guildford@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "richmond":
        to = "lansdowne@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "white rock":
        to = "whiterock@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "nanaimo":
        to = "nanaimo@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      default:
        to = null;
        $("label#location-error").show();
        return false;
      }

    if (name == "") {
      $("label#name-error").show();
      $("input#name").focus();
      return false;
    } else {
      $("label#name-error").hide();
    }

    if ($.isNumeric(phone) != true || phone.length != 10 || phone == "") {
      $("label#phone-error").show();
      $("input#phone").focus();
      return false;
    } else {
      $("label#phone-error").hide();
    }

    if (email.match(/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/) || email == "") {
      $("label#email-error").show();
      $("input#email").focus();
      return false;
    } else {
      $("label#email-error").hide();
    }

    if (subject == "") {
      $("label#subject-error").show();
      $("input#subject").focus();
      return false;
    } else {
      $("label#subject-error").hide();
    }

    if (message == "" || message.length < 20) {
      $("label#message-error").show();
      $("input#message").focus();
      return false;
    } else {
      $("label#message-error").hide();
    }

    });

    //return false; // avoid to execute the actual submit of the form.
});