/*

Odd Up, Even Down — N Times
Create a function that performs an even-odd transform to an array, n times. Each even-odd transformation:

Adds two (+2) to each odd integer.
Subtracts two (-2) from each even integer.
Examples
evenOddTransform([3, 4, 9], 3) ➞ [9, -2, 15]
// Since [3, 4, 9] => [5, 2, 11] => [7, 0, 13] => [9, -2, 15]

evenOddTransform([0, 0, 0], 10) ➞ [-20, -20, -20]

evenOddTransform([1, 2, 3], 1) ➞ [3, 0, 5]

 */

function evenOddTransform(arr, n) {
    for (let i = 0 ; i < arr.length ; i++){
        arr[i] = arr[i] % 2 === 0 ? arr[i] - 2 * n : arr[i] + 2 * n;
    }
    return arr;
}




function evenOddTransform2(arr, n) {
    return arr.map(element => {
        if (element % 2 === 0) {
            // Si es par, restamos 2 * n
            return element - (2 * n);
        } else {
            // Si es impar, sumamos 2 * n
            return element + (2 * n);
        }
    });
}


// Si pasamos a funcion felcha:
function evenOddTransform3(arr, n) {
    return arr.map(element => {
        return element % 2 === 0 ? element -(2 * n) : element +(2 * n);
    });
}


// Test cases
console.log(evenOddTransform([3, 4, 9], 3)); // ➞ [9, -2, 15]
console.log(evenOddTransform([0, 0, 0], 10)); // ➞ [-20, -20, -20]


console.log(evenOddTransform3([3, 4, 9], 3)); // ➞ [9, -2, 15]
console.log(evenOddTransform3([0, 0, 0], 10)); // ➞ [-20, -20, -20]