# OBJETOS 
Una primera forma de verlo, es como una variable especial que puede contener más variables en su interior. De esta forma, tenemos la posibilidad de organizar múltiples variables de la misma temática en el interior de un objeto.

**En JavaScript, un objeto es una colección de propiedades, y cada propiedad es una asociación entre un nombre o clave y un valor**. Las propiedades de un objeto pueden contener valores de cualquier tipo de datos, incluyendo otros objetos y funciones. 

En muchos lenguajes de programación, para crear un objeto se utiliza la palabra clave new. En Javascript también se puede hacer, pero pospondremos su uso para cuando entremos en el capítulo de Programación orientada a objetos. En Javascript, siempre que podamos, se prefiere utilizar la notación literal, una forma abreviada para crear objetos (u otros tipos de datos que veremos más adelante), sin necesidad de utilizar la palabra new.

Los objetos son datos estructurados siguiendo el formato clave-valor. A cada clave o alias lo llamamos propiedad.




## Declaración de un Objeto
Los literales de los objetos en Javascript son las llaves {}. Inicialización de objetos de forma literal, "object literals"
```
let objeto = { clave: "valor" };
const person = { name: "John" }; // {} => inicializador de objetos
```

## Propiedades de un Objeto
Las propiedades de un objeto también pueden inicializarse a partir de variables existentes
```
const name = "John";
const person = { name: name };
```

Si los nombres de la propiedad y la variable coinciden, se puede expresar de forma corta:
```
const person = { name };
```

## Accediendo a propiedades de un objeto:
Podemos acceder a sus propiedades de dos formas diferentes:
  - A través de la notación con puntos.
    ```
    console.log(person.name); // "John"
    console.log(person.lastname); // undefined
    ```
  - A través de la notación con corchetes, útil cuando la propiedad nos viene dada por una variable.
    ```
    const propName = "name";
    console.log(person[propName]); // John

    const player = {
      name: "Manz",
      life: 99,
      power: 10,
    };
    console.log(player["name"]);  // Muestra "Manz"
    ```

El programador puede utilizar la notación que más le guste. La más utilizada en Javascript suele ser la notación con puntos, mientras que la notación con corchetes se suele conocer en otros lenguajes como «arrays asociativos» o «diccionarios». OJO: Hay ciertos casos en los que sólo se puede utilizar la notación con corchetes, como por ejemplo cuando se utilizan espacios en el nombre de la propiedad. Es imposible hacerlo con la notación con puntos.

**Inciso "" para acceder a una propiedad**: console.log(player[name]);  // Dara ERROR. La notación de corchetes en JavaScript requiere que la clave sea una cadena de texto o una variable que contenga una cadena de texto. Si intentamos acceder a una propiedad de un objeto usando una variable sin comillas alrededor de su nombre, JavaScript buscará una variable con ese nombre. Si no la encuentra, generará un error.

**INCISO:** Acceso con corchetes + literal, útil para acceder a propiedades numéricas
```
const person = { name, 43: true, "3dots": true };
console.log(person[43]); // true
console.log(person["43"]); // true
console.log(person["3dots"]); // true
```

## Añadiendo nuevas propiedades:
También podemos añadir propiedades al objeto después de haberlo creado, y no sólo en el momento de crear el objeto.
```
person.lastname = "Smith";
console.log(person.lastname); // "Smith"
person[21] = "twenty one";
console.log(person["21"]); // "twenty one"
```

## Objetos anidados:
Las propiedades pueden ser a su vez otros objetos que llamaremos objetos anidados
```
person.country = { id: 5, name: "Spain" };
console.log(person.country); // { id: 5, name: "Spain" }
```

## Y también pueden ser funciones ⟶ Métodos de un Objeto
Si dentro de una variable del objeto metemos una función (o una variable que contiene una función), tendríamos lo que se denomina un método de un objeto:
```
person.greet = function () {
  console.log("Hello!");
};

console.log(person.greet); // function() { console.log("Hello!"); }
person.greet(); // logs "Hello!"
person["greet"](); // logs "Hello!"
```

Esto resulta muy similar a un concepto que veremos más adelante llamado Clase. 

## Iterando por las propiedades
⚠ Orden de aparición === orden de asignación/creación, excepto para propiedades puramente numéricas que aparecerán primero por orden ascendente.
```
for (const prop in person) {
  console.log(prop, person[prop]); 
} 
// "21"        "twenty one"
// "name"      "John"
// "greet"     function() { console.log("Hello!"); }
// "lastname"  "Smith"
// "country"   {id: 5, name: "Spain"}
```


## Borrando propiedades
```
delete person.lastname;
console.log(person.lastname); // undefined
delete person.country.id;
console.log(person.country); // { name: "Spain" }
```

## ⚠ Comparando objetos
```
const boy = { age: 15 };
console.log(boy === { age: 15 }); // ⚠⚠ false. Se comparan REFERENCIAS! NO SE COMPARA CONTENIDO!.
console.log(boy === boy); // true
console.log(boy.toString()); // [object Object]
```


## El método .toString()
Simplemente por generar una variable de tipo OBJECT, esa variable «hereda» una serie de métodos que existen en cualquier variable que sea de tipo object. Un buen ejemplo, sería el método .toString(), un método que intenta representar la información de ese objeto en un String.

Si creamos un objeto vacío y ejecutamos dicho método, comprobaremos que ocurre lo siguiente:
````
const objeto = {};
objeto.toString();    // Devuelve "[object Object]"
                      // (representación textual de un objeto genérico)
```
Observa que en ningún momento hemos añadido una función .toString() al objeto, pero aún así existe y la podemos ejecutar. Esto ocurre también con otros tipos de dato que a priori no son object, sino por ejemplo number,  boolean o regexp.



Al crear una variable de un determinado tipo de dato, la variable será siempre también de tipo object, ya que todas las variables heredan de este tipo de dato. Por lo tanto, nuestra variable tendrá:
- Los métodos que implementemos nosotros personalmente.
- Los métodos heredados de su propio tipo de dato.
- Los métodos heredados del tipo objetct.


# FORMATO JSON


-------------------------------
# ARRAYS

/*
Datos estructurados siguiendo un orden. Cada dato se identifica con un índice que indica su
posición dentro de la estructura.
*/

// Inicialización de arrays de forma literal.
const collection = ["hey", "ho", "let's go"]; // [] => Inicializador de arrays

// Accediendo a sus elementos
console.log(collection[0]); // "hey"
console.log(collection[3]); // undefined
console.log(collection.length); // 3

// Un array puede contener cualquier tipo de elemento
const mixedCollection = [1, 2, 3, "Go!", { object: true }];

// *** INCISO: Equivalencia con un objeto ... los arrays SON OBJETOS! ****************************
const collectionObject = {
  0: "hey",
  1: "ho",
  2: "let's go",
  length: 3,
};
console.log(collection, collectionObject); // Inspeccionar ambas estructuras
//************************************************************************************************

// Añadiendo elementos al array:
collection.push("yay!");
console.log(collection); // ["hey", "ho", "let's go", "yay"]
collection[4] = "nice";
console.log(collection); // ["hey", "ho", "let's go", "yay", "nice"]
console.log(collection.length); // 5

// Sparse array: Solo almacena en memoria los valores que hayan sido asignados. Es posible puesto
// que los arrays son objetos con claves numéricas, no hay reserva de memoria consecutiva.
collection[100] = "oops!";
console.log(collection); // ["hey", "ho", "let's go", "yay", "nice", empty x95, "oops!"]
console.log(collection.length); // 101

// Formas de iterar por los elementos de un array
// 1. forEach()
collection.forEach(function (item) {
  console.log(item); // "hey", "ho", "let's go", "yay", "nice", "oops!"
});

// 2. for(...)
for (let i = 0; i < collection.length; i++) {
  console.log(collection[i]); // "hey", "ho", "let's go", "yay", (x95) undefined, "oops!"
}

// 3. for..of (azúcar sintáctico para objetos iterables)
for (const item of collection) {
  console.log(item); // "hey", "ho", "let's go", "yay", (x95) undefined, "oops!"
}

// Un string, por ejemplo, implementa el patrón iterable y puede ser recorrido con for..of
for (const char of "javi") {
  console.log(char); // "j", "a", "v", "i"
}

// Comparando arrays
// ⚠ Los arrays son objetos y por tanto implementan la misma comparación que éstos:
const collection = [3];
console.log(collection === [3]); // false. Different object.
console.log(collection === collection); // true
console.log([] == ""); // true (type coertion). [].toString() => "" == ''


///-- MUTABILIDAD EN ESTRUCTURAS DE DATOS ********************************************************

/*
En javascript tenemos, principalmente, dos formas de declarar variables: "let" y "const".
Estas 2 formas diferenciadas se entenderán mejor cuando expliquemos una tercera, mediante la 
keyword "var", que se empleaba de forma primigenia hasta la llegada de "let" y "const".

Las diferencias entre ellas tienen más que ver con su ámbito y su capacidad de ser re-declaradas
y re-asigandas. Y esto último es muy importante: RE-ASIGNCIÓN.

UN ERROR COMÚN es pensar que "const" hace "constante" cualquier variable. Es decir, que "const"
de algún modo congela el valor que le hayamos asignado, no siendo posible mutarlo en la práctica.
PERO ESTO ES FALSO! "const" simplemente significa que la variable NO puede ser RE-ASIGNADA!

El motivo principal para pensar así suele venir de los valores primitivos. Al declararlos con
"const" solemos pensar: "ya no puedo cambiarlo nunca más". Pero realmente, lo que no podemos es
RE-ASIGNAR la variable declarada con "const". Los primitivos ya son no-mutables por naturaleza, 
"const" no les confiere ningún superpoder para 'congelarse'.
*/

const primitive = true;
primitive = false; // TypeError: Assignment to constant variable

/*
SIN EMBARGO, cuando declaramos con "const" estructuras de datos, si que podemos mutarlas puesto
que "const" no nos previene de ello, simplemente evita que reasignemos la variable.
*/

const list = ["hey", "ho", "let's go"];
list[2] = "yay";
console.log(list); // ["hey", "ho", "yay"]
list = []; // TypeError: Assignment to constant variable


const user = {
  name: "Adam",
  age: 12,
};
user.age = 22;
console.log(user); // {"name": "Adam", "age": 22}
user = {}; // TypeError: Assignment to constant variable
