/*
Function Function
Create a function that takes a number as its parameter and returns another function. The returned function must take an array of numbers as its parameter, and return an array of the numbers divided by the number that was passed into the first function.

Examples
const first = factory(15)
// returns a function first.

const arr = [30, 45, 60]
// 30 / 15 = 2, 45 / 15 = 3, 60 / 15 = 4

first(arr) ➞ [2, 3, 4]
const second = factory(2)
// returns a function second.

const arr = [2, 4, 6]
// 2 / 2 = 1, 4 / 2 = 2, 6 / 2 = 3

second(arr) ➞ [1, 2, 3]
 */


function factory(num) {
    function arr(array){
        return newArray = array.map(element => element/num);
    }
    return arr
}


//const factory = n => arr => arr.map(e => e / n);

const first = factory(15);
const arr1 = [30, 45, 60];
console.log(first(arr1)); // [2, 3, 4]
