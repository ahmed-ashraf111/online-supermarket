let cart = $('#cart');
let total = 0;
$.ajax({
    url: "get_cart.php",
    dataType: 'JSON',
    async: false,
    success: function(data) {
        for(let i = 0; i < data.length; i++) {
            cart.append(createItem(data[i].img, data[i].name, data[i].price, data[i].qty));
            total += data[i].price * data[i].qty;
        }
    }
});

let lower = "<div id = 'lower'>";
lower += '<button class = "btn" onclick = "clear_cart()">Check out</button>';
lower += '<div id = "total-wrapper">';
lower += '<p>Total = ' + total + '$</p>';
lower += '</div>';
lower += "</div>";
cart.append(lower);
function createItem(img, name, price, qty) {
    let item = "<div class = 'item'>";
    item += "<img src = img/" + img + " height = '100px' width = '100px'>";
    item += "<p>" + name + "</p>";
    item += "<p>" + price + "$</p>";
    item += "<p>" + qty + "</p>";
    item += "</div>";
    return item;
}
function clear_cart() {
    $.ajax({
        url: "clear_cart.php",
        async: false,
        success: function() {
            location.reload();
        }
    });
}
