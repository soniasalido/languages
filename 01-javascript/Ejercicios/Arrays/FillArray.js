/*

Learn Lodash: _.fill, Fill an Array With New Values
According to the lodash documentation, _.fill Fills elements of an array with the value from start to, but not including, end. Note that this method mutates the array.

This challenge requires you to write your own version of this function without using lodash so that you can better understand it works.

Arguments
array (Array): The array to fill.
value (*): The value to fill array with.
[start=0] (number): The start position.
[end=array.length] (number): The end position.
Returns
(Array): Returns array.
Examples
var array = [1, 2, 3]

fill(array, "a") ➞ ["a", "a", "a"]

fill(Array(3), 2) ➞ [2, 2, 2]

fill([4, 6, 8, 10], "*", 1, 3) ➞ [4, "*", "*", 10]

 */


