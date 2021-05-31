$(document).ready(function() {
});
function add(object) {
    let name = $(object).prev().html();
    $.ajax({
        url: "add_cart.php",
        method: "POST",
        data: {
            'name' : name
        }
    });
}