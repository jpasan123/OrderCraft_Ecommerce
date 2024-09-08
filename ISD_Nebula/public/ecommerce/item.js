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

// JavaScript for image selection
// JavaScript for image selection
const mainImg = document.getElementById('MainImg');
const smallImgs = document.querySelectorAll('.small-img');

smallImgs.forEach(smallImg => {
    smallImg.addEventListener('click', () => {
        // Swap main image with clicked small image
        const tempSrc = mainImg.src;
        mainImg.src = smallImg.src;
        smallImg.src = tempSrc;
    });
});

// JavaScript for quantity input validation
const quantityInput = document.getElementById('quantity');

quantityInput.addEventListener('input', () => {
    const maxQuantity = parseInt(quantityInput.max);
    const minQuantity = parseInt(quantityInput.min);
    let quantity = parseInt(quantityInput.value);

    if (isNaN(quantity) || quantity < minQuantity) {
        quantity = minQuantity;
    } else if (quantity > maxQuantity) {
        quantity = maxQuantity;
    }

    quantityInput.value = quantity;
});
