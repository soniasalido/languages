
# FUNCIONES

[Funciones](#functions)  
[1.- Hoisting](#1-hoisting)  
[2.- Enlaces y Ámbitos](#2-enlaces-y-ámbitos)  
[3.- Closure - Clausura](#3-closure---clausura)  
[4.- Funciones Autoinvocadas - IIFE](#4-funciones-autoinvocadas---iife-)  
[5.- Template Functions | Tagged Template Literals](#5-template-functions--tagged-template-literals)  
[6.- Definición de Funciones](#6-definición-de-funciones)
- [6.1.- Funciones Declaradas](#61-funciones-declaradas)
- [6.2.- Funciones Expresadas](#62-funciones-expresadas)
- [6.3.- Funciones Flecha (Arrow Functions)](#63-funciones-flecha-arrow-functions)
- [6.4.- Funciones Anónimas (Callback)](#64-funciones-anónimas-callback)
- [6.5.- Métodos dentro de Objetos](#6-5-métodos-dentro-de-objetos)  

[7.- Parámetros y Argumentos](#7-parámetros-y-argumentos)  
- [7.1.- Añadiendo valor de retorno](#71--añadiendo-valor-de-retorno)  
- [7.2.- Funciones de Orden Superior (Higher-Order Functions)](#72-funciones-de-orden-superior-higher-order-functions)  
- [7.3.- Closures](#73-closures)  
- [7.4.- Funciones Recursivas](#74-funciones-recursivas)  
- [7.5.- Funciones Generadoras](#75-funciones-generadoras)  
- [7.6.- this en Funciones](#76-this-en-funciones)  
- [7.8.- VARIADIC FUNCTIONS](#77-variadic-functions)  
    - [7.8.1.- Funciones Variadic mediante el operador rest](#771-funciones-variádicas-mediante-el-operador-rest)  
    - [7.8.2.- Funciones Variadic mediante el objeto iterable Arguments (Argumentos Objeto)](#772-funciones-variádicas-mediante-el-objeto-iterable-argumets-argumentos-objeto)  

[8.- Diferencias entre el Operador Rest y el Objeto Arguments](#8-diferencias-entre-el-operador-rest-y-el-objeto-arguments)    
[9.- Recursión](#9-recursión)  
[10.- Crecimiento de funciones](#10-crecimiento-de-funciones)  
[11.- Funciones y efectos secundarios](#11-funciones-y-efectos-secundarios)  


-------
# Functions
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


# 1. Hoisting
Hoisting es el mecanismo por el que JS procesa las declaraciones antes de cualquier código. Por eso se puede definir una función por debajo de una llamada a dicha función.

Hoisting permite usar funciones y variables antes de que se hayan declarado. El intérprete de JS divide la declaración y asignación de funciones y variables. Javascript "hoists" o "alza" nuestras declaraciones en la parte superior de su scope (ámbito) antes de la ejecución.

**Ejemplo de código:**
```
console.log(foo) // undefined
var foo = 'Bar';
console.log(foo) // 'Bar'
```

**Lo que hace el hoisting en el código anterior:**
```
var foo;
console.log(foo) // undefined
var foo = 'Bar';
console.log(foo) // 'Bar'
```

Este comportamiento es algo inusual de JS. Puede conducir a errores. No es recomendable usar una variable antes de que sea declarada. 

| ❗ Sólo las declaraciones hacen hoisting. Las asignaciones **NO** hacen hoisting. |
|------------------------------------------------------------------------------------|


**Hoisting de variables con let y con const**: Acceder a una variable declarada con let o const antes de que sea declarada, resulta en un ReferenceError.

# 2. Enlaces y Ámbitos
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
```
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
La capacidad de tratar las funciones como valores, combinada con el hecho de que los enlaces locales se recrean cada vez que se llama a una función, plantea una pregunta interesante: ¿qué sucede con los enlaces locales cuando la llamada a la función que los creó ya no está activa?El siguiente código muestra un ejemplo de esto. Define una función, wrapValue, que crea un enlace local. Luego devuelve una función que accede a este enlace local y lo devuelve:
```
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
```
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

**El ámbito léxico** se refiere al alcance de las variables que está determinado por la ubicación física de esas variables dentro del código fuente. Cuando una función se define, se crea un cierre que incluye todas las variables de su ámbito exterior en el momento de la definición de la función.

**Closures con Variables Privadas:** Los closures se utilizan comúnmente para crear variables privadas. Esto permite encapsular datos y proporcionar una interfaz para interactuar con ellos.

**Uso de Closures en Callbacks y Asincronía:** Los closures son muy útiles en el contexto de callbacks y operaciones asíncronas.
```
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

>[! IMPORTANT]
>**Closures en Bucles:** Un uso común de los closures es en bucles, para capturar el valor de la variable de iteración en cada iteración.
```
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


## 4. Funciones Autoinvocadas - IIFE. 
En JavaScript, una función autoinvocada (Immediately Invoked Function Expression, o IIFE) es un patrón que permite ejecutar una función inmediatamente después de definirla. Aunque generalmente se utilizan funciones anónimas para crear IIFEs, no es un requisito estricto; también se pueden usar funciones nombradas. A continuación, se explica el concepto en detalle.

Una IIFE es una función que se define y se ejecuta inmediatamente. Este patrón se utiliza para crear un ámbito léxico que no contamina el ámbito global y puede ser útil para encapsular variables.

- Ejemplo de IIFE con Función Anónima: La forma más común de escribir una IIFE es utilizando una función anónima:
  ```
  (function() {
    console.log('This is an IIFE!');
  })();
  ```

- Ejemplo de IIFE con Función Nombrada: También puedes usar una función nombrada dentro de una IIFE:
  ```
  (function namedIIFE() {
    console.log('This is a named IIFE!');
  })();
  ```
  Aunque la función tiene un nombre (namedIIFE), este nombre solo es accesible dentro de la función misma y no en el ámbito exterior.


**Propósitos de Usar IIFEs:**
- Encapsulación: Las IIFEs se utilizan para crear un ámbito de función que ayuda a encapsular variables y evitar conflictos de nombres en el ámbito global.
- Inicialización: Las IIFEs son útiles para ejecutar código de inicialización sin dejar variables temporales en el ámbito global.
- Modularidad: Las IIFEs pueden ser una forma de organizar el código en módulos autocontenidos.


## 5. Template Functions | Tagged Template Literals
Son un tipo de funciones especiales que se invocan con los backticks en vez de con los paréntesis (). No tienen un uso común. Se usan en ciertas librerías. Permite personalizar el procesamiento de las plantillas literales. Esto es útil para crear DSL (lenguajes específicos de dominio), formateo de cadenas, entre otras aplicaciones.

Como primer argumento de la función recibe un chunks que es un array con todo el string hasta que se encuentra con un ${}, el siguiente argumento es el siguiente string hasta el siguiente ${} y así sucesivamente.

Las Tagged Template Literals te permiten llamar a una función "etiqueta" que procesa una Template Literal. La función etiqueta recibe la cadena y los valores interpolados como argumentos, lo que permite manipular la salida antes de que se genere la cadena final.

Sintaxis Básica:
```
funcion Etiqueta`cadena literal con ${variable}`;
```

**Casos de uso:**
- Sanitización de entradas: Prevenir inyecciones SQL o XSS al limpiar entradas de usuario.
- Internacionalización: Formatear mensajes en diferentes idiomas.
- Generación de HTML: Crear contenido HTML dinámico de una manera segura.
- Formateo avanzado: Crear cadenas formateadas, como fechas o números, de una manera consistente.

**Ejemplo práctico: Sanitización:**
```
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



## 6. Definición de Funciones - Notación de Declaración
- Hay varias maneras de definir funciones en JavaScript:
  - Funciones Declaradas (Function Declarations).
  - Funciones Expresadas (Function Expressions).
  - Funciones Flecha (Arrow Functions).
  - Funciones Anónimas (Anonymous Functions).
  - Métodos dentro de Objetos.





### 6.1. Funciones Declaradas
Las funciones declaradas son definidas utilizando la palabra clave function seguida del nombre de la función, una lista de parámetros entre paréntesis y el cuerpo de la función entre llaves.
```
function greet(name) {
  return `Hello, ${name}!`;
}

console.log(greet('Alice')); // "Hello, Alice!"
```
La declaración define el enlace greet y lo apunta a la función que se define. Las funciones declaradas se pueden invocar en cualquier parte del código, incluso antes de la declaración de la función.



**Hoisting:** Las declaraciones de función no forman parte del flujo de control regular de arriba hacia abajo. Conceptualmente se mueven al principio de su alcance y pueden ser utilizadas por todo el código en ese alcance. Las funciones declaradas se "elevan" al inicio de su contexto, por lo que se pueden llamar antes de ser declaradas en el código.

```
console.log(greet('Bob')); // "Hello, Bob!"

function greet(name) {
  return `Hello, ${name}!`;
}
```

### 6.2. Funciones Expresadas
Las funciones expresadas son definidas como parte de una expresión. No tienen nombre (aunque pueden tenerlo) y se asignan a una variable.
```
const greet = function(name) {
  return `Hello, ${name}!`;
};

console.log(greet('Alice')); // "Hello, Alice!"
```

**Hoisting:** Las funciones expresadas no se elevan al inicio del contexto, por lo que deben ser definidas antes de ser utilizadas.
```
console.log(greet('Bob')); // Error: greet is not defined

const greet = function(name) {
  return `Hello, ${name}!`;
};
```

### 6.3. Funciones Flecha (Arrow Functions)
Las funciones flecha son una forma más corta de escribir funciones y no tienen su propio this. Son especialmente útiles para funciones anónimas y funciones de callback.

Son siempre anónimas. Es necesario almacenar esa expresión en una variable de tipo Const:
```
const nombreVaribale = (argumento) => {
  .....
  return ......
}


const greet = (name) => {
  return `Hello, ${name}!`;
};
console.log(greet('Alice')); // "Hello, Alice!"
```

Cuando la función flecha consta de una única línea para el return, se puede simplificar eliminando llaves y la palabra return:
```
const nombreVariable = (argumento) => ........;
```

Si la función flecha tiene un único argumento, se puede simplificar quitando los corchetes ():
```
const nombreVariable = argumento => ........;

const greet = name => `Hello, ${name}!`;
console.log(greet('Alice')); // "Hello, Alice!"
```

> [!WARNING]
> **La función flecha que devuelve un objeto: Es necesario usar corchetes (). Se genera un error si lo hacemos sólo con {}.**

Sin eliminar el return 🠮
```
const toObject = (name, surname, age) => {
  return {name,surname, age};
}
```

Eliminado la palabra return:
```
const toObject = (name, surname, age) => (
  {name, surname, age}
);
```


**Hoisting:** Las funciones flecha no se elevan al inicio del contexto. Solo la declaración de la variable a la que se asigna la función flecha es elevada, pero no su asignación. Las funciones flecha no tienen un nombre propio y se asignan a una variable. La declaración de esta variable es la que se eleva al principio del contexto, pero la asignación de la función no se eleva. Por lo tanto, si intentas invocar una función flecha antes de su definición, obtendrás un TypeError porque la variable será undefined en ese momento.


Si solo tenemos la sentencia "return" podemos acortar la función y ahorrarnos la palabra clave "return" y las llaves:
```
const toUpper = (text) => text.toUpperCase();
```

#### También podemos omitir los paréntesis cuando el argumento es único:
Sólo cuando es único, porque sino la coma de separación de argumentos se podría confundir con el operador coma.
```
const toUpper = text => text.toUpperCase();
```

#### En caso de que lo que devuelva sea un objeto literal hay que tener cuidado:
```
const toObject = (name, surname, age) => {
  return { name, surname, age }
}
```

y utilizar paréntesis para devolver en la forma corta, ya que las llaves de objeto literal se confundirían con las llaves de ámbito de función.
```
const toObject = (name, surname, age) => ({ name, surname, age })
```


#### SIMILITUDES: classic vs arrow
##### 1. Ciudadanos de primer orden
Las funciones en javascript, ya sean clásicas o arrow functions, son ciudadanos de primer orden. En otras palabras, esto significa que pueden ser usadas como cualquier otro valor en:
- Argumento de funciones
- Retorno de funciones
- Asignación a variables


##### 2. Funciones como argumentos de otras funciones
```
function saySomething(text, modifier) {
  console.log(modifier(text));
}
saySomething("HeLlO wOrLd", str => str.toLowerCase()); // hello world
saySomething("hello  world", str => str.replace(/[aeiou]/gi, "")); // hll wrld
```

##### 3. Funciones como valor de retorno
```
const createCounter = () => {
  let i = 0;
  return () => console.log(++i);
}

const count = createCounter();
count(); // 1
count(); // 2
count(); // 3
```
⚠ En este último ejemplo hemos empleado un CLOSURE! Este concepto avanzado se verá con más detenimiento en la parte avanzada.


#### DIFERENCIAS: classic vs arrow
##### 1. THIS
En javascript, como acabamos de ver, tenemos 2 formas diferentes de declarar funciones, de forma clásica o mediante arrow functions. ¿Pero por qué? ¿Para qué 2 maneras de hacer lo mismo? ¿Es solo pura sintáxis o estética? NO. Uno de los motivos de su exitencia tiene que ver con la keyword 'this'.

- En las funciones clásicas, 'this' hace referencia al contexto que ha invocado a la función, es decir, aquello que la llama, el 'caller'. Luego el 'this' se resuelve en tiempo de ejecución (runtime binding). Están pensadas para ser utilizadas como MÉTODOS. This es un punturo de aquello que invoca a mi función. El contexto que llama a la función.

- En las arrow functions, 'this' ya no es la entidad que la invoca sino que ahora apunta al contexto léxico en el que dicha arrow function ha sido definida. Ya no hay 'runtime binding', se resuelve en tiempo de desarrollo. Están más pensadas para ser usadas como 'function expressions' ligeras. En las arrow functions el valor this se hereda del contexto léxico en el que se define la función. Las arrow functions no tienen su propio contexto this. En lugar de eso, heredan el valor de this del contexto léxico en el que se definen. Esto significa que this dentro de una arrow function se refiere al mismo valor que this en la función o el bloque de código donde se definió la arrow function.
 
```
function f() {
  console.log(this.age);  // Aqui el contexto es el "caller" de la función. this -> caller.
}
```
Al hacer la siguiente llamada debéis preguntaros ... ¿quién está invocando a la función f?
En este caso en concreto es el contexto global (objeto "window") quien hace la invocación.
Es por ello que, al no tener dicho contexto una propiedad "age", se muestre undefined.

```
f(); // undefined
```

Para demostrar esta teoría, simplemente creemos una una propiedad "age" en el contexto global u objeto "window":
```
age = 35;
// window.age = 35; <= Equivalente
f(); // 35
```

Las funciones, además, disponen de un método de utilidad con el que invocarlas haciendo que su contexto de invocación sea lo que nosotros decidamos, por ejemplo, un objeto que tenga 'age':
```
f.call({ age: 35 }); // 35
```

Veamos que sucede ahora en el caso de arrow function. Recordemos que ahora "this" representa el contexto léxico y por tanto es fijo, sea quien sea quien invoque a la función flecha. A efectos prácticos, podemos decir que una arrow function toma el contexto del "this" de donde ha sido definida.
```
const g = () => console.log(this.surname);
```

Puesto que en el ámbito global no existe "surname" el resultado será undefined, igual que antes:
```
g(); // undefined
```

La forma de hacer que tengamos algo en la consola es crear una variable global "surname":
```
surname = "camargo";
g(); // camargo.
```

Pero a diferencia de las funciones clásica, puesto que ahora el "this" siempre apunta al ámbito global, PASE LO QUE PASE, no podré hacer esto:
```
surname = "camargo";
g.call({ surname: "calzado" }); // camargo
```

No importa que intente invocar la arrow function con un objeto distinto de "window", no tiene efecto!


##### 2. Otras diferencias
Las arrow functions no pueden ser 'variadic' y no presentan por tanto la keyword 'arguments'. Si lo intentamos nos petará (OJO en Stackblitz no peta)
```
const sum = () => {
  return Array.from(arguments).reduce((acc, val) => acc + val);
};

console.log(sum(1, 2, 3)); // Uncaught ReferenceError: arguments is not defined
```

Sin embargo, existe una forma de obtener todos los argumentos con forma de array *similar* a arguments. Esto lo veremos más adelante.

**Las arrow functions no pueden ser funciones constructoras ni presentan la propiedad 'prototype'.** ⚠ Entenderemos esto en profundidad más adelante al estudiar el modelo prototípico.



### 6.4. Funciones Anónimas (Callback)
Las funciones anónimas son aquellas que no tienen nombre. Se suelen usar como funciones de callback.
```
setTimeout(function() {
  console.log('Hello after 2 seconds');
}, 2000);
```

**Ejemplo: All About Anonymous Functions:** Adding Suffixes: Write a function that returns an anonymous function, which transforms its input by adding a particular suffix at the end.
```
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
```
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


### 6. 5. Métodos dentro de Objetos
Los métodos son funciones que se definen dentro de un objeto.
```
const person = {
  name: 'Alice',
  greet: function() {
    return `Hello, my name is ${this.name}`;
  }
};

console.log(person.greet()); // "Hello, my name is Alice"
```

# 7. Parámetros y Argumentos
Las funciones pueden aceptar parámetros, que son variables que actúan como marcadores de posición para los valores que se pasarán a la función.
```
function add(a, b) {
  return a + b;
}

console.log(add(2, 3)); // 5
```

**Parámetros Predeterminados:** Se pueden asignar valores predeterminados a los parámetros de una función.
```
function greet(name = 'Guest') {
  return `Hello, ${name}!`;
}

console.log(greet()); // "Hello, Guest!"
```


**Añadiendo argumentos**
```
function saySomething(arg1, arg2) {
  console.log(arg1, arg2);
}

saySomething("hello", "world"); // hello world
saySomething("hello"); // hello undefined
saySomething(); // undefined undefined
```

Es legítimo llamar a una función con más argumentos que los que han sido declarados. Veremos como aprovechar este hecho un poco más abajo.
```
saySomething("hello", "wonderful", "world"); // hello wonderful
```


# 7.1.- Añadiendo valor de retorno:
```
function saySomething(arg1, arg2) {
  console.log(arg1, arg2);
  return arg1 && arg2 ? true : false; // Expresión equivalente: return Boolean(arg1 && arg2);
}

console.log(saySomething("hello", "world")); // hello world, true
console.log(saySomething("hello")); // hello undefined, false
```



## 7.2 Funciones de Orden Superior (Higher-Order Functions)
Las funciones de orden superior son funciones que aceptan otras funciones como argumentos o devuelven funciones como resultado.
```
function operate(a, b, operation) {
  return operation(a, b);
}

const add = (x, y) => x + y;
const subtract = (x, y) => x - y;

console.log(operate(5, 3, add)); // 8
console.log(operate(5, 3, subtract)); // 2
```

## 7.3 Closures
Un closure es una función que tiene acceso a su propio ámbito léxico, al ámbito de la función externa y al ámbito global.
```
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


## 7.4 Funciones Recursivas
Las funciones recursivas son funciones que se llaman a sí mismas.
```
function factorial(n) {
  if (n === 0) {
    return 1;
  }
  return n * factorial(n - 1);
}

console.log(factorial(5)); // 120
```

## 7.5 Funciones Generadoras
Las funciones generadoras permiten pausar y reanudar la ejecución del código utilizando yield.
```
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

## 7.6 this en Funciones
El valor de this varía dependiendo de cómo se llama la función:
- Funciones regulares: El valor de this depende del contexto en el que se llama la función.
- Funciones flecha: No tienen su propio this, sino que heredan el this del contexto en el que se definieron.
```
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



## 7.7 VARIADIC FUNCTIONS
Las funciones variádicas (variadic functions) son funciones que pueden aceptar un número variable de argumentos. En JavaScript, cualquier función puede ser variádica, ya que las funciones no requieren que el número de argumentos coincida con el número de parámetros definidos. Aquí se incluye el concepto de funciones variádicas dentro de las distintas maneras de definir funciones en JavaScript.

### 7.7.1. Funciones Variádicas mediante el operador rest:
Un ejemplo de función variádica en una Funciones Declaradas (Function Declarations):
```
function sum(...numbers) {
  return numbers.reduce((total, number) => total + number, 0);
}

console.log(sum(1, 2, 3)); // 6
console.log(sum(4, 5, 6, 7)); // 22
```

### 7.7.2 Funciones Variádicas mediante el objeto iterable Argumets (Argumentos Objeto)
Además del operador rest, en JavaScript las funciones tienen acceso a un objeto arguments que contiene todos los argumentos pasados a la función. Aunque el uso del operador rest es más moderno y legible, el objeto arguments todavía se usa en algunas situaciones.
```
function logArguments() {
  console.log(arguments); // "arguments" es un objeto array-like (iterable)
}

logArguments(); // {}
logArguments(true); // {0: true}
```

**Podemos iterar por "arguments" por comodidad:**
```
function logArguments() {
  for (const arg of arguments) {
    console.log(arg);
  }
}

logArguments(1, true, "hello"); // 1, true, hello
```

**Ejemplo práctico de utilidad con "arguments":**
```
function sum() {
  let total = 0;
  for (const num of arguments) {
    total += num;
  }
  return total;
}

console.log(sum(1, 2, 3)); // 6;
```

# 8. Diferencias entre el Operador Rest y el Objeto Arguments
- Sintaxis y Modernidad: El operador rest (...) es una característica moderna de ES6 y es más legible y conciso.
- Tipo de Objeto: El operador rest devuelve un array real, mientras que el objeto arguments es similar a un array pero no es un array real (es un objeto array-like).
- Funciones Flecha: El objeto arguments no está disponible en las funciones flecha, pero el operador rest sí lo está.


# 9. Recursión
La recursión es un concepto en programación en el que una función se llama a sí misma para resolver un problema. La recursión es una técnica poderosa y elegante que se puede utilizar para resolver problemas complejos de manera simple y concisa.
```
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




# 10. Crecimiento de Funciones
Hay dos formas más o menos naturales de introducir funciones en los programas.
- La primera ocurre cuando te encuentras escribiendo código similar varias veces. Preferirías no hacer eso, ya que tener más código significa más espacio para que se escondan los errores y más material para que las personas que intentan entender el programa lo lean. Por lo tanto, tomas la funcionalidad repetida, encuentras un buen nombre para ella y la colocas en una función.
- La segunda forma es que te das cuenta de que necesitas alguna funcionalidad que aún no has escrito y que suena como si mereciera su propia función. Comienzas por nombrar la función, luego escribes su cuerpo. Incluso podrías comenzar a escribir código que use la función antes de definir la función en sí.

# 11. Funciones y efectos secundarios
Las funciones pueden dividirse aproximadamente en aquellas que se llaman por sus efectos secundarios (como puede ser imprimir una línea) y aquellas que se llaman por su valor de retorno (aunque también es posible tener efectos secundarios y devolver un valor).

**Una función pura** es un tipo específico de función productora de valor que no solo no tiene efectos secundarios, sino que tampoco depende de efectos secundarios de otro código, por ejemplo, no lee enlaces globales cuyo valor podría cambiar. Una función pura tiene la agradable propiedad de que, al llamarla con los mismos argumentos, siempre produce el mismo valor (y no hace nada más). Una llamada a tal función puede sustituirse por su valor de retorno sin cambiar el significado del código. Cuando no estás seguro de si una función pura está funcionando correctamente, puedes probarla llamándola y saber que si funciona en ese contexto, funcionará en cualquier otro. Las funciones no puras tienden a requerir más andamiaje para probarlas.