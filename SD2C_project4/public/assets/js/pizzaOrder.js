
var orderTest = {
    name: "Pizza",
    price: 12.99,
    quantity: 2
};

// function displayOrder() {
//     var orderBox = document.createElement("div");
//     orderBox.className = "order-box";
//     orderBox.innerHTML =
//         '<div class="order-header">' +
//         ' Your Order' +
//         '</div>' +
//         '<div class="order-content">' +

//         '<ul>' +
//         '<li>' + orderTest.name + ' : ' + orderTest.quantity + '</li>' +
//         '</ul>' +
//         '<p>Total: $' + orderTest.price * orderTest.quantity + '</p>' +
//         '</div>';
//     var parentElem = document.getElementById("order");
//     // Append the order box to the parent element
//     parentElem.appendChild(orderBox);
// }
/* Update price by size*/
function updatePrice(pizzaId, sizeMultiplier) {
    let basePrice = basePrices[pizzaId];
    let updatedPrice = basePrice * sizeMultiplier;
    document.getElementById("price-" + pizzaId).innerHTML = "€" + updatedPrice.toFixed(2);
    // Save the updated price for each pizza in a new object
    let pizza = {
        price: updatedPrice,
        size: sizeMultiplier
    };
}

// Function to calculate the total price of the order
function calculateTotal() {
    let orderList = document.getElementsByClassName("orders-list")[0];
    let orderItems = orderList.getElementsByTagName("div");
    let total = 0;

    for (let i = 0; i < orderItems.length; i++) {
        let price = orderItems[i].innerHTML.split(" - ")[2];
        price = parseFloat(price.substring(1));
        let quantity = orderItems[i].getElementsByClassName("order-quantity")[0].innerHTML;
        total += price * quantity;
    }
    document.getElementById("total").innerHTML = "€" + total.toFixed(2);
}


// Function to add a pizza to the order list
function addToOrder(pizzaId) {
    // Get the selected size from the select element
    let size = document.getElementById("size-" + pizzaId).value;
    // Get the corresponding size string from the option value
    let sizeString = document.getElementById("size-" + pizzaId).options[document.getElementById("size-" + pizzaId).selectedIndex].text;
    // Get the pizza name from the h2 element
    let pizzaName = document.querySelector("#pizza-" + pizzaId).innerHTML;
    // Get the updated price from the p element
    let price = document.getElementById("price-" + pizzaId).innerHTML;
    // Create a new div to display the pizza in the order list
    let pizzaDiv = document.createElement("div");
    // Add the pizza name, size, and price as text to the div
    pizzaDiv.innerHTML = pizzaName + " - " + sizeString + " - " + price + '<br>'+
    //Create a button to increase the amount of the order
    '<button onclick="increaseOrder(this)">+</button>'+
    '<span class="order-quantity">1</span>'+
    '<button onclick="decreaseOrder(this)">-</button>';
    // Append the div to the orders-list element
    document.querySelector(".orders-list").appendChild(pizzaDiv);
    // Update the total price
    calculateTotal();

    //Add the quantity of the order to the cart
    updateCartQuantity(1);
}

// Function to update the quantity of items in the cart
function updateCartQuantity(quantity) {
    let cartQuantity = document.getElementById("cart-quantity");
    if (quantity > 0) {
        cartQuantity.innerHTML = parseInt(cartQuantity.innerHTML) + quantity;
    } else if (quantity < 0) {
        cartQuantity.innerHTML = parseInt(cartQuantity.innerHTML) + quantity;
    }
}

// Function to increase the quantity of an order
function increaseOrder(element) {
    let quantitySpan = element.nextElementSibling;
    let newQuantity = parseInt(quantitySpan.innerHTML) + 1;
    let change = 1;
    quantitySpan.innerHTML = newQuantity;
    calculateTotal();
    updateCartQuantity(change);
}

// Function to decrease the quantity of an order
function decreaseOrder(element) {
    let quantitySpan = element.previousElementSibling;
    let newQuantity = parseInt(quantitySpan.innerHTML);
    if (newQuantity > 1) {
        let change = -1;
        newQuantity--;
        quantitySpan.innerHTML = newQuantity;
        calculateTotal();
        updateCartQuantity(change);
    } else {
        // If the quantity is 1, remove the entire order from the list
        let pizzaDiv = element.parentNode;
        pizzaDiv.remove();
        calculateTotal();
        updateCartQuantity(-1);
    }
}
