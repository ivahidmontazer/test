$(document).ready(function(){
    $('form#create').on('submit', function(e){
        e.preventDefault();
        $.post('api/products', {'name': $('[name="name"]').val(), 'price': $('[name="price"]').val(), 'quantity': $('[name="quantity"]').val()}).done(function() {
            alert("Product was added!");
        });;
    });
});