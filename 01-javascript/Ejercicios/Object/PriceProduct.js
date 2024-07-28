/*
You will be given an object with various consumer products and their respective prices. Return a list of the products with a minimum price of 500 in descending order.
products({"Computer" : 600, "TV" : 800, "Radio" : 50}) ➞ ["TV","Computer"]

*/


const products = r => {
    let arr = [];

    // Ordenación del objeto de menor a mayor:
    const sortedEntries = Object.entries(r).sort((a, b) => b[1] - a[1]);
    const sortedObj = Object.fromEntries(sortedEntries);

    //Iteramos el objeto comprobando cuál cumple con el requisito:
    for (const [key, value] of Object.entries(sortedObj)) {
        if (value >= 500){
            arr.push(key);
        }
    }

    return arr;
}

console.log(products({"Computer" : 600, "TV" : 800, "Radio" : 50})); // ➞ ["TV","Computer"]