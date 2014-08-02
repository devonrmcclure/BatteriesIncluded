$(function() {
  
  $("label.bg-danger").hide();
  $("span.bg-success").hide();
  $("form").removeClass("noscript");
  $(".submit_button").click(function() {
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
      case "Surrey":
        to = "guildford@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "Richmond":
        to = "lansdowne@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "White Rock":
        to = "whiterock@batteriesincluded.ca";
        $("label#location-error").hide();
        break;

      case "Nanaimo":
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

    var dataString = 'to=' + to + '&name='+ name + '&phone=' + phone + '&email=' + email + '&subject=' +
                      subject + '&message=' + message;

    alert(dataString);

    $.ajax({
      type: "POST",
      url:'http://localhost/batteriesincluded/includes/php/contact.php',
      data: dataString,

      success: function(data){
        alert(data);//only for testing purposes
        $("#contact-form").hide();
        $("span.bg-success").show();
      }
    });

    return false; // avoid to execute the actual submit of the form.
  });
});