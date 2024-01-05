function showImage(src) {
    var imageElement = document.getElementById('hover-image');
    imageElement.src = src;
    document.getElementById('image-container').style.display = 'block';
}

function hideImage() {
    document.getElementById('image-container').style.display = 'none';
}

