/* Order popup*/

function showOrders(){
    var container = document.querySelector('.bestellingen-container');
    var backdrop = document.querySelector('.backdrop');
    container.classList.toggle('show');
    backdrop.classList.toggle('show');
}
document.querySelector('.shopping-cart-icon').addEventListener('click', showOrders);
document.querySelector('.backdrop').addEventListener('click', showOrders);



/*update price van pizza door size*/

function updatePrice(pizzaId, sizeMultiplier) {
    let basePrice = basePrices[pizzaId];
    let updatedPrice = basePrice * sizeMultiplier;
    let priceElement = document.getElementById("price-" + pizzaId);
    priceElement.innerHTML = "€" + updatedPrice.toFixed(2);
    priceElement.setAttribute("data-price", updatedPrice);
}

/*
*calculate the total when add order to order-list */
function calculateTotal() {
    let orderList = document.getElementsByClassName("orders-list")[0];
    let orderItems = orderList.getElementsByClassName("order-item");
    let total = 0;

    for (let i = 0; i < orderItems.length; i++) {
        let price =
            orderItems[i].getElementsByClassName("order-price")[0].innerHTML;
        price = parseFloat(price.substring(1));
        let quantity =
            orderItems[i].getElementsByClassName("order-quantity")[0].value;
        total += price * quantity;
    }
    document.getElementById("total").innerHTML = "€" + total.toFixed(2);
}

function addToOrder(pizzaId) {

    let image = document.querySelector("#pizza-img-" + pizzaId).src;

    let sizeString = document.getElementById("size-" + pizzaId).options[
        document.getElementById("size-" + pizzaId).selectedIndex
    ].text;

    let pizzaName = document.querySelector("#pizza-" + pizzaId).innerHTML;

    let price = document.getElementById("price-" + pizzaId).innerHTML;

    let orderPizzaId = document.querySelector(".orders-list").childElementCount;
    // Create a new div to display the pizza in the order list
    let pizzaDiv = document.createElement("div");
    pizzaDiv.classList.add("order-item");
    // Add the pizza name, size, and price as text to the div
    //request data is saved in the hidden input  and is put into a dimmensional array
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
        '<button type="button" onclick="decreaseOrder(this)" class="font-semibold text-lg">-</button>' +
        '<input name="order[' + orderPizzaId + '][quantity]" class="order-quantity font-semibold px-6" value="1" style="width: 60px"/>' +
        '<button type="button" onclick="increaseOrder(this)" class="font-semibold text-lg">+</button>' +
        "</div>" +
        '<input type="hidden" id="pizzaId" name="order[' + orderPizzaId + '][pizzaId]" value="' + pizzaId + '" />' +
        '<input type="hidden" id="size" name="order[' + orderPizzaId + '][size]" value="' + sizeString + '" />' +
        '<input type="hidden" id="price" name="order[' + orderPizzaId + '][price]" value="' + price + '" />' +
        '<p class="order-price font-semibold">' +
        price +
        "</p>" +
        "</div>";

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
    let orderItem = element.closest(".order-item");
    let quantitySpan = orderItem.querySelector(".order-quantity");
    let newQuantity = parseInt(quantitySpan.value) + 1;
    let change = 1;
    quantitySpan.value = newQuantity;
    calculateTotal();
    updateCartQuantity(change);
}

// Function to decrease the quantity of an order
function decreaseOrder(element) {
    let orderItem = element.closest(".order-item");
    let quantitySpan = orderItem.querySelector(".order-quantity");
    let newQuantity = parseInt(quantitySpan.value);
    if (newQuantity > 1) {
        let change = -1;
        newQuantity--;
        quantitySpan.value = newQuantity;
        calculateTotal();
        updateCartQuantity(change);
    } else {
        // If the quantity is 1, remove the entire order from the list
        orderItem.remove();
        calculateTotal();
        updateCartQuantity(-1);
        reassignPizzaOrderIDs();
    }
}

// searches the elements and assigns the new id's to them according to the order they are in.
function reassignPizzaOrderIDs() {
    let orderListElement = document.querySelector(".orders-list");
    for (let i = 0; i < orderListElement.childElementCount; i++) {
        let orderPizzaElement = orderListElement.children[i];
        document.querySelector("#pizzaId").name = 'order[' + i + '][pizzaId]';
        document.querySelector(".order-quantity").name = 'order[' + i + '][quantity]';
        document.querySelector("#size").name = 'order[' + i + '][size]';
    }
}

//function to remove orders from the list
function removeOrder() {
    // Find all the order items
    let orderItems = document.querySelectorAll(".order-item");
    // Iterate through each order item and remove it from the orders-list element
    orderItems.forEach(function(orderItem) {
        orderItem.remove();
    });
    // Reset the total price
    document.getElementById("total").innerHTML = "€0.00";
    // Reset the cart quantity
    updateCartQuantity(-1 * document.getElementById("cart-quantity").innerHTML);
}
