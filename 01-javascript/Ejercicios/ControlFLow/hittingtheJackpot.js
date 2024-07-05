/*

Hitting the Jackpot
Create a function that takes in an array (slot machine outcome) and returns true if all elements in the array are identical, and false otherwise. The array will contain 4 elements.

Examples
testJackpot(["@", "@", "@", "@"]) ➞ true

testJackpot(["abc", "abc", "abc", "abc"]) ➞ true

testJackpot(["SS", "SS", "SS", "SS"]) ➞ true

testJackpot(["&&", "&", "&&&", "&&&&"]) ➞ false

testJackpot(["SS", "SS", "SS", "Ss"]) ➞ false

 */

function testJackpot(result) {
    let item = result[0];
    let resultado;
    result.forEach((element) =>{
        element != item ? resultado = false : resultado = true;
    })
    return resultado;
}

function testJackpot2(result) {
    return result.every(element => element === result[0]);
}

console.log(testJackpot(["@", "@", "@", "@"])); // true
console.log(testJackpot(["abc", "abc", "abc", "abc"])); // true
console.log(testJackpot(["SS", "SS", "SS", "SS"])); // true
console.log(testJackpot(["&&", "&", "&&&", "&&&&"])); // false
console.log("-----------------");
console.log(testJackpot2(["@", "@", "@", "@"])); // true
console.log(testJackpot2(["abc", "abc", "abc", "abc"])); // true
console.log(testJackpot2(["SS", "SS", "SS", "SS"])); // true
