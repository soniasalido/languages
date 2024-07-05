
/*

Sum of all Evens in a Matrix
Create a function that returns the sum of all even elements in a 2D matrix.

Examples
sumOfEvens([
  [1, 0, 2],
  [5, 5, 7],
  [9, 4, 3]
]) ➞ 6

// 2 + 4 = 6

sumOfEvens([
  [1, 1],
  [1, 1]
]) ➞ 0

sumOfEvens([
  [42, 9],
  [16, 8]
]) ➞ 66

sumOfEvens([
  [],
  [],
  []
]) ➞ 0
Notes
Submatrices will be of equal length.
Return 0 if the 2D matrix only consists of empty submatrices.


 */


function sumOfEvens(arr) {
    let sum = 0;
    for (let i = 0 ; i < arr.length ; i++) {
        for (let j = 0 ; j < arr[i].length ; j++) {
            if (arr[i][j] % 2 === 0) {
                sum += arr[i][j];
            }
        }
    }
    return sum;
}



function sumOfEvens2(arr) {
    return arr.reduce((acumulator, currentArray) => {
        return acumulator + currentArray.reduce((innerAcumulator, currentValue) => {
            if (currentValue % 2 === 0) {
                return innerAcumulator + currentValue;
            }
            return innerAcumulator;
        }, 0);
    }, 0);
}


// Test cases
console.log(sumOfEvens([
    [1, 0, 2],
    [5, 5, 7],
    [9, 4, 3]
])); // ➞ 6

console.log(sumOfEvens2([
    [1, 1],
    [1, 1]
])); // ➞ 0