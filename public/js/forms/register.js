$(document).ready(function () {
    $("#registerForm").submit(function (event) {
      var form = $("#registerForm").serialize();
      $.ajax({
        type: "POST",
        url: "../../../backend/controllers/register.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function (data) {
        console.log(data);
      });
  
      event.preventDefault();
    });
  });