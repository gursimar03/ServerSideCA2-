// Get the form element
const form = document.getElementById('registerForm');

// Add an event listener to the form submission
form.addEventListener('submit', function(event) {
    // Prevent the form from submitting
    event.preventDefault();

    // Get the form values
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const password1 = document.getElementById('password_1').value;
    const password2 = document.getElementById('password_2').value;

    // Validate the form values
    let errors = [];

    if (username.length < 3 || username.length > 20) {
        errors.push('Username must be between 3 and 20 characters.');
        document.getElementById('usernameError').textContent = 'Username must be between 3 and 20 characters.';
    } else {
        document.getElementById('usernameError').textContent = '';
    }

    if (!email) {
        errors.push('Email is required.');
        document.getElementById('emailError').textContent = 'Email is required.';
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        errors.push('Email is invalid.');
        document.getElementById('emailError').textContent = 'Email is invalid.';
    } else {
        document.getElementById('emailError').textContent = '';
    }

    if (password1.length < 8) {
        errors.push('Password must be at least 8 characters.');
        document.getElementById('password1Error').textContent = 'Password must be at least 8 characters.';
    } else {
        document.getElementById('password1Error').textContent = '';
    }

    if (password1 !== password2) {
        errors.push('Passwords do not match.');
        document.getElementById('password2Error').textContent = 'Passwords do not match.';
    } else {
        document.getElementById('password2Error').textContent = '';
    }

    // If there are no errors, submit the form
    if (errors.length === 0) {
        form.submit();
    }
});
