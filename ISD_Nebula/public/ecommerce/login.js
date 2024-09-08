function validatePassword() {
    var firstName = document.getElementById("firstName").value;
    var lastName = document.getElementById("lastName").value;
    var phoneNumber = document.getElementById("phone_number").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    var isValid = true;

    // Validate First Name
    if (firstName === "") {
        document.getElementById("firstNameError").innerHTML = "Please enter your first name.";
        isValid = false;
    } else {
        document.getElementById("firstNameError").innerHTML = "";
    }

    // Validate Last Name
    if (lastName === "") {
        document.getElementById("lastNameError").innerHTML = "Please enter your last name.";
        isValid = false;
    } else {
        document.getElementById("lastNameError").innerHTML = "";
    }

    // Validate Phone Number
    if (phoneNumber === "") {
        document.getElementById("phoneNumberError").innerHTML = "Please enter your phone number.";
        isValid = false;
    } else {
        document.getElementById("phoneNumberError").innerHTML = "";
    }

    // Password length check
    if (password.length < 6) {
        document.getElementById("passwordError").innerHTML = "Password must be at least 6 characters long.";
        isValid = false;
    } else {
        document.getElementById("passwordError").innerHTML = "";
    }

    // Password contains at least one number and one letter check
    var regex = /^(?=.*[A-Za-z])(?=.*\d)/;
    if (!regex.test(password)) {
        document.getElementById("passwordError").innerHTML = "Password must contain at least one letter and one number.";
        isValid = false;
    } else {
        document.getElementById("passwordError").innerHTML = "";
    }

    // Password and Confirm Password match check
    if (password !== confirmPassword) {
        document.getElementById("confirmPasswordError").innerHTML = "Passwords do not match.";
        isValid = false;
    } else {
        document.getElementById("confirmPasswordError").innerHTML = "";
    }

    return isValid;
}
