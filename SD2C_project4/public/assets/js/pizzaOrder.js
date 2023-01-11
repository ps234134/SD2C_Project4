function showPopup() {
    alert("test");
}

var orderTest = {
    name: "Pizza",
    price: 12.99,
    quantity: 2
};

function displayOrder() {
    var orderBox = document.createElement("div");
    orderBox.className = "order-box";
    orderBox.innerHTML =
        '<div class="order-header">' +
        ' Your Order' +
        '</div>' +
        '<div class="order-content">' +

        '<ul>' +
        '<li>' + orderTest.name + ' : ' + orderTest.quantity + '</li>' +
        '</ul>' +
        '<p>Total: $' + orderTest.price * orderTest.quantity + '</p>' +
        '</div>';
    var parentElem = document.getElementById("order");
    // Append the order box to the parent element
    parentElem.appendChild(orderBox);
}