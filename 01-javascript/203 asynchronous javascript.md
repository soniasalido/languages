# Ejemplo de consultar una API para obtener datos de un servidor:
- **De manera síncrona:** En una llamada síncrona, tu aplicación enviaría la solicitud al servidor y esperaría a que el servidor responda antes de continuar. Durante esta espera, tu aplicación no puede hacer nada más (bloqueada).
- **De manera asíncrona:** En una llamada asíncrona, tu aplicación envía la solicitud al servidor y continúa ejecutando otras tareas mientras espera la respuesta. Cuando el servidor responde, la respuesta es manejada por una función específica (callback) o se resuelve una promesa, permitiendo a tu aplicación procesar los datos recibidos sin haber estado bloqueada en ningún momento.


# ASYNCHRONOUS JAVASCRIPT

Para dominar JavaScript es imprescindible tener unas buenas nociones de asincronía y conocer el "Event Loop" que implementa el lenguaje como solución para gestionar eventos y llamadas asíncronas. Recomendamos encarecidamente la lectura de la siguiente guía para profundizar en estos conceptos: https://lemoncode.net/lemoncode-blog/2018/1/29/javascript-asincrono

## Llamada asíncrona:
- **Ejecuta una tarea fuera del contexto principal de la aplicación:** Esto significa que la tarea no se ejecuta en el flujo principal de nuestro programa. En lugar de eso, se delega a otro contexto (como otro hilo o un proceso separado) que se encarga de ejecutarla.
- **No consume recursos de CPU de la aplicación principal:** Dado que la tarea se ejecuta en otro contexto, nuestra aplicación principal puede continuar su ejecución sin tener que esperar a que esta tarea termine. Esto es especialmente útil para operaciones que no requieren procesamiento intensivo de la CPU pero que podrían tardar en completarse, como esperar una respuesta de un servidor o leer un archivo grande desde el disco.
- **Comportamiento de las Llamadas Asíncronas:** Respuesta notificada a nuestro programa:
  - No bloquea el programa: La llamada asíncrona permite que el programa continúe ejecutándose mientras la operación de I/O se completa. El flujo principal no se detiene esperando la respuesta.
  - Notificación de la respuesta: Una vez que la operación asíncrona termina, se notifica al programa principal (a través de callbacks, promesas, eventos, etc.). En este punto, el programa puede procesar la respuesta de la operación sin haber estado bloqueado durante la espera.


| ❗ Nuestro programa lanza la llamada asíncrona, continúa su ejecución y en algún momento será notificado con la respuesta a dicha llamada. |
| -----|

## Patrones más comunes para el manejo de código asíncrono en Javascript
- Callbacks.
- Promesas (azúcar sintáctico alrededor de callbacks).
- Async/await (azúcar sintáctico alrededor de promesas).


## 1. CALLBACKS
El patrón mas sencillo para manejar llamadas asíncronas son los CALLBACKS, es decir, **una función que se pasa como argumento de otra (ciudadanos de primer orden)**.

**La finalidad del callback es registrar el código que debe ser ejecutado una vez tengamos la respuesta de dicha llamada asíncrona.** La función de respuesta (el callback) se ejecutará cuando la respuesta a la llamada asíncrona esté disponible.

Ejemplo: setTimeout es una de las llamadas asíncronas más sencillas que hay: postpone la ejecución de un callback, como mínimo, a X segundos después.
```
const callback = () => console.log("Hello World! con retardo");
setTimeout(callback, 1000);
console.log("Granada"); // Granada espera 1000 ms. No detiene a Hello World.
```

Al ser asíncrona, nuestra aplicación sigue corriendo:
```
const callback = () => console.log("Hello World! con retardo");
setTimeout(callback, 1000);

console.log("No estoy bloqueada, puedo ejecutar código");
```


Resultado por consola:
```
> No estoy bloqueada, puedo ejecutar código
> Hello World! con retardo
```


Podríamos hacer un mock a una llamada a servidor, sirviéndonos del patrón de callback y usando la operación asíncrona 'setTimeout', del siguiente modo:
```
const getDataAsync = callback => {
  setTimeout(
    () => callback(43 /* Dato random */), // callback del setTimeout
    2343 // Tiempo random entre 1s y 3s.
  );
};
```

**Un "mock" es una versión simulada de una función o componente que se utiliza para pruebas.** Permite probar el comportamiento del código sin tener que depender de recursos externos, como un servidor real.

Una posible mejora para poder randomizar el tiempo del timer y el dato devuelto sería la siguiente:
```
const randomData = () => Math.ceil(Math.random() * 100); // random [1-100] número
const randomDelay = () => Math.random() * 2000 + 1000; // random [1000, 3000) ms

const getDataAsync = callback => {
  setTimeout(() => callback(randomData()), randomDelay());
};

getDataAsync(console.log); // Ejemplo de uso.
```


## 2. PROMESAS
**Una promesa es un objeto que representa el resultado de una operación asíncrona.** Este resultado podría estar disponible ahora o en el futuro. Una promesa puede tener los siguientes estados:
- A la espera de respuesta -> PENDING
- Finalizada -> SETTLED. En este caso, puede terminar con 2 estados:
   - Operación completada con éxito -> FULFILLED or RESOLVED
   - Operación rechazada con fallo o error -> REJECTED

Las promesas se basan en callbacks pero son una evolución de éstos, una mejora, que añade azúcar sintáctico para un mejor manejo.

EJEMPLO: *Analogía de la pizza y el beeper*


### 2.1 CONSUMIENDO PROMESAS
Cuando llamamos a una función asíncrona implementada con Promesas, nos devolverá inmediatamente un objeto promesa como garantía de que la operación asíncrona se ha puesto en marcha y finalizará en algún momento, ya sea con éxito o con fallo. Una vez que tengamos el objeto promesa en nuestro poder, lo usamos para registrar 2 callbacks:
- Uno para indicar 'qué se debe hacer en caso de que todo vaya bien' (resolución de la promesa o resolve).
- Otro para indicar 'qué hacer en caso de fallo' (rechazo de la promesa o reject).

Usamos una función llamada FETCH. **API FETCH** es un sencillo API que permite lanzar peticiones a un servidor. Api Fetch devuelve una promesa. Este objeto es un símbolo o una garantía de que hay una operación asíncrona en marcha y que en algún momento recibiremos una respuesa.

La utilidad real del objeto Promise es usarlo para registrar los callbaks que queremos que se ejecuten cuando la promesa sea, o bien resuelta con éxito o bien, rechazada.

**Para registrar dichos callbacks, el objeto Promise proporciona dos métodos:**
- .then() ➝ Callback respuesta de resolve. Qué hacemos en caso de éxito.
- .catch() ➝ Callback respuesta de fallo. Qué hacemos en caso de rechazo/error.


```
fetch("https://api.github.com/users/lemoncode")
  .then(response => console.log(response))
  .catch(error => console.error(error));
```

response => console.log(response) ⟵ Es una callback que captura la respuesta como argumento.


### 2.2 Encadenando promesas
Sucede cuando nuestro callback de resolución vuelve a lanzar una nueva promesa. El resolveCallback de una promesa, podría devolver otra promesa, en cuyo caso pueden encadenarse. Solo será necesario especificar un rejectCallback (un único catch()) para cualquiera de las promesas encadenadas.

```
fetch("https://api.github.com/users/lemoncode")
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));
```

Parseamos el Json --> Recibe un string y devuelve un objeto.
```
.then(response => response.json())
```

Data es el callback de resolve cuando se ejecuta el response.json(). Muestra el resultado de la promesa `response.json()`. Nuevo callback. Se resuelve cuando se resuelva el primer then:
```
then(data => console.log(data)) 
```

#### El método .json():**
**Es un método del objeto de respuesta (Response). Su propósito es leer el cuerpo de la respuesta y convertirlo en un objeto JavaScript.**

**Paso 1: Leer el Flujo de Respuesta:**
El cuerpo de la respuesta HTTP se recibe como un flujo (stream). Un flujo es una secuencia de datos que llega de manera continua, lo cual es útil para manejar grandes cantidades de datos de forma eficiente.

**Paso 2: Completar la Lectura**
El método .json() lee este flujo hasta que todos los datos se han recibido. Es decir, espera a que toda la respuesta esté disponible antes de procesarla.

**Paso 3: Devolver una Promesa**
El método .json() devuelve una promesa. Una promesa es un objeto que representa la eventual finalización (o falla) de una operación asíncrona. Esta promesa se resuelve una vez que el flujo de la respuesta se ha leído completamente y se ha analizado.

**Paso 4: Analizar el Texto del Cuerpo como JSON**
Una vez que la promesa se resuelve, el método .json() toma el texto del cuerpo de la respuesta y lo analiza como JSON (JavaScript Object Notation). JSON es un formato de texto ligero y fácil de leer/escribir que se utiliza para intercambiar datos.

**Paso 5: Convertir JSON a un Objeto JavaScript**
El resultado de este análisis no es una cadena JSON, sino un objeto o array de JavaScript. En otras palabras, .json() convierte la cadena JSON en una estructura de datos de JavaScript que se puede manipular directamente.

```
fetch('https://api.example.com/data')
  .then(response => response.json()) // Aquí se llama al método .json()
  .then(data => {
    console.log(data); // Aquí data es un objeto JavaScript
  })
  .catch(error => {
    console.error('Error:', error);
  });
```

**Realizar una Solicitud con fetch.** Esto hace una solicitud HTTP a la URL especificada y devuelve una promesa que se resuelve con un objeto de respuesta (Response).:
```
fetch('https://api.example.com/data')
```

**Usar .json() para Leer y Analizar la Respuesta.** Este código llama al método .json() en el objeto de respuesta. Este método lee el flujo de la respuesta hasta completarlo y analiza el texto del cuerpo como JSON. Devuelve una promesa que se resuelve con el objeto JavaScript resultante.:
```
.then(response => response.json())
```

**Trabajar con el Objeto JavaScript.** Una vez que la promesa devuelta por .json() se resuelve, podemos trabajar con los datos convertidos a un objeto JavaScript. En este caso, simplemente los mostramos en la consola.:
```
.then(data => {
  console.log(data);
})
```

**Manejo de Errores:**
```
.catch(error => {
  console.error('Error:', error);
});
```


### 2.3 CREANDO PROMESAS

**Una promesa se crea instanciando un nuevo Objeto Promise.** En el momento de la creación, en el constructor, debemos especificar un callback que contenga la carga de la promesa, aquello que la promesa debe hacer.
```
new Promise () => {
  // Carga de la promesa
  // Llamadas asíncronas
}
```

**Este callback nos provee de dos argumentos: resolveCallback y rejectCallback.** Son los dos mismos callbacks que se registrarán al consumir la promesa. De este modo, depende de nosotros como desarrolladores llamar a resolveCallback y rejectCallback cuando sea necesario para señalizar que la promesa ha sido completada con éxito o con fallo.
```
new Promise (( resolve, reject )) => {
  // Llamadas asíncronas
}
```

Modifiquemos el ejemplo anterior en el que haciamos un mock de llamada a servidor para adaptarlo al patrón de promesas (promise flavor):
```
const getDataWithPromise = () => {
  return new Promise((resolve, _reject) => {
      try {
          // Tarea Asíncrona
          getDataAsync(resolve);
      }catch(error) {
          reject(error);
      }      
  });
};

// Consumimos la promesa:
getDataWithPromise()
  .then(data => console.log(data))  // resolveCallback
  .catch(error => console.log(`Error capturado: ${error}`));  // rejectCallback
```

⚠ OPCIONALMENTE podríamos manejar de forma explícita la ejecución dentro de la promesa con un try catch, aunque NO ES NECESARIO obligatoriamente:
- Si no ponemos el try..catch, la promesa nos envolverá la ejecución con uno por defecto y lo redirigirá por el 'reject' callback si se diese un error.
- Si lo ponemos explícitamente, podremos nosotros mismos manejar y adornar dicho error antes de pasarlo por el reject.
```
const getDataWithPromise = () => {
  return new Promise((resolve, reject) => {
    try {
      // throw new Error("Servidor no pudo procesar la petición"); // Probar el catch()
      getDataAsync(resolve);
    } catch (error) {
      reject(error);
    }
  });
};
```

Su utilización sería:
```
getDataWithPromise()
  .then(data => console.log(data))
  .catch(error => console.log(`ERROR CAPTURADO: ${error}`));
```

### 2.4 MANEJANDO MÚLTIPLES PROMESAS 
A veces se necesita lanzar varias promesas asíncronas y poder manejar todos los resultados.

Modifiquemos la función anterior ligeramente para, antes de resolver la promesa, loguear el dato por la consola.
```
const getDataWithPromise = (autolog = true) =>
  new Promise((resolve, _reject) => {
    getDataAsync(data => {
      if (autolog) console.log(data);
      resolve(data);
    });
  });
```

**1. Promise Race:**
Este método recibe un array de promesas y devuelve una nueva promesa que se resuelve o se rechaza tan pronto como una de las promesas del array se resuelva o se rechace, con el valor o razón de esa promesa.

Devuelve una nueva promesa que se resuelve con el resultado o rechazo de la primera promesa que termine. Promise race tiene un array con todas las promesas que queramos. Promise race devuelve una promesa. Luego tendremos un resolveCallback. En este callback recibe el ganador, el dato ganador, el que terminó primero. Las demás promesas también se irán completando. Pero el promise race se quedó con la primera promesa que termina. Si alguna falla, entonces se invoca al rejectCallback de la PromiseRace.
```
Promise.race([
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
]).then(winner => console.log("And the winner is ...", winner));
```

**Promise All:** devuelve una nueva promesa que se resuelve con el array de resultados de todas las promesas de entrada. Por tanto se resolverá cuando todas las promesas se completen. Si alguna promesa es rechazada, entonces Promise.all también se rechaza. Por tanto espera a que todas se cumplan o al primer rechazo. El array de resultados preserva el mismo orden que el array de promesas de entrada.
```
Promise.all([
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
  getDataWithPromise(),
]).then(result => console.log("And the result is ...", result));
```

### 2.5 Ejemplo de Promise
Función que le pasamos como parámetro un usuario y devuelve una promesa.
```
const getGithubUser = ( user ) => {
  return new Promise (( resolve, reject )) => {
    fetch(`https://api.github.com/users/${user}`)
      .then(response => response.json())
      .then(data => resolve(data))
      .catch(error => reject(error));
  });
}

// Consumimos nuestra promesa:
getGithubUser("lemoncode".then(console.log));
```

Es el callback re resolución que parsea a json. Devuelve una promesa:
```
.then(response => response.json())
```

Llamamos al callback resolve y le pasamos como argumento data (la respusta).
```
.then(data => resolve(data))
```

Callback de fallo. Llamamos al callback reject y le pasamos el error que se ha obtenido:
```
.catch(error => reject(error));
```


## 3. ASYNC / AWAIT 
async y await son palabras clave en JavaScript introducidas en ECMAScript 2017 (ES8) que permiten manejar promesas de manera más simple y estructurada.

**async: Convierte una función en una función asíncrona. Esto significa que dicha función siempre devolverá una promesa.**

**await: Hace que la función asíncrona espere la resolución de una promesa antes de continuar con la ejecución.** Sólo puede ser usado dentro de funciones marcadas con async.

### 3.1 Función async
Una función marcada con async siempre devuelve una promesa. Si la función devuelve un valor, ese valor es automáticamente envuelto en una promesa resuelta. Si la función arroja un error, ese error es envuelto en una promesa rechazada.

```
async function ejemploAsync() {
  return 'Hola, mundo!';
}

ejemploAsync().then((mensaje) => {
  console.log(mensaje); // Salida: 'Hola, mundo!'
});
```

### 3.2 Uso de await
await sólo puede ser usado dentro de funciones async. Hace que el código espere a que una promesa se resuelva o se rechace antes de continuar con la ejecución.
```
async function ejemploAwait() {
  let promesa = new Promise((resolve, reject) => {
    setTimeout(() => resolve("¡Hecho!"), 1000);
  });

  let resultado = await promesa; // Espera a que la promesa se resuelva
  console.log(resultado); // Salida: '¡Hecho!'
}

ejemploAwait();
```

### 3.3 Otro ejemplo de uso de async/await:
Async / Await son 2 palabras clave que surgieron para simpificar el manejo de las promesas. Son azúcar sinctáctico para reducir el anidamiento y manejar código asíncrono como si de código síncrono se tratara.
```
const getDataWithSugar = async () => {
  const data = await getDataWithPromise(false);
  return data;
};

// Data es el resultado de esperar a la promesa getDataWithPromise. Cuando la promesa termina, continúa ejecutando.
// Pero el console.log NO se pausa la ejecución. Lo que está debajo continúa su ejecución.
console.log("Mensaje que no se pausa.");

getDataWithSugar()
  .then(data => console.log(data))
  .catch(error => console.log(`ERROR CAPTURADO: ${error}`));
```

Await: Espera a que esto termine, función síncrona y el resultado lo mete en Data:
```
const data = await getDataWithPromise(false);
```

### 3.4 Manejo de Errores try...catch
Podemos usar try...catch para manejar errores en funciones asíncronas, de manera similar a cómo lo harías en el manejo de promesas con .catch().
```
async function ejemploError() {
  try {
    let promesa = new Promise((resolve, reject) => {
      setTimeout(() => reject(new Error("Algo salió mal")), 1000);
    });

    let resultado = await promesa;
    console.log(resultado);
  } catch (error) {
    console.log(error.message); // Salida: 'Algo salió mal'
  }
}

ejemploError();
```

### 3.5 Manejo de Errores throw new error
```
const getDataWithSugar = async () => {
  try {
    const data = await getDataWithPromise();
    return data;
  } catch (e) {
    throw new Error(`ERROR LANZADO: ${e}`);
  }
};
```

### 3.6 Manejo de Múltiples Promesas con Async / Await

**OPCION 1. Las promesas se lanzan y se esperan secuencialmente OJO!**
```
const getManyDataWithSugar = async () => {
  const data1 = await getDataWithPromise();
  const data2 = await getDataWithPromise();
  const data3 = await getDataWithPromise();
  const data4 = await getDataWithPromise();
  const data5 = await getDataWithPromise();
  return [data1, data2, data3, data4, data5];
};
getManyDataWithSugar().then(console.log);
```

**OPCIÓN 2. Lanzamos todas las promesas primero, y hacemos la espera de todas a la vez, al estilo de Promise.all().**
```
const getManyDataWithSugar = async () => {
  const promise1 = getDataWithPromise();
  const promise2 = getDataWithPromise();
  const promise3 = getDataWithPromise();
  const promise4 = getDataWithPromise();
  const promise5 = getDataWithPromise();
  const data1 = await promise1;
  const data2 = await promise2;
  const data3 = await promise3;
  const data4 = await promise4;
  const data5 = await promise5;
  return [data1, data2, data3, data4, data5];
};
getManyDataWithSugar().then(console.log);
```

**OPCIÓN 3. Posible implementación de Promise.race usando async await**
```
const myCustomPromiseRace = promises =>
  new Promise((resolve, reject) => {
    promises?.forEach(async promise => {
      resolve(await promise);
    });
  });
```


### Consultar el estado de una promesa
```
function getState(promise) {

  return new Promise((resolve) => {
    promise.then (
      () => resolve('fulfilled'),
      () => resolve('rejected')
    );
    
    setTimeout(() => resolve('pending'), 0);
  });
}
```
Se encadenan .then() y .catch() a la promesa original para detectar si se resuelve correctamente (fulfilled) o se rechaza (rejected).

Para detectar el estado pendiente: Se utiliza setTimeout con un retraso de 0 milisegundos. Esto coloca la verificación de "pending" al final de la cola de tareas de JavaScript.
