<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <h1>Contact Us</h1>
      <form id="contactForm" method="post">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script>
      $(document).ready(function() {
        $('#contactForm').submit(function(e) {
          e.preventDefault();
          var name = $('#name').val();
          var email = $('#email').val();
          var message = $('#message').val();
          var valid = true;

          // Validate name
          if (name.trim() === '') {
            $('#name').addClass('is-invalid');
            valid = false;
          } else {
            $('#name').removeClass('is-invalid');
          }

          // Validate email
          if (email.trim() === '') {
            $('#email').addClass('is-invalid');
            valid = false;
          } else if (!validateEmail(email)) {
            $('#email').addClass('is-invalid');
            valid = false;
          } else {
            $('#email').removeClass('is-invalid');
          }

          // Validate message
          if (message.trim() === '') {
            $('#message').addClass('is-invalid');
            valid = false;
          } else {
            $('#message').removeClass('is-invalid');
          }

          // Submit form if all fields are valid
          if (valid) {
            $.ajax({
              url: 'submit-form.php',
              type: 'post',
              data: $('#contactForm').serialize(),
              success: function(response) {
                // Display success message
                $('#contactForm').replaceWith('<div class="alert alert-success">Thank you for contacting us!</div>');
              },
              error: function() {
                // Display error message
                $('#contactForm').replaceWith('<div class="alert alert-danger">An error occurred. Please try again later.</div>');
              }
            });
          }
        });

        // Validate email format
        function validateEmail(email) {
          var re = /\S+@\S+\.\S+/;
          return re.test(email);
        }
      });
    </script>
  </body>
</html>
