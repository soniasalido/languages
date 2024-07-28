Create a function that returns an array of booleans from a given number by iterating through the number one digit at a time and appending true into the array if the digit is 1 and false otherwise.

Examples
integerBoolean("100101") ➞ [true, false, false, true, false, true]

integerBoolean("10") ➞ [true, false]

integerBoolean("001") ➞ [false, false, true]
Notes: Expect numbers with 0 and 1 only.


```js
const integerBoolean = n => [...n].map(a => a == 1);
```

Se declara una función flecha que recibe un número n, se convierte el número en un array y se mapea cada elemento del array, si el elemento es igual a 1 se retorna true, de lo contrario se retorna false.

## Spread Operator
El spread operator se utiliza para expandir elementos de un iterable (como un array o una cadena de texto) en lugares donde se esperan cero o más argumentos (para llamadas de función) o elementos (para arrays o literales de objeto). En este caso, se está utilizando para convertir la cadena n en un array de caracteres.


Usaremos el operador de propagación (SPREAD) para convertir el argumento n en un array de caracteres:
```js
[...n]
```

El método map se utiliza para crear un nuevo array con los resultados de aplicar una función a cada elemento del array original. En este caso, la función toma cada elemento a del array y compara si es igual a 1.
- Si a es igual a 1, la comparación a == 1 devolverá true.
- Si a no es igual a 1, la comparación a == 1 devolverá false.
```js
.map(a => a == 1);
```

