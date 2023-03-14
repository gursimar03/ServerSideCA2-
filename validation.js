document.addEventListener("DOMContentLoaded", function() {
    var contactForm = document.getElementById("contactForm");
    var nameInput = document.getElementById("name");
    var emailInput = document.getElementById("email");
    var messageInput = document.getElementById("message");
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");
    var messageError = document.getElementById("messageError");
  
    contactForm.addEventListener("submit", function(event) {
      var errors = 0;
  
      if (nameInput.value == "") {
        nameInput.classList.add("is-invalid");
        nameError.innerText = "Please enter your name.";
        errors++;
      } else {
        nameInput.classList.remove("is-invalid");
        nameError.innerText = "";
      }
  
      if (emailInput.value == "") {
        emailInput.classList.add("is-invalid");
        emailError.innerText = "Please enter your email address.";
        errors++;
      } else {
        var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (!emailRegex.test(emailInput.value)) {
          emailInput.classList.add("is-invalid");
          emailError.innerText = "Please enter a valid email address.";
          errors++;
        } else {
          emailInput.classList.remove("is-invalid");
          emailError.innerText = "";
        }
      }
  
      if (messageInput.value == "") {
        messageInput.classList.add("is-invalid");
        messageError.innerText = "Please enter your message.";
        errors++;
      } else {
        messageInput.classList.remove("is-invalid");
        messageError.innerText = "";
      }
  
      if (errors > 0) {
        event.preventDefault();
      }
    });
  
    nameInput.addEventListener("input", function() {
      if (nameInput.value == "") {
        nameInput.classList.add("is-invalid");
        nameError.innerText = "Please enter your name.";
      } else {
        nameInput.classList.remove("is-invalid");
        nameError.innerText = "";
      }
    });
  
    emailInput.addEventListener("input", function() {
      var email = emailInput.value;
      var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
      if (email == "") {
        emailInput.classList.add("is-invalid");
        emailError.innerText = "Please enter your email address.";
      } else if (!emailRegex.test(email)) {
        emailInput.classList.add("is-invalid");
        emailError.innerText = "Please enter a valid email address.";
      } else {
        emailInput.classList.remove("is-invalid");
        emailError.innerText = "";
      }
    });
  
    messageInput.addEventListener("input", function() {
      if (messageInput.value == "") {
        messageInput.classList.add("is-invalid");
        messageError.innerText = "Please enter your message.";
      } else {
        messageInput.classList.remove("is-invalid");
        messageError.innerText = "";
      }
    });
  });
  