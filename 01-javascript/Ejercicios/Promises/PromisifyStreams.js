/*
Introduction: In this kata, you need to write a function to promisify a stream-like callback function.

The callback function looks like this:
callbackCaller((data) => {
  console.log(data)
})

A usual promisify function could be like this (simplified):
function promisify(callbackCaller) {
  return new Promise((resolve) => {
      callbackCaller(data => resolve(data))
  })
}

// test
let data = await promisify(callbackCaller)
But the callback may be called multiple times, and a promise can only be resolved once. In order to receive stream-like data, we need to write a promisify function to generate a promise that not only returns the data, but also generate the next promise which returns the next data with the same format. It should look like this:

let [data1, nextPromise1] = await promisify(callbackCaller)
let [data2, nextPromise2] = await nextPromise1
let [data3, nextPromise3] = await nextPromise2
// ...
Your task is to implement the promisify function which mentioned above.


Example
Here is an example to help you understand the task. You can copy the following code to your local IDE for testing:

function promisify(callbackCaller) {
  // finish code here
}

function readStream(callback) {
  for (let i = 0; i < 10; i++) {
    setTimeout(() => callback(i), i * 100)
  }
  setTimeout(() => callback(null), 1100)
}

let dataPromise = promisify(readStream)
while (true) {
  let [data, nextPromise] = await dataPromise
  if (data === null) {
    break
  } else {
    console.log('received data:', data) // should print every 100ms
    dataPromise = nextPromise
  }
}

Note
Inside the promisify, callbackCaller should be called and only called once.
You can assume that the callback is always successful. No need to call reject in the promise.
Callback in callbackCaller may not be called synchronously.
Promise should be resolved immediately once the callback is called with no delay. Don't try to collect all data at one time.

 */




function promisify(callbackCaller) {
    // finish code here
}

function readStream(callback) {
    for (let i = 0; i < 10; i++) {
        setTimeout(() => callback(i), i * 100)
    }
    setTimeout(() => callback(null), 1100)
}

let dataPromise = promisify(readStream)
while (true) {
    let [data, nextPromise] = await dataPromise
    if (data === null) {
        break
    } else {
        console.log('received data:', data) // should print every 100ms
        dataPromise = nextPromise
    }
}