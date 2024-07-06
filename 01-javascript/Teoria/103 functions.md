
# FUNCIONES

[Funciones](#functions)  
[1.- Hoisting](#1-hoisting)  
[2.- Enlaces y Ámbitos](#2-enlaces-y-ámbitos---bindings-and-scopes)  
[3.- Closure - Clausura](#3-closure---clausura-)  
[4.- Ámbito o Alcance Léxico (Lexical Scope)](#4-ámbito-o-alcance-léxico-lexical-scope)  
[5.- Funciones Autoinvocadas](#5-funciones-autoinvocadas---iife-)
[6.- Template Functions | Tagged Template Literals](#6-template-functions--tagged-template-literals)
[6.- Definición de Funciones](#6-template-functions--tagged-template-literals)
[7.- Definición de Funciones](#7-definición-de-funciones---notación-de-declaración)
- [7.1.- Funciones Declaradas](#71-funciones-declaradas)
- [7.2.- Funciones Expresadas](#72-funciones-expresadas)
- [7.3.- Funciones Flecha (Arrow Functions)](#73-funciones-flecha-arrow-functions)
- [7.4.- Funciones Anónimas (Callback)](#74-funciones-anónimas-callback)
- [7.5.- Métodos dentro de Objetos](#75-métodos-dentro-de-objetos)  

[8.- Parámetros y Argumentos](#8-parámetros-y-argumentos)  
- [8.1.- Añadiendo valor de retorno](#81--añadiendo-valor-de-retorno)  
- [8.2.- Funciones de Orden Superior (Higher-Order Functions)](#82-funciones-de-orden-superior-higher-order-functions)  
- [8.3.- Closures](#83-closures)  
- [8.4.- Funciones Recursivas](#84-funciones-recursivas)  
- [8.5.- Funciones Generadoras](#85-funciones-generadoras)  
- [8.6.- this en Funciones](#86-this-en-funciones)  
- [8.7.- VARIADIC FUNCTIONS](#87-variadic-functions)  
    - [8.7.1.- Funciones Variadic mediante el operador rest](#871-funciones-variádicas-mediante-el-operador-rest)  
    - [8.7.2.- Funciones Variadic mediante el objeto iterable Arguments (Argumentos Objeto)](#872-funciones-variádicas-mediante-el-objeto-iterable-argumets-argumentos-objeto)  

[9.- Crecimiento de funciones](#9-crecimiento-de-funciones)  
[10.- Funciones y efectos secundarios](#10-funciones-y-efectos-secundarios)  
[11.- Parámetro Rest](#11--parámetro-rest)  
[12.- La variable Arguments](#12-la-variable-arguments)  
[13.- Diferencias entre el Operador Rest y el Objeto Arguments](#13-diferencias-entre-el-operador-rest-y-el-objeto-arguments)  
[14.- Curried Functions](#14-curried-functions)    
[15.- Nested Functions](#15-nested-functions)  
[16.- Función como objeto, NFE](#16-función-como-objeto-nfe)  



-------
# Functions
```js
function name(parámetros, delimitados, por, coma) {
  /* code */
}
```
Las funciones son un tipo especial de OBJETOS 😲. Al igual que sucede en otros lenguajes, son elementos invocables que reciben una serie de argumentos y pueden devolver valores.


Las funciones en JavaScript son bloques de código diseñados para realizar una tarea específica y se pueden invocar desde cualquier parte del programa. Las funciones son fundamentales en JavaScript y permiten la modularidad, la reutilización del código y la organización lógica de las operaciones.

Las funciones en JavaScript son **objetos de primera clase**, lo que significa que pueden ser asignadas a variables, pasadas como argumentos a otras funciones y devueltas como valores de otras funciones. Esto permite que las funciones se utilicen de manera flexible y se adapten a diferentes situaciones.

## Definir una Función:
Una definición de función es una declaración en el código donde se especifica una nueva función, incluyendo su nombre, parámetros (si los hay) y el cuerpo de la función que contiene las instrucciones que se ejecutarán cuando la función sea llamada.

### Una definición de función es un enlace habitual donde el valor del enlace es una función: 
* **Un "enlace habitual" se refiere a la asociación entre un nombre (o identificador) y un valor** en el entorno de ejecución de un programa. En muchos lenguajes de programación, esto se hace mediante variables. Por ejemplo, cuando se escribe let x = 5; en JavaScript, se está creando un enlace entre el nombre x y el valor 5.
* El Valor del Enlace es una Función: En el contexto de una definición de función, **el "valor del enlace" es la función en sí misma**. Esto significa que **el nombre de la función está asociado (o enlazado) a un objeto de función que puede ser invocado posteriormente**.
* La definición de una función como un "enlace habitual donde el valor del enlace es una función" subraya la naturaleza fundamental de las funciones en muchos lenguajes de programación: son objetos que pueden ser asignados a variables, pasados como argumentos, y retornados desde otras funciones, proporcionando una base poderosa para la programación funcional y modular.

Los parámetros de una función se comportan como enlaces habituales, pero sus valores iniciales son dados por el llamador de la función, no por el código en la función en sí misma.



### Sombra de variables
En JavaScript, las variables declaradas dentro de una función tienen prioridad sobre las variables declaradas en un ámbito superior. Esto se conoce como "sombra de variables" y puede llevar a errores si no se tiene en cuenta.

```js
lastName = 'Smith';

function greet() {
  let lastName = 'Johnson';
  console.log(`Hello, Mr. ${lastName}`);
}

greet(); // Hello, Mr. Johnson
console.log(lastName); // Smith
```

### Variables Globales
Variables declaradas fuera de cualquier función, como la variable externa userName en el código anterior, se llaman globales.

Las variables globales son visibles desde cualquier función (a menos que se les superpongan variables locales con el mismo nombre).

Es una buena práctica reducir el uso de variables globales. El código moderno tiene pocas o ninguna variable global. La mayoría de las variables residen en sus funciones. Aunque a veces puede justificarse almacenar algunos datos a nivel de proyecto.

### Variables Locales
Las variables declaradas dentro de una función, como la variable interna userName en el código anterior, se llaman locales.


### Devolviendo un valor
Una función puede devolver un valor al código de llamada como resultado. Para hacerlo, se utiliza la instrucción return seguida del valor que se desea devolver. La directiva return puede estar en cualquier lugar de la función. Cuando la ejecución lo alcanza, la función se detiene y el valor se devuelve al código de llamada

Es posible utilizar return sin ningún valor. Eso hace que la función salga o termine inmediatamente. Una función con un return vacío, o sin return, devuelve undefined.


### Nomenclatura de funciones
Las funciones son acciones. Entonces su nombre suele ser un verbo. Debe ser breve, lo más preciso posible y describir lo que hace la función, para que alguien que lea el código obtenga una indicación de lo que hace la función.


### Una función – una acción
Una función debe hacer exactamente lo que sugiere su nombre, no más. Dos acciones independientes por lo general merecen dos funciones, incluso si generalmente se convocan juntas (en ese caso, podemos hacer una tercera función que llame a esas dos).

Las funciones deben ser cortas y hacer exactamente una cosa. Si esa cosa es grande, tal vez valga la pena dividir la función en algunas funciones más pequeñas. A veces, seguir esta regla puede no ser tan fácil, pero definitivamente es algo bueno.

### Ejecución de funciones
Para ejecutar una función, se debe llamarla. Para llamar una función, se utiliza el nombre de la función seguido de paréntesis. Si la función tiene argumentos, se pasan dentro de los paréntesis. Los argumentos son los valores que la función utiliza para realizar su tarea.
```js
function sayHi() {
  alert( "Hola" );
}

alert( sayHi ); // muestra el código de la función
```
La última línea no ejecuta la función, porque no hay paréntesis después de sayHi. Existen lenguajes de programación en los que cualquier mención del nombre de una función causa su ejecución, pero JavaScript no funciona así.


### ; al final de una función
Las declaraciones de funciones son declaraciones completas por sí mismas según la gramática de JavaScript, lo que significa que no requieren un punto y coma para terminar.

En contraste, cuando definimos una función utilizando la sintaxis de expresión de función, el punto y coma es necesario si la expresión está asignada a una variable:
```js
const miFuncion = function() {
  // código de la función
}; // Aquí sí se necesita el punto y coma
```

# 1. Hoisting
Hoisting es el mecanismo por el que JS procesa las declaraciones antes de cualquier código. Por eso se puede definir una función por debajo de una llamada a dicha función.

Hoisting permite usar funciones y variables antes de que se hayan declarado. El intérprete de JS divide la declaración y asignación de funciones y variables. Javascript "hoists" o "alza" nuestras declaraciones en la parte superior de su scope (ámbito) antes de la ejecución.

**Ejemplo de código:**
```js
console.log(foo) // undefined
var foo = 'Bar';
console.log(foo) // 'Bar'
```

**Lo que hace el hoisting en el código anterior:**
```js
var foo;
console.log(foo) // undefined
var foo = 'Bar';
console.log(foo) // 'Bar'
```

Este comportamiento es algo inusual de JS. Puede conducir a errores. No es recomendable usar una variable antes de que sea declarada. 

| ❗ Sólo las declaraciones hacen hoisting. Las asignaciones **NO** hacen hoisting. |
|------------------------------------------------------------------------------------|


**Hoisting de variables con let y con const**: Acceder a una variable declarada con let o const antes de que sea declarada, resulta en un ReferenceError.

# 2. Enlaces y Ámbitos - Bindings and Scopes
**Enlaces (Bindings):** Un enlace es una asociación entre un nombre (como el nombre de una variable o una función) y una entidad (como un valor o un objeto) en la memoria.

**Ámbito (Scope):** El ámbito de un enlace es la parte del programa donde el enlace es visible y accesible. Los ámbitos pueden ser globales o locales:

Cada enlace tiene un ámbito, que es la parte del programa en la que el enlace es visible. Para los enlaces definidos fuera de cualquier función, bloque o módulo, el ámbito es todo el programa (se puede hacer referencia a esos enlaces donde queramos). Estos se llaman globales.

Los enlaces creados para los parámetros de una función o declarados dentro de una función solo pueden ser referenciados en esa función, por lo que se conocen como enlaces locales. Cada vez que se llama a la función, se crean nuevas instancias de estos enlaces. Esto proporciona cierto aislamiento entre funciones. Ccada llamada a función actúa en su propio pequeño mundo (su entorno local) y a menudo se puede entender sin saber mucho sobre lo que está sucediendo en el entorno global.

Los enlaces declarados con let y const en realidad son locales al bloque en el que se declaran, por lo que si creamos uno de ellos dentro de un bucle, el código antes y después del bucle no puede “verlo”. En JavaScript anterior a 2015, solo las funciones creaban nuevos ámbitos, por lo que los enlaces de estilo antiguo, creados con la palabra clave var, son visibles en toda función en la que aparecen, o en todo el ámbito global, si no están dentro de una función.

El ámbito (o alcance) de una variable se refiere al contexto en el cual la variable está definida y puede ser accedida. Existen principalmente dos tipos de ámbitos:
- Ámbito Local: Una variable definida dentro de una función tiene un ámbito local y solo puede ser accedida dentro de esa función.
- Ámbito Global: Una variable definida fuera de todas las funciones tiene un ámbito global y puede ser accedida desde cualquier lugar del código.

En JavaScript, el ámbito (scope) de las variables declaradas con var se diferencia del ámbito de las variables declaradas con let y const, introducidas en ES6.
- Las variables declaradas con var tienen ámbito de función. Esto significa que si declaras una variable con var dentro de una función, esa variable es accesible en cualquier parte de esa función, pero no fuera de ella.
- Confusión por Hoisting: El comportamiento de elevación puede llevar a errores y confusión porque las variables parecen estar disponibles antes de ser declaradas.

Para abordar estas dificultades, ES6 introdujo dos nuevas formas de declarar variables: let y const.
- let: Las variables declaradas con let tienen ámbito de bloque y no se elevan de la misma manera que var. Esto significa que una variable declarada con let solo es accesible dentro del bloque en el que se declara.
- const: Las variables declaradas con const también tienen ámbito de bloque y deben ser inicializadas en el momento de su declaración. Además, las variables const no pueden ser reasignadas.


### Funciones como valores
En JavaScript, las funciones son valores de primera clase, lo que significa que pueden ser asignadas a variables, pasadas como argumentos a otras funciones y devueltas como valores de otras funciones. Esto permite que las funciones se utilicen de manera flexible y se adapten a diferentes situaciones.

Generalmente un enlace de función simplemente actúa como un nombre para una parte específica del programa. Este enlace se define una vez y nunca se cambia. Esto hace que sea fácil confundir la función y su nombre.

Pero los dos son diferentes. Un valor de función puede hacer todas las cosas que pueden hacer otros valores: se puede utilizar en expresiones arbitrarias, no solo llamarlo. Es posible almacenar un valor de función en un nuevo enlace, pasarlo como argumento a una función, etc. De manera similar, un enlace que contiene una función sigue siendo solo un enlace habitual y, si no es constante, se le puede asignar un nuevo valor
```js
let launchMissiles = function() {
  missileSystem.launch("now");
};

if (safeMode) {
  launchMissiles = function() {
    console.log("Safe mode - missiles not launched");
  };
}
```

### Pila de llamadas
La pila de llamadas es una estructura de datos que se utiliza para almacenar información sobre las llamadas a funciones en un programa. Cada vez que se llama a una función, se crea un nuevo marco de pila que contiene información sobre la función, sus parámetros y variables locales. Cuando la función termina de ejecutarse, su marco de pila se elimina de la pila de llamadas.
El lugar donde la computadora almacena este contexto es la pila de llamadas. Cada vez que se llama a una función, el contexto actual se almacena en la parte superior de esta pila. Cuando una función devuelve, elimina el contexto superior de la pila y usa ese contexto para continuar la ejecución.

Almacenar esta pila requiere espacio en la memoria de la computadora. Cuando la pila crece demasiado, la computadora fallará con un mensaje como “sin espacio en la pila” o “demasiada recursividad”.



# 3. Closure - Clausura 
Un closure o clausura es una característica de algunos lenguajes de programación, como JavaScript, donde una función "recuerda" el ámbito en el que fue creada, incluso cuando se ejecuta fuera de ese ámbito. Un closure se forma cuando una función anidada se devuelve desde la función exterior y mantiene una referencia a las variables de la función exterior.

La capacidad de tratar las funciones como valores, combinada con el hecho de que los enlaces locales se recrean cada vez que se llama a una función, plantea una pregunta interesante: ¿qué sucede con los enlaces locales cuando la llamada a la función que los creó ya no está activa?El siguiente código muestra un ejemplo de esto. Define una función, wrapValue, que crea un enlace local. Luego devuelve una función que accede a este enlace local y lo devuelve:
```js
function wrapValue(n) {
  let local = n;
  return () => local;
}

let wrap1 = wrapValue(1);
let wrap2 = wrapValue(2);
console.log(wrap1());
// → 1
console.log(wrap2());
// → 2
```

Esto está permitido y funciona como esperamos: ambas instancias del enlace aún pueden accederse. Esta situación es una buena demostración de que los enlaces locales se crean nuevamente para cada llamada, y las diferentes llamadas no afectan los enlaces locales de los demás.

Esta característica, poder hacer referencia a una instancia específica de un enlace local en un ámbito superior, se llama clausura. Una función que hace referencia a enlaces de ámbitos locales a su alrededor se llama una clausura. Este comportamiento no solo nos libera de tener que preocuparnos por la vida útil de los enlaces, sino que también hace posible usar valores de función de formas creativas.

Con un ligero cambio, podemos convertir el ejemplo anterior en una forma de crear funciones que multiplican por una cantidad arbitraria:
```js
function crearSumador(x) {
    return function(y) {
        return x + y;
    };
}

const sumaCinco = crearSumador(5);
console.log(sumaCinco(10)); // Imprime 15

```

| 💥 Un buen modelo mental es pensar en los valores de función como que contienen tanto el código en su cuerpo como el entorno en el que fueron creados. Cuando se llama, el cuerpo de la función ve el entorno en el que fue creado, no el entorno en el que se llama. |
|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

En este ejemplo:
- crearSumador es una función que toma un argumento x y devuelve una nueva función.
- La nueva función toma un argumento y y devuelve la suma de x y y.
- Cuando llamamos a crearSumador(5), se crea una nueva función con x igual a 5.
- La función sumaCinco "recuerda" el valor de x (que es 5) incluso cuando se llama con un nuevo argumento y (que es 10).

Cuando llamamos a sumaCinco(10), el cuerpo de la función ve el valor de x que fue capturado en el entorno donde fue creada (x = 5), no en el entorno donde se llama. Esto es crucial para entender cómo los closures permiten que una función "recuerde" el estado de las variables en el momento de su creación.




| 💥 Un closure permite acceder al ámbito exterior desde una función interior.|
|------------------------------------------------------------------------------------------------------------|

Un closure (o clausura) es una función que "recuerda" el entorno léxico en el que fue creada. Esto significa que la función puede acceder a las variables de su ámbito exterior incluso después de que ese ámbito haya terminado de ejecutarse.

Closure es la capacidad que tienen las funciones en JS de recordar el ámbito léxico en el que han sido declaradas. Un closure (clausura) es una función que guarda referencias del estado adyacente (ámbito léxico).

Closure encapsula datos y encapsula métodos. Se tiene una interfaz para acceder a estos datos.

Cuando se hace una llamada a una función, se genera una pequeña asignación de memoria donde se guarda las variables de esa función, y que no es accesible desde el exterior a esa función. Cuando termina la función si hay algún tipo de referencia en el código, esa cajita no desapacere. No se borra.

Un closure (clausura) es una característica poderosa de JavaScript que permite que una función "recuerde" el ámbito léxico en el que fue declarada, incluso después de que ese ámbito haya finalizado su ejecución. En otras palabras.

| 💥 Un closure es una función que tiene acceso a su propio ámbito, al ámbito de la función externa y al ámbito global.|
| ----- |



**Closures con Variables Privadas:** Los closures se utilizan comúnmente para crear variables privadas. Esto permite encapsular datos y proporcionar una interfaz para interactuar con ellos.

**Uso de Closures en Callbacks y Asincronía:** Los closures son muy útiles en el contexto de callbacks y operaciones asíncronas.
```js
function fetchData(callback) {
  const data = 'Some data';

  setTimeout(function() {
    callback(data);
  }, 1000);
}

fetchData(function(data) {
  console.log(data); // 'Some data' después de 1 segundo
});

```
En este ejemplo, el callback pasado a fetchData "recuerda" el ámbito en el que fue creado y puede acceder a data cuando se ejecuta después de 1 segundo.

> [!WARNING]
>**Closures en Bucles:** Un uso común de los closures es en bucles, para capturar el valor de la variable de iteración en cada iteración.
```js
for (var i = 0; i < 3; i++) {
  setTimeout(function() {
    console.log(i);
  }, 1000);
}
// Salida: 3, 3, 3

for (let i = 0; i < 3; i++) {
  setTimeout(function() {
    console.log(i);
  }, 1000);
}
// Salida: 0, 1, 2
```
> [!CAUTION]
> En el primer bucle, var no tiene ámbito de bloque, por lo que el cierre recuerda la misma referencia a i, que al final del bucle es 3. En el segundo bucle, let tiene ámbito de bloque, por lo que cada cierre recuerda un valor diferente de i.

Con el concepto de clouse nos acercamos a las clases en programación, cosa que con JS de forma nativa no tiene clases. Con la introducción de ECMAScript 6 (ES6) en 2015, JavaScript añadió una sintaxis de clases que hace que la programación orientada a objetos sea más familiar para los desarrolladores acostumbrados a los lenguajes basados en clases. Sin embargo, es importante entender que esta sintaxis de clases es simplemente azúcar sintáctico sobre el modelo de prototipos subyacente de JavaScript.


# 4. Ámbito o Alcance Léxico (Lexical Scope)
El ámbito léxico se refiere a la forma en que el compilador o intérprete de un lenguaje de programación determina el alcance (la visibilidad) de las variables basándose en la estructura física del código, es decir, el lugar donde las variables y funciones están declaradas. En el ámbito léxico, el alcance de una variable se determina en el momento de la escritura del código y no cambia en tiempo de ejecución.


**El ámbito léxico** se refiere al alcance de las variables que está determinado por la ubicación física de esas variables dentro del código fuente. Cuando una función se define, se crea un cierre que incluye todas las variables de su ámbito exterior en el momento de la definición de la función.

```js
function externa() {
  let x = 10;

  function interna() {
    console.log(x); // Tiene acceso a x de la función externa
  }

  interna();
}

externa(); // Imprime 10
```
La función interna puede acceder a la variable x de la función externa debido al ámbito léxico. El alcance de x está determinado por la estructura del código.

## Relación entre Ámbito Léxico y Closures
- Ámbito Léxico: Determina qué variables están disponibles en diferentes partes del código basado en la estructura del código.
- Closures: Utilizan el ámbito léxico para "recordar" el contexto en el que fueron creados, permitiendo que las funciones anidadas accedan a las variables de las funciones exteriores, incluso después de que esas funciones exteriores hayan terminado de ejecutarse.

## Diferencias entre Ámbito Léxico y Closures
- Determinación del Alcance:
  - Ámbito Léxico: Determinado en tiempo de compilación basado en la estructura del código.
  - Closures: Aprovechan el ámbito léxico para mantener referencias a las variables de las funciones exteriores.
- Persistencia del Alcance:
  - Ámbito Léxico: Es estático y determinado por la estructura del código. 
  - Closures: Permiten que las funciones mantengan acceso a su ámbito léxico original incluso después de que la función exterior haya finalizado.

## Para profuncdizar:
- [Ámbito o Alcance léxico](https://es.javascript.info/closure#ambito-o-alcance-lexico)


# 5. Funciones Autoinvocadas - IIFE. 
Como en el pasado solo existía var, y no había visibilidad a nivel de bloque, los programadores inventaron una manera de emularla. Lo que hicieron fue el llamado "expresiones de función inmediatamente invocadas (abreviado IIFE en inglés).

**No es algo que debiéramos usar estos días,** pero podemos encontrarlas en código antiguo.  

En JavaScript, una función autoinvocada (Immediately Invoked Function Expression, o IIFE) es un patrón que permite ejecutar una función inmediatamente después de definirla. Aunque generalmente se utilizan funciones anónimas para crear IIFEs, no es un requisito estricto; también se pueden usar funciones nombradas. A continuación, se explica el concepto en detalle.

Una IIFE es una función que se define y se ejecuta inmediatamente. Este patrón se utiliza para crear un ámbito léxico que no contamina el ámbito global y puede ser útil para encapsular variables.

- Ejemplo de IIFE con Función Anónima: La forma más común de escribir una IIFE es utilizando una función anónima:
  ```js
  (function() {
    console.log('This is an IIFE!');
  })();
  ```

- Ejemplo de IIFE con Función Nombrada: También puedes usar una función nombrada dentro de una IIFE:
  ```js
  (function namedIIFE() {
    console.log('This is a named IIFE!');
  })();
  ```
  Aunque la función tiene un nombre (namedIIFE), este nombre solo es accesible dentro de la función misma y no en el ámbito exterior.


**Propósitos de Usar IIFEs:**
- Encapsulación: Las IIFEs se utilizan para crear un ámbito de función que ayuda a encapsular variables y evitar conflictos de nombres en el ámbito global.
- Inicialización: Las IIFEs son útiles para ejecutar código de inicialización sin dejar variables temporales en el ámbito global.
- Modularidad: Las IIFEs pueden ser una forma de organizar el código en módulos autocontenidos.


## 6. Template Functions | Tagged Template Literals
Son un tipo de funciones especiales que se invocan con los backticks en vez de con los paréntesis (). No tienen un uso común. Se usan en ciertas librerías. Permite personalizar el procesamiento de las plantillas literales. Esto es útil para crear DSL (lenguajes específicos de dominio), formateo de cadenas, entre otras aplicaciones.

Como primer argumento de la función recibe un chunks que es un array con todo el string hasta que se encuentra con un ${}, el siguiente argumento es el siguiente string hasta el siguiente ${} y así sucesivamente.

Las Tagged Template Literals te permiten llamar a una función "etiqueta" que procesa una Template Literal. La función etiqueta recibe la cadena y los valores interpolados como argumentos, lo que permite manipular la salida antes de que se genere la cadena final.

Sintaxis Básica:
```js
funcion Etiqueta`cadena literal con ${variable}`;
```

**Casos de uso:**
- Sanitización de entradas: Prevenir inyecciones SQL o XSS al limpiar entradas de usuario.
- Internacionalización: Formatear mensajes en diferentes idiomas.
- Generación de HTML: Crear contenido HTML dinámico de una manera segura.
- Formateo avanzado: Crear cadenas formateadas, como fechas o números, de una manera consistente.

**Ejemplo práctico: Sanitización:**
```js
function sanitizar(cadenas, ...valores) {
  return cadenas.reduce((resultado, parte, indice) => {
    let valor = valores[indice] ? String(valores[indice]).replace(/<|>|&|"/g, '') : '';
    return resultado + parte + valor;
  }, '');
}

let entradaUsuario = '<script>alert("hack!")</script>';
let texto = sanitizar`Entrada segura: ${entradaUsuario}`;
console.log(texto);  // Salida: Entrada segura: scriptalert("hack!")/script
```



## 7. Definición de Funciones - Notación de Declaración
- Hay varias maneras de definir funciones en JavaScript:
  - Funciones Declaradas (Function Declarations).
  - Funciones Expresadas (Function Expressions).
  - Funciones Flecha (Arrow Functions).
  - Funciones Anónimas (Anonymous Functions).
  - Métodos dentro de Objetos.





### 7.1. Funciones Declaradas
Las funciones declaradas son definidas utilizando la palabra clave function seguida del nombre de la función, una lista de parámetros entre paréntesis y el cuerpo de la función entre llaves.
```js
function greet(name) {
  return `Hello, ${name}!`;
}

console.log(greet('Alice')); // "Hello, Alice!"
```
La declaración define el enlace greet y lo apunta a la función que se define. Las funciones declaradas se pueden invocar en cualquier parte del código, incluso antes de la declaración de la función.



**Hoisting:** Las declaraciones de función no forman parte del flujo de control regular de arriba hacia abajo. Conceptualmente se mueven al principio de su alcance y pueden ser utilizadas por todo el código en ese alcance. Las funciones declaradas se "elevan" al inicio de su contexto, por lo que se pueden llamar antes de ser declaradas en el código.

```js
console.log(greet('Bob')); // "Hello, Bob!"

function greet(name) {
  return `Hello, ${name}!`;
}
```

### 7.2. Funciones Expresadas
Las funciones expresadas son definidas como parte de una expresión. No tienen nombre (aunque pueden tenerlo) y se asignan a una variable.

En situaciones más avanzadas, una función puede ser creada e inmediatamente llamada o agendada para uso posterior, sin almacenarla en ningún lugar, permaneciendo así anónima.
```js
const greet = function(name) {
  return `Hello, ${name}!`;
};

console.log(greet('Alice')); // "Hello, Alice!"
```

**Hoisting:** Las funciones expresadas no se elevan al inicio del contexto, por lo que deben ser definidas antes de ser utilizadas.
```js
console.log(greet('Bob')); // Error: greet is not defined

const greet = function(name) {
  return `Hello, ${name}!`;
};
```

### Expresión de Función vs Declaración de Función
- ¿Cuándo la función es creada por el motor de JavaScript?
  - Una Expresión de Función **No tiene hoisting de funciones.** La función no puede ser llamada antes de que la expresión sea evaluada. Las Expresiones de Función son creada cuando la ejecución la alcance y es utilizable desde ahí en adelante. Una vez que el flujo de ejecución pase al lado derecho de la asignación let sum = function… – aquí vamos, la función es creada y puede ser usada (asignada, llamada, etc.) de ahora en adelante.
    ```js
    saludar(); // Error: saludar no está definido
      const saludar = function() {
      console.log("Hola");
    };
    ```

  - Las Declaraciones de Función tiene el **hoisting o "elevación" de funciones,** lo que significa que se puede llamar a la función antes de su declaración en el código. Una Declaración de Función puede ser llamada antes de ser definida. Por ejemplo, una Declaración de Función global es visible en todo el script, sin importar dónde se esté. Esto se debe a los algoritmos internos. Cuando JavaScript se prepara para ejecutar el script, primero busca Declaraciones de Funciones globales en él y crea las funciones. Podemos pensar en esto como una “etapa de inicialización”. Y después de que se procesen todas las Declaraciones de Funciones, el código se ejecuta. Entonces tiene acceso a éstas funciones.
    ```js
    saludar(); // "Hola"
    function saludar() {
      console.log("Hola");
    }
    ```

- Alcance de bloque:
  - Funciones declaradas en modo estricto: Las funciones declaradas siempre tienen alcance de bloque en modo estricto. Cuando una Declaración de Función se encuentra dentro de un bloque de código, es visible en todas partes dentro de ese bloque. Pero no fuera de él.  Una Declaración de Función sólo es visible dentro del bloque de código en el que reside.
    ```js
    'use strict';
    if (true) {
      function saludar() {
        console.log('Hola...');
      }
      saludar(); // Funciona correctamente
    }
    saludar(); // Error: saludar is not defined
    ```
  - Funciones declaradas fuera de modo estricto:En el modo no estricto (modo por defecto en JavaScript), las funciones declaradas dentro de un bloque pueden ser accesibles fuera de ese bloque, aunque esto puede variar según el entorno de ejecución (navegadores pueden comportarse diferente de Node.js).
    ```js
    if (true) {
      function saludar() {
        console.log('Hola...');
      }
      saludar(); // Funciona correctamente
    }
    saludar(); // Funciona correctamente
    ``` 
  - Expresiones de Función: Las expresiones de función siempre tienen el alcance en el que se definen, independientemente del modo estricto.
    ```js
    if (true) {
      const saludar = function() {
        console.log('Hola...');
      };
      saludar(); // Funciona correctamente
    }
    saludar(); // Error: saludar is not defined
    ```
  
  - Funciones Flecha: Las funciones flecha tienen un alcance de bloque, independientemente del modo estricto.
    ```js
    if (true) {
      const saludar = () => {
        console.log('Hola...');
      };
      saludar(); // Funciona correctamente
    }
    saludar(); // Error: saludar is not defined
    ```


### ¿Cuándo debo elegir la Declaración de Función frente a la Expresión de Función?
Como regla general, cuando necesitamos declarar una función, la primera que debemos considerar es la sintaxis de la Declaración de Función. Da más libertad en cómo organizar nuestro código, porque podemos llamar a tales funciones antes de que sean declaradas.

También es un poco más fácil de buscar function f(…) {…} en el código comparado con let f = function(…) {…}. La Declaración de Función es más llamativa.

…Pero si una Declaración de Función no nos conviene por alguna razón, o necesitamos declaración condicional, entonces se debe usar la Expresión de función.


### 7.3. Funciones Flecha (Arrow Functions)
Hay otra sintaxis muy simple y concisa para crear funciones, que a menudo es mejor que las Expresiones de funciones.

Se llama “funciones de flecha”, porque se ve así:
```js
let func = (arg1, arg2, ..., argN) => expression;
```

Esto crea una función func que acepta los parámetros arg1..argN, luego evalúa la expression del lado derecho mediante su uso y devuelve su resultado.

> [!CAUTION]
>**Las funciones flecha NO tienen su propio this.** Son especialmente útiles para funciones anónimas y funciones de callback.




**Son siempre anónimas.** Es necesario almacenar esa expresión en una variable de tipo Const:
```js
const greet = (name) => {
  return `Hello, ${name}!`;
};
console.log(greet('Alice')); // "Hello, Alice!"
```

Cuando la función flecha **solo tiene un argumento**, se pueden omitir paréntesis alrededor de los parámetros
```js
const greet = name => {
  return `Hello, ${name}!`;
};

console.log(greet('Alice')); // "Hello, Alice!"
```


Cuando la función flecha **no tenga parámetros**, los paréntesis estarán vacíos; pero deben estar presentes:
```js
const greet = () => {
  return `Hello, Alice!`;
};

console.log(greet()); // "Hello, Alice!"
```


Cuando la función flecha **tenga de una única línea para el return**, se puede simplificar eliminando llaves y la palabra return:
```js
const greet = name => `Hello, ${name}!`;

console.log(greet('Alice')); // "Hello, Alice!"
```


> [!WARNING]
> **La función flecha que devuelve un objeto: Es necesario usar corchetes (). Se genera un error si lo hacemos sólo con {}. Ya que las llaves de objeto literal se confundirían con las llaves de ámbito de función.**

Sin eliminar el return 🠮
```js
const toObject = (name, surname, age) => {
  return {name,surname, age};
}
```

Eliminado la palabra return:
```js
const toObject = (name, surname, age) => (
  {name, surname, age}
);
```



**Funciones de flecha multilínea:** Cuando la función flecha tenga más de una línea, debemos encerrarlos entre llaves. La diferencia principal es que las llaves necesitan usar un return para devolver un valor (tal como lo hacen las funciones comunes).
```js
const greet = name => {
  const greeting = 'Hello';
  return `${greeting}, ${name}!`;
};

console.log(greet('Alice')); // "Hello, Alice!"
```


> [!CAUTION]
>**Hoisting:** Las funciones flecha no se elevan al inicio del contexto. Solo la declaración de la variable a la que se asigna la función flecha es elevada, pero no su asignación. Las funciones flecha no tienen un nombre propio y se asignan a una variable. La declaración de esta variable es la que se eleva al principio del contexto, pero la asignación de la función no se eleva. Por lo tanto, si intentas invocar una función flecha antes de su definición, obtendrás un TypeError porque la variable será undefined en ese momento.



#### SIMILITUDES: classic vs arrow
##### 1. Ciudadanos de primer orden
Las funciones en javascript, ya sean clásicas o arrow functions, son ciudadanos de primer orden. En otras palabras, esto significa que pueden ser usadas como cualquier otro valor en:
- Argumento de funciones
- Retorno de funciones
- Asignación a variables


##### 2. Funciones como argumentos de otras funciones
```js
function saySomething(text, modifier) {
  console.log(modifier(text));
}
saySomething("HeLlO wOrLd", str => str.toLowerCase()); // hello world
saySomething("hello  world", str => str.replace(/[aeiou]/gi, "")); // hll wrld
```

##### 3. Funciones como valor de retorno
```js
const createCounter = () => {
  let i = 0;
  return () => console.log(++i);
}

const count = createCounter();
count(); // 1
count(); // 2
count(); // 3
```
> [!WARNING]
>En este último ejemplo hemos empleado un CLOSURE!


#### DIFERENCIAS: classic vs arrow
##### 1. THIS
En javascript, como acabamos de ver, tenemos 2 formas diferentes de declarar funciones, de forma clásica o mediante arrow functions. ¿Pero por qué? ¿Para qué 2 maneras de hacer lo mismo? ¿Es solo pura sintáxis o estética? NO. Uno de los motivos de su exitencia tiene que ver con la keyword 'this'.

- En las funciones clásicas, **'this' hace referencia al contexto que ha invocado a la función,** es decir, aquello que la llama, el 'caller'. Luego el 'this' se resuelve en tiempo de ejecución (runtime binding). Están pensadas para ser utilizadas como MÉTODOS. This es un punturo de aquello que invoca a mi función. El contexto que llama a la función.

- En las arrow functions, 'this' ya no es la entidad que la invoca sino que ahora **this apunta al contexto léxico en el que dicha arrow function ha sido definida.** Ya no hay 'runtime binding', se resuelve en tiempo de desarrollo. Están más pensadas para ser usadas como 'function expressions' ligeras. En las arrow functions el valor this se hereda del contexto léxico en el que se define la función. Las arrow functions no tienen su propio contexto this. En lugar de eso, heredan el valor de this del contexto léxico en el que se definen. Esto significa que this dentro de una arrow function se refiere al mismo valor que this en la función o el bloque de código donde se definió la arrow function.
 
```js
function f() {
  console.log(this.age);  // Aqui el contexto es el "caller" de la función. this -> caller.
}
```
Al hacer la siguiente llamada debéis preguntaros ... ¿quién está invocando a la función f?
En este caso en concreto es el contexto global (objeto "window") quien hace la invocación.
Es por ello que, al no tener dicho contexto una propiedad "age", se muestre undefined.

```js
f(); // undefined
```

Para demostrar esta teoría, simplemente creemos una una propiedad "age" en el contexto global u objeto "window":
```js
age = 35;
// window.age = 35; <= Equivalente
f(); // 35
```

Las funciones, además, disponen de un método de utilidad con el que invocarlas haciendo que su contexto de invocación sea lo que nosotros decidamos, por ejemplo, un objeto que tenga 'age':
```js
f.call({ age: 35 }); // 35
```

Veamos que sucede ahora en el caso de arrow function. Recordemos que ahora "this" representa el contexto léxico y por tanto es fijo, sea quien sea quien invoque a la función flecha. A efectos prácticos, podemos decir que una arrow function toma el contexto del "this" de donde ha sido definida.
```js
const g = () => console.log(this.surname);
```

Puesto que en el ámbito global no existe "surname" el resultado será undefined, igual que antes:
```js
g(); // undefined
```

La forma de hacer que tengamos algo en la consola es crear una variable global "surname":
```js
surname = "camargo";
g(); // camargo.
```

Pero a diferencia de las funciones clásica, puesto que ahora el "this" siempre apunta al ámbito global, PASE LO QUE PASE, no podré hacer esto:
```js
surname = "camargo";
g.call({ surname: "calzado" }); // camargo
```

No importa que intente invocar la arrow function con un objeto distinto de "window", no tiene efecto!


##### 2. Las funciones flechas no tienen “arguments”
Las arrow functions no pueden ser 'variadic' y no presentan por tanto la keyword 'arguments'. Si lo intentamos nos petará (OJO en Stackblitz no peta)
```js
const sum = () => {
  return Array.from(arguments).reduce((acc, val) => acc + val);
};

console.log(sum(1, 2, 3)); // Uncaught ReferenceError: arguments is not defined
```

Sin embargo, existe una forma de obtener todos los argumentos con forma de array *similar* a arguments. Esto lo veremos más adelante.


##### 3. Las flechas no se pueden llamar con new
**Las arrow functions no pueden ser funciones constructoras ni presentan la propiedad 'prototype'.** ⚠ Entenderemos esto en profundidad más adelante al estudiar el modelo prototípico.


##### 4. Las flechas no tienen 'super'
Las arrow functions no tienen la propiedad 'super' y por tanto no pueden ser utilizadas en clases que hereden de otras clases.


### 7.4. Funciones Anónimas (Callback)
Escribimos una función ask(question, yes, no) con tres argumentos:

question  
Texto de la pregunta  

yes  
Función a ejecutar si la respuesta es “Yes”  

no  
Función a ejecutar si la respuesta es “No”  

La función deberá preguntar la question y, dependiendo de la respuesta del usuario, llamar yes() o no():

```js
function ask(question, yes, no) {
  if (confirm(question)) yes()
  else no();
}

function showOk() {
  alert( "Estás de acuerdo." );
}

function showCancel() {
  alert( "Cancelaste la ejecución." );
}

// uso: las funciones showOk, showCancel son pasadas como argumentos de ask
ask("Estás de acuerdo?", showOk, showCancel);
```

Los argumentos de ask se llaman funciones callback o simplemente callbacks.

La idea es que pasamos una función y esperamos que se “devuelva la llamada” más tarde si es necesario. En nuestro caso, showOk se convierte en la callback para la respuesta “Yes”, y showCancel para la respuesta “No”.

Podemos usar Expresión de Función para redactar una función equivalente y más corta:
```js
function ask(question, yes, no) {
  if (confirm(question)) yes()
  else no();
}

ask(
        "Estás de acuerdo?",
        function() { alert("Estás de acuerdo"); },
        function() { alert("Cancelaste la ejecución."); }
);
```

Aquí, las funciones son declaradas justo dentro del llamado ask(...). No tienen nombre, y por lo tanto se denominan anónimas. Tales funciones no se pueden acceder fuera de ask (porque no están asignadas a variables), pero eso es justo lo que queremos aquí.

-----
Las funciones anónimas son aquellas que no tienen nombre. Se suelen usar como funciones de callback.
```js
setTimeout(function() {
  console.log('Hello after 2 seconds');
}, 2000);
```

**Ejemplo: All About Anonymous Functions:** Adding Suffixes: Write a function that returns an anonymous function, which transforms its input by adding a particular suffix at the end.
```js
add_ly = add_suffix("ly") 
add_less = add_suffix("less") 
add_ing = add_suffix("ing") 
// Test.assertEquals(add_ly("hopeless"), "hopelessly")
// Test.assertEquals(add_ly("total"), "totally")

const add_suffix = suffix => prefix => prefix + suffix
```

**Ejemplo: Curryling Functions:** Create a function that takes three collections of arguments and returns the sum of the product of numbers. Add the result of the first digit in each collection multiplied together to the result of the second digit in each collection multiplied together to get the final solution.
Examples
product(1,2)(1,1)(2,3) ➞ 8
// 1 * 1 * 2 + 2 * 1 * 3

product(10,2)(5,0)(2,3) ➞ 100
// 10 * 5 * 2 + 2 * 0 * 3
```js
const product = (a, b) => (c, d) => (e, f) => a * c * e + b * d * f;
console.log(product([1, 2])([1, 1])([2, 3])); // 8


function product2(a,b) {
    return (c,d)=>{
        return (e, f)=>{
            return (a*c*e)+(b*d*f)
        }
    }
}
console.log(product2([1, 2])([1, 1])([2, 3])); // 8
```

**Hoisting:** Las funciones anónimas no se elevan al inicio del contexto, por lo que deben ser definidas antes de ser utilizadas.


### 7.5 Métodos dentro de Objetos
Los métodos son funciones que se definen dentro de un objeto.
```js
const person = {
  name: 'Alice',
  greet: function() {
    return `Hello, my name is ${this.name}`;
  }
};

console.log(person.greet()); // "Hello, my name is Alice"
```

# 8. Parámetros y Argumentos
Las funciones pueden aceptar parámetros, que son variables que actúan como marcadores de posición para los valores que se pasarán a la función.

```js
function add(a, b) {
  return a + b;
}

console.log(add(2, 3)); // 5
```

En este ejemplo, a y b son parámetros de la función add. Cuando se llama a la función add con los argumentos 2 y 3, los valores de los argumentos se copian en **variables locales a y b dentro de la función.**

### Parámetros VS Argumentos:
- Un parámetro es una variable listada dentro de los paréntesis en la declaración de función (es un término para el momento de la declaración).
- Un argumento es el valor que es pasado a la función cuando esta es llamada (es el término para el momento en que se llama).
Declaramos funciones listando sus parámetros, luego las llamamos pasándoles argumentos.

La función add es declarada con dos parámetros a y b, y es llamada con los argumentos 2 y 3.


### Parámetros Predeterminados:
Si una función es llamada, pero no se le proporciona un argumento, su valor correspondiente se convierte en undefined. Se pueden asignar valores predeterminados a los parámetros de una función. Es el valor que se usa si el argumento fue omitido
```js
function greet(name = 'Guest') {
  return `Hello, ${name}!`;
}

console.log(greet()); // "Hello, Guest!"
```


**Añadiendo argumentos**
```js
function saySomething(arg1, arg2) {
  console.log(arg1, arg2);
}

saySomething("hello", "world"); // hello world
saySomething("hello"); // hello undefined
saySomething(); // undefined undefined
```

Es legítimo llamar a una función con más argumentos que los que han sido declarados. Veremos como aprovechar este hecho un poco más abajo.
```js
saySomething("hello", "wonderful", "world"); // hello wonderful
```


# 8.1.- Añadiendo valor de retorno:
```js
function saySomething(arg1, arg2) {
  console.log(arg1, arg2);
  return arg1 && arg2 ? true : false; // Expresión equivalente: return Boolean(arg1 && arg2);
}

console.log(saySomething("hello", "world")); // hello world, true
console.log(saySomething("hello")); // hello undefined, false
```



## 8.2 Funciones de Orden Superior (Higher-Order Functions)
Las funciones de orden superior son funciones que aceptan otras funciones como argumentos o devuelven funciones como resultado.

Las funciones que operan en otras funciones, ya sea tomándolas como argumentos o devolviéndolas, se llaman funciones de orden superior.

Las funciones de orden superior nos permiten abstraer sobre acciones, no solo sobre valores. Vienen en varias formas. Por ejemplo:
- Podemos tener funciones que crean nuevas funciones:
```js
function mayorQue(n) {
    return m => m > n;
}

let mayorQue10 = mayorQue(10);
console.log(mayorQue10(11));
// → true
```

- Podemos tener funciones que modifican otras funciones: En este ejemplo, se función llamada ruidosa que toma otra función f como argumento y devuelve una nueva función que envuelve a f. La función devuelta añade mensajes de registro (logs) para mostrar los argumentos con los que se llama a f y el resultado devuelto por f.
```js
function ruidosa(f) {
  return (...args) => { // Se devuelve una nueva función que toma un nº variable de argumentos
    console.log("llamando con", args); // Se muestra los argumentos
    let resultado = f(...args); // Se llama a la función f con los mismo argumentos y se guarda el resultado
    console.log("llamado con", args, ", devolvió", resultado); // Se muestra los argumentos y el resultado
    return resultado; // Se devuelve el resultado
  };
}

ruidosa(Math.min)(3, 2, 1);
// → llamando con [3, 2, 1]
// → llamado con [3, 2, 1] , devolvió 1
```

- Podemos escribir funciones que proveen nuevos tipos de flujo de control:
```js
function aMenosQue(prueba, entonces) {
    if (!prueba) entonces();
}

repetir(3, n => { // Verifica si 1, 2 y 3 son pares 
    aMenosQue(n % 2 == 1, () => {
        console.log(n, "es par");
    });
});

// → 0 es par
// → 2 es par
```


```js
function operate(a, b, operation) {
  return operation(a, b);
}

const add = (x, y) => x + y;
const subtract = (x, y) => x - y;

console.log(operate(5, 3, add)); // 8
console.log(operate(5, 3, subtract)); // 2
```

## 8.3 Closures
Un closure es una función que tiene acceso a su propio ámbito léxico, al ámbito de la función externa y al ámbito global.
```js
function outerFunction(outerVariable) {
  return function innerFunction(innerVariable) {
    console.log('Outer Variable:', outerVariable);
    console.log('Inner Variable:', innerVariable);
  };
}

const newFunction = outerFunction('outside');
newFunction('inside');
// Outer Variable: outside
// Inner Variable: inside
```


## 8.4 Funciones Recursivas
Las funciones recursivas son funciones que se llaman a sí mismas.
```js
function factorial(n) {
  if (n === 0) {
    return 1;
  }
  return n * factorial(n - 1);
}

console.log(factorial(5)); // 120
```

La recursión es un concepto en programación en el que una función se llama a sí misma para resolver un problema. La recursión es una técnica poderosa y elegante que se puede utilizar para resolver problemas complejos de manera simple y concisa.
```js
function power(base, exponent) {
  if (exponent == 0) {
    return 1;
  } else {
    return base * power(base, exponent - 1);
  }
}

console.log(power(2, 3));
// → 8
```

Sin embargo, esta implementación tiene un problema: en implementaciones típicas de JavaScript, es aproximadamente tres veces más lenta que una versión que utiliza un bucle for. Recorrer un simple bucle suele ser más económico que llamar a una función múltiples veces.




## 8.5 Funciones Generadoras
Las funciones generadoras permiten pausar y reanudar la ejecución del código utilizando yield.
```js
function* generatorFunction() {
  yield 'First output';
  yield 'Second output';
  return 'Done';
}

const generator = generatorFunction();

console.log(generator.next().value); // 'First output'
console.log(generator.next().value); // 'Second output'
console.log(generator.next().value); // 'Done'
```

## 8.6 this en Funciones
El valor de this varía dependiendo de cómo se llama la función:
- Funciones regulares: El valor de this depende del contexto en el que se llama la función.
- Funciones flecha: No tienen su propio this, sino que heredan el this del contexto en el que se definieron.
```js
const obj = {
  name: 'Alice',
  regularFunction: function() {
    console.log(this.name); // 'Alice'
  },
  arrowFunction: () => {
    console.log(this.name); // undefined
  }
};

obj.regularFunction();
obj.arrowFunction();
```



## 8.7 VARIADIC FUNCTIONS
Las funciones variádicas (variadic functions) son **funciones que pueden aceptar un número variable de argumentos.** En JavaScript, cualquier función puede ser variádica, ya que las funciones no requieren que el número de argumentos coincida con el número de parámetros definidos. Aquí se incluye el concepto de funciones variádicas dentro de las distintas maneras de definir funciones en JavaScript.

### 8.7.1. Funciones Variádicas mediante el operador rest:
Un ejemplo de función variádica en una Funciones Declaradas (Function Declarations):
```js
function sum(...numbers) {
  return numbers.reduce((total, number) => total + number, 0);
}

console.log(sum(1, 2, 3)); // 6
console.log(sum(4, 5, 6, 7)); // 22
```

### 8.7.2 Funciones Variádicas mediante el objeto iterable Argumets (Argumentos Objeto)
Además del operador rest, en JavaScript las funciones tienen acceso a un objeto arguments que contiene todos los argumentos pasados a la función. Aunque el uso del operador rest es más moderno y legible, el objeto arguments todavía se usa en algunas situaciones.
```js
function logArguments() {
  console.log(arguments); // "arguments" es un objeto array-like (iterable)
}

logArguments(); // {}
logArguments(true); // {0: true}
```

**Podemos iterar por "arguments" por comodidad:**
```js
function logArguments() {
  for (const arg of arguments) {
    console.log(arg);
  }
}

logArguments(1, true, "hello"); // 1, true, hello
```

**Ejemplo práctico de utilidad con "arguments":**
```js
function sum() {
  let total = 0;
  for (const num of arguments) {
    total += num;
  }
  return total;
}

console.log(sum(1, 2, 3)); // 6;
```



# 9. Crecimiento de Funciones
Hay dos formas más o menos naturales de introducir funciones en los programas.
- La primera ocurre cuando te encuentras escribiendo código similar varias veces. Preferirías no hacer eso, ya que tener más código significa más espacio para que se escondan los errores y más material para que las personas que intentan entender el programa lo lean. Por lo tanto, tomas la funcionalidad repetida, encuentras un buen nombre para ella y la colocas en una función.
- La segunda forma es que te das cuenta de que necesitas alguna funcionalidad que aún no has escrito y que suena como si mereciera su propia función. Comienzas por nombrar la función, luego escribes su cuerpo. Incluso podrías comenzar a escribir código que use la función antes de definir la función en sí.

# 10. Funciones y efectos secundarios
Las funciones pueden dividirse aproximadamente en aquellas que se llaman por sus efectos secundarios (como puede ser imprimir una línea) y aquellas que se llaman por su valor de retorno (aunque también es posible tener efectos secundarios y devolver un valor).

**Una función pura** es un tipo específico de función productora de valor que no solo no tiene efectos secundarios, sino que tampoco depende de efectos secundarios de otro código, por ejemplo, no lee enlaces globales cuyo valor podría cambiar. Una función pura tiene la agradable propiedad de que, al llamarla con los mismos argumentos, siempre produce el mismo valor (y no hace nada más). Una llamada a tal función puede sustituirse por su valor de retorno sin cambiar el significado del código. Cuando no estás seguro de si una función pura está funcionando correctamente, puedes probarla llamándola y saber que si funciona en ese contexto, funcionará en cualquier otro. Las funciones no puras tienden a requerir más andamiaje para probarlas.


# 11.- Parámetro Rest
Muchas funciones nativas de JavaScript soportan un número arbitrario de argumentos. Por ejemplo:
- Math.max(arg1, arg2, ..., argN) – devuelve el argumento más grande.
- Object.assign(dest, src1, ..., srcN) – copia las propiedades de src1..N en dest.
- …y otros más...

Una función puede ser llamada con cualquier número de argumentos sin importar cómo sea definida. En el resultado solo los parámetros apropiados serán tomados en cuenta, los demás serán ignorados.

El resto de los parámetros pueden ser referenciados en la definición de una función con 3 puntos ... seguidos por el nombre del array que los contendrá. Literalmente significan “Reunir los parámetros restantes en un array”. function sumAll(...args) { // args es el nombre del array
```js
let sum = 0;

for (let arg of args) sum += arg;

return sum;
}

alert( sumAll(1) ); // 1
alert( sumAll(1, 2) ); // 3
alert( sumAll(1, 2, 3) ); // 6
```

El operador rest debe ser siempre el último en la lista de parámetros, de lo contrario, JavaScript generará un error. Podemos obtener los primeros parámetros como variables, y juntar solo el resto.
```js
function showName(firstName, lastName, ...titles) {
  alert( firstName + ' ' + lastName ); // Julio Cesar

  // el resto va en el array titles
  // por ejemplo titles = ["Cónsul", "Emperador"]
  alert( titles[0] ); // Cónsul
  alert( titles[1] ); // Emperador
  alert( titles.length ); // 2
}

showName("Julio", "Cesar", "Cónsul", "Emperador");
```

> [!WARNING]
> ...rest debe ir siempre último. Si no, JavaScript generará un error.



# 12 La variable arguments
El objeto arguments es una variable local disponible dentro de todas las funciones que proporciona una colección de todos los argumentos pasados a la función. Es un objeto array-like, pero no es un array real. No tiene las propiedades y métodos de un array, pero se puede iterar sobre él con un bucle for o convertirlo en un array real utilizando Array.from().

```js
function sum() {
  let total = 0;
  for (let i = 0; i < arguments.length; i++) {
    total += arguments[i];
  }
  return total;
}

console.log(sum(1, 2, 3)); // 6
```


# 13. Diferencias entre el Operador Rest y el Objeto Arguments
- Sintaxis y Modernidad: El operador rest (...) es una característica moderna de ES6 y es más legible y conciso.
- Tipo de Objeto: El operador rest devuelve un array real, mientras que el objeto arguments es similar a un array pero no es un array real (es un objeto array-like). No soporta los métodos de array, no podemos ejecutar arguments.map(...) por ejemplo.
- Funciones Flecha: El objeto arguments no está disponible en las funciones flecha, pero el operador rest sí lo está.


# 14. Curried Functions
Una función curried es una función que acepta uno o más argumentos y devuelve una nueva función que espera el siguiente argumento o argumentos. Esto se repite hasta que todos los argumentos han sido pasados. Una función curried es una función que acepta uno o más argumentos y devuelve una nueva función que espera el siguiente argumento o argumentos. Esto se repite hasta que todos los argumentos han sido pasados.

```js
function curriedSuma(a) {
  return function(b) {
    return a + b;
  };
}


// Uso de la función curried
const suma5 = curriedSuma(5); // Devuelve una función que suma 5 a su argumento
console.log(suma5(3)); // Devuelve 8
console.log(curriedSuma(5)(3)); // Devuelve 8
```

En el ejemplo anterior:
- curriedSuma(5) devuelve una nueva función que toma un argumento b y suma 5 a b.
- Podemos llamar a la función curried con un solo argumento a la vez (curriedSuma(5)(3)).


# 15. Nested Functions
Las funciones anidadas son simplemente funciones definidas dentro de otras funciones. La función interna (anidada) puede acceder a las variables y parámetros de la función externa.
```js
function externa(x) {
  function interna(y) {
    return x + y;
  }
  return interna;
}

// Uso de funciones anidadas
const suma5 = externa(5); // Devuelve la función interna con x fijado en 5
console.log(suma5(3)); // Devuelve 8
console.log(externa(5)(3)); // Devuelve 8
```

En el ejemplo anterior:
- externa es una función que contiene una función anidada interna.
- externa devuelve la función interna, que puede usar el parámetro x de externa debido al alcance léxico.


## Diferencias entre Curried Functions y Nested Functions
1. Propósito:
- Curried Functions: Facilitan la creación de funciones más específicas a partir de funciones más generales. Permiten la aplicación parcial de argumentos.
- Funciones Anidadas: Permiten organizar el código y aprovechar el alcance léxico, permitiendo que las funciones internas accedan a las variables de las funciones externas.

2. Uso:
- Curried Functions: Se utilizan en programación funcional para crear funciones parcialmente aplicadas y para componer funciones.
- Funciones Anidadas: Se utilizan para encapsular funcionalidad y crear cierres (closures).

3. Sintaxis:
- Curried Functions: Implican la creación de una cadena de funciones que cada una toma un argumento y devuelve una nueva función.
- Funciones Anidadas: Simplemente se definen funciones dentro de otras funciones.


# 16. Función como objeto, NFE
Como ya sabemos, una función en JavaScript es un valor.

Cada valor en JavaScript tiene un tipo. ¿Qué tipo es una función?

En JavaScript, las funciones son objetos.

Una buena manera de **imaginar funciones es como “objetos de acción” invocables.** No solo podemos llamarlos, sino también tratarlos como objetos: agregar/eliminar propiedades, pasar por referencia, etc.

## La propiedad “name”
Las funciones como objeto contienen algunas propiedades utilizables. Por ejemplo, el nombre de una función es accesible mediante la propiedad “name”:
```js
function sayHi() {
  alert("Hi");
}

alert(sayHi.name); // sayHi
```

En la especificación, esta característica se denomina “nombre contextual”. Si la función no proporciona una, entonces en una asignación se deduce del contexto.

## La propiedad “length”
Hay una nueva propiedad “length” incorporada que devuelve el número de parámetros de una función, por ejemplo:
```js
function f1(a) {}
function f2(a, b) {}
function many(a, b, ...more) {}

alert(f1.length); // 1
alert(f2.length); // 2
alert(many.length); // 2
```

Aquí podemos ver que los parámetros rest no se cuentan.


## Propiedades personalizadas
También podemos agregar nuestras propias propiedades.

Aquí agregamos la propiedad counter para registrar el recuento total de llamadas:
```js
function sayHi() {
  alert("Hi");

  //vamos a contar las veces que se ejecuta
  sayHi.counter++;
}
sayHi.counter = 0; // valor inicial

sayHi(); // Hi
sayHi(); // Hi

alert( `Called ${sayHi.counter} times` ); //  Llamamos 2 veces
```

> [!WARNING]
> Una propiedad no es una variable
> Una propiedad asignada a una función como sayHi.counter = 0 no define una variable local counter dentro de ella. En otras palabras, una propiedad counter y una variable let counter son dos cosas no relacionadas.
> Podemos tratar una función como un objeto, almacenar propiedades en ella, pero eso no tiene ningún efecto en su ejecución. Las variables no son propiedades de la función y viceversa. Estos solo son dos mundos paralelos.

