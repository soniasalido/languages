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


## Desestructuración de Objetos
La desestructuración de objetos es, probablemente, una de las estrategias más utilizadas al trabajar en Javascript nativo (o en frameworks como React) debido a que en Javascript se utilizan muchísimo las estructuras de datos de objetos y es muy interesante simplificar lo máximo posible. **Separamos las propiedades name, role y life en variables individuales, «sacándolas» de user.**

```
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
```
console.log({ name, role, life });
```

También es posible **renombrar las propiedades** si lo deseamos:
```
const { name, role: type, life } = user;
console.log({ name, type, life });
```

**Establecer un valor por defecto de una propiedad:** Para los casos en los que una de esas propiedades no exista (o tenga un valor undefined), también podemos establecerle un valor por defecto como solemos hacer en los parámetros de una función:
```
const { name, role = "normal user", life = 100 } = user;
console.log({ name, role, life });
```
Esto hará que, si no existe la propiedad role en el objeto user, se cree la variable role con el Sting "normal user".


## Reestructurando nuevos objetos
Esta característica de desestructuración podemos aprovecharla a nuestro favor, para reutilizar objetos y recrear nuevos objetos a partir de otros, basándonos en objetos ya existentes, añadiéndole nuevas propiedades o incluso sobreescribiendo antiguas.
```
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

**OJO:** En el caso de hacer ...user al final (en lugar de al principio), le estamos dando preferencia a las propiedades de user, que sobreescribirían las propiedades definidas anteriormente en el caso de coincidir.


## Haciendo copias de Objetos
Los valores primitivos (números, strings, booleanos...), se pasan por valor. Sin embargo, valores más complejos (no primitivos: objetos, arrays, etc...) se pasan por referencia.
```
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

```
console.log(user.features);       // ["learn", "code", "paint"]
console.log(fullUser.features);   // ["learn", "code", "paint"]

fullUser.features[0] = "program";

console.log(fullUser.features);   // ["program", "code", "paint"]
console.log(user.features);       // ["program", "code", "paint"]
```

Como se puede ver, hemos cambiado el primer elemento del array features del objeto fullUser, sin embargo, **si comprobamos el contenido del objeto user, comprobaremos que también ha cambiado.** Esto ocurre porque realmente **la propiedad features del objeto fullUser es una referencia a la propiedad features del objeto user, y es realmente la que se está modificando, alterando así ambos objetos.**

### Solución: 
```
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
```
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
```
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
```
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
```
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
```
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


## Clonar objetos o elementos
Javascript tiene dos mecanismos para copiar elementos:
🥂 Copia por valor (Duplica el contenido)
🔮 Copia por referencia (Hace referencia a dónde está el contenido)
![](https://lenguajejs.com/javascript/objetos/clonar-o-copiar-elementos/copia-valor-referencia.png)


### 1. Copia por valor
Se realiza con los tipos de datos más básicos, es decir, los tipos de datos primitivos, es decir: Number, String, Boolean, etc. Esto ocurre así porque son estructuras simples y rápidas de copiar.

La copia por valor significa que simplemente se crea una nueva variable o constante y se asigna el mismo valor que tiene la variable original. Lo que a efectos prácticos cualquiera imaginaría como una copia:
```
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
```
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
```
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


```
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
```
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


## Iteradores de Objetos
Iterador es un término que se suele referir a algo que te permite recorrer una estructura de datos por todos sus apartados o miembros. En muchos casos, se presenta la situación en la que necesitamos recorrer un objeto, a través de las propiedades de su estructura, como si fueran los elementos de un array. 

Existen unos **métodos denominados Object.keys(), Object.values() y Object.entries()** que nos van a permitir realizar esta tarea. En primer lugar, observa que son métodos de una Clase estática, por lo que tienes que escribir siempre el Object. y no ejecutar el método sobre el objeto en sí, como solemos hacerlo.

| Método |	Descripción |
| ---- | ---- |
| Object.keys(obj)  | Itera el objeto y **devuelve un array con las claves (propiedades) del objeto.** |
| Object.values(obj) | Itera el objeto y **devuelve un array con los valores de sus propiedades.**  |
| Object.entries(obj) | Itera el objeto y **devuelve un array con los pares [key, valor].**  |
| Object.fromEntries(array)  | Itera el objeto y **devuelve un objeto con un array de pares [key, valor].**  |


## Convertir un objeto a array
```
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


## Iterar un Array con los métodos de iterar Objetos
Como un Array también es un Object, podemos utilizar estos métodos también para recorrerlos, sólo que en este caso los índices del array son las posiciones (0, 1, 2, 3...).
```
const animals = ["Gato", "Perro", "Burro", "Gallo", "Ratón"];

Object.keys(animals);     // [0, 1, 2, 3, 4]
Object.values(animals);   // ["Gato", "Perro", "Burro", "Gallo", "Ratón"]
Object.entries(animals);  // [[0, "Gato"], [1, "Perro"], [2, "Burro"], [3, "Gallo"], [4, "Ratón"]]
```


## Convertir un array a objeto. Forma 1. Usando el método Object.keys(keys)
También se puede hacer la operación inversa, convertir un array en un objeto. Para ello, usaremos el método Object.fromEntries(). En esta ocasión, vamos a partir de dos Array keys y values, donde el primero tiene la lista de propiedades en String y el segundo tiene la lista de valores.

El objetivo es, a partir de esos dos arrays (que deben ser del mismo tamaño), generar el objeto inicial user que teníamos antes:
```
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
```
const keys = ["name", "life", "power", "talk"];
const values = ["Manz", 99, 10, function() { return "Hola" }];

const entries = values.map((value, index) => [keys[index], value]);
const user = Object.fromEntries(entries);
```


## Agrupar datos por criterio
En principio, tenemos dos métodos apropiados para esta tarea. Ambos son idénticos, la diferencia es que uno crea un Objeto y otro crea un Map:
| Método |	Descripción |
| ---- | ----|
| Object.groupBy(datos, criterio)	| Agrupa en un Object los datos por el criterio indicado.|
| Map.groupBy(datos, criterio)	| Agrupa en un MAP los datos por el criterio indicado. |

Por parámetro, pasaremos la estructura de datos Array y en el segundo parámetros una Function que hará de callback para definir cuál es el criterio que vamos a escoger.

### 1. El método Object.groupBy()
El método Object.groupBy() es una utilidad de JavaScript que permite agrupar los elementos de un array en un objeto, donde las claves del objeto son los valores obtenidos de aplicar una función de agrupamiento a cada elemento del array. Este método es muy útil para organizar datos en categorías de manera sencilla.
Dado el array de usuarios:
```
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
```
const usersByType = Object.groupBy(users, user => user.type);
```


Resultado: El resultado es un objeto donde las claves son los diferentes tipos de usuarios (streamer, moderator, viewer) y los valores son arrays de objetos de usuarios correspondientes a cada tipo:
```
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
```
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
```
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

--------------------------------------------------------------------
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

-------------------------------
# ARRAYS
Datos estructurados siguiendo un orden. Cada dato se identifica con un índice que indica su posición dentro de la estructura. Un  es una colección o agrupación de elementos en una misma variable, cada uno de ellos ubicado por la posición que ocupa en el array. En algunas ocasiones también se les suelen llamar arreglos o vectores. En Javascript, se pueden definir de varias formas:

| Constructor |	Descripción |
|----| ----|
| ARRAY new Array(size) |	Crea un array vacío de tamaño size. Sus valores no están definidos, pero Undefined son .|
| ARRAY new Array(e1, e2...)	| Crea un array con los elementos indicados.|
| ARRAY [e1, e2...]	| Simplemente, los elementos dentro de corchetes: []. Notación preferida.|

Al contrario que muchos otros lenguajes de programación, **Javascript permite que se puedan realizar arrays de tipo mixto**, no siendo obligatorio que todos los elementos sean del mismo tipo de dato.

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
```
const letters = ["a", "b", "c"];

letters.length;   // 3
letters[0];       // 'a'
letters[2];       // 'c'
letters[5];       // undefined
```

 Las posiciones empiezan a contar desde 0 y que si intentamos acceder a una posición que no existe (mayor del tamaño del array), nos devolverá un Undefined.

El operador [] no sólo nos **permite obtener o acceder a un elemento del array, sino que también nos permite modificar un elemento específico del array,** si utilizamos la asignación:
```
const letters =  ["a", "b", "c"];

letters[1] = "Z";  // Devuelve "Z" y modifica letters a ["a", "Z", "c"]
letters[3] = "D";  // Devuelve "D" y modifica letters a ["a", "Z", "c", "D"]
letters[5] = "A";  // Devuelve "A" y modifica letters a ["a", "Z", "c", "D", undefined, "A"]
```

### 2. El método .at()
Además del clásico operador [], también podemos utilizar el método .at(), añadido en Javascript ES2022. Con él, se puede hacer exactamente lo mismo que con [pos], sólo que además permite valores negativos, mediante los cuales se puede obtener elementos en orden inverso, es decir, empezando a contar desde el último elemento:
```
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
```
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


**⚠️ Recuerda que estos métodos sirven para modificar (mutar) el array original.**
```
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


## Separar y unir strings
Además, también tenemos otro método con el que es posible crear un ARRAY a partir de un STRING. Se trata del método .split(). En este caso, el método .join() es su contrapartida. Con .join() podemos crear un STRING con todos los elementos del array, separándolo por el texto que le pasemos por parámetro:
```
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
```
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
```
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
```
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

C  ON copyWithin(pos, start, end) nos permite alterar el array, de modo que, empezando en la posición pos, copiará los elementos que están desde la posición start hasta la posición end. El parámetro end es opcional, de modo que si no se indica, se asume que end es el tamaño del array.


## Reducir el tamaño de un array
También, en ciertos casos, nos podría interesar reducir el tamaño de un array para quedarnos con sus primeros elementos y descartar el resto. En el siguiente ejemplo, creamos un nuevo  con .slice(). Dicho array es una versión reducida del array original que teníamos en un principio:
```
// Mediante slice()
const numbers = [1, 2, 3, 4, 5, 6, 7, 8];
const newNumbers = numbers.slice(0, 4);

newNumbers    // [1, 2, 3, 4], numbers no cambia
```

Sin embargo, hay una forma muy sencilla y rápida de hacer lo mismo, que es modificar directamente el tamaño del array mediante la propiedad .length. Por ejemplo, hacer un numbers.length = 4 en un array de 8 elementos, reducirá el array a los primeros 4 elementos:
```
// Mediante .length
const numbers = [1, 2, 3, 4, 5, 6, 7, 8];
numbers.length = 4;

numbers       // [1, 2, 3, 4], numbers cambia
```
En este último caso no estamos creando un nuevo array, sino que reutilizamos el que ya teníamos, reduciendo su tamaño y descartando el resto de elementos.


## Rellenar un array con .fill()
Existe un método que nos permite rellenar el ARRAY con los elementos indicados. Se le puede indicar unos parámetros opcionales start y end para establecer la posición de inicio y/o fin donde queremos rellenar, y así sólo alterar un fragmento del array.

⚠️ Ten en cuenta que con .fill() estamos alterando el ARRAY.
```
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
```
const nuevoArray = arrayOriginal.map(funcionDeTransformacion);
```


### 1. Usando .map() para transformar un array
Supongamos que tienes un array de números y quieres crear un nuevo array donde cada número se incrementa en 1.
```
const numbers = [1, 2, 3, 4, 5];
const incrementedNumbers = numbers.map(number => number + 1);

console.log(incrementedNumbers); // [2, 3, 4, 5, 6]
```
Donde, la funcionDeTransformacion es una función que se aplica a cada elemento del array original. Esta función recibe el elemento actual, su índice y el array original como argumentos, y debe devolver el nuevo valor que reemplazará al elemento original en el nuevo array.



### 2. Rellenar un array usando .map()
Aunque .map() se utiliza principalmente para transformar elementos existentes, también puedes usarlo para crear un nuevo array y rellenarlo con valores específicos.
```
const indices = [0, 1, 2, 3, 4];
const cuadrados = indices.map(indice => indice * indice); // [0, 1, 4, 9, 16]
```

Rellenar con valores de otro array:
```
const nombres = ["Ana", "Juan", "María"];
const saludos = nombres.map(nombre => `Hola, ${nombre}!`); // ["Hola, Ana!", "Hola, Juan!", "Hola, María!"]
```

## Manipular arrays de manera inmutable: Método .with()
El método .with() es una adición reciente a JavaScript que permite crear una copia de un array, pero con un cambio en un elemento específico. La característica principal de este método es que no modifica el array original, sino que devuelve una nueva copia del array con el cambio aplicado. Esto es especialmente útil en programación funcional e inmutable.

Permite encadenar múltiples operaciones, pero debemos de tener en cuenta que **sólo modifica, no se pueden añadir elementos que no existen antes en el array**:
```
const fruits = ['apple', 'banana', 'cherry', 'date'];

// Usando el método .with() para cambiar 'banana' por 'blueberry'
const newFruits = fruits.with(1, 'blueberry');

console.log(fruits); // ['apple', 'banana', 'cherry', 'date']
console.log(newFruits); // ['apple', 'blueberry', 'cherry', 'date']

```

## Iterar sobre los elementos de un Array
### 1. forEach()
El método forEach es un método de los arrays que ejecuta una función dada en cada uno de sus elementos.
```
const array = [1, 2, 3, 4, 5];

array.forEach(element => {
  console.log(element);
});

```

### 2. for(...)
```
const array = [1, 2, 3, 4, 5];

for (let i = 0; i < array.length; i++) {
  console.log(array[i]);
}

```

### 3. for..of (azúcar sintáctico para objetos iterables)
```
const array = [1, 2, 3, 4, 5];

for (const element of array) {
  console.log(element);
}

```

Un string, por ejemplo, implementa el patrón iterable y puede ser recorrido con for..of
```
for (const char of "javi") {
  console.log(char); // "j", "a", "v", "i"
}
```

### 4. map Method
El método map crea un nuevo array con los resultados de la llamada a la función indicada aplicados a cada uno de sus elementos. No se usa típicamente solo para iterar, sino para transformar los elementos del array.
```
const array = [1, 2, 3, 4, 5];
const newArray = array.map(element => element * 2);

console.log(newArray); // [2, 4, 6, 8, 10]
```

### 5. for...in Loop
El bucle for...in se usa para iterar sobre las propiedades de un objeto. Aunque se puede usar con arrays, no es recomendable ya que itera sobre las propiedades enumerables, lo cual puede incluir propiedades no numéricas.
```
const array = [1, 2, 3, 4, 5];

for (const index in array) {
  console.log(array[index]);
}

```


### 6. while Loop
El bucle while ejecuta su bloque de código siempre que una condición especificada sea verdadera.
```
const array = [1, 2, 3, 4, 5];
let i = 0;

while (i < array.length) {
  console.log(array[i]);
  i++;
}
```

### 7. do...while Loop
El bucle do...while es similar a while, pero garantiza que el bloque de código se ejecute al menos una vez.
```
const array = [1, 2, 3, 4, 5];
let i = 0;

do {
  console.log(array[i]);
  i++;
} while (i < array.length);
```

### 8. reduce Method
El método reduce se usa para acumular valores a través del array, pero también se puede usar para iterar.
```
const array = [1, 2, 3, 4, 5];

array.reduce((accumulator, currentValue) => {
  console.log(currentValue);
  return accumulator;
}, 0);
```

### 9. entries Method with for...of
Puedes usar el método entries junto con for...of para iterar tanto sobre el índice como sobre el valor del array.
```
const array = [1, 2, 3, 4, 5];

for (const [index, element] of array.entries()) {
  console.log(`Index: ${index}, Element: ${element}`);
}
```

### 10. every Method
El método every ejecuta una función en cada elemento del array hasta que la función devuelve un valor false.
```
const array = [1, 2, 3, 4, 5];

array.every(element => {
  console.log(element);
  return true; // continuar iterando
});
```

### 11. some Method
El método some ejecuta una función en cada elemento del array hasta que la función devuelve un valor true.
```
const array = [1, 2, 3, 4, 5];

array.some(element => {
  console.log(element);
  return false; // continuar iterando
});

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
```
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
```
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
```
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
```
const letters = ["a", "b", "c", "d"];

letters.forEach((letter) => console.log(letter));
```


## Comprobaciones en Arrays
Existen dos métodos para realizar comprobaciones: el método .every() y el método .some(). Ambos métodos evaluan los elementos del array y devuelven siempre un ARRAY, que representa si se cumple o no. Los explicamos a continuación.

### 1. El método .every() (Todos)
El método every() permite comprobar si todos y cada uno de los elementos de un array cumplen la condición que se especifique en la FUNCTION  callback:
```
const letters = ["a", "b", "c", "d"];
letters.every((letter) => letter.length === 1); // true
```

### 2. El método .some() (Al menos uno)
De la misma forma que el método anterior sirve para comprobar si todos los elementos del array cumplen una determinada condición, con some() podemos comprobar si al menos uno de los elementos del array, cumplen dicha condición definida por el callback.
```
const letters = ["a", "bb", "c", "d"];
letters.some((element) => element.length == 2);   // true
```


## Transformadores y filtros en Arrays
### 1. El método .map()
El método map() es un método muy potente y útil para trabajar con arrays, puesto que su objetivo es devolver un nuevo array donde cada uno de sus elementos será lo que devuelva la función callback por cada uno de los elementos del array original:
```
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];
const nameSizes = names.map((name) => name.length);

nameSizes; // Devuelve [3, 5, 5, 9, 9]
```

### 2. El método .filter()
El método filter() nos permite filtrar los elementos de un array y devolver un nuevo array con sólo los elementos que queramos. Para ello, utilizaremos la función callback para establecer una condición que devuelve true sólo en los elementos que nos interesen:
```
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];
const filteredNames = names.filter((name) => name.startsWith("P"));

filteredNames; // Devuelve ['Pablo', 'Pedro', 'Pancracio']
```


### 3. El método .flatMap()
Un método que puede resultar interesante es .flat(level). Se trata de un método que revisa todos los elementos del array en busca de arrays anidados, y los aplana hasta el nivel level indicado por parámetro.
```
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
```
const names = ["Ana", "Pablo", "Pedro", "Pancracio", "Heriberto"];

names.find((name) => name.length == 5);       // 'Pablo'
names.findIndex((name) => name.length == 5);  // 1
```

### 2. El método .findLast() y .findLastIndex()
De la misma forma, tenemos findLastIndex() y findLast(), que son las funciones equivalentes a findIndex() y find(), pero buscando elementos desde derecha a izquierda, en lugar de izquierda a derecha:
```
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
```
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



---------------
// Inicialización de arrays de forma literal.
const collection = ["hey", "ho", "let's go"]; // [] => Inicializador de arrays


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
