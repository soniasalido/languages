/*
Write a function that converts an object into an array, where each element represents a key-value pair in the form of an array.

Examples
toArray({ a: 1, b: 2 }) ➞ [["a", 1], ["b", 2]]

toArray({ shrimp: 15, tots: 12 }) ➞ [["shrimp", 15], ["tots", 12]]

toArray({}) ➞ []
 */

const toArray = obj => {
    return Object.entries(obj);
}


const toArray2 = obj => {
    let arr = [];
    let element = [];

    Object.keys(obj).forEach(key => {
        element = [key , obj[key]];
        arr.push(element);
    });

    return arr;
}

// Test Cases
console.log(toArray({ a: 1, b: 2 })); // ➞ [["a", 1], ["b", 2]]
console.log(toArray({ shrimp: 15, tots: 12 })); // ➞ [["shrimp", 15], ["tots", 12]]
console.log(toArray({}), [])


console.log(toArray2({ a: 1, b: 2 })); // ➞ [["a", 1], ["b", 2]]
console.log(toArray2({ shrimp: 15, tots: 12 })); // ➞ [["shrimp", 15], ["tots", 12]]
console.log(toArray2({}), [])