ECMAScript es el estándar en el que se basa JavaScript. A lo largo de los años, se han lanzado varias versiones de ECMAScript, cada una agregando nuevas características y mejoras. Aquí tienes un resumen de las principales versiones de ECMAScript:

## ECMAScript 1 (ES1) - 1997
- La primera versión oficial del estándar ECMAScript.

## ECMAScript 2 (ES2) - 1998
- Corrección de errores y alineación con el estándar internacional ISO/IEC 16262.

## ECMAScript 3 (ES3) - 1999
- Introdujo características como expresiones regulares, mejor manejo de cadenas, declaraciones try/catch para manejo de excepciones y más.

## ECMAScript 4 (ES4)
- Esta versión nunca fue oficialmente lanzada debido a diferencias en la comunidad de desarrollo sobre la dirección que debería tomar el lenguaje.

## ECMAScript 5 (ES5) - 2009
- Introdujo características como el modo estricto ("use strict";), métodos de array adicionales (como forEach, map, filter), JSON.parse y JSON.stringify, propiedades de acceso (getters y setters), entre otras mejoras.

## ECMAScript 5.1 (ES5.1) - 2011
- Revisión menor de ES5, alineada con el estándar internacional ISO/IEC 16262:2011.

## ECMAScript 6 (ES6) / ECMAScript 2015 (ES2015)
- Una de las versiones más significativas, que introdujo características como:
  - Declaraciones let y const
  - Funciones flecha (=>)
  - Clases y módulos (class, import, export)
  - Plantillas de cadena de texto (template literals)
  - Parámetros por defecto y rest/spread operators (...)
  - Promesas (Promises)
  - Iteradores y generadores
  - Símbolos (Symbols)
  - Mapas y conjuntos (Maps, Sets)

## ECMAScript 2016 (ES7)
- Introdujo el operador de exponenciación (**)
- Método Array.prototype.includes

## ECMAScript 2017 (ES8)
- Introdujo async/await para manejar promesas de manera más sencilla.
- Métodos Object.values y Object.entries
- Métodos String.prototype.padStart y String.prototype.padEnd

## ECMAScript 2018 (ES9)
- Rest/spread properties para objetos
- Método Promise.prototype.finally
- Mejoras en expresiones regulares (RegExp)

## ECMAScript 2019 (ES10)
- Introdujo el método Array.prototype.flat y Array.prototype.flatMap
- Object.fromEntries
- String.prototype.trimStart y String.prototype.trimEnd
- Mejoras en la sintaxis de try/catch

## ECMAScript 2020 (ES11)
- BigInt para representación de números enteros grandes
- Operador de encadenamiento opcional (?.)
- Operador de coalescencia nula (??)
- Métodos Promise.allSettled
- Importaciones dinámicas (import())

## ECMAScript 2021 (ES12)
- Métodos String.prototype.replaceAll
- Separadores numéricos (1_000_000 para un millón)
- Promise.any
- WeakRefs y finalizadores (FinalizationRegistry)

## ECMAScript 2022 (ES13)
- Clases privadas y métodos estáticos privados (#field, #method)
- Asignación lógica (||=, &&=, ??=)
- Operador de top-level await
- Object.hasOwn
- Estas versiones reflejan la evolución continua de ECMAScript para adaptarse a las necesidades modernas de desarrollo web y mejorar la usabilidad, eficiencia y seguridad del lenguaje.


## Estrategias de programación:
Generalmente, el programador suele tomar una de las siguientes estrategias «crossbrowser» para asegurarse que el código funcionará en todos los navegadores:
- Enfoque Conservador --	ECMAScript 5:	Incómodo de escribir. Anticuado. Compatible con navegadores nativamente.
- Enfoque Delegador --	Depende:	Cómodo. Rápido. Genera dependencia al framework/librería.
- Enfoque Evergreen --	ECMAScript 2024+:	Cómodo. Moderno. No garantiza la compatibilidad en navegadores antiguos.
- Enfoque Transpilador -- ECMAScript 2024+:	Cómodo. Moderno. Preparado para el futuro. Requiere preprocesado.

### Enfoque transpilador
El programador decide crear código de la última versión de ECMAScript. Para asegurarse de que funcione en todos los navegadores, utiliza un transpilador, que no es más que un sistema que revisa el código y lo traduce de la versión actual de ECMAScript a ECMAScript 5, que es la que leerá el navegador.

La ventaja de este método es que se puede escribir código Javascript moderno y actualizado (con sus ventajas y novedades) y cuando los navegadores soporten completamente esa versión de ECMAScript, sólo tendremos que retirar el transpilador (porque no lo necesitaremos). La desventaja es que hay que preprocesar el código (cada vez que cambie) para hacer la traducción.

Quizás, el enfoque más moderno de los mencionados es utilizar transpiladores. Sistemas como Babel son muy utilizados y se encargan de traducir de ECMAScript 6 a ECMAScript 5.
