

function reverse(arr) {
    let newArr = [];

    for (let i = arr.length-1; i >= 0 ; i--){
        newArr.push(arr[i]);
    }
    return newArr;
}

// Test Cases
console.log(reverse([1, 2, 3, 4])); // ➞ [4, 3, 2, 1]
console.log(reverse([9, 9, 2, 3, 4])); // ➞ [4, 3, 2, 9, 9]
console.log(reverse([3, 3, 3, 3])); // ➞ [3, 3, 3, 3]



const reverse2 = (arr) => {
    return arr.reverse();
}

// Test Cases
console.log(reverse2([1, 2, 3, 4])); // ➞ [4, 3, 2, 1]
console.log(reverse2([9, 9, 2, 3, 4])); // ➞ [4, 3, 2, 9, 9]
console.log(reverse2([3, 3, 3, 3])); // ➞ [3, 3, 3, 3]
