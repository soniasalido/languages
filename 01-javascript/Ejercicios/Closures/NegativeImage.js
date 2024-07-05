/*
Negative Image
Suppose an image can be represented as a 2D array of 0s and 1s. Write a function to reverse an image. Replace the 0s with 1s and vice versa.

Examples
reverseImage([
  [1, 0, 0],
  [0, 1, 0],
  [0, 0, 1]
]) ➞ [
  [0, 1, 1],
  [1, 0, 1],
  [1, 1, 0]
]

reverseImage([
  [1, 1, 1],
  [0, 0, 0]
]) ➞ [
  [0, 0, 0],
  [1, 1, 1]
]

reverseImage([
  [1, 0, 0],
  [1, 0, 0]
]) ➞ [
  [0, 1, 1],
  [0, 1, 1]
]
 */

function reverseImage(image) {
    // Crear una nueva matriz del mismo tamaño que la original
    let reversed = [];


    for (let i = 0; i < image.length; i++) {
        // Crear una nueva fila
        let newRow = [];
        for (let j = 0; j < image[i].length; j++) {
            // Invertir el valor del elemento: 0 -> 1 y 1 -> 0
            newRow.push(image[i][j] === 0 ? 1 : 0);
        }
        // Agregar la nueva fila a la matriz invertida
        reversed.push(newRow);
    }
    return reversed;
}

// Ejemplo de uso
const originalImage = [
    [1, 0, 0],
    [0, 1, 0],
    [0, 0, 1]
];
console.log(reverseImage(originalImage));

