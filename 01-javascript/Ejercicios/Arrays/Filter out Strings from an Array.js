/*
Create a function that takes an array of non-negative integers and strings and return a new array without the strings.

Examples
filterArray([1, 2, "a", "b"]) ➞ [1, 2]

filterArray([1, "a", "b", 0, 15]) ➞ [1, 0, 15]

filterArray([1, 2, "aasf", "1", "123", 123]) ➞ [1, 2, 123]
 */


const filterArray = arr =>{
    let newArr = [];
    arr.forEach( (element) => {
        typeof element === 'number' && newArr.push(element);
    });
    return newArr;
}


function filterArray2(arr) {
    return arr.filter(num => Number.isInteger(num));
}


// Test Cases
console.log(filterArray([1, 2, "a", "b"])); // ➞ [1, 2]
console.log(filterArray([1, "a", "b", 0, 15])); // ➞ [1, 0, 15]
console.log(filterArray([1, 2, "aasf", "1", "123", 123])); // ➞ [1, 2, 123]


console.log(filterArray2([1, 2, "a", "b"])); // ➞ [1, 2]
console.log(filterArray2([1, "a", "b", 0, 15])); // ➞ [1, 0, 15]
console.log(filterArray2([1, 2, "aasf", "1", "123", 123])); // ➞ [1, 2, 123]