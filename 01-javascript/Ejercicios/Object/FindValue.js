/*
Learn Lodash: _.find, Find a Value in an Array or Object
According to the lodash documentation, _.find Iterates over elements of collection, returning the first element predicate returns truthy for. The predicate is invoked with three arguments: (value, index|key, collection).

Arguments
collection (Array or Object): The collection to inspect.
[predicate=_.identity] function, object, array or string
[fromIndex=0] (number): The index to search from.
Recreate lodash's _.find using vanilla JavaScript.

The difference between lodash _.find and the JavaScript find method is that the JavaScript method can only be applied to arrays and can only receive a callback function like so: array.find(d => d.isTheBest). The lodash find method can be called on both arrays and objects and can receive a function, an object, or an array which it uses to perform the search.

Like so:

_.find(array, {isTheBest: true})

_.find(array, "isBest")

_.find(array, ["isBest", true])
Examples
var users = [
  { "user": "barney",  "age": 36, "active": true },
  { "user": "fred",    "age": 40, "active": false },
  { "user": "pebbles", "age": 1,  "active": true }
]

find(users, function(o) { return o.age < 40; }) ➞ object for "barney"

find(users, { "age": 1, "active": true }) ➞ object for "pebbles"

find(users, ["active", false]) ➞ object for "fred"

find(users, "active") ➞ object for "barney"
 */

function find(collection, predicate, startIndex) {
    const _ = require('lodash');
    const result =  _.find(collection, predicate, startIndex);
    return result;
}

// Test Cases

let users = [
    { "user": "barney",  "age": 36, "active": true },
    { "user": "fred",    "age": 40, "active": false },
    { "user": "pebbles", "age": 1,  "active": true }
]

console.log(find(users, function(o) { return o.age < 40; })); // ➞ object for "barney"
console.log(find(users, { "age": 1, "active": true })); // ➞ object for "pebbles"
console.log(find(users, ["active", false])); // ➞ object for "fred"
console.log(find(users, "active")); // ➞ object for "barney"
