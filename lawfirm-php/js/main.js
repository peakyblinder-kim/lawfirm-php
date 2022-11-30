jQuery(document).ready(function(){

"use strict"
    $('.slider').ripples({
        dropRadius: 10,
        perturbance: 0.01,
    });
    $(".text").typed({
        strings:["I LOVE CODING", "HOPE IT WORKS OUT"],
        typeSpeed:0,
        loop:true
    });
});
