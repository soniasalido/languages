# Funcionamiento de JS
El esquema general de una página web es un documento HTML donde están las etiquetas HTML, referencias o relaciones a otros documentos, como por ejemplo archivos CSS o archivos javascript.

# Características de JS
- Multiparadigma: OOP, funcional, Imperativo.
- Dinámico: Evaluación en tiempo de ejecución.
- Interpretado: No requiere previamente de compilación. El navegador lo va ejecutando línea por línea. No se compila ni se traduce a otro lenguaje intermedio.
- Multipropósito: No sólo se usa en el Desarrollo Web.
- Objetos: El lenguaje nos da objetos estándar built-in (Objetos de Clase).
- Propotipos: Proporciona una herencia superior a la clásica..
- JSON: Notación literal de objetos. Con JSON podemos:
  - Serializar Objetos.
  - Deserializar Objetos.
- Popular: Es el lenguaje más usado del mundo.
- Clave: Estándar en la web.
- Tipado en JS:
  - Tipado dinámico: En JavaScript, las variables pueden contener valores de cualquier tipo sin necesidad de una declaración explícita de tipo.
    ```
    let variable = 42;     // variable es de tipo Number
    console.log(typeof variable); // "number"
    
    variable = "Hello";    // Ahora variable es de tipo String
    console.log(typeof variable); // "string"
    
    variable = true;       // Ahora variable es de tipo Boolean
    console.log(typeof variable); // "boolean"
    ```

  - Tipado débil: JavaScript realiza conversiones automáticas entre tipos cuando es necesario. Este comportamiento se conoce como coerción de tipos (type coercion).
    ```
    console.log(1 + '2');     // "12" (Número se convierte en cadena)
    console.log('5' - 2);     // 3 (Cadena se convierte en número)
    console.log('5' * '2');   // 10 (Ambas cadenas se convierten en números)
    console.log(1 == '1');    // true (Comparación con coerción de tipos)
    console.log(1 === '1');   // false (Comparación estricta sin coerción)
    ```
  - Tipado inferido: cuando definimos una variable se define de forma general. El tipo de una variable se define cuando el intérprete, interpreta esa variable.


# Script en línea
JavaScript en línea, también conocido como JavaScript "inline", se refiere a la práctica de incluir código JavaScript directamente dentro de las etiquetas HTML de una página web. Este código puede estar contenido dentro de un atributo de evento HTML o dentro de una etiqueta <script> dentro del mismo archivo HTML. No es recomendable. Lo ideal es separar el código HTML del código JS. Se evitan problemas de mantenieminto, reutilización, legibilidad y seguridad (se incremente el riesgo de ataques de inyección de código y otros probleas de seguridad).

- Javascript en atributos de eventos HTML:
  ```
  <button onclick="alert('Hola, mundo!')">Haz clic aquí</button>
  ```
- JavaScript dentro de etiquetas <script> en línea: El código JavaScript se coloca dentro de una etiqueta <script> en el documento HTML:
  ```
  <html>
  <head>
    <title>Título de la página</title>
    <script>
      console.log("¡Hola!");
    </script>
  </head>
  <body>
    <p>Ejemplo de texto.</p>
  </body>
  </html>
  ```
  El navegador puede descargar un documento Javascript en cualquier momento de la carga de la página. Por ello necesitamos saber cuál será el momento oportuno para nosotros:
  - Si queremos que un documento Javascript actúe antes que se muestre la página, la opción de colocarlo en el <head> es la más adecuada.
  - Si por el contrario, queremos que actúe una vez se haya terminado de cargar la página, la opción de colocarlo justo antes del </body> es la más adecuada. Esta opción es equivalente a usar el atributo **defer** en la etiqueta <script>, sin embargo, esta opción es además compatible con navegadores muy antiguos (IE9 o anteriores) que no soportan defer.

# Script externo  
Para incluir un fichero JavaScript externo en un documento HTML, se utiliza la etiqueta <script> con el atributo src.
```
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo de JS Externo</title>
</head>
<body>
    <h1>Hola, mundo!</h1>
    <!-- Enlace al archivo JavaScript externo -->
    <script src="ruta/al/archivo.js"></script>
</body>
</html>
```
**Orden de Carga:** Los scripts externos deben ser colocados preferentemente antes del cierre de la etiqueta </body> para asegurar que el contenido de la página se carga antes de que el script se ejecute.

**Defer y Async:** Los atributos defer y async pueden ser usados para controlar la ejecución de scripts externos. defer asegura que el script se ejecuta después de que el documento HTML ha sido completamente analizado, mientras que async permite que el script se ejecute tan pronto como esté disponible, lo que puede ser útil para scripts que no dependen del DOM.
```
<!-- Script con defer -->
<script src="ruta/al/archivo.js" defer></script>

<!-- Script con async -->
<script src="ruta/al/archivo.js" async></script>
```

# Etiqueta noscript
La etiqueta <noscript> en HTML es una etiqueta especial que se utiliza para proporcionar contenido alternativo para los navegadores web que no tienen JavaScript habilitado o para aquellos en los que el soporte de JavaScript está deshabilitado. Esta etiqueta es útil para mejorar la accesibilidad y la funcionalidad de un sitio web para los usuarios que no pueden o no desean ejecutar JavaScript.
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noscript Example</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>
    <p>If you can see this message, JavaScript is enabled in your browser.</p>
    <noscript>
        <p>JavaScript is disabled in your browser. Please enable JavaScript for the best experience on our site.</p>
    </noscript>
</body>
</html>
```


# Identificar el tipo de dato de una variable o constante
- Uso de typeof(): Es un operador esencial que nos permite determinar el tipo de dato de una variable o valor. Esto es crucial en un lenguaje dinámico como JavaScript, donde los tipos pueden cambiar.
  ```
  typeof 42;          // "number"
  typeof "Hola";       // "string"
  typeof true;         // "boolean"
  typeof undefined;    // "undefined"
  typeof null;         // "object" (¡un caso especial!)
  typeof Math.PI;      // "number"
  typeof function() {}; // "function"
  ```
  - Casos especiales:
    - null: Aunque null representa la ausencia de valor, typeof null devuelve "object". Esto es un error histórico en JavaScript.
    - Arrays: typeof [] devuelve "object" porque los arrays son técnicamente objetos en JavaScript.
    - Funciones: typeof puede distinguir funciones de otros objetos.
  - Alternativas para estos casos especiales:
    - Array.isArray(variable): Para determinar específicamente si un valor es un array.
    - variable instanceof Clase: Para verificar si un objeto es una instancia de una clase específica.
      
- Usando constructor.name: Con constructor.name podemos obtener el tipo de constructor que se utiliza. Es una propiedad que nos permite obtener el nombre de la función constructora que se utilizó para crear un objeto. En JavaScript, cada objeto tiene una propiedad implícita llamada constructor. Esta propiedad hace referencia a la función constructora que se utilizó para crear el objeto. A su vez, la propiedad name de la función constructora te da el nombre de dicha función. Esta propiedad también se usa en situaciones donde tenemos múltiples funciones constructoras que crean objetos similares, y constructor.name nos permite diferenciar (Polimorfismo).
```
function Persona(nombre) {
  this.nombre = nombre;
}

const juan = new Persona("Juan");
console.log(juan.constructor.name); // Salida: "Persona"
```

# Tipos de Notación:
 En JavaScript, existen varios tipos de notación que se utilizan para representar y trabajar con diferentes tipos de datos y estructuras. 
| Notación | Descripción |
| ---- | ----|
| 1. Notación Literal: |
| Números | Se representan directamente con dígitos (ej: 42, 3.14).|
| Strings | Se encierran entre comillas simples o dobles (ej: "Hola", 'Mundo').|
| Booleanos | Los valores true y false.|
| Arrays | Se definen entre corchetes, con elementos separados por comas (ej: [1, 2, 3]).|
| Objetos| Se definen entre llaves, con pares clave-valor separados por comas (ej: { nombre: "Ana", edad: 30 }).|
| 2. Notación de Punto (.) |
| Acceso a propiedades de objetos | Se utiliza para acceder a las propiedades de un objeto (ej: persona.nombre).|
| Llamada a métodos de objetos | Se utiliza para llamar a los métodos de un objeto (ej: Math.random()).|
| 3. Notación de Corchetes ([]) |
| Acceso a elementos de arrays | Se utiliza para acceder a los elementos de un array mediante su índice (ej: numeros[0]).|
| Acceso a propiedades de objetos con nombres dinámicos | Se utiliza cuando el nombre de la propiedad no se conoce de antemano (ej: persona["nombre"]).|
| 4. Notación de Plantilla Literal (`) |
| Strings con expresiones incrustadas | Permite incrustar expresiones de JavaScript dentro de un string utilizando ${...} (ej: const nombre = "Ana"; console.log(Hola, ${nombre}!);).|
| 5. Notación JSON (JavaScript Object Notation)|
| Intercambio de datos | Es un formato ligero basado en texto para el intercambio de datos, muy utilizado en aplicaciones web. Se basa en la notación de objetos de JavaScript, pero con algunas restricciones (ej: las claves deben ser strings).|
| 6. Notación de Finalización de cada línea (;) |
| Finalización de cada línea. No es obligatorio.| x|



# EXPRESIONES BÁSICAS ********


## Comentarios en línea
```
let d = 4; // d value is 4
```

## Comentarios de bloque
```
/*
let c = 3;
let d = 4;
*/
```

## VARIABLES

Javascript es un **lenguaje dinámico y débilmente tipado**, lo que significa que las variables no están asociadas a ningún tipo concreto. Por tanto, no tengo que declararlas especificando ningún tipo. Puedo asignar el valor que quiera, del tipo que quiera.

Tenemos varios operadores para declarar variables: `let`, `const` y `var`. Actualmente `var` está desaconsejado debido a un concepto llamado ["Hoisting".](https://github.com/soniasalido/languages/blob/main/01-javascript/103%20functions.md#hoisting)


A partir de ES6: Let y Const tiene un ábito de bloque, lo que implica que sólo tienen validez en el bloque en el cual se declara, No se aplica hoisting.

Var tiene un ámbito de función. Sí se aplica hoisting.

### LET
Utilizaremos `let` cuando queramos declarar una variable a la que, posteriormente, **podamos ser capaces de reasignar su valor.** Se pueden inicializar después de declararse.
```
let a = 3;
a = 14;
````

Podemos crear multiples declaraciones todas con el mismo tipo `let` separadas por coma:
```
let b = 10, c = "hello";
```

Una vez tengamos una **variable declarada no podemos redeclarar otra con el mismo nombre en el mismo ámbito**. Veremos con más detalle el ámbito más adelante:
```
let a = 3;
let a = 14; // Error! La variable `a` ya ha sido redeclarada
```


### CONST
Utilizaremos `const` cuando queramos declarar una variable que nunca queramos volver a reasignar. Es importante entender que **una vez que declaremos la variable no podemos volver a reasignar su valor.**
Es por esto que una variable declarada con `const` debe incluir la asignación. Generalmente utilizaremos `const` para dar a entender de forma semántica que esa variable no seá reasignada. Siempre tienen que ser inicializadas. No se pueden inicializar después de su declaración.
**⚠ Importante: Una variable declarada con `const` puede no ser "constante", es decir, de sólo lectura. El concepto "constante" dependerá del tipo de dato que almacenemos.**

>[!CAUTION]
> Const es referencia constante, NO ES CONTENIDO CONSTANTE.

```
// Esto lanzará un error de ejecución
const a;

// Hay que incluir el valor
const a = 3;

// Reasignar su valor lanzará un error de ejecución
a = 14;

// Al igual que las variables `let` no podemos redeclarar una variable con el mismo nombre en el mismo ámbito.
const a = 3;
const a = 14; // Error! La variable `a` ya ha sido redeclarada

// Es importante entender que no podemos utilizar una variable declarada con `let` o `const` antes de su declaración.
console.log(a); // Error! Todavía no existe la variable `a`
let a = 10;
```

## Valores Falsy en JS
En JavaScript, los valores falsy son valores que se consideran falsos cuando se evalúan en un contexto booleano, como en una condición de un if o en otras estructuras de control de flujo que requieren una evaluación de verdad o falsedad. Entender los valores falsy es crucial para escribir código más robusto y prevenir errores lógicos.

**Lista de Valores Falsy:**
- false: El valor booleano false.
- 0: El número cero (tanto en formato decimal como hexadecimal).
- -0: El número negativo cero.
- 0n: El valor BigInt cero.
- "" (cadena vacía): Una cadena de texto vacía.
- null: Representa la ausencia de cualquier valor.
- undefined: Indica que una variable no ha sido asignada a un valor.
- NaN: El valor especial Not-a-Number.


## TIPOS DE DATOS 
Distinguimos 2 grandes grupos de tipos de datos en Javascript:
1. Tipos PRIMITIVOS (representan un único dato simple).
2. Tipos estructurales (representan estructuras de datos) u OBJETOS.

7 PRIMITIVOS (2 de nueva incorporación) + OBJETOS


### 1. PRIMITIVOS
- DEFINICIÓN: Aquellos que trae el lenguaje por defecto (built-in). Un tipo primitivo es aquel que no es un objeto y por tanto no tiene métodos. Representan datos simples, sencillos.
- CARACTERÍSTICAS:
  - Todos los primitivos son inmutables. Una vez creado un valor primitivo no puede ser alterado ni modificado (no confundir con reasignar una variable con otro valor).
  - Operador 'typeof'.

#### 1.1 String (Cadenas de Texto)
```
"hello world" // dobles comillas
'hello world' // comillas simples
`hello world` // backticks. Los strings creados con backticks tb se conocen como "template literals"
''
""
``

// string multilínea
`This is a
multiline string`
```

**Template Literals**:
- Los "template literals", también conocidos como "plantillas literales" o "plantillas de cadena", son una característica introducida en ECMAScript 6 (ES6) que proporciona una forma más elegante y poderosa de trabajar con cadenas de texto en JavaScript.
- Características principales:
  - Delimitadores con acentos graves (backticks):  A diferencia de las comillas simples o dobles tradicionales, los template literals se delimitan con acentos graves ().
  - Cadenas multilínea: Permiten escribir cadenas de texto que abarcan varias líneas sin necesidad de utilizar caracteres de escape como \n.
  - Interpolación de expresiones: Facilitan la inserción dinámica de valores de variables y expresiones directamente en las cadenas utilizando la sintaxis ${expresión}.
  - Etiquetas de plantillas (Tagged templates): Ofrecen una forma avanzada de personalizar el procesamiento de plantillas literales mediante funciones especiales llamadas "etiquetas".


**Interpolación de expresiones**:
La interpolación de expresiones en JavaScript, específicamente dentro de plantillas literales (template literals), es una característica poderosa que te permite insertar dinámicamente valores de variables y expresiones directamente en cadenas de texto. Esto hace que el código sea más legible y fácil de mantener. La interpolación se logra utilizando la sintaxis ${...} dentro de las comillas invertidas (backticks) que delimitan una plantilla literal. Cualquier expresión válida de JavaScript colocada dentro de ${...} será evaluada y su resultado se insertará en la cadena.
```
const person = "Edward";
const message = `How are you, ${person}?`;
console.log(message); // "How are you, Edward?"
```

**Expresiones**:
Una expresión en JavaScript es cualquier fragmento de código que produce un valor. Este valor puede ser de cualquier tipo:
- Valores primitivos: números, cadenas de texto (strings), booleanos (true o false), null, undefined, símbolos (symbols) y BigInts.
- Objetos: arrays, funciones, objetos literales, expresiones regulares, fechas, etc.
- Resultados de operaciones: la suma de dos números, la concatenación de cadenas, el valor devuelto por una función, etc.
```
5 + 3;               // Expresión aritmética, resultado: 8
"Hola" + " mundo";   // Expresión de concatenación de cadenas, resultado: "Hola mundo"
Math.sqrt(16);       // Llamada a función, resultado: 4
[1, 2, 3];           // Array literal
x > 5;   
```
Llamaremos "expresión" a cualquier tipo de valor que pueda ser almacenado en una variable. Una expresión puede ser un valor primitivo, objeto, valor devuelto por una función, resultado de una operación, etc.

Las expresiones son los bloques de construcción fundamentales de JavaScript. Se utilizan en casi todas partes del lenguaje:
- Asignación de variables: El valor de una expresión se puede asignar a una variable.
- Argumentos de funciones: Las expresiones se pasan como argumentos a las funciones.
- Estructuras de control: Las expresiones se utilizan en condiciones de if, bucles for y while, etc.
- Operaciones: Las expresiones se combinan con operadores para realizar cálculos y manipulaciones de datos

**Expresiones vs. Sentencias**
Es importante distinguir entre expresiones y sentencias en JavaScript:
- Expresiones: Producen un valor.
- Sentencias: Realizan una acción (declarar una variable, definir una función, controlar el flujo del programa).


#### 1.2 Number (Números)
```
101       // entero positivo
-200      // entero negativo
1220.31   // flotante
1e6       // notación exponencial (1 x 10^6)
Infinity  // infinito
NaN       // NotANumber** (de hecho es de tipo número)
```
⚠ Podemos separar los dígitos con un underscore [_] en cualquier posición para mejorar la legibilidad.

Indeterminados (0 * Infinity), indefinidos (1 / 0), fuera del conjunto de los reales (sqrt(-1)), o errores al parsear (parseInt("abc")).

#### 1.3 Boolean (Lógicos)
```
true
false
```

#### 1.4 Null
Representa la ausencia intencionada de cualquier valor u objeto. Es usado comúnmente para indicar que una variable debería tener un objeto pero actualmente no tiene ninguno. Null es un primitivo especial de tipo "object" en JavaScript y la raíz de la cadena de prototipos.

**1. null como Primitivo Especial:**
- Primitivo: En JavaScript, null es uno de los tipos de datos primitivos, junto con undefined, booleanos, números, strings, symbols y BigInts. Los primitivos son valores inmutables y no son objetos.
- Tipo "object": Sin embargo, cuando utilizas el operador typeof con null, el resultado es "object". Esto es un comportamiento peculiar y considerado un error histórico en el diseño de JavaScript. Cuando se utiliza el operador typeof en null, se obtiene "object". Este comportamiento es considerado un bug del lenguaje, que ha sido mantenido por razones de compatibilidad desde las primeras versiones de JavaScript.
  
**2. Raíz de la Cadena de Prototipos:**
- Prototipos: JavaScript utiliza un sistema basado en prototipos para la herencia. Cada objeto tiene un prototipo (que también es un objeto) del cual hereda propiedades y métodos.
- null como Raíz: null es el último eslabón en esta cadena de prototipos. Esto significa que todos los objetos en JavaScript, directa o indirectamente, tienen null como su prototipo final. Cuando buscas una propiedad o método en un objeto y no la encuentras, la búsqueda continúa en su prototipo y así sucesivamente hasta llegar a null. Cada objeto tiene una referencia interna al prototipo ([[Prototype]]), que es otro objeto, y esta cadena termina en null.

**¿Por qué es importante?**
- Diseño del lenguaje: Comprender este aspecto de null es fundamental para entender el funcionamiento interno de JavaScript y su sistema de prototipos.
- Comportamiento inesperado: El hecho de que typeof null devuelva "object" puede causar confusión y errores si no se tiene en cuenta.
- Utilidad: En algunos casos, se puede aprovechar que null es la raíz de la cadena de prototipos para realizar comprobaciones o iteraciones sobre objetos.



#### 1.5 Undefined
Es un tipo de dato primitivo que representa la ausencia de valor.
- Valor único: undefined es el único valor posible del tipo de dato undefined.
- Variables no inicializadas: Cuando se declara una variable en JavaScript pero no le asignamos un valor, automáticamente se le asigna el valor undefined.
- Propiedades inexistentes: Si intentas acceder a una propiedad de un objeto que no existe, obtendrás undefined.
- Parámetros de funciones no proporcionados: Cuando una función se llama con menos argumentos de los esperados, los parámetros faltantes se establecen en undefined.
- Retorno implícito de funciones: Si una función no tiene una declaración de retorno explícita, devuelve implícitamente undefined.


### null o undefined
En general, se recomienda utilizar `null` para indicar la ausencia intencional de un valor, y undefined para indicar que algo simplemente no está definido o no tiene un valor.
- **Cuándo usar undefined:**
  - Variables no inicializadas: Cuando declaras una variable sin asignarle un valor, JavaScript automáticamente le asigna undefined. Esto indica que la variable existe pero aún no tiene un valor definido.
  - Propiedades de objetos inexistentes: Si intentas acceder a una propiedad que no existe en un objeto, obtendrás undefined. Esto indica que la propiedad no ha sido definida.
  - Parámetros de funciones no proporcionados: Cuando llamas a una función sin pasar todos los argumentos esperados, los parámetros faltantes se asignan a undefined. Esto indica que no se proporcionó un valor para ese parámetro.
  - Retorno implícito de funciones: Si una función no tiene una declaración de retorno explícita, devuelve implícitamente undefined. Esto indica que la función no produjo ningún valor específico para devolver.

- **Cuándo usar null:**
  - Ausencia intencional de valor: Utiliza null cuando quieres indicar explícitamente que una variable o propiedad no tiene un valor significativo en ese momento. Es una forma de decir "esta variable está vacía a propósito".
  - Reiniciar variables: Puedes asignar null a una variable para borrar su valor anterior y liberarla de cualquier referencia a objetos.
  - Valores por defecto: En algunos casos, puedes usar null como valor por defecto para indicar que una variable o parámetro no tiene un valor inicial válido.

#### 1.6 Symbol
/* ⚠ Lo veremos más adelante ya que su uso está muy ligado a los objetos */

#### 1.7 Bigint
⚠ Nuevo tipo numérico para representar enteros de cualquier tamaño, con cualquier precisión. 
```
2n
BigInt(2)
```

#### 1.8 NaN 
En JavaScript, NaN (Not-a-Number) es un valor especial que representa un resultado de una operación matemática que no puede producir un número válido. 
** Características de NaN:**
- Tipo: NaN es de tipo number.
- Autoreferencia: NaN no es igual a ningún valor, incluido él mismo.
- Resultado de Operaciones Inválidas: NaN es el resultado de operaciones matemáticas que no tienen un resultado numérico válido.
```
let result = 0 / 0; // División de cero por cero
console.log(result); // NaN

result = Math.sqrt(-1); // Raíz cuadrada de un número negativo
console.log(result); // NaN

result = parseFloat("hello"); // Intentar convertir una cadena no numérica en número
console.log(result); // NaN
```

**Uso de isNaN:** La función global isNaN convierte el valor a número y luego comprueba si es NaN.
```
console.log(isNaN(NaN));         // true
console.log(isNaN("hello"));     // true (cadena no numérica se convierte en NaN)
console.log(isNaN(123));         // false
console.log(isNaN("123"));       // false (cadena numérica se convierte en número)
```


### 1.2 OBJETOS
Se utilizan para representar datos estructurados, como los objetos en si mismos o los arrays (que también son objetos en el fondo)

⚠ Los objetos y estructuras de datos (arrays) se darán en el siguiente capítulo.
⚠ Entre otros, las funciones son un tipo especial de objetos y las veremos más adelante.
⚠ Existen más tipos de estructuras de datos nativas como Map o Set que iremos viendo en sus propias secciones.
Operador: instanceof: Determina la clase concreta de un objeto. Devuelve, true ó false.


# OPERADORES 
Un operador es un símbolo que le indica al compilador que debe realizar una operación específica, que puede ser aritmética, de comparación, lógica, o de otro tipo, sobre uno o más operandos (los valores o variables que intervienen en la operación). 
- Tipos de operadores:
  - Aritméticos: Operadores para realizar operaciones matemáticas.
  - Asignación: Operadores para guardar información en variables.
  - Unarios: Operadores que se utilizan con un sólo operando.
  - Comparación: Operadores para realizar comprobaciones.
  - Binarios: Operadores a bajo nivel (a nivel de bits).

## 1. Operadores ARITMÉTICOS
```
console.log(52 + 21); // 73
console.log("hello " + "world"); // "hello world"
console.log(10 - 5); // 5
console.log(10 * 10); // 100;
console.log(9 / 3); // 3
console.log(15 / 2); // 7.5;
console.log(15 % 3); // 0 (Módulo o resto)
console.log(2 ** 3); // 8 (Exponenciación)
```

```
console.log(52 + 21);
console.log("hello " + "world");
console.log(10 - 5);
console.log(10 * 10);
console.log(9 / 3);
console.log(15 / 2);
console.log(15 % 3);
console.log(2 ** 3);

// Asignaciones con operadores aritméticos
// ⚠ Importante: No podemos usar operadores de asignación con variables `const`
let num = 3;
console.log(num++); // 3 (increases after console.log)
console.log(num--); // 4 (decreases after console.log)
console.log(++num); // 4 (increases before console.log)
console.log(--num); // 3 (decreases before console.log)
num += 5;           // Equivalent to num = num + 5
console.log(num);   // 8
num -= 5;           // Equivalent to num = num - 5
console.log(num);   // 3
num *= 10;          // Equivalent to num = num * 10
console.log(num);   // 30
num /= 6;           // Equivalent to num = num / 6
console.log(num);   // 5
num %= 3;           // Equivalent to num = num % 3
console.log(num);   // 2
num **= 10          // Equivalent to ten times num * num or Math.pow(2, 10)
console.log(num)    // 1024


let num = 3;
console.log(num++);
console.log(num--);
console.log(++num);
console.log(--num);
num += 5;
console.log(num);
num -= 5;
console.log(num);
num *= 10;
console.log(num);
num /= 6;
console.log(num);
num %= 3;
console.log(num);
num **= 10
console.log(num);
```

## 2. Operadores de Asignación:
Asigna un valor a una variable.
```
Suma y asignación	a += b	Es equivalente a ⇾ a = a + b.
Resta y asignación	a -= b	Es equivalente a ⇾ a = a - b.
Multiplicación y asignación	a *= b	Es equivalente a ⇾ a = a * b.
División y asignación	a /= b	Es equivalente a ⇾ a = a / b.
```


## 3. Operadores Unarios
Los operadores unarios son operadores que actúan sobre un solo operando. Estos operadores realizan diversas operaciones como la negación lógica, el incremento o decremento de valores numéricos, y la obtención del tipo de un valor.
  - Operador Negación lógica: !
  - Operador Negación: -
  - Operador de Identidad: Intenta convertir su operando a un número. Si el operando ya es un número, no hace ningún cambio.
    ```
    let c = "3";
    console.log(+c); // 3 (como número)
    ```
  - Operador de Post-Incremento: a++ ⟶ Devuelve el valor original de a. Luego, incrementa el valor de a en 1.
  - Operador de Pre-Incremento:  ++a ⟶ Incrementa el valor de a en 1. Luego, devuelve el valor incrementado de a.
  - Operador de Post-Decremento: a-- ⟶ Devuelve el valor original de a. Luego, decrementa el valor de a en 1.
  - Operador de Pre-Decremento: --a ⟶ Decrementa el valor de a en 1. Luego, devuelve el valor decrementado de a.
  - Operador typeof.
  - Operador delete: Elimina una propiedad de un objeto. No se utiliza para variables o funciones declaradas.
  - Operador void: Evalúa una expresión sin devolver ningún valor.
  - Operador de negación bit a bit: ~

Pre-Post incremento: La diferencia radica en cuándo se devuelve el valor incrementado. 

## 4. Operadores de COMPARACIÓN
Mayor que, menor que, igualdad, desigualdad
```
console.log(3 > 0);   // true
console.log(3 < 0);   // false
console.log(3 > 3);   // false
console.log(3 < 3);   // false
console.log(3 >= 3);  // true
console.log(3 <= 3);  // true
console.log(5 == 5);  // true


console.log(3 > 0);
console.log(3 < 0);
console.log(3 > 3);
console.log(3 < 3);
console.log(3 >= 3);
console.log(3 <= 3);
console.log(5 == 5);
```

### TYPE COERCION (Coerción de tipos || conversión implícita/automática):
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Equality_comparisons_and_sameness#Loose_equality_using
Type coercion es la conversión automática o implícita de un tipo de dato a otro cuando se realizan operaciones o comparaciones entre valores de diferentes tipos. JavaScript es un lenguaje de tipado dinámico y débil, lo que significa que las variables pueden contener valores de cualquier tipo y que el tipo de una variable puede cambiar durante la ejecución del programa. Para permitir operaciones entre diferentes tipos de datos, JavaScript utiliza la coerción de tipos para convertir los valores a un tipo compatible antes de realizar la operación.

**Tipos de coerción de tipos:**
- Coerción implícita: Es la conversión automática de tipos que realiza JavaScript sin que el programador lo especifique explícitamente. Ocurre en situaciones como:
  - Operaciones aritméticas: Cuando se suman un número y una cadena, JavaScript convierte el número en una cadena antes de realizar la concatenación.
  - Comparaciones: Al comparar valores de diferentes tipos, JavaScript intenta convertirlos a un tipo común antes de realizar la comparación.
  - Conversiones booleanas: En contextos booleanos, como las condiciones de if, JavaScript convierte los valores a booleanos para determinar su veracidad.
- Coerción explícita: Es la conversión de tipos que realiza el programador de forma explícita utilizando funciones como Number(), String() o Boolean().


```
console.log(5 == "5");    // true // ⚠ Loose equality. Igualdad débil. (Por type coertion, "5" string se convierte a 5 numero)
console.log(5 === "5");   // false // ⚠ Strict equality. Igualdad fuerte.
console.log(5 != 5);      // false
console.log(5 != "5");    // false. (Por type coercion, "5" string se convierte a 5 numero)
console.log(5 !== 5);     // false
console.log(5 !== "5");   // true
console.log(0 == false);  // true. (Por type coercion, false se castea a 0)
console.log(0 === false); // false. (number != boolean)

console.log(5 == "5");
console.log(5 === "5");
console.log(5 != 5);
console.log(5 != "5");
console.log(5 !== 5);
console.log(5 !== "5");
console.log(0 == false);
console.log(0 === false);

// Type coertion o casteo de tipos también se aplica a otros operadores
console.log(true + false); // 1. (1 + 0)
console.log(true - false); // 1. (1 - 0)
console.log("num" + 3); // "num3". 3 (numero) se castea a "3" (string) y se concatena.
console.log(3 + "num"); // "3num". 3 (numero) se castea a "3" (string) y se concatena.
// ¿Y esto que daría?
console.log("num" - 3); // NaN. Porque convierte "num" (string) a NaN (número) y NaN - 3 = NaN.
// ¿Pero y esto otro?
console.log("" - 3); // -3. Porque convierte "" (string vacio) a 0 (número) y 0 - 3 = -3.


console.log(true + false);
console.log(true - false);
console.log("num" + 3);
console.log(3 + "num");
console.log("num" - 3);
console.log("" - 3);
```

## 5. Operadores LÓGICOS
**&& AND**
```
console.log(true && true);    // true
console.log(true && false);   // false
console.log(false && true);   // false
console.log(false && false);  // false
```
**|| OR**
```
console.log(true || true);    // true
console.log(true || false);   // true
console.log(false || true);   // true
console.log(false || false);  // false
```
IMPORTANTE. De nuevo, JS puede tener operandos de distinta naturaleza. Los operadores && y ||, cuando se usan con operandos no booleanos pueden devolver un resultado no booleano, cualquiera: array, objeto ...
```
const a = 3 || 20; // 3.
```

Para saber que operando se devuelve, JS tiene que evaluarlos como booleanos ya que los operadores lógicos trabajan con operandos booleanos. En JavaScript, al convertir o evaluar cualquier valor como booleano, pueden suceder 2 cosas, que nos de true o que nos de false. A los valores que nos dan false se le conocen como "falsy values" y son sólamente estos:
```
0;
NaN;
false;
"";
null;
undefined;
// el resto de valores serán evaluados como "truthy values"
```

```
// MAS EJEMPLOS:
let a;
a = 3 || 20; // 3. El 3 es el primer valor "truthy" que se encuentra el OR.
a = 0 || 20; // 20. El 20 es el primer valor "truthy" que se encuentra el OR.
a = Boolean(0 || 20); // true
a = 3 && 20; // 20
a = 0 && 20; // 0
a = Boolean(0 && 20); // false
a = 2 > 0 && "hello"; // "hello"
a = 2 < 0 && "hello"; // false


let a;
a = 3 || 20;
a = 0 || 20;
a = Boolean(0 || 20);
a = 3 && 20;
a = 0 && 20;
a = Boolean(0 && 20);
a = 2 > 0 && "hello";
a = 2 < 0 && "hello";
```

## 6. Operadores BITWISE u operadores de bits
No los daremos pero sabed que existen y que son poco frecuentes. Suelen ser utilizados en  implementaciones de algoritmos más "a bajo nivel".
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Expressions_and_Operators#Bitwise




# DIRECTIVAS DE CONTROL

## 1. IF ... ELSE IF .... ELSE
```
// 1 sola rama
const count = 0;
if (count === 0) {
  console.log("zero");
}

// 2 ramas
if (count === 0) {
  console.log("zero");
} else {
  console.log("non-zero");
}

// n ramas
if (count === 0) {
  console.log("zero");
} else if (count === 1) {
  console.log("one");
} else {
  console.log("more than one");
}

// ¿1 sola línea en el cuerpo de las ramas? Se pueden eliminar los paréntesis
if (count === 0) console.log("zero");
else if (count === 1) console.log("one");
else console.log("more than one");
```

## 2. SWITCH
```
const pet = "dog";
switch (pet) {
  case "cat":
    console.log("medium pet");
    break;
  case "dog":
    console.log("large pet");
    break;
  case "bird":
    console.log("small pet");
    break;
  default:
    console.log("unknown size");
}

// switch con reuso de casos
const pet = "dog";
switch (pet) {
  case "cat":
  case "dog":
    console.log("mammal");
    break;
  case "bird":
  default:
    console.log("non-mammal");
}

```

## 3. Operador ternario
```
const age = 20;
const status = (age >= 18) ? "adult" : "minor";

// operador ternario sin paréntesis, no necesario
const status = age >= 18 ? "adult" : "minor";

// anidamiento de ternarios "ternary nesting"
const status = age >= 18 ? "adult" : (age >= 14 ? "teen" : "kid");
```

## 4. Bucle "for".
⚠ Importante el uso de `let` aquí
```
const limit = 10;
for (let i = 0; i < limit; i++) {
  console.log(i);
}

// múltiples asignaciones en bucle "for"
for (let i = 0, limit = 10; i < limit; i++) {
  console.log(i);
}
```

## 5. Bucle "while"
```
const limit = 10;
let i = 0;
while (i < limit) {
  console.log(i);
  i++;
}
```

## 6. Bucle "do while"
```
const limit = 10;
let i = 0;
do {
  console.log(i);
  i++;
} while (i < limit);
```

## ⚠ for..in que será vista con los objetos
## ⚠ forEach() se verá con los arrays
## ⚠ for..of se verá con los arrays

## Operador coma en expresiones
```
const a = (2 + 4, 9);
console.log(a); // 9
const b = 3;
const c = (b += 5, 10);
console.log(c); // 10
console.log(b); // 8;
```
El operador coma se utiliza frecuentemente en bucles for para inicializar o actualizar múltiples variables en una sola línea.
```
for (let i = 0, j = 10; i < 5; i++, j--) {
  console.log(i, j);
}
```

### 7. TRY
Consiste en un bloque que se ejecuta de manera normal, y captura cualquier excepción que se pueda producir en ese bloque de sentencias. Se utiliza para manejar excepciones. Permite ejecutar código que pueda producir errores y definir cómo manejar esos errores si ocurren.
```
try {
  // Código que podría lanzar una excepción
  let result = someFunctionThatMightThrow();
  console.log('Result:', result);
} catch (error) {
  // Código que se ejecuta si ocurre una excepción
  console.error('An error occurred:', error.message);
} finally {
  // Código que se ejecuta siempre
  console.log('This will always execute.');
}

function someFunctionThatMightThrow() {
  // Simulamos una condición que puede o no lanzar un error
  let randomValue = Math.random();
  if (randomValue < 0.5) {
    throw new Error('This is an intentional error.');
  }
  return 'Success!';
}
```

### 8. FOR .... IN (objetos)
```
const person = {
  name: 'Alice',
  age: 30,
  job: 'Developer'
};

for (let key in person) {
  console.log(`${key}: ${person[key]}`);
}
```

### 9. FOR ... OF (listas)
**Ejemplo Básico con Arrays:**
```
const array = ['apple', 'banana', 'cherry'];

for (const fruit of array) {
  console.log(fruit);
}
```

**Iteracion sobre un array de objetos:**
```
const users = [
  { name: 'Alice', age: 30 },
  { name: 'Bob', age: 25 },
  { name: 'Charlie', age: 35 }
];

for (const user of users) {
  console.log(`Name: ${user.name}, Age: ${user.age}`);
}
```


### 10. forEach
```
const fruits = ['apple', 'banana', 'cherry'];

fruits.forEach(function(fruit) {
  console.log(fruit);
});
```

**Ejemplo con Índice:** Podemos usar el segundo argumento de la función callback para acceder al índice de cada elemento:
```
const fruits = ['apple', 'banana', 'cherry'];

fruits.forEach(function(fruit, index) {
  console.log(`${index}: ${fruit}`);
});
```


**Ejemplo con Array de Objetos:**
```
const users = [
  { name: 'Alice', age: 30 },
  { name: 'Bob', age: 25 },
  { name: 'Charlie', age: 35 }
];

users.forEach(function(user) {
  console.log(`Name: ${user.name}, Age: ${user.age}`);
});
```
