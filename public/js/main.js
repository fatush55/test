document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    // var instances = M.Dropdown.init(elems, options);
});


// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.modal');
//     var instances = M.Modal.init(elems, options);
// });

// Or with jQuery

$(document).ready(function(){
    $('.modal').modal();
});

$('.delete').click(function () {
        res = confirm('Confirm Removal Document');
    if (!res) return false;
});


// Or with jQuery
$('.dropdown-trigger').dropdown();

$(() => {
    $('.alert').show(1000);

    setTimeout(()=>{
        $('.alert').hide(1000);
    },5000);

    $('#closed-btn').click(function () {
        $('.alert').hide(1000);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    // var instances = M.FormSelect.init(elems, options);
});

// Or with jQuery

$(document).ready(function(){
    $('select').formSelect();
});

$(()=>{
    CKEDITOR.replace( 'text' );
});