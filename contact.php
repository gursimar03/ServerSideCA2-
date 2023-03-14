<!DOCTYPE HTML>
<html>
<head>
    <title>Contact Form</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Load jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Load Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function() {
    $("#contactForm").submit(function(event) {
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var errors = 0;

        if (name == "") {
            $("#name").addClass("is-invalid");
            $("#nameError").text("Please enter your name.");
            errors++;
        } else {
            $("#name").removeClass("is-invalid");
            $("#nameError").text("");
        }

        if (email == "") {
            $("#email").addClass("is-invalid");
            $("#emailError").text("Please enter your email address.");
            errors++;
        } else {
            var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
            if (!emailRegex.test(email)) {
                $("#email").addClass("is-invalid");
                $("#emailError").text("Please enter a valid email address.");
                errors++;
            } else {
                $("#email").removeClass("is-invalid");
                $("#emailError").text("");
            }
        }

        if (message == "") {
            $("#message").addClass("is-invalid");
            $("#messageError").text("Please enter your message.");
            errors++;
        } else {
            $("#message").removeClass("is-invalid");
            $("#messageError").text("");
        }

        if (errors > 0) {
            event.preventDefault();
        }
    });

    $("#name").on("input", function() {
        if ($(this).val() == "") {
            $(this).addClass("is-invalid");
            $("#nameError").text("Please enter your name.");
        } else {
            $(this).removeClass("is-invalid");
            $("#nameError").text("");
        }
    });

    $("#email").on("input", function() {
        var email = $(this).val();
        var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (email == "") {
            $(this).addClass("is-invalid");
            $("#emailError").text("Please enter your email address.");
        } else if (!emailRegex.test(email)) {
            $(this).addClass("is-invalid");
            $("#emailError").text("Please enter a valid email address.");
        } else {
            $(this).removeClass("is-invalid");
            $("#emailError").text("");
        }
    });

    $("#message").on("input", function() {
        if ($(this).val() == "") {
            $(this).addClass("is-invalid");
            $("#messageError").text("Please enter your message.");
        } else {
            $(this).removeClass("is-invalid");
            $("#messageError").text("");
        }
    });
});

    </script>
   <link rel="stylesheet" type="text/css" href="contact.css">
   <script src="validation.js"></script>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form id="contactForm" method="post" action="submit-form.php">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name">
    <div id="nameError" class="invalid-feedback"></div>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" id="email">
    <div id="emailError" class="invalid-feedback"></div>
  </div>
  <div class="form-group">
    <label for="message">Message:</label>
    <textarea class="form-control" name="message" id="message"></textarea>
    <div id="messageError" class="invalid-feedback"></div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
</body>
</html>
