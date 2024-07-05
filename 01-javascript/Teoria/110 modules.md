# MODULES 

La separación de código en distintos ficheros es una buena práctica y ayuda a que tu código sea más reusable y mantenible.

Los módulos nos permiten estructurar nuestra aplicación y encapsular partes que no queremos que estén expuestas directamente. Por lo general cada fichero constituye un módulo aunque un módulo puede estar también compuesto por varios ficheros.

Las acciones que podemos hacer sobre un módulo son:
- Importar todas las funcionalidades del módulo
- Importar algunas funcionalidades del módulo
- Requerir todas las funcionalidades de otros módulos
- Requerir

Un módulo puede ser un namespace (objeto plano) que exporte funciones y/o constantes, pero además es bastante común que un módulo sea una función en lugar de un objeto plano.

⚠ Importante: mostrar lo siguiente
- exportar función por defecto en vez de objeto para mostrar el "default" en CommonJS y forkESModules
- exportar función kebap-case (text) => text.replace(/[\s_]+/, '-').toLowerCase();
- mostrar cómo importar todo en ESModules (import * as module)


**Demo ESModules:**
https://codesandbox.io/s/81rv4n310l

**Demo CommonJS:**
https://codesandbox.io/s/2x766oxy3n

**Demo ES5:**
https://codesandbox.io/s/48qk1px1wx

**Demo AMD (obsoleto a día de hoy):**
http://next.plnkr.co/edit/IYYj6f7hXUACTAW7Df1R?preview

# Programas Modulares
Un programa modular es aquel que está compuesto por módulos. Cada módulo es un fichero que contiene una parte del programa. Los módulos se pueden importar y exportar entre sí.

Un módulo es una parte de un programa que especifica en qué otras piezas se basa y qué funcionalidad proporciona para que otros módulos la utilicen (su interfaz).

Las interfaces de los módulos tienen mucho en común con las interfaces de objetos. Permiten que una parte del módulo esté disponible para el mundo exterior y mantienen el resto privado."
- Interfaces de Objetos: En la programación orientada a objetos (OOP), una interfaz es un conjunto de métodos y propiedades que un objeto expone al mundo exterior. La idea principal es que el objeto oculta su implementación interna (atributos y métodos privados) y sólo expone lo que es necesario para interactuar con él. Esto se conoce como encapsulamiento.
- Interfaces de Módulos: Los módulos en muchos lenguajes de programación funcionan de manera similar a los objetos. Un módulo puede contener variables, funciones y clases, y puede decidir qué partes de su contenido se exponen al mundo exterior y cuáles se mantienen privadas.

Archivo: modulo.js -->
```js
const variablePrivada = "No disponible fuera del módulo";

export const variablePublica = "Disponible fuera del módulo";

export function funcionPublica() {
return "Esta función es pública";
}

function funcionPrivada() {
return "Esta función es privada";
}
```

En este ejemplo:
- variablePrivada y funcionPrivada son privadas al módulo y no están disponibles fuera de él.
- variablePublica y funcionPublica son exportadas y, por lo tanto, están disponibles para otros módulos que importen este módulo.

Uso del Módulo -->
```js
// archivo: usoModulo.js
import { variablePublica, funcionPublica } from './modulo.js';

console.log(variablePublica); // "Disponible fuera del módulo"
console.log(funcionPublica()); // "Esta función es pública"
```

Encapsulamiento:: Los módulos también encapsulan variables, funciones y clases, exponiendo solo lo que es necesario a través de exportaciones, mientras mantienen otros elementos privados.

Interacción Controlada: Módulos: La interacción con un módulo se realiza a través de sus exportaciones públicas.

Privacidad: Módulos: Utilizan el alcance del módulo para ocultar variables y funciones internas que no son exportadas.

