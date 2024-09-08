const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })

}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })

}

document.addEventListener("DOMContentLoaded", function () {
    const leftSlider = document.querySelector('.left-slider');
    const rightSlider = document.querySelector('.right-slider');

    const leftSlides = leftSlider.querySelectorAll('.slide');
    const rightSlides = rightSlider.querySelectorAll('.slide');

    const leftDots = leftSlider.querySelectorAll('.dot');
    const rightDots = rightSlider.querySelectorAll('.dot');

    let currentIndexLeft = 0;
    let currentIndexRight = 0;
    let autoChangeTimeoutLeft;
    let autoChangeTimeoutRight;
    let isTransitioningLeft = false; // Flag to track if left slider transition is in progress
    let isTransitioningRight = false; // Flag to track if right slider transition is in progress

    const intervalLeft = 5000; // Time interval for left slider
    const intervalRight = 7000; // Time interval for right slider

    // Function to show the current slide and dot for the left slider
    function showLeftSlide(index) {
        if (isTransitioningLeft) return; // Exit if transition is already in progress
        isTransitioningLeft = true;

        leftSlides.forEach(slide => slide.style.display = "none");
        leftDots.forEach(dot => dot.classList.remove('active'));

        leftSlides[index].style.display = "block";
        leftDots[index].classList.add('active');
        currentIndexLeft = index;

        // Reset and restart the auto-change timeout for left slider
        clearTimeout(autoChangeTimeoutLeft);
        autoChangeTimeoutLeft = setTimeout(nextLeftSlide, intervalLeft);

        // Reset the transitioning flag after the transition is complete
        setTimeout(() => {
            isTransitioningLeft = false;
        }, 500); // Adjust this timeout to match your transition duration
    }

    // Function to show the current slide and dot for the right slider
    function showRightSlide(index) {
        if (isTransitioningRight) return; // Exit if transition is already in progress
        isTransitioningRight = true;

        rightSlides.forEach(slide => slide.style.display = "none");
        rightDots.forEach(dot => dot.classList.remove('active'));

        rightSlides[index].style.display = "block";
        rightDots[index].classList.add('active');
        currentIndexRight = index;

        // Reset and restart the auto-change timeout for right slider
        clearTimeout(autoChangeTimeoutRight);
        autoChangeTimeoutRight = setTimeout(nextRightSlide, intervalRight);

        // Reset the transitioning flag after the transition is complete
        setTimeout(() => {
            isTransitioningRight = false;
        }, 500); // Adjust this timeout to match your transition duration
    }

    // Initial display
    showLeftSlide(currentIndexLeft);
    showRightSlide(currentIndexRight);

    // Function to move to the next slide for left slider
    function nextLeftSlide() {
        currentIndexLeft = (currentIndexLeft + 1) % leftSlides.length;
        showLeftSlide(currentIndexLeft);
    }

    // Function to move to the previous slide for left slider
    function prevLeftSlide() {
        currentIndexLeft = (currentIndexLeft - 1 + leftSlides.length) % leftSlides.length;
        showLeftSlide(currentIndexLeft);
    }

    // Function to move to the next slide for right slider
    function nextRightSlide() {
        currentIndexRight = (currentIndexRight + 1) % rightSlides.length;
        showRightSlide(currentIndexRight);
    }

    // Function to move to the previous slide for right slider
    function prevRightSlide() {
        currentIndexRight = (currentIndexRight - 1 + rightSlides.length) % rightSlides.length;
        showRightSlide(currentIndexRight);
    }

    // Event listeners for arrow buttons of left slider
    leftSlider.querySelector('.left-arrow').addEventListener('click', function () {
        clearInterval(autoChangeTimeoutLeft);
        prevLeftSlide();
        autoChangeTimeoutLeft = setTimeout(nextLeftSlide, intervalLeft);
    });
    leftSlider.querySelector('.right-arrow').addEventListener('click', function () {
        clearInterval(autoChangeTimeoutLeft);
        nextLeftSlide();
        autoChangeTimeoutLeft = setTimeout(nextLeftSlide, intervalLeft);
    });

    // Event listeners for arrow buttons of right slider
    rightSlider.querySelector('.left-arrow').addEventListener('click', function () {
        clearInterval(autoChangeTimeoutRight);
        prevRightSlide();
        autoChangeTimeoutRight = setTimeout(nextRightSlide, intervalRight);
    });
    rightSlider.querySelector('.right-arrow').addEventListener('click', function () {
        clearInterval(autoChangeTimeoutRight);
        nextRightSlide();
        autoChangeTimeoutRight = setTimeout(nextRightSlide, intervalRight);
    });

    // Event listeners for dots of left slider
    leftDots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            clearInterval(autoChangeTimeoutLeft);
            showLeftSlide(index);
            autoChangeTimeoutLeft = setTimeout(nextLeftSlide, intervalLeft);
        });
    });

    // Event listeners for dots of right slider
    rightDots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            clearInterval(autoChangeTimeoutRight);
            showRightSlide(index);
            autoChangeTimeoutRight = setTimeout(nextRightSlide, intervalRight);
        });
    });

    // Automatically change slides for left slider every intervalLeft milliseconds
    autoChangeTimeoutLeft = setTimeout(nextLeftSlide, intervalLeft);

    // Automatically change slides for right slider every intervalRight milliseconds
    autoChangeTimeoutRight = setTimeout(nextRightSlide, intervalRight);
});


document.addEventListener("DOMContentLoaded", function () {
    var dropdown = document.querySelector('.dropdown');
    var dropdownMenu = dropdown.querySelector('.dropdown-menu');
    var timeoutId;

    dropdown.addEventListener('mouseenter', function () {
        clearTimeout(timeoutId);
        dropdownMenu.style.display = 'block';
    });

    dropdown.addEventListener('mouseleave', function () {
        timeoutId = setTimeout(function () {
            dropdownMenu.style.display = 'none';
        }, 500);
    });

    // Close dropdown menu if mouse leaves the navbar
    dropdown.closest('section').addEventListener('mouseleave', function () {
        clearTimeout(timeoutId);
        dropdownMenu.style.display = 'none';
    });
});

document.getElementById('add_item_form').addEventListener('submit', function (event) {
    var price = document.getElementById('price').value;
    var discount = document.getElementById('discount').value;
    var quantity = document.getElementById('quantity').value;
    var main_img = document.getElementById('main_img').value;
    
    // Ensure main image is provided
    if (main_img === '') {
        displayErrorPopup('Please upload a main image.');
        event.preventDefault();
        return false;
    }

    // Ensure price is a valid number
    if (isNaN(parseFloat(price)) || !isFinite(price) || price <= 0) {
        displayErrorPopup('Please enter a valid price.');
        event.preventDefault();
        return false;
    }

    // Ensure discount is a valid number between 0 and 100
    if (discount !== '' && (isNaN(parseFloat(discount)) || !isFinite(discount) || discount < 0 || discount > 100)) {
        displayErrorPopup('Please enter a valid discount percentage (between 0 and 100).');
        event.preventDefault();
        return false;
    }

    // Ensure quantity is a positive integer
    if (isNaN(parseInt(quantity)) || quantity <= 0) {
        displayErrorPopup('Please enter a valid quantity.');
        event.preventDefault();
        return false;
    }

    return true;
});

function displayErrorPopup(message) {
    var popup = document.createElement('div');
    popup.classList.add('error-popup');
    popup.innerHTML = '<div class="popup-content">' + message + '</div><button onclick="closePopup()" class="popup-close">OK</button>';
    document.body.appendChild(popup);
}

function closePopup() {
    var popup = document.querySelector('.error-popup');
    if (popup) {
        popup.remove();
    }
}



// external.js

function confirmDelete(itemId) {
    var modal = document.getElementById("deleteModal");
    modal.style.display = "block";

    var confirmBtn = document.getElementById("confirmDeleteBtn");
    var cancelBtn = document.getElementById("cancelDeleteBtn");

    confirmBtn.onclick = function () {
        document.getElementById('delete-form-' + itemId).submit();
        modal.style.display = "none";
    }

    cancelBtn.onclick = function () {
        modal.style.display = "none";
    }
}
