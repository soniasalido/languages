# Rest Operator
El rest operator, por otro lado, se utiliza para agrupar múltiples elementos en un solo array. Es útil para manejar un número indefinido de argumentos como una sola entidad. Se utiliza en la definición de funciones y en la desestructuración de arrays u objetos.


El operador rest (...) se utiliza para recopilar múltiples elementos y combinarlos en una sola entidad, generalmente un array. Es decir, el operador rest agrupa o recoge elementos, en lugar de expandirlos.

## Uso del Rest Operator
El rest operator se utiliza principalmente en dos contextos:

1. Funciones (para agrupar argumentos): Permite a una función aceptar un número indefinido de argumentos como un array.
```js
function sum(...numbers) {
    return numbers.reduce((acc, num) => acc + num, 0);
}

sum(1, 2, 3); // 6
```
En este ejemplo, el rest operator (...numbers) agrupa todos los argumentos pasados a la función sum en un array llamado numbers.

2. Desestructuración (para agrupar elementos restantes): Se utiliza para agrupar el resto de los elementos en un array cuando se desestructura un array o un objeto.
- Desestructuración de Arrays: En este ejemplo, first toma el primer elemento del array, y rest agrupa el resto de los elementos en un nuevo array.
```js
const [first, ...rest] = [1, 2, 3, 4];
console.log(first); // 1
console.log(rest);  // [2, 3, 4]
```

- Desestructuración de Objetos: Aquí, a y b toman los valores correspondientes del objeto, y rest agrupa el resto de las propiedades en un nuevo objeto.
```js
const {a, b, ...rest} = {a: 1, b: 2, c: 3, d: 4};
console.log(a);    // 1
console.log(b);    // 2
console.log(rest); // {c: 3, d: 4}
```

