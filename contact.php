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
                var errors = "";

                if (name == "") {
                    errors += "Please enter your name.\n";
                }

                if (email == "") {
                    errors += "Please enter your email address.\n";
                } else {
                    var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
                    if (!emailRegex.test(email)) {
                        errors += "Please enter a valid email address.\n";
                    }
                }

                if (message == "") {
                    errors += "Please enter your message.\n";
                }

                if (errors != "") {
                    alert(errors);
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form id="contactForm" method="post" action="submit-form.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" name="message" id="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
