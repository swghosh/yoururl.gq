function adjustProgressBar(width) {
    percentagetitle.innerHTML = width;
    progressbar.style.width = width;
}

var nextSlide = function () {
    if (slidePointer === slideLimit) {
        return;
    }
    else if (slidePointer === (slideLimit - 1)) {
        nextSlideBtn.style.opacity = 0;
    }
    else {
        nextSlideBtn.style.opacity = 1;
        prevSlideBtn.style.opacity = 1;
    }
    slides[slidePointer - 1].style.opacity = 0;
    slidePointer = slidePointer + 1;
    adjustProgressBar(new Number(Math.round((slidePointer / slideLimit) * 100)).toString() + "%");
};

var prevSlide = function () {
    if (slidePointer === 1) {
        return;
    }
    else if (slidePointer === 2) {
        prevSlideBtn.style.opacity = 0;
    }
    else {
        nextSlideBtn.style.opacity = 1;
        prevSlideBtn.style.opacity = 1;
    }
    slides[slidePointer - 2].style.opacity = 1;
    slidePointer = slidePointer - 1;
    adjustProgressBar(new Number(Math.round((slidePointer / slideLimit) * 100)).toString() + "%");
};