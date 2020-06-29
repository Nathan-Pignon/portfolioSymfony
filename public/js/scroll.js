// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("headerScroll").style.backgroundColor = "rgb(37, 37, 37)";
    } else {
        document.getElementById("headerScroll").style.backgroundColor = "rgb(37, 37, 37, 0)";
    }
}