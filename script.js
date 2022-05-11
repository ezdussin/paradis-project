const amount = document.getElementById('amount');
const unit_price = document.getElementById('unit_price');
const total = document.getElementById('total');

calculateTotal = (price) => {
    unit_price.value = price;
    total.value = Math.floor((price * amount.value) * 100) / 100;
}