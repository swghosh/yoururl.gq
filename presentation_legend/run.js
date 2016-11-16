var slidePointer = 1;
var slides = document.querySelectorAll('div.content');
var slideLimit = slides.length;

var progressbar = document.querySelector('div.progressbar');
var percentagetitle = document.querySelector('span.title#percentage');

var prevSlideBtn = document.querySelector('div.btnwrapper.prevslide');
var nextSlideBtn = document.querySelector('div.btnwrapper.nextslide');

document.querySelector('div.btnwrapper.prevslide div.pressbtn').onclick = prevSlide;
document.querySelector('div.btnwrapper.nextslide div.pressbtn').onclick = nextSlide;

adjustProgressBar(new Number(Math.round((slidePointer / slideLimit) * 100)).toString() + "%");