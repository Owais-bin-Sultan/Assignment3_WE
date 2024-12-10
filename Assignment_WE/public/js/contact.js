function validateForm(event) {
    // Prevent form submission
    event.preventDefault();

    // Clear any previous error or success messages
    document.getElementById("form-message").innerHTML = "";

    // Validate name (it should not be empty)
    var name = document.getElementById("name").value;
    if (name.trim() === "") {
        document.getElementById("form-message").innerHTML = "<p style='color: red;'>Name cannot be empty!</p>";
        return false;
    }

    // Validate email format
    var email = document.getElementById("email").value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        document.getElementById("form-message").innerHTML = "<p style='color: red;'>Please enter a valid email address.</p>";
        return false;
    }

    // If everything is valid, show a success message
    document.getElementById("form-message").innerHTML = "<p style='color: green;'>Your message has been successfully submitted!</p>";

    // Reset the form fields
    document.getElementById("contact-form").reset();
    return true;
}
