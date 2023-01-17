//secures total price
function hashData() {
    let hashedTotalServer = CryptoJS.SHA256(total);
    let hashedTotalClient = document.getElementById("total");
}



function updatePrice(pizzaId, sizeMultiplier) {
    let basePrice = basePrices[pizzaId];
    let updatedPrice = basePrice * sizeMultiplier;
    let priceElement = document.getElementById("price-" + pizzaId);
    priceElement.innerHTML = "€" + updatedPrice.toFixed(2);
    priceElement.setAttribute("data-price", updatedPrice);
}

function calculateTotal() {
    let orderList = document.getElementsByClassName("orders-list")[0];
    let orderItems = orderList.getElementsByClassName("order-item");
    let total = 0;

    for (let i = 0; i < orderItems.length; i++) {
        let price =
            orderItems[i].getElementsByClassName("order-price")[0].innerHTML;
        price = parseFloat(price.substring(1));
        let quantity =
            orderItems[i].getElementsByClassName("order-quantity")[0].innerHTML;
        total += price * quantity;
    }
    document.getElementById("total").innerHTML = "€" + total.toFixed(2);
}

function addToOrder(pizzaId) {
    // Get the pizza image src
    let image = document.querySelector("#pizza-img-" + pizzaId).src;
    // Get the corresponding size string from the option value
    let sizeString = document.getElementById("size-" + pizzaId).options[
        document.getElementById("size-" + pizzaId).selectedIndex
    ].text;
    // Get the pizza name from the h2 element
    let pizzaName = document.querySelector("#pizza-" + pizzaId).innerHTML;
    // Get the updated price from the p element
    let price = document.getElementById("price-" + pizzaId).innerHTML;
    // Create a new div to display the pizza in the order list
    let pizzaDiv = document.createElement("div");
    pizzaDiv.classList.add("order-item");
    // Add the pizza name, size, and price as text to the div
    pizzaDiv.innerHTML =
        '<div class="order-box flex justify-between py-4">' +
        '<div class="w-1/3">' +
        '<h2 class="font-medium">' +
        pizzaName +
        "</h2>" +
        '<p class="text-m">' +
        sizeString +
        "</p>" +
        "</div>" +
        '<div class="w-2/3">' +
        '<img src="' + image + '" alt="Pizza">' +
        "</div>" +
        "</div>" +
        '<div class="flex justify-between border-b-2 py-4">' +
        '<div class="flex bg-white p-2 rounded-md shadow-md">' +
        '<button onclick="decreaseOrder(this)" class="font-semibold text-lg">-</button>' +
        '<span class="order-quantity font-semibold px-6">1</span>' +
        '<button onclick="increaseOrder(this)" class="font-semibold text-lg">+</button>' +
        "</div>" +
        '<p class="order-price font-semibold">' +
        price +
        "</p>" +
        "</div>";
    // Append the div to the orders-list element
    document.querySelector(".orders-list").appendChild(pizzaDiv);
    // Update the total price
    calculateTotal();
    //Add the quantity of the order to the cart
    updateCartQuantity(1);

    let pizza_name = document.querySelector("#pizza_name").value;
    let price2 = document.querySelector("#price").value;
    let size = document.querySelector("#size").value;
    let total_price = document.querySelector("#total").value;

    document.querySelector("input[name='pizza_name']").value = pizza_name;
    document.querySelector("input[name='price']").value = price2;
    document.querySelector("input[name='size']").value = size;
    document.querySelector("input[name='total_price']").value = total_price;
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
    let orderItem = element.closest(".order-item");
    let quantitySpan = orderItem.querySelector(".order-quantity");
    let newQuantity = parseInt(quantitySpan.innerHTML) + 1;
    let change = 1;
    quantitySpan.innerHTML = newQuantity;
    calculateTotal();
    updateCartQuantity(change);
}

// Function to decrease the quantity of an order
function decreaseOrder(element) {
    let orderItem = element.closest(".order-item");
    let quantitySpan = orderItem.querySelector(".order-quantity");
    let newQuantity = parseInt(quantitySpan.innerHTML);
    if (newQuantity > 1) {
        let change = -1;
        newQuantity--;
        quantitySpan.innerHTML = newQuantity;
        calculateTotal();
        updateCartQuantity(change);
    } else {
        // If the quantity is 1, remove the entire order from the list
        orderItem.remove();
        calculateTotal();
        updateCartQuantity(-1);
    }
}