// Laravel Application Bootstrap
require('./bootstrap');

const $ = require( "jquery" );

// Bootstrap 5: https://getbootstrap.com/docs/5.0
const bootstrap = require('bootstrap/dist/js/bootstrap');
const WOW = require('wow.js/dist/wow.min');
require('tiny-slider/src/tiny-slider');
require('glightbox/src/js/glightbox');
require('@fortawesome/fontawesome-free/js/all');


new WOW().init();

function isElement(obj) {
    try {
        //Using W3 DOM2 (works for FF, Opera and Chrome)
        return obj instanceof HTMLElement;
    }
    catch(e){
        //Browsers not supporting W3 DOM2 don't have HTMLElement and
        //an exception is thrown and we end up here. Testing some
        //properties that all elements have (works on IE7)
        return (typeof obj==="object") &&
            (obj.nodeType===1) && (typeof obj.style === "object") &&
            (typeof obj.ownerDocument ==="object");
    }
}


const animateCSS = (element, animation, prefix = 'animate__') =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`;
        const node = document.querySelector(element);

        node.classList.add(`${prefix}animated`, animationName);

        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
            event.stopPropagation();
            node.classList.remove(`${prefix}animated`, animationName);
            resolve('Animation ended');
        }

        node.addEventListener('animationend', handleAnimationEnd, {once: true});
    });

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl,{
        template: '<div class="tooltip"><div class="tooltip-inner crystal-textbox"></div></div>'
    })
})

$(document).ready(function () {

    $('.selectBox-square').height($('.selectBox-square').width());
    $('.selectBox-square').click(function () {
        var selector = $(this).attr('target-input');
        $('.selectBox-square').removeClass('selectBox-square-selected')
        $(this).addClass('selectBox-square-selected')
        $('.selectBox-input[data-selector="'+selector+'"]').click();
    })
    $("#reviewCollapseButton").click(function () {
        $(this).toggleClass('collapsed');
        $('#collapseReview').toggleClass('show');
    })
})
