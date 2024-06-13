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
```
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
Buena práctica: Separar nuestro código de programación de los datos que aparecen en él.

JSON se basa en una subconjunto del lenguaje de programación JavaScript, específicamente en la notación de objetos de JavaScript, aunque es independiente del lenguaje y se utiliza ampliamente en diferentes entornos de programación. JSON son las siglas de JavaScript Object Notation. JSON es un formato ligero de datos, con una estructura (notación) específica, que es totalmente compatible de forma nativa con Javascript. Como su propio nombre indica, JSON se basa en la sintaxis que tiene Javascript para crear objetos. JSON es un formato ligero y fácil de leer para intercambiar datos. Es como una forma organizada de escribir información en forma de texto.

Además de JSON, existen otros formatos para separar datos y código, como XML, CSV, YAML, etc. La elección del formato depende de tus necesidades y preferencias.

Su contenido puede ser simplemente un array, un number, un string, un boolean o incluso un array, sin embargo, lo más habitual es que parta siendo un object o un array. Puedes comprobar en (https://jsonlint.com/) si algo concreto es un JSON válido o no.

Debemos tener mucho cuidado con las comillas mal cerradas o las comas sobrantes (antes de un cierre de llaves, por ejemplo). Suelen ser motivos de error de sintaxis frecuentemente. 


Ejemplo de JSON:
```
{
  "name": "Manz",
  "life": 3,
  "totalLife": 6
  "power": 10,
  "dead": false,
  "props": ["invisibility", "coding", "happymood"],
  "senses": {
    "vision": 50,
    "audition": 75,
    "taste": 40,
    "touch": 80
  }
}
```

## JSON vs Objetos Javascript
Si **comparamos un JSON con un objeto Javascript, aparecen algunas ligeras diferencias y matices:**
- Las propiedades del objeto deben estar entrecomilladas con «comillas dobles».
- Los textos  deben estar entrecomillados con «comillas dobles».
- Sólo se puede almacenar tipos como string, number, object, array,  boolean o null.
- Tipos de datos como Function, Date, Regexp u otros, no es posible almacenarlos en un JSON.
- Tampoco es posible añadir comentarios en un JSON.


## Métodos para convertir de Object de Javascript a JSON
- Parseo (De string a objeto): El método .parse() nos va a permitir pasar el contenido de texto string de un JSON a object. 
  - Object JSON.parse(str)	⟶ Convierte el texto str (si es un JSON válido) a un objeto y lo devuelve.
- Convertir a texto (De objeto a string): El método .stringify() nos va a permitir pasar de object de Javascript a contenido de texto string con el JSON en cuestión.
  - String JSON.stringify(obj) ⟶	Convierte un objeto obj a su representación JSON y la devuelve.
  - String JSON.stringify(obj, props)	⟶ Idem al anterior, pero filtra y mantiene solo las propiedades del  props.
  - String JSON.stringify(obj, props, spaces)	⟶ Idem al anterior, pero indenta el JSON a (number) spaces espacios.


## Métodos para convertir JSON a objeto
La acción de convertir JSON a objeto Javascript se le suele denominar parsear. Es una acción que analiza un sting que contiene un JSON válido y devuelve un objeto Javascript con dicha información correctamente estructurada. Para ello, utilizaremos el mencionado método JSON.parse():
```
const json = `{
  "name": "Manz",
  "life": 99
}`;

const user = JSON.parse(json);

user.name;  // "Manz"
user.life;  // 99
```
Como se puede ver,  user es un objeto generado a partir del JSON almacenado en la variable  json y podemos consultar sus propiedades y trabajar con ellas sin problemas.


## Métodos para convertir objeto a JSON
```
const user = {
  name: "Manz",
  life: 99,
  talk: function () {
    return "Hola!";
  },
};

JSON.stringify(user);       // '{"name":"Manz","life":99}'
```

Como las funciones no están soportadas por JSON,si intentamos convertir un objeto que contiene métodos o funciones, JSON.stringify() no fallará, pero simplemente devolverá un Sting  omitiendo las propiedades que contengan funciones (u otros tipos de datos no soportados).

Además, se le puede pasar un segundo parámetro al método .stringify(), que será un Array que actuará de filtro a la hora de generar el objeto. Observaremos el siguiente ejemplo:
```
const user = {
  name: "Manz",
  life: 99,
  power: 10,
};

JSON.stringify(user, ["life"])            // '{"life":99}'
JSON.stringify(user, ["name", "power"])   // '{"name":"Manz","power":10}'
JSON.stringify(user, [])                  // '{}'
JSON.stringify(user, null)                // '{"name":"Manz","life":99,"power":10}'
```
Observamos que el penúltimo caso, no se conserva ninguna propiedad, mientras que el último, se conserva todo.

Por último, también podemos añadir un tercer parámetro en el método .stringify() que indicará el número de espacios que quieres usar al crear el String del JSON resultante. Observa que hasta ahora, el String está minificado y aparece todo junto en la misma línea.


Veamos lo que ocurre en los siguientes casos:
```
const user = {
  name: "Manz",
  life: 99
};

JSON.stringify(user, null, 2);
// {
//   "name": "Manz",
//   "life": 99
// }

JSON.stringify(user, null, 4);
// {
//     "name": "Manz",
//     "life": 99
// }

JSON.stringify(user, ["name"], 1);
// {
//  "name": "Manz"
// }
```

En el primer caso, json2, el resultado se genera indentado a 2 espacios. En el segundo caso, json4, el resultado se genera indentado a 4 espacios. En el tercer y último caso, json1, se filtran las propiedades, dejando sólo "name" y se genera indentando a 1 espacio.


## Leyendo JSON externo
Normalmente los contenidos JSON suelen estar almacenados en un archivo externo, que habría que leer desde nuestro código Javascript. Para ello, hoy en día se suele utilizar la función fetch() para hacer peticiones a sitios que devuelven contenido JSON. También se podría leer ficheros locales con contenido .json. 


# Desestructuración de Objetos



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
