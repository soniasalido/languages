
# Biblioteca Lodash
Lodash es una biblioteca de JavaScript que proporciona utilidades para trabajar con matrices, números, objetos, cadenas, entre otras estructuras de datos. Es especialmente útil para simplificar y hacer más eficiente el trabajo con colecciones de datos y operaciones comunes. Según la documentación oficial de Lodash, esta biblioteca ofrece una serie de características destacadas:
- Utilidades para matrices: Incluye funciones para manipular y transformar matrices de manera eficiente, como:
  - _.drop: Elimina los primeros elementos de una matriz.
  - _map: Crea una matriz con los resultados de aplicar una función a cada elemento de una matriz.
  - _filter: Filtra los elementos de una matriz según una condición.
  - _reduce: Reduce una matriz a un solo valor aplicando una función acumuladora.
  - _find: Encuentra el primer elemento que cumple una condición.
  - _dropRight: Elimina los elementos finales de una matriz.
  - _dropRight: Elimina los elementos finales de una matriz.
  - _.compact: Elimina los valores falsy de una matriz.
  - _.flatten: Aplana una matriz anidada.
  - _.pull: Elimina los elementos especificados de una matriz.
  - _.concat: Agregar elementos a un array sin modificar el array original. Crea un nuevo array concatenando el array original con los nuevos elementos.
  - reverse: Invierte el orden de los elementos de un array. Muta el array.

- Manipulación de objetos: Ofrece herramientas para trabajar con objetos, incluyendo funciones como:
  - assign: Combina las propiedades de uno o más objetos en un objeto de destino.
  - clone: Crea una copia superficial de un objeto.
  - merge: Fusiona dos o más objetos en un objeto de destino.
  - get: Obtiene el valor de una propiedad anidada de un objeto.
  - set: Establece el valor de una propiedad anidada de un objeto.
  - isEqual: Compara dos valores para determinar si son iguales.

- Manipulación de cadenas: Proporciona métodos para trabajar con cadenas de texto, incluyendo:
  - camelCase: Convierte una cadena en formato camelCase.
  - capitalize: Capitaliza la primera letra de una cadena.
  - deburr: Elimina los acentos y diacríticos de una cadena.
  - escape: Escapa los caracteres especiales de una cadena.
  - kebabCase: Convierte una cadena en formato kebab-case.
  - lowerCase: Convierte una cadena en minúsculas.
  - trim: Elimina los espacios en blanco al principio y al final de una cadena.

- Utilidades para números: Incluye funciones para operaciones matemáticas y de precisión, como:
  - clamp: Limita un número dentro de un rango específico.
  - inRange: Comprueba si un número está dentro de un rango específico.
  - random: Genera un número aleatorio dentro de un rango específico.

- Funcionalidad general: Proporciona métodos generales como:
  - identity: Devuelve el primer argumento que recibe.
  - constant: Devuelve una función que siempre devuelve el mismo valor.
  - noop: No hace nada y devuelve undefined.
  - times: Ejecuta una función un número específico de veces.
  - uniqueId: Genera un identificador único.

- Funciones para colecciones: Ofrece herramientas para manejar y operar sobre colecciones de datos, tanto matrices como objetos, con funciones como:
  - each: Itera sobre una colección y aplica una función a cada elemento.
  - map: Crea una nueva colección aplicando una función a cada elemento.
  - reduce: Reduce una colección a un solo valor aplicando una función acumuladora.
  - filter: Filtra los elementos de una colección según una condición.
  - groupBy: Agrupa los elementos de una colección según una clave.
  - orderBy: Ordena los elementos de una colección según un criterio.
  - sortBy: Ordena los elementos de una colección según una clave.

- Funciones de alto rendimiento: Está diseñada para ser rápida y eficiente, optimizando muchas operaciones comunes para mejorar el rendimiento de las aplicaciones.

- Compatibilidad y modularidad: Lodash es compatible con una amplia gama de navegadores y entornos de JavaScript. Además, permite importar solo las partes de la biblioteca que se necesiten, reduciendo así el tamaño del código y mejorando el rendimiento de la aplicación.



# Estructuras de datos en JS
JavaScript ofrece varias estructuras de datos incorporadas que son esenciales para la manipulación y gestión de datos. Estas estructuras de datos incluyen arrays, objetos, sets, maps, y sus variantes débiles como WeakSet y WeakMap. A continuación, se describen estas estructuras de datos y sus principales características.

1. Objetos
2. Arrays.
3. Sets.
4. Maps.
5. WeakSets.
6. WeakMaps

---------------------
# 1. OBJETOS 
Una primera forma de verlo, es como una variable especial que puede contener más variables en su interior. De esta forma, tenemos la posibilidad de organizar múltiples variables de la misma temática en el interior de un objeto.

**En JavaScript, un objeto es una colección de propiedades, y cada propiedad es una asociación entre un nombre o clave y un valor**. Las propiedades de un objeto pueden contener valores de cualquier tipo de datos, incluyendo otros objetos y funciones. 

En muchos lenguajes de programación, para crear un objeto se utiliza la palabra clave new. En Javascript también se puede hacer, pero pospondremos su uso para cuando entremos en el capítulo de Programación orientada a objetos. En Javascript, siempre que podamos, se prefiere utilizar la notación literal, una forma abreviada para crear objetos (u otros tipos de datos que veremos más adelante), sin necesidad de utilizar la palabra new.

Los objetos son datos estructurados siguiendo el formato clave-valor. A cada clave o alias lo llamamos propiedad.




## Declaración de un Objeto
Los literales de los objetos en Javascript son las llaves {}. Inicialización de objetos de forma literal, "object literals"
```js
let objeto = { clave: "valor" };
const person = { name: "John" }; // {} => inicializador de objetos
```

## Propiedades de un Objeto
Las propiedades de un objeto también pueden inicializarse a partir de variables existentes
```js
const name = "John";
const person = { name: name };
```

Si los nombres de la propiedad y la variable coinciden, se puede expresar de forma corta:
```js
const person = { name };
```

## Accediendo a propiedades de un objeto:
Podemos acceder a sus propiedades de dos formas diferentes:
  - A través de la notación con puntos.
    ```js
    console.log(person.name); // "John"
    console.log(person.lastname); // undefined
    ```
  - A través de la notación con corchetes, útil cuando la propiedad nos viene dada por una variable.
    ```js
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
```js
const person = { name, 43: true, "3dots": true };
console.log(person[43]); // true
console.log(person["43"]); // true
console.log(person["3dots"]); // true
console.log(person[3dots]); // ERROR
```

## Añadiendo nuevas propiedades:
También podemos añadir propiedades al objeto después de haberlo creado, y no sólo en el momento de crear el objeto.
```js
person.lastname = "Smith";
console.log(person.lastname); // "Smith"
person[21] = "twenty one";
console.log(person["21"]); // "twenty one"
```

## Objetos anidados:
Las propiedades pueden ser a su vez otros objetos que llamaremos objetos anidados
```js
person.country = { id: 5, name: "Spain" };
console.log(person.country); // { id: 5, name: "Spain" }
```

## Y también pueden ser funciones ⟶ Métodos de un Objeto
Si dentro de una variable del objeto metemos una función (o una variable que contiene una función), tendríamos lo que se denomina un método de un objeto:
```js
person.greet = function () {
  console.log("Hello!");
};

console.log(person.greet); // function() { console.log("Hello!"); }
person.greet(); // logs "Hello!"
person["greet"](); // logs "Hello!"
```

Esto resulta muy similar a un concepto que veremos más adelante llamado Clase. 

## Iterar un Objeto
Iterador es un término que se suele referir a algo que te permite recorrer una estructura de datos por todos sus apartados o miembros. En muchos casos, se presenta la situación en la que necesitamos recorrer un objeto, a través de las propiedades de su estructura, como si fueran los elementos de un array.

Existen unos **métodos denominados Object.keys(), Object.values() y Object.entries()** que nos van a permitir realizar esta tarea. En primer lugar, observa que son métodos de una Clase estática, por lo que tienes que escribir siempre el Object. y no ejecutar el método sobre el objeto en sí, como solemos hacerlo.

| Método |	Descripción |
| ---- | ---- |
| Object.keys(obj)  | Itera el objeto y **devuelve un array con las claves (propiedades) del objeto.** |
| Object.values(obj) | Itera el objeto y **devuelve un array con los valores de sus propiedades.**  |
| Object.entries(obj) | Itera el objeto y **devuelve un array con los pares [key, valor].**  |
| Object.fromEntries(array)  | Itera el objeto y **devuelve un objeto con un array de pares [key, valor].**  |


### 1. Iterar un Objeto por sus propiedades con For...in
⚠ Orden de aparición === orden de asignación/creación, excepto para propiedades puramente numéricas que aparecerán primero por orden ascendente.
```js
for (const prop in person) {
  console.log(prop, person[prop]); 
} 
// "21"        "twenty one"
// "name"      "John"
// "greet"     function() { console.log("Hello!"); }
// "lastname"  "Smith"
// "country"   {id: 5, name: "Spain"}
```


### 2. Iterar un objeto con Object.values()
El método Object.values() devuelve un array de los valores de las propiedades enumerables de un objeto.
```js
const obj = { a: 1, b: 2, c: 3 };

Object.values(obj).forEach(value => {
  console.log(value);
});
```

### 3. Iterar un objeto con Object.keys()
El método Object.keys() devuelve un array de las propias propiedades enumerables de un objeto, y luego podemos usar forEach o un bucle for...of para iterar sobre ellas.
```js
const obj = { a: 1, b: 2, c: 3 };

Object.keys(obj).forEach(key => {
  console.log(key, obj[key]);
});
```

### 4. Iterar un objeto con For...of
El bucle for...of se utiliza para recorrer objetos iterables (como arrays, strings, maps, sets, etc.) y también se puede utilizar para recorrer las propiedades de un objeto si se utiliza Object.entries() para convertir el objeto en un array de pares clave-valor.
```js
const obj = { a: 1, b: 2, c: 3 };

for (const [key, value] of Object.entries(obj)) {
  console.log(key, value);
}
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


## El método .toString() de un objeto
Simplemente por generar una variable de tipo OBJECT, esa variable «hereda» una serie de métodos que existen en cualquier variable que sea de tipo object. Un buen ejemplo, sería el método .toString(), un método que intenta representar la información de ese objeto en un String.

Si creamos un objeto vacío y ejecutamos dicho método, comprobaremos que ocurre lo siguiente:
```
const objeto = {};
objeto.toString();    // Devuelve "[object Object]"
                      // (representación textual de un objeto genérico)
```
Observamos que en ningún momento hemos añadido una función .toString() al objeto, pero aún así existe y la podemos ejecutar. Esto ocurre también con otros tipos de dato que a priori no son object, sino por ejemplo number,  boolean o regexp.



Al crear una variable de un determinado tipo de dato, la variable será siempre también de tipo object, ya que todas las variables heredan de este tipo de dato. Por lo tanto, nuestra variable tendrá:
- Los métodos que implementemos nosotros personalmente.
- Los métodos heredados de su propio tipo de dato.
- Los métodos heredados del tipo objetct.

Cuando se dice que "todas las variables heredan del tipo Object", se refiere a que todos los objetos y tipos compuestos en JavaScript tienen Object como su prototipo base. Sin embargo, esto no aplica directamente a los tipos primitivos de la misma manera. Los objetos (Object, Array, Function, etc.) son tipos de datos que realmente heredan de Object.

En JavaScript, no todas las variables son objetos, pero todas las variables pueden interactuar con métodos de objetos gracias a los wrappers temporales que JavaScript proporciona para tipos primitivos y la herencia prototípica para objetos. Esta es una poderosa característica de JavaScript que permite tratar casi todo como un objeto cuando es necesario.

## Desestructuración de Objetos
La desestructuración de objetos es, probablemente, una de las estrategias más utilizadas al trabajar en Javascript nativo (o en frameworks como React) debido a que en Javascript se utilizan muchísimo las estructuras de datos de objetos y es muy interesante simplificar lo máximo posible. **Separamos las propiedades name, role y life en variables individuales, «sacándolas» de user.**

```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99
}

const { name, role, life } = user;

console.log(name);
console.log(role, life);
```

En lugar de hacer varios console.log() como tenemos en las dos últimas líneas, podemos **«volver a estructurar» en un objeto**, uniendo las diferentes variables en un objeto a la hora de mostrarlo por consola.:
```js
console.log({ name, role, life });
```

También es posible **renombrar las propiedades** si lo deseamos:
```js
const { name, role: type, life } = user;
console.log({ name, type, life });
```

**Establecer un valor por defecto de una propiedad:** Para los casos en los que una de esas propiedades no exista (o tenga un valor undefined), también podemos establecerle un valor por defecto como solemos hacer en los parámetros de una función:
```js
const { name, role = "normal user", life = 100 } = user;
console.log({ name, role, life });
```
Esto hará que, si no existe la propiedad role en el objeto user, se cree la variable role con el Sting "normal user".


## Reestructurando nuevos objetos
Esta característica de desestructuración podemos aprovecharla a nuestro favor, para reutilizar objetos y recrear nuevos objetos a partir de otros, basándonos en objetos ya existentes, añadiéndole nuevas propiedades o incluso sobreescribiendo antiguas.
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99
}

const fullUser = {
  ...user,
  power: 25,
  life: 50
}
```
Hemos creado un nuevo objeto fullUser con las mismas propiedades de user, sin embargo, además de poseer las anteriores, añadimos la nueva propiedad power y sobreescribimos la propiedad life con el valor 50.


> [!IMPORTANT]
> **En el caso de hacer ...user al final (en lugar de al principio)**, le estamos dando preferencia a las propiedades de user, que sobreescribirían las propiedades definidas anteriormente en el caso de coincidir.

## Haciendo copias de Objetos
Los valores primitivos (números, strings, booleanos...), se pasan por valor. Sin embargo, valores más complejos (no primitivos: objetos, arrays, etc...) se pasan por referencia.
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99,
  features: ["learn", "code", "paint"]
}

const fullUser = {
  ...user,
  power: 25,
  life: 50
}
```
Vemos que ahora tenemos en user una propiedad features que contiene un Array, el cuál es un tipo de dato más complejo en Javascript. Ahora fijémonos en el objeto fullUser. Cuando hacemos la desestructuración ...user, estamos separando todas las propiedades de user y añadiéndolas a nuestro fullUser una por una.

Todas las propiedades originales se pasan por valor (se copia el valor en el nuevo objeto), sin embargo, el array es un tipo de dato complejo, y Javascript lo que hace es poner una **referencia al valor original. En resumen, los tipos de datos complejos no son copias, son referencias (algo así como accesos directos).**

```js
console.log(user.features);       // ["learn", "code", "paint"]
console.log(fullUser.features);   // ["learn", "code", "paint"]

fullUser.features[0] = "program";

console.log(fullUser.features);   // ["program", "code", "paint"]
console.log(user.features);       // ["program", "code", "paint"]
```

Como se puede ver, hemos cambiado el primer elemento del array features del objeto fullUser, sin embargo, **si comprobamos el contenido del objeto user, comprobaremos que también ha cambiado.** Esto ocurre porque realmente **la propiedad features del objeto fullUser es una referencia a la propiedad features del objeto user, y es realmente la que se está modificando, alterando así ambos objetos.**

### Solución: 
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99,
  features: ["learn", "code", "paint"]
}

const fullUser = {
  ...structuredClone(user),
  power: 25,
  life: 50
}
```
Vemos que la diferencia es que, en lugar de hacer el ...user, **utilizamos la función structuredClone() a la cuál le pasamos el objeto a copiar**. Esta función hará, ahora si, una copia, devolviendo un nuevo objeto, y no la referencia.


## Estruturas anidadas
```js
const user = {
  name: "Manz",
  role: "streamer",
  attributes: {
    height: 183,
    favColor: "blueviolet",
    hairColor: "black"
  }
}
```
Extraer la propiedad attributes:
```js
// Extraemos propiedad attributes (objeto con 3 propiedades)
const { attributes } = user;
console.log(attributes);

// Extraemos propiedad height (number)
const { attributes: { height } } = user;
console.log(height);

// Extraemos propiedad height (number) y la cambiamos por nombre size
const { attributes: { height: size } } = user;
console.log(size);
```


## Desestructuración de Objetos (rest)
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99
}

const { name, ...rest } = user;
```
En este caso, la propiedad name la desestructuramos como variable y en el caso de rest la desestructuramos como un objeto que contiene las propiedades role y life.

## Parámetros desestructurados
La desestructuración de parámetros es algo muy interesante a la hora de simplificar código, ya que podemos separar en variables individuales un objeto que en un ámbito específico es muy complejo de utilizar, y sería mucho más sencillo usarlo como variable.
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99
}

function show(data) {
  const stars = "⭐".repeat(data.life / 20);
  return `Nombre: ${data.name} (${data.role}) ${stars}`;
}

show(user);   // "Nombre: Manz (streamer) ⭐⭐⭐⭐"
```
El punto clave en este ejemplo es el parámetro data de la función show(). Localiza donde se define y donde lo utilizamos en el interior de la función show. Ahora, lo que vamos a hacer es desestructurar los parámetros para que sea más fácil de escribir:
```js
const user = {
  name: "Manz",
  role: "streamer",
  life: 99
}

function show({ name, role, life }) {
  const stars = "⭐".repeat(life / 20);
  return `Nombre: ${name} (${role}) ${stars}`;
}

show(user);   // "Nombre: Manz (streamer) ⭐⭐⭐⭐"
```

Como ves, en lugar de definir data en los parámetros, desestructuramos definiendo sólo las propiedades que vamos a utilizar, en este caso todas, por lo que establecemos { name, role, life }. Luego, en su interior, en lugar de estar indicando el prefijo data. continuamente, hacemos simplemente referencia a la variable.

Si lo necesitasemos, también podríamos usar rest en este caso.


**Recuerda que la desestructuración solo funciona para estructuras de datos. Si tienes un objeto que contiene métodos o elementos del DOM, por ejemplo, no se copiarán y lanzará una excepción.**



## Comparación de Objetos con la función _.isEqual:
La función _.isEqual es muy útil para realizar comparaciones profundas entre objetos, asegurando que todas las propiedades y subpropiedades (incluyendo matrices y objetos anidados) sean equivalentes. Esta función simplifica la verificación de igualdad en estructuras de datos complejas en JavaScript.
```js
const isEqual_myVersion3= (a, b) => {
    const _ = require("lodash");
    const result = _.isEqual(a, b);
    return result;
}
```


## Encontrar propiedades en un Objeto con _.find
En Lodash, la función .find se utiliza para iterar sobre los elementos de una colección (matriz u objeto) y devolver el primer elemento que satisfaga la condición proporcionada en la función de predicado.
```js
_.find(collection, [predicate=_.identity], [fromIndex=0])
```
- collection (Array|Object): La colección a iterar.
- predicate: La función invocada por iteración. Esta puede ser una función de comparación, un objeto, una cadena, etc.
- fromIndex: El índice inicial para comenzar la búsqueda. Es opcional

Ejemplo:
```js
const users = [
  { id: 1, name: "John", age: 25 },
  { id: 2, name: "Jane", age: 30 },
  { id: 3, name: "Alice", age: 35 }
];

const user = _.find(users, { name: "Jane" });
console.log(user); // { id: 2, name: "Jane", age: 30 }
```



## Clonar objetos o elementos
Javascript tiene dos mecanismos para copiar elementos:
🥂 Copia por valor (Duplica el contenido)
🔮 Copia por referencia (Hace referencia a dónde está el contenido)
![](https://lenguajejs.com/javascript/objetos/clonar-o-copiar-elementos/copia-valor-referencia.png)


### 1. Copia por valor
Se realiza con los tipos de datos más básicos, es decir, los tipos de datos primitivos, es decir: Number, String, Boolean, etc. Esto ocurre así porque son estructuras simples y rápidas de copiar.

La copia por valor significa que simplemente se crea una nueva variable o constante y se asigna el mismo valor que tiene la variable original. Lo que a efectos prácticos cualquiera imaginaría como una copia:
```js
let originalValue = 42;

// Creamos una copia del valor de originalValue
let copy = originalValue;

originalValue;    // 42
copy;             // 42

// Alteramos el valor de copy
copy = 55;

originalValue;    // 42
copy;             // 55

// Al alterar el valor de copy, este es modificado y por otro lado, el valor de originalValue sigue siendo el valor original.
```

### 2. Copia por referencia
En Javascript, como en otros lenguajes, al almacenar la información en una variable, esta se guarda en una dirección de memoria.

Con estructuras de datos más complejas como **Array, Object u otros, esta información no se copia por valor,** puesto que podríamos tener estructuras muy complejas donde pueden haber muchos niveles de profundidad (array que contiene arrays, que a su vez cada uno de ellos contienen arrays y a su vez cada uno de ellos contienen arrays...).

Para simplificar el proceso, lo que se hace con estos tipos de datos más complejos, es que la copia será una referencia al elemento original, algo que es mucho más práctico y rápido, pero con lo que hay que tener mucho cuidado:
```js
let originalValue = { name: "ManzDev" };

// Creamos una supuesta copia del valor de originalValue
let copy = originalValue;

originalValue;    // { name: "ManzDev" }
copy;             // { name: "ManzDev" }

// Alteramos el valor de copy
copy.name = "Niv3k_el_pato";

originalValue;    // { name: "Niv3k_el_pato" }
copy;             // { name: "Niv3k_el_pato" }
```

Como puedes ver, **al modificar la propiedad name de copy, también se altera la propiedad name de originalValue** puesto que copy solo es una referencia a la estructura original, es decir, está ligado a originalValue. Al cambiar cualquiera de ellos, se modificará el otro.


## Clonando variables o constantes
Dos conceptos importantes:

🎈 **Clonación superficial (Shallow clone):** Se llama así cuando realizamos una clonación de una estructura de datos y sólo se copia su primer nivel, mientras que segundo y niveles más profundos, se crean referencias.

🧨 **Clonación profunda (Deep clone):** Se llama así cuando realizamos una clonación de una estructura de datos a todos sus niveles.
```js
const data = {
  name: "ManzDev",        // Se clona en superficial y en profundidad
  tired: false,           // Se clona en superficial y en profundidad
  likes: ["css", "javascript", "html", "vue"], // Sólo en profundidad
  numbers: [4, 8, 15, 16, 23, 42]              // Sólo en profundidad
}
```
Si realizamos una clonación superficial, solo clonaríamos los tipos de datos básicos (los dos primeros). Los dos últimos, al ser estructuras complejas en sí mismas, no se realizaría una clonación, sino que sería una referencia al elemento original, modificando ambos si alteramos uno de sus elementos, como vimos anteriormente.

Si realizamos una clonación profunda, no tendríamos este problema, se clonarían todos los elementos, independientemente del nivel de profundidad.

## Clonando elementos en Javascript
Tradicionalmente, hay varias aproximaciones, vamos a explicarlas, junto a sus ventajas y desventajas:

| Estrategia | Clonación superficial | Clonación profunda | Tipos de datos avanzados | Nativo | Más info |
| --- | --- | --- | --- | --- | --- |
| Asignación =	| ❌ No		| ❌ No		| ❌ No		| ✅ Sí	|
| Usar Object.assign()		| ✅ Sí		| ❌ No		| ❌ No		| ✅ Sí |
| Usar spread ...		| ✅ Sí		| ❌ No		| ❌ No		| ✅ Sí		| Copias con spread |
| Serializar con JSON.parse()		| ✅ Sí		| ✅ Sí		| ⚠️ Solo tipos básicos <br> ⚠️ No funciones/DOM		| ✅ Sí		| [JSON](https://lenguajejs.com/javascript/objetos/desestructuracion-objetos/#haciendo-copias-de-objetos) |
| Usar _.cloneDeep() de Lodash		| ✅ Sí		| ✅ Sí		| ✅ Tipos avanzados <br> ⚠️ No DOM		| ❌ No		| [cloneDeep](https://lenguajejs.com/javascript/objetos/json/) |
| Usar structuredClone()		| ✅ Sí		| ✅ Sí		| ✅ Tipos avanzados <br> ⚠️ No funciones/DOM		| ✅ Sí |


```js
// ❌ Esto no realiza una clonación, es una referencia al original
const copy = data;

// ❌ Sólo superficial (Hay que crear objeto con el mismo tipo)
const copy = {};
Object.assign(copy, data);

// ❌ Sólo superficial
const copy = { ...data };
```


**El ... (spread) o el Object.assign()** pueden interesarnos si necesitamos un mecanismo rápido de clonación, tenemos estructuras de un solo nivel y no nos interesan tipos de datos avanzados, sino datos primitivos.

Ahora veamos las formas donde podemos realizar clonación profunda y copiar los elementos incluso a niveles de profundidad mayores y no sólo el primer nivel (como ocurre en la clonación superficial):
```js
// ✅ El truco de JSON funciona, ❌ pero estamos limitados a los tipos de JSON
const string = JSON.stringify(data);
const copy = JSON.parse(string);

// ✅ Con Lodash, ten en cuenta que necesitaremos descargar/parsear librería externa
import { cloneDeep } from "lodash-es";
const copy = cloneDeep(data);

// ✅ Con structuredClone, ciertos tipos (funciones, DOM) devuelven excepción
const copy = structuredClone(data);
```

**Como conclusión:**
- Usa ... (spread) o Object.assign() si trabajas con datos primitivos y un sólo nivel de profundidad.
- Usa JSON.parse() y JSON.stringify() en el mismo caso. Útil si necesitas navegadores muy antiguos.
- Usa structuredClone() si quieres un clonado moderno, que soporte diferentes niveles de profundidad.
- Usa cloneDeep() de Lodash si requieres clonado de funciones y no te supone un coste incluir dependencias externas.

## Resumen donde puedes ver que tipos de datos puede clonar cada uno de los métodos que permiten clonación profunda:
**Tipos BÁSICOS (primitivos):**
| Tipo de dato	 | ...spread / Object.assign()  | JSON.parse()	| _.cloneDeep() | structuredClone() |
| --- | --- | --- | --- | --- |
| NUMBER | ✅ Sí	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |
| STRING | ✅ Sí	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |
| BOOLEAN | ✅ Sí	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |
| undefined	 | ✅ Sí	 | ⚠️ null	 | ✅ Sí	 | ✅ Sí |
| null	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |

**Tipos COMPLEJOS ( NO primitivos):**
| Tipo de dato	 | ...spread / Object.assign()  | JSON.parse()	| _.cloneDeep() | structuredClone() |
| --- | --- | --- | --- | --- |
| ARRAY | ❌ No, referencia	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |
| OBJECT | ❌ No, referencia	 | ✅ Sí	 | ✅ Sí	 | ✅ Sí |
| DATE | ❌ No, referencia	 | ⚠️ string	 | ✅ Sí	 | ✅ Sí |
| BIGINT | ❌ No, referencia	 | ❌ Devuelve TypeError	 | ✅ Sí	 | ✅ Sí |
| REGEXP | ❌ No, referencia	 | ⚠️ {} vacío	 | ✅ Sí	 | ✅ Sí |
| MAP / SET | ❌ No, referencia	 | ⚠️ {} vacío	 | ✅ Sí	 | ✅ Sí |
| SYMBOL | ❌ No, referencia	 | ✅ Sí	 | ✅ Sí	 | ❌ Devuelve DOMException |
| FUNCTION / CLASS | 	❌ No, referencia	 | ⚠️ null	 | ✅ Sí	 | ❌ Devuelve DOMException |
| Elemento del DOM	 | ❌ No, referencia	 | ⚠️ {} vacío	 | ❌ No, referencia	 | ❌ Devuelve DOMException |

En principio, en estructuras de datos no deberían existir elementos del DOM ni funciones, por lo que structuredClone() debería ser la mejor opción. No obstante, si lo que deseas es clonar ciertas estructuras que además contienen funciones o elementos del DOM, lo mejor sería decantarse por cloneDeep().

Ten en cuenta que aunque puede ser atractivo el método _.cloneDeep() por soportar todos los tipos de datos, también hay que tener en cuenta que no se trata de un método nativo del navegador, sino que se trata de una librería externa, que debe cargarse, parsearse y ejecutarse y que con estructuras muy complejas puede ser lenta o pesada.



## Convertir un Objeto a Array
```js
const user = {
  name: "Manz",
  life: 99,
  power: 10,
  talk: function() {
    return "Hola!";
  }
};

Object.keys(user);        // ["name", "life", "power", "talk"]
Object.values(user);      // ["Manz", 99, 10, ƒ]
Object.entries(user);     // [["name", "Manz"], ["life", 99], ["power", 10], ["talk", ƒ]]
```

- Con el método Object.keys() obtenemos un Array de las claves (propiedades, índices, keys) del objeto.
- Con el método Object.values() obtenemos un Array de los valores de las claves anteriores, en el mismo orden.
- Con el método Object.entries() obtenemos un Array de entradas. Cada entrada es un Array del par clave-valor, es decir, la propiedad del objeto original y su valor correspondiente.



## Agrupar datos de un Objeto por criterio
En principio, tenemos dos métodos apropiados para esta tarea. Ambos son idénticos, la diferencia es que uno crea un Objeto y otro crea un Map:
| Método |	Descripción |
| ---- | ----|
| Object.groupBy(datos, criterio)	| Agrupa en un Object los datos por el criterio indicado.|
| Map.groupBy(datos, criterio)	| Agrupa en un MAP los datos por el criterio indicado. |

Por parámetro, pasaremos la estructura de datos Array y en el segundo parámetros una Function que hará de callback para definir cuál es el criterio que vamos a escoger.

### 1. El método Object.groupBy()
El método Object.groupBy() es una utilidad de JavaScript que permite agrupar los elementos de un array en un objeto, donde las claves del objeto son los valores obtenidos de aplicar una función de agrupamiento a cada elemento del array. Este método es muy útil para organizar datos en categorías de manera sencilla.
Dado el array de usuarios:
```js
const users = [
  { name: "ManzDev", type: "streamer", color: "indigo" },
  { name: "afor_digital", type: "streamer", color: "blue" },
  { name: "BlurSoul_", type: "moderator", color: "indigo" },
  { name: "felixicaza", type: "moderator", color: "blue" },
  { name: "pheralb", type: "moderator", color: "green" },
  { name: "omaaraguirre", type: "viewer", color: "orange" },
  { name: "LuisLlamas_es", type: "viewer", color: "orange" },
  { name: "ZeroBl", type: "viewer", color: "black" }
];
```

Queremos agrupar estos usuarios por su type (tipo).
```js
const usersByType = Object.groupBy(users, user => user.type);
```


Resultado: El resultado es un objeto donde las claves son los diferentes tipos de usuarios (streamer, moderator, viewer) y los valores son arrays de objetos de usuarios correspondientes a cada tipo:
```js
{
  streamer: [
    { name: "ManzDev", type: "streamer", color: "indigo" },
    { name: "afor_digital", type: "streamer", color: "blue" }
  ],
  moderator: [
    { name: "BlurSoul_", type: "moderator", color: "indigo" },
    { name: "felixicaza", type: "moderator", color: "blue" },
    { name: "pheralb", type: "moderator", color: "green" }
  ],
  viewer: [
    { name: "omaaraguirre", type: "viewer", color: "orange" },
    { name: "LuisLlamas_es", type: "viewer", color: "orange" },
    { name: "ZeroBl", type: "viewer", color: "black" }
  ]
}
```

**Nota: Object.groupBy() no es una función nativa de JavaScript.** Si quieremos implementar algo similar, podemos usar el siguiente código:
```js
const groupBy = (array, keyFn) => {
  return array.reduce((result, item) => {
    const key = keyFn(item);
    if (!result[key]) {
      result[key] = [];
    }
    result[key].push(item);
    return result;
  }, {});
};

const usersByType = groupBy(users, user => user.type);
```

### 2. El método Map.groupBy()
Hay que tener presente que aunque hemos creado objetos a partir de la agrupación, también podemos hacerlo con una estructura de datos similar llamada Map. Para ello, en lugar de Object usamos Map:
```js
const usersByType = Map.groupBy(users, user => user.type);

// usersByType:
{
  0: { "streamer" => [{...}, {...}] },
  1: { "moderator" => [{...}, {...}, {...}] },
  2: { "viewer" => [{...}, {...}, {...}] },
  size: 3
}

Object.fromEntries(usersByType);
```
De hecho, observa que utilizando el método Object.fromEntries() puedes convertir el Map resultante en un Object como el obtenido con Object.groupBy().

El método Map.groupBy() es una propuesta para el estándar ECMAScript, pero al momento (junio de 2023), no forma parte del estándar ECMAScript final. 


### 3. Agrupar por criterio (legacy). Métodos .groupBy()
Agrupar por criterio (legacy)" hace referencia a una técnica de programación utilizada para organizar los elementos de una colección (como un array) en grupos basados en algún criterio específico. El término "legacy" indica que la técnica o método en cuestión ha sido usada tradicionalmente antes de la introducción de métodos más modernos o estándar en el lenguaje de programación.

En el contexto de JavaScript, los métodos .groupBy() son funciones que permiten agrupar elementos de una colección según un criterio definido por una función de agrupamiento. Aunque métodos como Object.groupBy() y Map.groupBy() han sido propuestos para el estándar ECMAScript, aún no forman parte de él, por lo que a menudo se implementan mediante soluciones personalizadas.


---------------------
# 2. ARRAYS
Datos estructurados siguiendo un orden. Cada dato se identifica con un índice que indica su posición dentro de la estructura. Un array es una colección o agrupación de elementos en una misma variable, cada uno de ellos ubicado por la posición que ocupa en el array. En algunas ocasiones también se les suelen llamar arreglos o vectores. En Javascript, se pueden definir de varias formas:

| Constructor |	Descripción |
|----| ----|
| ARRAY new Array(size) |	Crea un array vacío de tamaño size. Sus valores no están definidos, pero Undefined son .|
| ARRAY new Array(e1, e2...)	| Crea un array con los elementos indicados.|
| ARRAY [e1, e2...]	| Simplemente, los elementos dentro de corchetes: []. Notación preferida.|


> [!TIP]
> Al contrario que muchos otros lenguajes de programación, **Javascript permite que se puedan realizar arrays de tipo mixto**, no siendo obligatorio que todos los elementos sean del mismo tipo de dato.


OJO: Al crear un array con new Array(size) hay varios matices que merece la pena mencionar. Lo primero, si sólo se indica un parámetro numérico size, Javascript creará un array vacío de size elementos. Es decir, no es lo mismo que const a = [3], donde creamos un array con un elemento 3. Por otro lado, new Array(size) realmente crea un array vacío que aún no ha sido rellenado con nada (esto hace que sea más óptimo para arrays grandes) y aunque es equivalente, no es exactamente igual new Array(3) que [undefined, undefined, undefined].



## Acceso a elementos del array
Al igual que los String, para saber el número elementos que tiene un array se accede a la propiedad .length, que nos devolverá el número de elementos existentes en un array:

| Forma |	Descripción|
| ---- | ----|
| .length |	Propiedad que devuelve el número de elementos del array.|
| [pos]	| Operador que devuelve (o modifica) el elemento número pos del array.|
| .at(pos) 	| Método que devuelve el elemento en la posición pos. Números negativos en orden inverso.|


### 1. El operador []
Por otro lado, si lo que queremos es acceder a un elemento específico del array, no hay más que utilizar el operador [], al igual que lo podríamos hacer con los String para acceder a un carácter concreto.
```js
const letters = ["a", "b", "c"];

letters.length;   // 3
letters[0];       // 'a'
letters[2];       // 'c'
letters[5];       // undefined
```

 Las posiciones empiezan a contar desde 0 y que si intentamos acceder a una posición que no existe (mayor del tamaño del array), nos devolverá un Undefined.

El operador [ ] no sólo nos **permite obtener o acceder a un elemento del array, sino que también nos permite modificar un elemento específico del array,** si utilizamos la asignación:
```js
const letters =  ["a", "b", "c"];

letters[1] = "Z";  // Devuelve "Z" y modifica letters a ["a", "Z", "c"]
letters[3] = "D";  // Devuelve "D" y modifica letters a ["a", "Z", "c", "D"]
letters[5] = "A";  // Devuelve "A" y modifica letters a ["a", "Z", "c", "D", undefined, "A"]
```

### 2. El método .at()
Además del clásico operador [ ], también podemos utilizar el método .at(), añadido en Javascript ES2022. Con él, se puede hacer exactamente lo mismo que con [pos], sólo que además permite valores negativos, mediante los cuales se puede obtener elementos en orden inverso, es decir, empezando a contar desde el último elemento:
```js
const letters = ["a", "b", "c"];

letters.at(0);    // "a"
letters.at(1);    // "b"
letters.at(3);    // undefined
letters.at(-1);   // "c"
letters.at(-2);   // "b"
```


## Manipular arrays de manera inmutable: Método .with()
El método .with() es una adición reciente a JavaScript que permite crear una copia de un array, pero con un cambio en un elemento específico. La característica principal de este método es que no modifica el array original, sino que devuelve una nueva copia del array con el cambio aplicado. Esto es especialmente útil en programación funcional e inmutable.

Permite encadenar múltiples operaciones, pero debemos de tener en cuenta que **sólo modifica, no se pueden añadir elementos que no existen antes en el array**:
```js
const fruits = ['apple', 'banana', 'cherry', 'date'];

// Usando el método .with() para cambiar 'banana' por 'blueberry'
const newFruits = fruits.with(1, 'blueberry');

console.log(fruits); // ['apple', 'banana', 'cherry', 'date']
console.log(newFruits); // ['apple', 'blueberry', 'cherry', 'date']

```

## Añadir o eliminar elementos
Existen varias formas de añadir elementos a un array ya existente. Ten en cuenta que en todos estos casos **estamos mutando (variando los elementos del array ya existente)**. Veamos los métodos que podemos usar para ello:

| Método	| Descripción|
| ---- | ---- |
| NUMBER .push(e1, e2, e3...) | ⚠️	Añade uno o varios elementos al final del array. Devuelve el tamaño del array. |
| OBJECT .pop() | ⚠️	Elimina el último elemento del array. Devuelve dicho elemento. |
| NUMBER .unshift(e1, e2, e3...) | ⚠️	Añade uno o varios elementos al inicio del array. Devuelve el tamaño del array. |
| OBJECT .shift() | ⚠️	Elimina el primer elemento del array. Devuelve dicho elemento. |


## Eliminar elementos con la función _.drop de Lodash
La función _.drop() de Lodash es una función que permite eliminar un número determinado de elementos al principio de un array. Es una función muy útil para **eliminar elementos no deseados de un array sin tener que modificar el array original.**
Esta función  crea una nueva matriz excluyendo un número específico de elementos desde el inicio de la matriz original. La sintaxis básica de .drop es:
```js
_.drop(array, [n=1])

// n es opcional. El número de elementos a eliminar del principio del array. Por defecto, es 1.
```


## Añadir o eliminar elementos con el método .push() y .pop()
El método .push() añade uno o varios elementos al final del array, mientras que el método .pop() elimina el último elemento del array. Ambos métodos devuelven el elemento añadido o eliminado, respectivamente. **⚠️ Recuerda que estos métodos sirven para modificar (mutar) el array original.**
```js
const elements = ["a", "b", "c"]; // Array inicial

elements.push("d");    // Devuelve 4.   Ahora elements = ['a', 'b', 'c', 'd']
elements.pop();        // Devuelve 'd'. Ahora elements = ['a', 'b', 'c']
``` 



**⚠️ Recuerda que estos métodos sirven para modificar (mutar) el array original.**
```js
const elements = ["a", "b", "c"]; // Array inicial

elements.push("d");    // Devuelve 4.   Ahora elements = ['a', 'b', 'c', 'd']
elements.pop();        // Devuelve 'd'. Ahora elements = ['a', 'b', 'c']

elements.unshift("Z"); // Devuelve 4.   Ahora elements = ['Z', 'a', 'b', 'c']
elements.shift();      // Devuelve 'Z'. Ahora elements = ['a', 'b', 'c']
```


## Alternativas para crear arrays
| Método	| Descripción|
| ---- | ---- |
| ARRAY Array.from(obj) |	Intenta convertir el obj en un array.|
| ARRAY Array.from(obj, fmap)  |	Idem, pero ejecuta la función fmap por cada elemento. Equivalente a .map() |
| ARRAY Array.from({ length:size}) |	Crea un array a partir de un OBJECT de tamaño size, relleno de UNDEFINED |
| ARRAY .concat(e1, e2, e3...)	 |	Devuelve los elementos pasados por parámetro concatenados al final del array. |
| STRING .join(sep)	 |	Une los elementos del array mediante separadores sep en un STRING. |


El método Array.from es una función estática en JavaScript que se usa para crear una nueva instancia de Array a partir de un objeto iterable o de un objeto similar a un array. Veamos en detalle cómo funciona y sus posibles usos.
Sintaxtis básica:
```js
Array.from(arrayLike, mapFn, thisArg)
```

Parámetros
- arrayLike: Es un objeto similar a un array o iterable que se quiere convertir en un array. Por ejemplo, puede ser un objeto arguments, un NodeList, un Set, un Map, o incluso un string. 
- mapFn (opcional):Es una función que se llama para cada elemento del nuevo array. Permite mapear cada elemento a un nuevo valor (similar a Array.prototype.map). 
- thisArg (opcional): Valor para usar como this cuando se ejecuta mapFn.


```js
const arrayOfMultiples = (num, length) =>
        Array.from({ length }, (_, i) => num * (i + 1));

arrayOfMultiples(7, 5); // [7, 14, 21, 28, 35]
```

En este ejemplo, la función arrayOfMultiples toma dos argumentos: num y length. Utiliza Array.from para crear un nuevo array de longitud length, donde cada elemento es el resultado de multiplicar num por el índice del elemento más uno. Por ejemplo, si num es 7 y length es 5, la función devolverá [7, 14, 21, 28, 35].

{ length } --> Aquí, se crea un objeto con una propiedad length que define la longitud del nuevo array. Por ejemplo, { length: 4 } creará un array de 4 elementos.

Función de mapeo: (_, i) => num * (i + 1) --> Esta función se llama para cada elemento del nuevo array. El primer argumento (_) se ignora, ya que no se utiliza en la función. El segundo argumento (i) es el índice del elemento actual. La función devuelve el resultado de multiplicar num por (i + 1), que es el valor deseado para ese elemento del array.



## Separar y unir strings
Además, también tenemos otro método con el que es posible crear un ARRAY a partir de un STRING. Se trata del método .split(). En este caso, el método .join() es su contrapartida. Con .join() podemos crear un STRING con todos los elementos del array, separándolo por el texto que le pasemos por parámetro:
```js
const letters = ["a", "b", "c"];

// Une elementos del array por el separador indicado
letters.join("->");       // Devuelve 'a->b->c'
letters.join(".");        // Devuelve 'a.b.c'

// Separa elementos del string por el separador indicado
"a.b.c".split(".");       // Devuelve ['a', 'b', 'c']
"5-4-3-2-1".split("-");   // Devuelve ['5', '4', '3', '2', '1']
```
Ten en cuenta que, como se puede ver en los ejemplos, .join() siempre devolverá los elementos como STRING, mientras que .split() devolverá un ARRAY.

Observa un caso especial, en el que pasamos un cadena de texto  vacía al .split():
```js
"Hola a todos".split("");   // ['H', 'o', 'l', 'a', ' ', 'a', ' ', 't', 'o', 'd', 'o', 's']
```
En este caso, le hemos pedido dividir el  sin indicar ningún separador, por lo que Javascript toma la unidad mínima como separador: nos devuelve un  con cada carácter del  original. Ten en cuenta que los espacios en blanco también cuentan como carácter.

## Buscar elementos en un array
| Método |	Descripción |
| ---- | ---- |
| BOOLEAN .includes(element) | Comprueba si element está incluido en el array. ¿El elemento existe? |
| BOOLEAN .includes(element, from) | Idem, pero partiendo desde la posición from del array. |
| NUMBER .indexOf(element) | Devuelve la posición de la primera aparición de element o -1 si no existe. Buscar la posición. |
| NUMBER .indexOf(element, from) | Idem, pero partiendo desde la posición from del array. |
| NUMBER .lastIndexOf(element) | Empezará a buscar desde el final. Devuelve la posición de la última aparición de element. Devuelve -1 si no existe. |
| NUMBER .lastIndexOf(element, from) | Idem, pero partiendo desde la posición from del array. |


## Buscar un elemento en un array con una función imperativa
Esta función tiene una implementación imperativa ya que se indican los pasos que se deben hacer:
```js
const names = [
  { name: "María", age: 20 },
  { name: "Bernardo", age: 28 },
  { name: "Pancracio", age: 22 },
  { name: "Andrea", age: 19 },
  { name: "Sara", age: 29 },
  { name: "Jorge", age: 32 },
  { name: "Yurena", age: 38 },
  { name: "Ayoze", age: 18 }
];

// Busca el primer elemento con la edad indicada, sino devuelve -1
const findElement = (array, searchedAge) => {
  for (let i = 0; i < array.length; i++) {
    const element = array[i];
    if (element.age === searchedAge) {
      return element;
    }
  }
  return -1;
}

findElement(names, 19);     // { name: "Andrea", age: 19 }
findElement(names, 32);     // { name: "Jorge", age: 32 }
findElement(names, 33);     // -1
```


## Buscar un elemento en un array con una función declarativa
Indicamos lo que quieres obtener, para ello, usaremos la función .find():
```js
const findElement = (array, searchedAge) => {
  return array.find(element => element.age === searchedAge) ?? -1;
}

findElement(names, 19);     // { name: "Andrea", age: 19 }
findElement(names, 32);     // { name: "Jorge", age: 32 }
findElement(names, 33);     // -1
```
De la misma forma que tenemos .find() también tenemos .findIndex() que devuelve la posición en lugar del propio elemento. 


## Crear subarrays, fragmentos:
| Método	| Descripción |
| ---- | ---- |
| ARRAY .slice(start, end) ✅	 | Devuelve los elementos desde la posición start hasta end (excluído). |
| ARRAY .splice(start, size) ⚠️	 | Devuelve los size siguientes elementos desde la posición start. |
| ARRAY .splice(start, size, e1, e2...) ⚠️	 | Idem. Además, luego inserta e1, e2... en la posición start. |
| ARRAY .toSpliced(start, size)  ✅	 | Idem a splice(start, size), pero sin mutar el array original. |
| ARRAY .toSpliced(st, sz, e1, e2...)  ✅	 | Idem a splice(st, sz, e1, e2..), pero sin mutar el array original. |
| ARRAY .copyWithin(pos, start, end)  ⚠️	 | Muta el array, cambiando en pos y copiando desde start a end. |
| ARRAY .fill(element, start, end)  ⚠️	 | Cambia los elementos del  por element desde start hasta end. |
| ARRAY .with(index, item)  ✅	 | Devuelve una copia del original, con el elemento index modificado. |

✅ El array original está seguro (no muta).
⚠️ El array original cambia (muta).

## Alterar fragmento con .copyWithin()
Es posible tener un array al que queremos hacer ciertas modificaciones donde .slice() y .splice() se quedan cortos (o no resultan cómodos). Veamos algunos métodos introducidos en ECMAScript  que nos permiten crear una versión modificada de un array:

Con copyWithin(pos, start, end) nos permite alterar el array, de modo que, empezando en la posición pos, copiará los elementos que están desde la posición start hasta la posición end. El parámetro end es opcional, de modo que si no se indica, se asume que end es el tamaño del array.


## Reducir el tamaño de un array
También, en ciertos casos, nos podría interesar reducir el tamaño de un array para quedarnos con sus primeros elementos y descartar el resto. En el siguiente ejemplo, creamos un nuevo  con .slice(). Dicho array es una versión reducida del array original que teníamos en un principio:
```js
// Mediante slice()
const numbers = [1, 2, 3, 4, 5, 6, 7, 8];
const newNumbers = numbers.slice(0, 4);

newNumbers    // [1, 2, 3, 4], numbers no cambia
```


Sin embargo, hay una forma muy sencilla y rápida de hacer lo mismo, que es modificar directamente el tamaño del array mediante la propiedad .length. Por ejemplo, hacer un numbers.length = 4 en un array de 8 elementos, reducirá el array a los primeros 4 elementos:
```js
// Mediante .length
const numbers = [1, 2, 3, 4, 5, 6, 7, 8];
numbers.length = 4;

numbers       // [1, 2, 3, 4], numbers cambia
```
En este último caso no estamos creando un nuevo array, sino que reutilizamos el que ya teníamos, reduciendo su tamaño y descartando el resto de elementos.


## Rellenar un array con .fill()
El método .fill() se utiliza para rellenar todos los elementos de una matriz con un valor estático, desde un índice inicial hasta un índice final (opcional). **Este método modifica la matriz original.**

Sintaxis básica:
```js
array.fill(value, start, end)

// value es el valor que se utilizará para rellenar la matriz.
const fill = (arr, value, start = 0, end = arr.length) => arr.fill(value, start, end);
```
Donde:
- value es el valor que se utilizará para rellenar la matriz.
- start es el índice de inicio (inclusive) donde se comenzará a rellenar la matriz.
- end es el índice final (exclusivo) donde se detendrá el relleno. Si no se especifica, se rellenarán todos los elementos hasta el final de la matriz.
 


⚠️ Ten en cuenta que con .fill() estamos alterando el ARRAY.
```js
const letters = ["a", "b", "c", "d", "e", "f"];

// Estos métodos modifican el array original

letters.fill("Z", 0, 5);             // ["Z", "Z", "Z", "Z", "Z", "f"]
letters.fill("AA", 0, 2);            // ["AA", "AA", "Z", "Z", "Z", "f"]
letters.fill(1);                     // [1, 1, 1, 1, 1]
new Array(5).fill(5);                // [5, 5, 5, 5, 5]
```

## Rellenar un array con .map()
El método .map() en JavaScript se utiliza para crear un nuevo array a partir de un array existente, aplicando una función a cada uno de sus elementos. No se utiliza directamente para "rellenar" un array, pero puedes usarlo para transformar y generar un nuevo array con los valores que necesitas.

Sintaxis básica:
```js
const nuevoArray = arrayOriginal.map(funcionDeTransformacion);
```

```js
function invertArray(arr) {
    return arr.map(element => element !== 0 ? -element : element);
}

// Ejemplo de uso
const arr = [1, -2, 3, 0, -5];
const result = invertArray(arr);
console.log(result); // [-1, 2, -3, 0, 5]
```


### 1. Usando .map() para transformar un array
Supongamos que tienes un array de números y quieres crear un nuevo array donde cada número se incrementa en 1.
```js
const numbers = [1, 2, 3, 4, 5];
const incrementedNumbers = numbers.map(number => number + 1);

console.log(incrementedNumbers); // [2, 3, 4, 5, 6]
```
Donde, la funcionDeTransformacion es una función que se aplica a cada elemento del array original. Esta función recibe el elemento actual, su índice y el array original como argumentos, y debe devolver el nuevo valor que reemplazará al elemento original en el nuevo array.



### 2. Rellenar un array usando .map()
Aunque .map() se utiliza principalmente para transformar elementos existentes, también puedes usarlo para crear un nuevo array y rellenarlo con valores específicos.
```js
const indices = [0, 1, 2, 3, 4];
const cuadrados = indices.map(indice => indice * indice); // [0, 1, 4, 9, 16]
```

Rellenar con valores de otro array:
```js
const nombres = ["Ana", "Juan", "María"];
const saludos = nombres.map(nombre => `Hola, ${nombre}!`); // ["Hola, Ana!", "Hola, Juan!", "Hola, María!"]
```

## Manipular arrays de manera inmutable: Método .with()
El método .with() es una adición reciente a JavaScript que permite crear una copia de un array, pero con un cambio en un elemento específico. La característica principal de este método es que no modifica el array original, sino que devuelve una nueva copia del array con el cambio aplicado. Esto es especialmente útil en programación funcional e inmutable.

Permite encadenar múltiples operaciones, pero debemos de tener en cuenta que **sólo modifica, no se pueden añadir elementos que no existen antes en el array**:
```js
const fruits = ['apple', 'banana', 'cherry', 'date'];

// Usando el método .with() para cambiar 'banana' por 'blueberry'
const newFruits = fruits.with(1, 'blueberry');

console.log(fruits); // ['apple', 'banana', 'cherry', 'date']
console.log(newFruits); // ['apple', 'blueberry', 'cherry', 'date']
```

## Iterar sobre los elementos de un Array
### 1. forEach()
El método forEach es un método de los arrays que ejecuta una función dada en cada uno de sus elementos.
```js
const array = [1, 2, 3, 4, 5];

array.forEach((element) => {
  console.log(element);
});

```

### 2. for(...)
```js
const array = [1, 2, 3, 4, 5];

for (let i = 0; i < array.length; i++) {
  console.log(array[i]);
}
```

### 3. for..of (azúcar sintáctico para objetos iterables)
```js
const array = [1, 2, 3, 4, 5];

for (const element of array) {
  console.log(element);
}
```

Un string, por ejemplo, implementa el patrón iterable y puede ser recorrido con for..of
```js
for (const char of "javi") {
  console.log(char); // "j", "a", "v", "i"
}
```

### 4. map Method
El método map crea un nuevo array con los resultados de la llamada a la función indicada aplicados a cada uno de sus elementos. No se usa típicamente solo para iterar, sino para transformar los elementos del array.
```js
const array = [1, 2, 3, 4, 5];
const newArray = array.map(element => element * 2);

console.log(newArray); // [2, 4, 6, 8, 10]
```

### 5. Bucle for...in
El bucle for...in se usa para iterar sobre las propiedades de un objeto. Aunque se puede usar con arrays, no es recomendable ya que itera sobre las propiedades enumerables, lo cual puede incluir propiedades no numéricas.
```js
const array = [1, 2, 3, 4, 5];

for (const index in array) {
  console.log(array[index]);
}
```


### 6. Bucle while
El bucle while ejecuta su bloque de código siempre que una condición especificada sea verdadera.
```js
const array = [1, 2, 3, 4, 5];
let i = 0;

while (i < array.length) {
  console.log(array[i]);
  i++;
}
```

### 7. Bucle do...while
El bucle do...while es similar a while, pero garantiza que el bloque de código se ejecute al menos una vez.
```js
const array = [1, 2, 3, 4, 5];
let i = 0;

do {
  console.log(array[i]);
  i++;
} while (i < array.length);
```

### 8. reduce Method
El método reduce se usa para acumular valores a través del array, pero también se puede usar para iterar.
```js
const array = [1, 2, 3, 4, 5];

array.reduce((accumulator, currentValue) => {
  console.log(currentValue);
  return accumulator;
}, 0);
```

### 9. entries Method with for...of
Puedes usar el método entries junto con for...of para iterar tanto sobre el índice como sobre el valor del array.
```js
const array = [1, 2, 3, 4, 5];

for (const [index, element] of array.entries()) {
  console.log(`Index: ${index}, Element: ${element}`);
}
```

### 10. every Method
El método every ejecuta una función en cada elemento del array hasta que la función devuelve un valor false.
```js
const array = [1, 2, 3, 4, 5];

array.every(element => {
  console.log(element);
  return true; // continuar iterando
});
```

### 11. some Method
El método some ejecuta una función en cada elemento del array hasta que la función devuelve un valor true.
```js
const array = [1, 2, 3, 4, 5];

array.some(element => {
  console.log(element);
  return false; // continuar iterando
});

```



### 12. Iterar un Array con los métodos de iterar Objetos
Como un Array también es un Object, podemos utilizar estos métodos también para recorrerlos, sólo que en este caso los índices del array son las posiciones (0, 1, 2, 3...).
```js
const animals = ["Gato", "Perro", "Burro", "Gallo", "Ratón"];

Object.keys(animals);     // [0, 1, 2, 3, 4]
Object.values(animals);   // ["Gato", "Perro", "Burro", "Gallo", "Ratón"]
Object.entries(animals);  // [[0, "Gato"], [1, "Perro"], [2, "Burro"], [3, "Gallo"], [4, "Ratón"]]
```


## Convertir un array a objeto. Forma 1. Usando el método Object.keys(keys)
También se puede hacer la operación inversa, convertir un array en un objeto. Para ello, usaremos el método Object.fromEntries(). En esta ocasión, vamos a partir de dos Array keys y values, donde el primero tiene la lista de propiedades en String y el segundo tiene la lista de valores.

El objetivo es, a partir de esos dos arrays (que deben ser del mismo tamaño), generar el objeto inicial user que teníamos antes:
```js
const keys = ["name", "life", "power", "talk"];
const values = ["Manz", 99, 10, function() { return "Hola" }];

// Partimos de un  vacío entries
const entries = [];
for (let i of Object.keys(keys)) {
  const key = keys[i];
  const value = values[i];
  entries.push([key, value]);
}

const user = Object.fromEntries(entries);     // {name: 'Manz', life: 99, power: 10, talk: ƒ}
```
Con Object.keys(keys) obtenemos una lista de números de 0 al tamaño del array keys. Esto nos servirá de posición para ir recorriendo los arrays keys y values en el interior del bucle for..of.

De esta forma, en cada iteración del bucle generamos un par key, value, que meteremos en un array e insertaremos en entries. De esta forma, regeneramos la estructura de entradas de Object.entries() que es la que necesitamos para que, mediante Object.fromEntries() podamos regenerar el objeto user con las keys de keys y los valores de values.


## Convertir un array a objeto. Forma 2. Utilizando método .map()
Otra forma, más compacta:
```js
const keys = ["name", "life", "power", "talk"];
const values = ["Manz", 99, 10, function() { return "Hola" }];

const entries = values.map((value, index) => [keys[index], value]);
const user = Object.fromEntries(entries);
```



## Excluir elementos de un array con la función _.drop de Lodash
La función _.dropRight de Lodash se utiliza para crear una nueva matriz que excluye un número específico de elementos desde el final de la matriz original. Esto es útil cuando necesitas eliminar los últimos elementos de una matriz. Aquí tienes una explicación detallada de cómo funciona _.dropRight y algunos ejemplos de su uso.
```js
const _ = require("lodash");
_.dropRight(array, [n=1])
// n (opcional): El número de elementos a excluir desde el final de la matriz.
// El valor predeterminado es 1.

let array = [1, 2, 3, 4, 5];
let result = _.dropRight(array, 3);
console.log(result); // Salida: [1, 2]
```


## Ordenación de un array
| Método |	Descripción |
| ----| ---- |
| ARRAY .reverse() ⚠️	| ARRAY Invierte el orden de elementos del array. |
| ARRAY .toReversed() ✅	| ARRAY Devuelve una copia del array, con el orden de los elementos invertido. |
| ARRAY .sort() ⚠️	| ARRAY Ordena los elementos del array bajo un criterio de ordenación alfabética. |
| ARRAY .sort(criterio) ⚠️	| ARRAY Idem, pero bajo un criterio de ordenación indicado por  criterio. |
| ARRAY .toSorted() ✅	| ARRAY Devuelve una copia del array, con los elementos ordenados. |
| ARRAY .toSorted(criterio) ✅	| ARRAY Idem, pero ordenado por el criterio establecido por parámetro. |

✅ El array original está seguro (no muta).
⚠️ El array original cambia (muta).


## El método de la burbuja para ordenar un array
El algoritmo recorre el array varias veces. En cada pasada, compara elementos adyacentes y los intercambia si están en el orden incorrecto. Después de cada pasada, el siguiente elemento más grande está en su posición correcta. Este proceso se repite hasta que no se necesiten más intercambios, lo que significa que el array está ordenado.
```js
function bubbleSort(arr) {
  let n = arr.length;
  let swapped;

  // Repetimos el proceso hasta que no haya más intercambios
  do {
    swapped = false;
    // Recorremos el array desde el principio hasta el penúltimo elemento
    for (let i = 0; i < n - 1; i++) {
      // Si el elemento actual es mayor que el siguiente, los intercambiamos
      if (arr[i] > arr[i + 1]) {
        let temp = arr[i];
        arr[i] = arr[i + 1];
        arr[i + 1] = temp;
        swapped = true;
      }
    }
    // Reducimos el rango de comparación ya que el último elemento está en su lugar
    n--;
  } while (swapped);

  return arr;
}
```


## Array functions. Funciones sobre objetos basados en Array
Así como tenemos un conjunto de métodos para realizar sobre variables que sean STRING u otro conjunto de métodos para variables que sean NUMBER, existe una serie de métodos que podemos utilizar sobre variables que sean de tipo ARRAY. Son las llamadas array functions que veremos a continuación.

Las Array functions son métodos que tiene cualquier variable que sea de tipo ARRAY, y que permite realizar una operación con todos los elementos de dicho array (o parte de ellos) para conseguir un objetivo concreto, dependiendo del método. En general, a dichos métodos se les pasa por parámetro una función callback y unos parámetros opcionales.

Estas son las Array functions que podemos encontrarnos en Javascript:
| Método |	Descripción |
| ---- | ---- |
| UNDEFINED .forEach(ƒ)	| Ejecuta la función definida en ƒ por cada uno de los elementos del array.  |
| Comprobaciones |
| BOOLEAN .every(ƒ)	| Comprueba si todos los elementos del array cumplen la condición de ƒ. |
| BOOLEAN .some(ƒ)	| Comprueba si al menos un elemento del array cumple la condición de ƒ. |
| Transformadores y filtros |
| ARRAY .map(ƒ)	| Construye un array con lo que devuelve ƒ por cada elemento del array. |
| ARRAY ..filter(ƒ)	| Filtra un array y se queda sólo con los elementos que cumplen la condición de ƒ. |
| OBJECT .flat(level)	| Aplana el array al nivel level indicado. |
| OBJECT  .flatMap(ƒ)	| Aplana cada elemento del array, transformándolo según ƒ. Equivale a .map().flat(1). |
| Búsquedas |
| NUMBER  .findIndex(ƒ)	| Devuelve la posición del elemento que cumple la condición de ƒ. |
| OBJECT  .find(ƒ)	| Devuelve el elemento que cumple la condición de ƒ.
| OBJECT  .findLastIndex(ƒ)	| Idem a findIndex(), pero empezando a buscar desde el último elemento al primero. |
| OBJECT  .findLast(ƒ)	| Idem a find(), pero empezando a buscar desde el último elemento al primero. |
| Acumuladores |
| OBJECT  .reduce(ƒ, initial)	| Ejecuta ƒ con cada elemento (de izq a der), acumulando el resultado. |
| OBJECT  .reduceRight(ƒ, initial)	| Idem al anterior, pero en orden de derecha a izquierda. |


## Bucles .forEach() en Arrays
Como se puede ver, el método forEach() no devuelve nada y espera que se le pase por parámetro una FUNCTION que se ejecutará por cada elemento del array. Esa función, puede ser pasada en cualquiera de los formatos que hemos visto: como función tradicional o como función flecha:
```js
const letters = ["a", "b", "c", "d"];

// Con funciones por expresión
const f = function () {
  console.log("Un elemento.");
};
letters.forEach(f);

// Con funciones anónimas
letters.forEach(function () {
  console.log("Un elemento.");
});

// Con funciones flecha
letters.forEach(() => console.log("Un elemento."));
```

Sin embargo, este ejemplo no tiene demasiada utilidad. A la FUNCTION callback se le pueden pasar varios parámetros opcionales:
- Si se le pasa un primer parámetro, este será el elemento del array.
- Si se le pasa un segundo parámetro, este será la posición en el array.
- Si se le pasa un tercer parámetro, este será el array en cuestión.
```js
const letters = ["a", "b", "c", "d"];

letters.forEach((element) => console.log(element));
// Devuelve 'a' / 'b' / 'c' / 'd'

letters.forEach((element, index) => console.log(element, index));
// Devuelve 'a' 0 / 'b' 1 / 'c' 2 / 'd' 3

letters.forEach((element, index, array) => console.log(array[0]));
// Devuelve 'a' / 'a' / 'a' / 'a'
```

En este ejemplo, he nombrado element al parámetro que hará referencia al elemento, index al parámetro que hará referencia al índice (posición del array) y array al parámetro que hará referencia al propio array en cuestión. En algunos ejemplos los abreviaré como (e, i, a).

Por ejemplo, una buena estrategia sería utilizar letters (plural) para el array y letter (singular) en lugar de element para el elemento que se va recorriendo. Como se puede ver, realmente forEach() es otra forma de hacer un bucle (sobre un array), sin tener que recurrir a bucles tradicionales como for o while.
```js
const letters = ["a", "b", "c", "d"];

letters.forEach((letter) => console.log(letter));
```


## Comprobaciones en Arrays
Existen dos métodos para realizar comprobaciones: el método .every() y el método .some(). Ambos métodos evaluan los elementos del array y devuelven siempre un ARRAY, que representa si se cumple o no. Los explicamos a continuación.

### 1. El método .every() (Todos)
El método every() permite comprobar si todos y cada uno de los elementos de un array cumplen la condición que se especifique en la FUNCTION  callback:
```js
const letters = ["a", "b", "c", "d"];
letters.every((letter) => letter.length === 1); // true
```

### 2. El método .some() (Al menos uno)
De la misma forma que el método anterior sirve para comprobar si todos los elementos del array cumplen una determinada condición, con some() podemos comprobar si al menos uno de los elementos del array, cumplen dicha condición definida por el callback.
```js
const letters = ["a", "bb", "c", "d"];
letters.some((element) => element.length == 2);   // true
```


## Transformadores y filtros en Arrays
### 1. El método .map()
El método map() es un método muy potente y útil para trabajar con arrays, puesto que su objetivo es devolver un nuevo array donde cada uno de sus elementos será lo que devuelva la función callback por cada uno de los elementos del array original:
```js
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];
const nameSizes = names.map((name) => name.length);

nameSizes; // Devuelve [3, 5, 5, 9, 9]
```

### 2. El método .filter()
El método filter() nos permite filtrar los elementos de un array y devolver un nuevo array con sólo los elementos que queramos. Para ello, utilizaremos la función callback para establecer una condición que devuelve true sólo en los elementos que nos interesen:
```js
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];
const filteredNames = names.filter((name) => name.startsWith("P"));

filteredNames; // Devuelve ['Pablo', 'Pedro', 'Pancracio']
```


### 3. El método .flatMap()
Un método que puede resultar interesante es .flat(level). Se trata de un método que revisa todos los elementos del array en busca de arrays anidados, y los aplana hasta el nivel level indicado por parámetro.
```js
const values = [10, 15, 20, [25, 30], 35, [40, 45, [50, 55], 60]];

values.flat(0);         // [10, 15, 20, [25, 30], 35, [40, 45, [50, 55], 60]];
values.flat(1);         // [10, 15, 20, 25, 30, 35, 40, 45, [50, 55], 60];
values.flat(2);         // [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60];

// Idem al anterior, pero si hubieran más niveles los aplanaría todos
values.flat(Infinity);
```


## Búsquedas en un Array
### 1. El método .find() y .findIndex()
Dentro de las Array functions, existen dos métodos interesantes: find() y findIndex(). Ambos se utilizan para buscar elementos de un array mediante una condición, la diferencia es que el primero devuelve el elemento mientras que el segundo devuelve su posición en el array original. Veamos como funcionan:
```js
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];

names.find((name) => name.length == 5);       // 'Pablo'
names.findIndex((name) => name.length == 5);  // 1
```
Otro Ejemplo: 
```js
const check = (arr, el) => {
	let result = arr.find( element => element === el);
	return result != undefined ? true : false;
}

check([1, 2, 3, 4, 5], 3) // true
```


Otro Ejemplo: 
```js
let numbers = [5, 12, 8, 130, 44];

let index = numbers.findIndex(element => element > 10);

console.log(index); // 1
```

### 2. El método .findLast() y .findLastIndex()
De la misma forma, tenemos findLastIndex() y findLast(), que son las funciones equivalentes a findIndex() y find(), pero buscando elementos desde derecha a izquierda, en lugar de izquierda a derecha:
```js
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];

names.findLast((name) => name.length == 5);       // 'Pedro'
names.findLastIndex((name) => name.length == 5);  // 2
```



## ACUMULADORES
Nos permiten realizar tareas por cada elemento del array, acumulando valores para hacerles una modificación en cada iteración.

### 1. El método .reduce()
Los métodos denominados reduce() y reduceRight() se encargan de recorrer todos los elementos del array, e ir acumulando sus valores (o alguna operación diferente) y sumarlo todo, para devolver su resultado final.

En este par de métodos, encontraremos una primera diferencia en su función callback, puesto que en lugar de tener los clásicos parámetros opcionales (element, index, array) que hemos utilizado hasta ahora, tiene (first, second, iteration, array), que funciona de forma muy similar, pero adaptado a este tipo de acumuladores.

En la primera iteración, first contiene el valor del primer elemento del array y second del segundo. En siguientes iteraciones, first es el acumulador que contiene lo que devolvió el callback en la iteración anterior, mientras que second es el siguiente elemento del array, y así sucesivamente. Veamos un ejemplo para entenderlo:
```js
const numbers = [95, 5, 25, 10, 25];
numbers.reduce((first, second) => {
  console.log(`F=${first} S=${second}`);
  return first + second;
});

// F=95  S=5    (1ª iteración: elemento 1: 95 + elemento 2: 5) = 100
// F=100 S=25   (2ª iteración: 100 + elemento 3: 25) = 125
// F=125 S=10   (3ª iteración: 125 + elemento 4: 10) = 135
// F=135 S=25   (4ª iteración: 135 + elemento 5: 25) = 160

// Finalmente, devuelve 160
```

### 2. El método .reduceRight()
Gracias a esto, podemos utilizar el método reduce() como acumulador de elementos de izquierda a derecha y reduceRight() como acumulador de elementos de derecha a izquierda. Veamos un ejemplo de cada uno, realizando una resta en lugar de una suma:
```js
const numbers = [95, 5, 25, 10, 25];

numbers.reduce((first, second) => first - second);
// 95 - 5 - 25 - 10 - 25. Devuelve 30

numbers.reduceRight((first, second) => first - second);
// 25 - 10 - 25 - 5 - 95. Devuelve -110
```

### 3. Parámetro inicial
Es posible indicar un segundo parámetro opcional en el .reduce(). Este parámetro es el valor inicial que quieres tomar en el reduce, lo que puede facilitar bastante la implementación. Observa que en el primer ejemplo anterior, se realizan 4 iteraciones. Sin embargo, al indicar este valor inicial de cero se realizan 5 iteraciones:
```js
const numbers = [95, 5, 25, 10, 25];
numbers.reduce((accumulator, nextElement) => {
  console.log(`F=${accumulator} S=${nextElement}`);
  return accumulator + nextElement;
}, 0);

// F=0   S=95   (iteración inicial): 0 + elemento 1: 95) = 95
// F=95  S=5    (1ª iteración: elemento 1: 95 + elemento 2: 5) = 100
// F=100 S=25   (2ª iteración: 100 + elemento 3: 25) = 125
// F=125 S=10   (3ª iteración: 125 + elemento 4: 10) = 135
// F=135 S=25   (4ª iteración: 135 + elemento 5: 25) = 160

// Finalmente, devuelve 160
```

Como se puede ver, hay una iteración 0 extra que es la que toma el valor inicial indicado, junto al primer elemento del array. Luego, sigue iterando con el resto de elementos.



## Desestructuración de arrays
Destructuring es una característica de JavaScript que permite desempaquetar valores de arrays u objetos en variables separadas. En este caso, nos centraremos en la desestructuración de arrays, que es una forma de extraer valores de un array y asignarlos a variables individuales.

La desestructuración de arrays se realiza mediante la asignación de variables entre corchetes [] que coinciden con los elementos del array. Los valores se asignan en el orden en que aparecen en el array, y los elementos no asignados se pueden ignorar utilizando comas adicionales.


### 1. Destructuración básica
```js
const elements = [5, 2];
const [first, last] = elements;    // first = 5, last = 2

const elements = [5, 4, 3, 2];
const [first, second] = elements;  // first = 5, second = 4, rest = discard

const elements = [5, 4, 3, 2];
const [first, , third] = elements; // first = 5, third = 3, rest = discard

const elements = [4];
const [first, second] = elements;  // first = 4, second = undefined
```

Destructuramos el primer elemento en una variable y el resto en una variable array usando el operador rest:
```js
const str = '[head, ...tail] = [1, 2, 3, 4]'
//head = "1"
//tail = [ 2, 3, 4]
```


### 2. Destructuración profunda de arrays
```js
const arr = ["cars", "planes", ["trains", ["motorcycles"]]]

let [ trans1, trans2, [trans3, [trans4]]] = arr

console.log(trans1) // should output "cars"
console.log(trans2) // should output "planes"
console.log(trans3) // should output "trains"
console.log(trans4) // should output "motorcycles"
```

### 3. Intercambio de variables
Veamos otro ejemplo donde utilizamos la desestructuración. En este caso, haremos un clásico intercambio de variables, donde el valor inicial de a debe estar en b y viceversa. Sin utilizar desestructuración, debemos utilizar una variable auxiliar aux donde guardar uno de los valores temporalmente, mientras hacemos el cambio de variables:
```js
// Sin desestructuración
let a = 10;
let b = 5;

let aux = a;
a = b;
b = aux;
```

Sin embargo, si utilizamos desestructuración, este ejemplo es mucho más sencillo:
```js
// Con desestructuración
let a = 10;
let b = 5;

[a, b] = [b, a];
```

### 4. Spread (Expandir | Soltar | Esparcir | Extender | Agrupar)
El operador spread (...) se utiliza para descomponer un array en sus elementos individuales. Se puede utilizar en cualquier lugar donde se esperen argumentos o elementos, como en la definición de una función o en la creación de un nuevo array.

```js
const numbers = [1, 2, 3];
console.log(...numbers); // 1 2 3
```


```js
let arr1 = [1, -2, 3, 4];
let arr2 = [8, 3, -8, 1];

alert( Math.max(1, ...arr1, 2, ...arr2, 25) ); // 25
```
Cuando ...arr es usado en el llamado de una función, **“expande”** el objeto iterable arr en una lista de argumentos.

El operador spread puede ser usado para combinar arrays:
```js
let arr = [3, 5, 1];
let arr2 = [8, 9, 15];

let merged = [0, ...arr, 2, ...arr2];

alert(merged); // 0,3,5,1,2,8,9,15 (0, luego arr, después 2, después arr2)
```


Usamos el operador spread para convertir la cadena en un array de caracteres:
```js
let str = "Hola";

alert( [...str] ); // H,o,l,a
```

La desestructuración en JavaScript es una sintaxis especial que permite extraer valores de arrays o propiedades de objetos en variables distintas. Combinada con el operador spread (...), se convierte en una herramienta poderosa para trabajar con arrays y objetos de manera más eficiente y legible.

El operador spread (...) se puede utilizar junto con la desestructuración para capturar el resto de los elementos de un array. El operador Spread nos permite extender | agrupar | soltar, los valores de un Array u Objeto en un nuevo Array u Objeto. No es una copia como tal, lo que sí es igual, es su contenido.

> [!IMPORTANT]
> Spread suelta | esparce los elementos pero no hace una copia en profundidad.

```js
const array = [1, 2, 3, 4, 5];

const [first, , third, ...rest] = array;

console.log(first); // 1
console.log(third); // 3
console.log(rest); // [4, 5]
// Se ignora el segundo elemento del array
```

En el siguiente ejemplo, veremos que con el operador Spread, se hace un nuevo array, soltando los elementos de miArray y su orden en el nuevo array creado. Pero no es el mismo Array. Los objetos se comparan por referencias y como son arrays diferentes, no tienen igual referencia, aunque tengan los mismos elementos:
```js
const miArray = [ "uno", "dos", "tres"];
const nuevo Array = ...miArray;
console.log(miArray === nuevoArray); // FALSE
```


### 5. Rest (Agrupar)
Ubicación: Se utiliza en la definición de funciones, específicamente en la lista de parámetros.

Función: "Recoge" los argumentos restantes y los agrupa en un array.
```js
function miFuncion(...args) {
  console.log(args); // args es un array que contiene todos los argumentos pasados a la función
}

miFuncion(1, 2, 3, 4); // Output: [1, 2, 3, 4]
```


### 6. Operador ...
El operador ... en JavaScript puede significar tanto rest (agrupar) como spread (expandir), dependiendo del contexto en el que se utilice. 

**1. Rest (Agrupar)**
El operador ... actúa como rest cuando se utiliza en la declaración de funciones o en la desestructuración de arrays y objetos. En este caso, agrupa múltiples elementos en una sola variable.
- En Parámetros de Función: Cuando se utiliza en los parámetros de una función, ... agrupa el resto de los argumentos en un array. Todos los argumentos cuando se utilice y se llame a esta función, se agrupan en un array que se llamará numbers. Esto es algo parecedo al concepto arguments en las funciones normales. Recuerda que en las arrow function no existe el concepto arguments.
  ```js
  function sum(...numbers) { // Aquí, ... significa rest
    return numbers.reduce((total, number) => total + number, 0);
  }

  console.log(sum(1, 2, 3)); // 6
  console.log(sum(4, 5, 6, 7)); // 22
  ```

- En Desestructuración de Arrays: Cuando se utiliza en la desestructuración de arrays, ... agrupa los elementos restantes en un nuevo array.
  ```js
  const array = [1, 2, 3, 4, 5];
  const [first, second, ...rest] = array; // Aquí, ... significa rest

  console.log(first); // 1
  console.log(second); // 2
  console.log(rest); // [3, 4, 5]
  ```

- En Desestructuración de Objetos: Cuando se utiliza en la desestructuración de objetos, ... agrupa las propiedades restantes en un nuevo objeto.
  ```js
  const person = {
    name: 'John',
    age: 30,
    job: 'developer',
    city: 'New York'
  };
  
  const { name, age, ...rest } = person; // Aquí, ... significa rest
  
  console.log(name); // 'John'
  console.log(age); // 30
  console.log(rest); // { job: 'developer', city: 'New York' }
  ```
  
**2. Spread (Expandir)**
El operador ... actúa como spread cuando se utiliza en el contexto de una llamada a función, arrays o objetos para expandir un iterable en lugares donde se esperan múltiples elementos.
- En Llamadas a Función: Cuando se utiliza en la llamada a una función, ... expande un array en múltiples argumentos.
  ```js
  const numbers = [1, 2, 3];
  console.log(Math.max(...numbers)); // Aquí, ... significa spread
  // Es equivalente a Math.max(1, 2, 3)
  ```

- En Literales de Arrays: Cuando se utiliza en literales de arrays, ... expande un iterable en elementos individuales.
  ```js
  const array1 = [1, 2, 3];
  const array2 = [...array1, 4, 5]; // Aquí, ... significa spread
  
  console.log(array2); // [1, 2, 3, 4, 5]
  ```

- En Literales de Objetos: Cuando se utiliza en literales de objetos, ... copia las propiedades de un objeto a otro.
  ```js
  const obj1 = { a: 1, b: 2 };
  const obj2 = { ...obj1, c: 3 }; // Aquí, ... significa spread
  
  console.log(obj2); // { a: 1, b: 2, c: 3 }
  ```

**Resumen:**
- Rest (Agrupar):
  - Se utiliza en la declaración de funciones para agrupar argumentos en un array.
  - Se utiliza en la desestructuración de arrays y objetos para agrupar el resto de los elementos/properties.
- Spread (Expandir):
  - Se utiliza en llamadas a funciones para expandir un array en múltiples argumentos.
  - Se utiliza en literales de arrays para expandir un iterable en elementos individuales.
  - Se utiliza en literales de objetos para copiar las properties de un objeto a otro.

**Regla mnemotécnica:**
- Rest: Piensa en "restar" o "recoger" los argumentos restantes en un array.
- Spread: Piensa en "esparcir" o "expandir" los elementos de un iterable.


## Reestructuración de arrays
Tenemos un array de 2 elementos [3, 4] y queremos aprovecharlo para crear un nuevo array del 1 al 5. Vamos a hacer uso de la desestructuración para reaprovecharlo:
```js
const pair = [3, 4];

// Usando desestructuración + spread
const complete = [1, 2, ...pair, 5];  // [1, 2, 3, 4, 5]

// Sin usar desestructuración
const complete = [1, 2, pair, 5];     // [1, 2, [3, 4], 5]
```

En este caso, tendríamos que complete es el nuevo array [1, 2, 3, 4, 5] que buscábamos si usamos la desestructuración, pero ten en cuenta que si no utilizaramos el ... previo al pair, conseguiríamos algo muy diferente: [1, 2, [3, 4], 5].



## Comparando arrays
⚠ Los arrays son objetos y por tanto implementan la misma comparación que éstos:
```js
const collection = [3];
console.log(collection === [3]); // false. Different object.
console.log(collection === collection); // true
console.log([] == ""); // true (type coertion). [].toString() => "" == ''
```




# MUTABILIDAD EN ESTRUCTURAS DE DATOS
En javascript tenemos, principalmente, dos formas de declarar variables: "let" y "const". Estas 2 formas diferenciadas se entenderán mejor cuando expliquemos una tercera, mediante la keyword "var", que se empleaba de forma primigenia hasta la llegada de "let" y "const".

Las diferencias entre ellas tienen más que ver con su ámbito y su capacidad de ser re-declaradas y re-asigandas. Y esto último es muy importante: RE-ASIGNCIÓN.

UN ERROR COMÚN es pensar que "const" hace "constante" cualquier variable. Es decir, que "const" de algún modo congela el valor que le hayamos asignado, no siendo posible mutarlo en la práctica. PERO ESTO ES FALSO! "const" simplemente significa que la variable NO puede ser RE-ASIGNADA!

El motivo principal para pensar así suele venir de los valores primitivos. Al declararlos con "const" solemos pensar: "ya no puedo cambiarlo nunca más". Pero realmente, lo que no podemos es RE-ASIGNAR la variable declarada con "const". Los primitivos ya son no-mutables por naturaleza, "const" no les confiere ningún superpoder para 'congelarse'.

```js
const primitive = true;
primitive = false; // TypeError: Assignment to constant variable
```

SIN EMBARGO, cuando declaramos con "const" estructuras de datos, si que podemos mutarlas puesto que "const" no nos previene de ello, simplemente evita que reasignemos la variable.
```js
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
```


## Array Prototype Last
Código que mejore todos los arrays de tal manera que puedas llamar al método array.last() en cualquier array y este devuelva el último elemento. Si no hay elementos en el array, debería devolver -1.

Este bloque de comentario es un comentario de JSDoc que describe lo que hace la función last que se va a definir. Indica que la función puede devolver varios tipos de datos: null, boolean, number, string, Array, u Object.
```js
/**
 * @return {null|boolean|number|string|Array|Object}
 */
```

Añadiendo un nuevo método llamado last al prototipo del objeto Array. Esto significa que todas las instancias de Array tendrán acceso a este método.
```js
Array.prototype.last = function() {
  ......
};
```



```js
/**
 * @return {null|boolean|number|string|Array|Object}
 */
Array.prototype.last = function() {
    return this.length === 0 ? -1 : this[this.length-1]
};

/**
 * const arr = [1, 2, 3];
 * arr.last(); // 3
 */
```

Ejemplo:
```js
function getLastItem(arr) {
    if (arr.length === 0) {
        return undefined; // O cualquier valor que consideres apropiado para matrices vacías
    }
    return arr[arr.length - 1];
}
```





## Encontrar el menor elemento de un array:
**Combinación de Math.min y el Operador de Propagación ... operador de propagación (spread operator)**
Para encontrar el menor elemento en un array, puedes combinar Math.min con el operador de propagación para expandir el array en una lista de argumentos individuales:
```js
let arr1 = [3, 1, 4, 1, 5, 9];
let min1 = Math.min(...arr1);
console.log(min1); // Salida: 1
```
Operador de Propagación: ...arr1 expande el array en los elementos individuales 3, 1, 4, 1, 5, 9.
Función Math.min: Math.min(3, 1, 4, 1, 5, 9) encuentra el menor valor entre los argumentos proporcionados, que es 1.


---------------------
# 3. Set - Conjuntos
Set es una estructura de datos no repetidos. Representa conjuntos de datos. La característica principal es que los datos insertados no se pueden repetir.
```js
const set = new Set();                    // Set({})               (Conjunto vacío)
const set = new Set([5, 6, 7, 8, 9]);     // Set({5, 6, 7, 8, 9})  (Conjunto con 5 elementos)
const set = new Set([5, 5, 7, 8, 9]);     // Set({5, 7, 8, 9})     (Conjunto con 4 elementos)

set.constructor.name;                     // "Set"
```


---------------------
# 4. Map
Los Map en Javascript son estructuras de datos nativas que permiten implementar una estructura de tipo mapa, es decir, una estructuras donde tiene valores guardados a través de una clave para identificarlos. Comúnmente, esto se denomina pares clave-valor.

Un Map es una colección de pares clave-valor, donde cada clave está asociada a un valor único. A diferencia de los objetos simples en JavaScript, donde las claves deben ser strings (o símbolos), en un Map puedes utilizar cualquier tipo de dato como clave, incluyendo números, booleanos, objetos e incluso otros Map.

## Características principales:
- Claves únicas: Cada clave en un Map debe ser única. Si intentas agregar un valor con una clave existente, el valor anterior será sobrescrito.
- Orden de inserción: Un Map mantiene el orden de inserción de los elementos. Esto significa que puedes iterar sobre los elementos en el mismo orden en que fueron agregados.
- Métodos útiles: Los Map ofrecen una variedad de métodos para manipular y acceder a sus elementos, como set(), get(), has(), delete(), size, keys(), values() y entries().

```js
const map = new Map();                                        // Map({}) (Mapa vacío)
const map = new Map([[1, "uno"]]);                            // Map({ 1=>"uno" })
const map = new Map([[1, "uno"], [2, "dos"], [3, "tres"]]);   // Map({ 1=>"uno", 2=>"dos", 3=>"tres" })

map.constructor.name;                     // "Map"
```
En este ejemplo, creamos un elemento map, que no es más que un mapa de pares clave-valor. El primer map se define como un mapa vacío, el segundo, es un mapa con un solo elemento, y el tercero con 3 elementos. Para inicializar los mapas con datos, se introduce como parámetro un array de entradas (un array de arrays), que en nuestro tercer caso tiene estas combinaciones:
- Clave: NUMBER 1 => Valor: STRING "uno"
- Clave: NUMBER 2 => Valor: STRING "dos"
- Clave: NUMBER 3 => Valor: STRING "tres"

Los tipos de dato Map son muy similares a los Objetos de Javascript, ya que estos últimos se pueden usar como estructuras de diccionario mediante pares clave-valor. Sin embargo, los Object tienen algunas diferencias como que pueden colisionar algunos nombres de claves o que las claves deben ser string o symbol, entre varias otras.

**Comparación de Map con Objetos:**
| Característica |	Object	| Map |
| ---- | ---- | ---- |
| Tipos de Claves	| Strings y Symbols	| Cualquier tipo (incluso objetos) | 
| Orden de Inserción	| No garantizado	| Garantizado
| Iteración	| Propiedades enumerables	| Métodos específicos (keys(), values(), entries()) | 
| Desempeño de Operaciones	| Optimizado para cadenas	| Mejor para claves de tipos variados | 
| Tamaño	| No hay método directo	| size | 


## Cuando usar Object:
- Claves de tipo string (o símbolo): Si todas tus claves son strings (o símbolos), un objeto es la opción más natural y sencilla.
- Acceso rápido a propiedades: Los objetos ofrecen un acceso muy rápido a sus valores a través de la notación de punto (.) o de corchetes ([]).
- JSON: Si necesitas serializar tus datos en formato JSON, los objetos son la opción ideal, ya que JSON se basa en la estructura de objetos de JavaScript.
- Prototipos y herencia: Si necesitas utilizar la herencia de prototipos en tus datos, los objetos son la única opción, ya que los mapas no soportan esta característica.

## Cuando usar Map:
- Claves de cualquier tipo: Si necesitas utilizar claves que no sean strings (o símbolos), como números, booleanos, objetos u otros mapas, entonces debes usar un Map.
- Orden de inserción: Si el orden en que se insertaron los elementos es importante para tu aplicación, un Map es la mejor opción, ya que mantiene este orden.
- Tamaño dinámico: Si el número de elementos en tu colección puede variar y necesitas conocer su tamaño exacto en cualquier momento, un Map es más adecuado, ya que proporciona la propiedad size.
- Iteración: Si necesitas iterar sobre las claves, los valores o las entradas (pares clave-valor) de forma directa y eficiente, un Map ofrece métodos específicos para ello (keys(), values() y entries()).

------------------
# 5. WeakSet
En JavaScript, WeakSet es una colección de objetos, similar a un conjunto (Set), pero con algunas diferencias importantes que lo hacen más adecuado para ciertos casos de uso relacionados con la gestión de memoria y la eliminación automática de objetos. Los weaksets son colecciones de objetos únicos. No permiten valores primitivos como claves.

--------------------
# 6. WeakMap
Los weakmaps son colecciones de pares clave-valor donde las claves deben ser objetos.

-----------------
# FORMATO JSON
Buena práctica: Separar nuestro código de programación de los datos que aparecen en él. JSON se utiliza ampliamente para representar estructuras de datos, especialmente en el contexto de comunicación entre servidores y aplicaciones web.

JSON se basa en una subconjunto del lenguaje de programación JavaScript, específicamente en la notación de objetos de JavaScript, aunque es independiente del lenguaje y se utiliza ampliamente en diferentes entornos de programación. JSON son las siglas de JavaScript Object Notation. JSON es un formato ligero de datos, con una estructura (notación) específica, que es totalmente compatible de forma nativa con Javascript. Como su propio nombre indica, JSON se basa en la sintaxis que tiene Javascript para crear objetos. JSON es un formato ligero y fácil de leer para intercambiar datos. Es como una forma organizada de escribir información en forma de texto.

Además de JSON, existen otros formatos para separar datos y código, como XML, CSV, YAML, etc. La elección del formato depende de tus necesidades y preferencias.

Su contenido puede ser simplemente un array, un number, un string, un boolean o incluso un array, sin embargo, lo más habitual es que parta siendo un object o un array. Puedes comprobar en (https://jsonlint.com/) si algo concreto es un JSON válido o no.

Debemos tener mucho cuidado con las comillas mal cerradas o las comas sobrantes (antes de un cierre de llaves, por ejemplo). Suelen ser motivos de error de sintaxis frecuentemente. 

## Características de JSON
- Formato de Texto: JSON es un formato basado en texto que es independiente del lenguaje de programación.
- Intercambio de Datos: JSON se utiliza comúnmente para enviar y recibir datos entre un cliente y un servidor.
- Sintaxis Simplicidad: La sintaxis de JSON es fácil de leer y escribir, lo que lo hace ideal para representar datos estructurados.

## Usos Comunes de JSON
- Comunicación Cliente-Servidor: JSON es el formato de datos preferido para APIs web, facilitando el intercambio de datos entre el cliente (navegador) y el servidor.
- Configuración: JSON se utiliza a menudo para archivos de configuración debido a su simplicidad y legibilidad.
- Almacenamiento de Datos: JSON se usa para almacenar datos estructurados en bases de datos NoSQL como MongoDB.

## Ejemplo de JSON:
```js
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
```js
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
```js
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
```js
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
```js
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

## Estructuras de Datos Representadas en JSON
- JSON puede representar las siguientes estructuras de datos básicas:
  - Objetos: Colecciones de pares clave-valor (similar a los objetos en JavaScript).
  - Arrays: Listas ordenadas de valores (similar a los arrays en JavaScript).
  - Valores Primitivos: Cadenas, números, booleanos y null.



# Cadenas de Texto
## Métodos de Cadenas de Texto
- **.length**: Devuelve la longitud de la cadena.
- **.charAt(index)**: Devuelve el carácter en la posición index.
- **.charCodeAt(index)**: Devuelve el valor Unicode del carácter en la posición index.
- **.concat(str1, str2, ...)**: Concatena una o más cadenas con la cadena actual.
- **.includes(searchString, position)**: Devuelve true si searchString está en la cadena, false en caso contrario.
- **.indexOf(searchValue, fromIndex)**: Devuelve la posición de la primera ocurrencia de searchValue en la cadena, o -1 si no se encuentra.
- **.lastIndexOf(searchValue, fromIndex)**: Devuelve la posición de la última ocurrencia de searchValue en la cadena, o -1 si no se encuentra.
- **.match(regexp)**: Devuelve un array con las coincidencias de la cadena con la expresión regular regexp.
- **.replace(searchValue, newValue)**: Reemplaza searchValue por newValue en la cadena.
- **.search(regexp)**: Devuelve la posición de la primera coincidencia de la expresión regular regexp en la cadena, o -1 si no se encuentra.
- **.slice(start, end)**: Devuelve una subcadena de la cadena desde start hasta end.
- **.split(separator, limit)**: Divide la cadena en un array de subcadenas utilizando separator como delimitador.
- **.substr(start, length)**: Devuelve una subcadena de la cadena desde start con una longitud de length.
- **.substring(start, end)**: Devuelve una subcadena de la cadena desde start hasta end.
- **.toLowerCase()**: Devuelve la cadena en minúsculas.
- **.trim()**: Elimina los espacios en blanco al principio y al final de la cadena.
- **.toUpperCase()**: Devuelve la cadena en mayúsculas.
- **.toString()**: Devuelve la cadena como un string.
- **.valueOf()**: Devuelve el valor primitivo de la cadena.
