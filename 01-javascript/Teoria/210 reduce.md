# El metodo reduce
El método reduce en JavaScript se utiliza para **reducir una array a un solo valor, aplicando una función a un acumulador y cada valor de la array (de izquierda a derecha) para reducirlo a un solo valor.** Es una herramienta muy poderosa para realizar operaciones agregadas, como la suma de todos los elementos de un array, la concatenación de todos los strings, etc.

## Sintaxis
```
array.reduce(callback(accumulator, currentValue[, index[, array]])[, initialValue])
```

- callback: Función que se ejecuta en cada elemento del array, recibiendo cuatro argumentos:
  - accumulator: El acumulador que acumula el valor devuelto por el callback.
  - currentValue: El elemento actual que se está procesando en el array.
  - index (opcional): El índice del elemento actual que se está procesando.
  - array (opcional): El array sobre el cual se está llamando reduce.
  - initialValue (opcional): Un valor a usar como primer argumento de la primera llamada al callback.
 
## Ejemplos

### 1. Sumar todos los números de un array
```
const numbers = [1, 2, 3, 4, 5];

const sum = numbers.reduce((accumulator, currentValue) => {
    return accumulator + currentValue;
}, 0);

console.log(sum); // 15
```

- En este ejemplo:
  - accumulator comienza en 0 (el valor de initialValue).
  - En cada iteración, se suma currentValue al accumulator.
  - Finalmente, reduce devuelve la suma de todos los números.

 ### 2. Aplanar un array de arrays
```
const arrays = [[1, 2], [3, 4], [5, 6]];

const flattened = arrays.reduce((accumulator, currentValue) => {
    return accumulator.concat(currentValue);
}, []);

console.log(flattened); // [1, 2, 3, 4, 5, 6]
```
- En este ejemplo:
  - accumulator comienza como un array vacío [].
  - En cada iteración, se concatena currentValue al accumulator.
  - Finalmente, reduce devuelve un array aplanado.


### 3. Contar la frecuencia de elementos en un array
```
const fruits = ['apple', 'banana', 'orange', 'apple', 'orange', 'banana', 'banana'];

const fruitCount = fruits.reduce((accumulator, currentValue) => {
    if (!accumulator[currentValue]) {
        accumulator[currentValue] = 1;
    } else {
        accumulator[currentValue]++;
    }
    return accumulator;
}, {});

console.log(fruitCount); 
// { apple: 2, banana: 3, orange: 2 }
```

- En este ejemplo:
  - accumulator comienza como un objeto vacío {}.
  - En cada iteración, se incrementa el contador para el currentValue en el accumulator.
  - Finalmente, reduce devuelve un objeto con la frecuencia de cada elemento en el array.

### 4. Hurdle Jump
Create a function that takes an array of hurdle heights and a jumper's jump height, and determine whether or not the hurdler can clear all the hurdles. A hurdler can clear a hurdle if their jump height is greater than or equal to the hurdle height.
```
Examples
hurdleJump([1, 2, 3, 4, 5], 5) ➞ true

hurdleJump([5, 5, 3, 4, 5], 3) ➞ false

hurdleJump([5, 4, 5, 6], 10) ➞ true

hurdleJump([1, 2, 1], 1) ➞ false
```
Para resolver el problema de determinar si un saltador puede superar todas las vallas de una carrera utilizando el método reduce, podemos seguir estos pasos:
- Crear una función que tome dos argumentos: un array de alturas de vallas y la altura del salto del saltador.
- Utilizar el método reduce para recorrer las alturas de las vallas y verificar si todas las vallas pueden ser superadas por el saltador.
- Devolver true si todas las vallas pueden ser superadas, de lo contrario, devolver false.

```
function hurdleJump(hurdles, jumpHeight) {
    return hurdles.reduce((canClearAll, hurdle) => {
        return canClearAll && (jumpHeight >= hurdle);
    }, true);
}

// Ejemplos de uso:
console.log(hurdleJump([1, 2, 3, 4, 5], 5)); // true
console.log(hurdleJump([5, 5, 3, 4, 5], 3)); // false
console.log(hurdleJump([5, 4, 5, 6], 10)); // true
console.log(hurdleJump([1, 2, 1], 1)); // false
```
