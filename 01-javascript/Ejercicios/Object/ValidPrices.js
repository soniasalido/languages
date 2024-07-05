/*
There has been a masterdata issue which affected the prices of the products. Check if each product has a valid price (integer or float, and greater than or equal to zero). Products with a price of 0 are free and count as a valid price.

The return value should be a Boolean.

Examples
hasValidPrice({ "product": "Milk", price: 1.50 }) ➞ true

hasValidPrice({ "product": "Cheese", price: -1 }) ➞ false

hasValidPrice({ "product": "Eggs", price: 0 }) ➞ true

hasValidPrice({ "product": "Cereals", price: "3.0" }) ➞ false

hasValidPrice() ➞ false
 */

function hasValidPrice(product) {
    // Verificar si el objeto product está definido y tiene la propiedad price
    if (!product || product.price === undefined) {
        return false;
    }

    // Verificar si el valor de price es un número (entero o flotante) y mayor o igual a 0
    if (typeof product.price === 'number' && product.price >= 0) {
        return true;
    }

    // Si no se cumplen las condiciones anteriores, el precio no es válido
    return false;
}

// Ejemplos de uso
console.log(hasValidPrice({ "product": "Milk", price: 1.50 })); // true
console.log(hasValidPrice({ "product": "Cheese", price: -1 })); // false
console.log(hasValidPrice({ "product": "Eggs", price: 0 })); // true
console.log(hasValidPrice({ "product": "Cereals", price: "3.0" })); // false
console.log(hasValidPrice()); // false