function validateForm() {
    // Retrieve form inputs
    var itemName = document.getElementById('item_name').value;
    var itemType = document.getElementById('item_type').value;
    var price = document.getElementById('price').value;
    var category = document.getElementById('category').value;
    var discount = document.getElementById('discount').value;
    var quantity = document.getElementById('quantity').value;

    // Regular expressions for validation
    var numberRegex = /^[0-9]+$/;
    var priceRegex = /^\d+(\.\d{1,2})?$/;

    // Validation checks
    if (itemName.trim() === '') {
        displayValidationMessage('Please enter Item Name.');
        return false;
    }

    if (itemType.trim() === '') {
        displayValidationMessage('Please enter Item Type.');
        return false;
    }

    if (price.trim() === '' || !price.match(priceRegex)) {
        displayValidationMessage('Please enter a valid Price.');
        return false;
    }

    if (category.trim() === '') {
        displayValidationMessage('Please select Category.');
        return false;
    }

    if (discount.trim() === '' || isNaN(discount) || discount < 0 || discount > 100) {
        displayValidationMessage('Discount should be a number between 0 and 100.');
        return false;
    }

    if (quantity.trim() === '' || !quantity.match(numberRegex)) {
        displayValidationMessage('Quantity should be a valid number.');
        return false;
    }

    // If all validations pass, return true to submit the form
    return true;
}

function displayValidationMessage(message) {
    var popupContainer = document.getElementById('popupContainer');
    popupContainer.innerHTML = '<div id="popupMessage" class="popup"><p>' + message + '</p><button onclick="closePopup()">Close</button></div>';
    popupContainer.style.display = 'block';
}

function closePopup() {
    var popupContainer = document.getElementById('popupContainer');
    popupContainer.innerHTML = ''; // Clear the content
    popupContainer.style.display = 'none'; // Hide the container
}
