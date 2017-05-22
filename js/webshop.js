/* webshop.js */

$(document).ready(function () {

    /* select complet content of an input field if the type is password */
    $("input[type='password']").on("click", function () {
        $(this).select();
    });

    // set the current year to the footer
    $('#currentyear').text(new Date().getFullYear());

});