
function createGallery() {
    const gallery = document.querySelector('.gallery-images');

    for (let i = 1; i <= 8; i++) {
        const image = document.createElement('picture');
        image.innerHTML = `
        <source srcset="build/img/gallery/g${i}.avif" type="image/avif">
        <source srcset="build/img/gallery/g${i}.webp" type="image/webp">
        <img loading="lazy" width="200" height="300" src="build/img/gallery/g${i}.jpeg" alt="image jpg">
        `;
        image.onclick = function() { //callback
            showImage(i);
        }
        gallery.appendChild(image);
    }
}

function showImage(imageID) {
    const image = document.createElement('picture');
    image.innerHTML = `
    <source srcset="build/img/gallery/g${imageID}.avif" type="image/avif">
    <source srcset="build/img/gallery/g${imageID}.webp" type="image/webp">
    <img loading="lazy" width="200" height="300" src="build/img/gallery/g${imageID}.jpeg" alt="image jpg">
    `;

    const overlay = document.createElement('DIV');
    overlay.appendChild(image);
    overlay.classList.add('overlay');
    overlay.onclick = function() {
        const body = document.querySelector('body');
        body.classList.remove('body-fixed');
        overlay.remove();
    }

    const closeImage = document.createElement('P');
    closeImage.textContent = 'X';
    closeImage.classList.add('btn-close');
    closeImage.onclick = function() {
        const body = document.querySelector('body');
        body.classList.remove('body-fixed');
        overlay.remove();
    };
    overlay.appendChild(closeImage);

    const body = document.querySelector('body');
    body.appendChild(overlay);
    body.classList.add('body-fixed');
}

