/* Order popup*/

function showOrders(){
    var container = document.querySelector('.bestellingen-container');
    var backdrop = document.querySelector('.backdrop');
    container.classList.toggle('show');
    backdrop.classList.toggle('show');
}
document.querySelector('.shopping-cart-icon').addEventListener('click', showOrders);
document.querySelector('.backdrop').addEventListener('click', showOrders);
