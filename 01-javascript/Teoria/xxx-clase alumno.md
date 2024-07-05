# Clase Alumno 
Implementar una clase Alumno en JavaScript basada en el objeto inicial que has proporcionado en el archivo alumno.js. Esta clase permitirá crear instancias de Alumno con métodos para acceder y modificar sus propiedades.

```
class Alumno {
  constructor(
    codigoAlumno,
    nifAlumno,
    nombreAlumno,
    apellidosAlumno,
    fechaNacimiento,
    direccion,
    ciudad,
    provincia,
    codigoPostal,
    telefono,
    email,
    autorizacionFotos,
    codigoIban,
    dniTutor,
    nombreTutor,
    apellidosTutor,
    telefonoTutor,
    correoTutor,
    menorEdad,
    especialidades,
    sede,
    notas,
    pagoMatricula
  ) {
    this.codigoAlumno = codigoAlumno;
    this.nifAlumno = nifAlumno;
    this.nombreAlumno = nombreAlumno;
    this.apellidosAlumno = apellidosAlumno;
    this.fechaNacimiento = fechaNacimiento;
    this.direccion = direccion;
    this.ciudad = ciudad;
    this.provincia = provincia;
    this.codigoPostal = codigoPostal;
    this.telefono = telefono;
    this.email = email;
    this.autorizacionFotos = autorizacionFotos;
    this.codigoIban = codigoIban;
    this.dniTutor = dniTutor;
    this.nombreTutor = nombreTutor;
    this.apellidosTutor = apellidosTutor;
    this.telefonoTutor = telefonoTutor;
    this.correoTutor = correoTutor;
    this.menorEdad = menorEdad;
    this.especialidades = especialidades;
    this.sede = sede;
    this.notas = notas;
    this.pagoMatricula = pagoMatricula;
  }

  // Método estático para crear una instancia desde un objeto JSON
  static fromJSON(json) {
    return new Alumno(
      json.codigoAlumno,
      json.nifAlumno,
      json.nombreAlumno,
      json.apellidosAlumno,
      json.fechaNacimiento,
      json.direccion,
      json.ciudad,
      json.provincia,
      json.codigoPostal,
      json.telefono,
      json.email,
      json.autorizacionFotos,
      json.codigoIban,
      json.dniTutor,
      json.nombreTutor,
      json.apellidosTutor,
      json.telefonoTutor,
      json.correoTutor,
      json.menorEdad,
      json.especialidades,
      json.sede,
      json.notas,
      json.pagoMatricula
    );
  }

  // Método para verificar si el alumno debe abonar la matrícula anual
  verificarPagoMatricula() {
    return this.especialidades.some(
      especialidad => especialidad.tipoMatricula && especialidad.tipoMatricula.includes('noExento')
    );
  }

  // Método para agregar una especialidad
  agregarEspecialidad(especialidad) {
    this.especialidades.push(especialidad);
    this.pagoMatricula = this.verificarPagoMatricula();
  }

  // Método para actualizar la información del alumno
  actualizarInfo(info) {
    Object.assign(this, info);
  }

  // Método para convertir la instancia a un objeto JSON
  toJSON() {
    return {
      codigoAlumno: this.codigoAlumno,
      nifAlumno: this.nifAlumno,
      nombreAlumno: this.nombreAlumno,
      apellidosAlumno: this.apellidosAlumno,
      fechaNacimiento: this.fechaNacimiento,
      direccion: this.direccion,
      ciudad: this.ciudad,
      provincia: this.provincia,
      codigoPostal: this.codigoPostal,
      telefono: this.telefono,
      email: this.email,
      autorizacionFotos: this.autorizacionFotos,
      codigoIban: this.codigoIban,
      dniTutor: this.dniTutor,
      nombreTutor: this.nombreTutor,
      apellidosTutor: this.apellidosTutor,
      telefonoTutor: this.telefonoTutor,
      correoTutor: this.correoTutor,
      menorEdad: this.menorEdad,
      especialidades: this.especialidades,
      sede: this.sede,
      notas: this.notas,
      pagoMatricula: this.pagoMatricula
    };
  }
}
```

## Ejemplo de uso de la clase Alumno
```
const alumnoData = {
  codigoAlumno: '',
  nifAlumno: '',
  nombreAlumno: '',
  apellidosAlumno: '',
  fechaNacimiento: '',
  direccion: '',
  ciudad: '',
  provincia: '',
  codigoPostal: '',
  telefono: null,
  email: '',
  autorizacionFotos: '',
  codigoIban: '',
  dniTutor: '',
  nombreTutor: '',
  apellidosTutor: '',
  telefonoTutor: null,
  correoTutor: '',
  menorEdad: null,
  especialidades: [
    {
      tipo: undefined,
      codigo: undefined,
      nombre: undefined,
      tipoCuota: undefined,
      nombreCuota: undefined,
      precio: undefined,
      tipoMatricula: undefined
    }
  ],
  sede: 'Nigüelas',
  notas: '',
  pagoMatricula: false
};

const alumno = Alumno.fromJSON(alumnoData);
console.log(alumno);

// Agregar una especialidad
const nuevaEspecialidad = {
  tipo: 'instrumento',
  codigo: 'IGuitarra',
  nombre: 'Guitarra',
  tipoCuota: 'instrumento1hora',
  nombreCuota: '1 Hora/Semana',
  precio: null,
  tipoMatricula: 'noExento'
};
alumno.agregarEspecialidad(nuevaEspecialidad);
console.log(alumno);

// Actualizar información del alumno
alumno.actualizarInfo({ nombreAlumno: 'Juan', apellidosAlumno: 'Pérez' });
console.log(alumno);

// Convertir la instancia de Alumno a JSON
const alumnoJSON = alumno.toJSON();
console.log(alumnoJSON);
```

## Resumen
- Clase Alumno: Representa la estructura del objeto alumno con métodos para manejar sus propiedades.
- Métodos:
  - fromJSON: Crea una instancia de Alumno a partir de un objeto JSON.
  - verificarPagoMatricula: Verifica si el alumno debe pagar matrícula.
  - agregarEspecialidad: Agrega una especialidad al alumno y actualiza el estado de pagoMatricula.
  - actualizarInfo: Actualiza la información del alumno.
  - toJSON: Convierte la instancia de Alumno a un objeto JSON.

Esta implementación permite trabajar de manera más estructurada y orientada a objetos con los datos del alumno en tu aplicación.


# Store Alumno
Utilizaremos el store writable de Svelte para gestionar el estado del Alumno. El store permitirá que la aplicación Svelte reaccione a los cambios en el estado del Alumno.
```
// alumnoStore.js
import { writable } from 'svelte/store';
import { Alumno } from './Alumno'; // Asumiendo que la clase Alumno está en Alumno.js

// Definir el objeto inicial del alumno basado en la clase Alumno
const initialAlumnoData = {
  codigoAlumno: '',
  nifAlumno: '',
  nombreAlumno: '',
  apellidosAlumno: '',
  fechaNacimiento: '',
  direccion: '',
  ciudad: '',
  provincia: '',
  codigoPostal: '',
  telefono: null,
  email: '',
  autorizacionFotos: '',
  codigoIban: '',
  dniTutor: '',
  nombreTutor: '',
  apellidosTutor: '',
  telefonoTutor: null,
  correoTutor: '',
  menorEdad: null,
  especialidades: [],
  sede: 'Nigüelas',
  notas: '',
  pagoMatricula: false
};

// Crear una instancia inicial de Alumno
const initialAlumno = Alumno.fromJSON(initialAlumnoData);

// Crear el store de Svelte
export const alumnoStore = writable(initialAlumno);
```

##  Uso del Store en Componentes Svelte
En tus componentes Svelte, puedes suscribirte al store y reaccionar a los cambios de estado.
```
<script>
  import { alumnoStore } from './alumnoStore';
  import { onMount } from 'svelte';

  let alumno;

  // Suscribirse al store de alumno
  const unsubscribe = alumnoStore.subscribe(value => {
    alumno = value;
  });

  // Limpiar la suscripción cuando el componente se desmonta
  onDestroy(() => {
    unsubscribe();
  });

  // Función para actualizar el nombre del alumno
  function actualizarNombre() {
    alumnoStore.update(current => {
      current.actualizarInfo({ nombreAlumno: 'Juan' });
      return current;
    });
  }
</script>

<div>
  <h1>Datos del Alumno</h1>
  <p>Nombre: {alumno.nombreAlumno}</p>
  <p>Apellidos: {alumno.apellidosAlumno}</p>

  <button on:click={actualizarNombre}>Actualizar Nombre</button>
</div>
```

## Guardar en la Base de Datos
Cuando necesites guardar los datos del alumno en la base de datos, puedes convertir la instancia de Alumno a JSON y enviarla al servidor.
```
import { alumnoStore } from './alumnoStore';

function guardarEnBD() {
  alumnoStore.subscribe(alumno => {
    const alumnoJSON = alumno.toJSON();
    // Lógica para guardar alumnoJSON en la base de datos
    saveToDatabase(alumnoJSON);
  })();
}

function saveToDatabase(data) {
  // Aquí va la lógica para guardar los datos en la base de datos.
  console.log('Guardando en la BD:', data);
}
```

## Resumen
- Definir la Clase: Utiliza una clase Alumno para encapsular la lógica de negocio.
- Crear el Store de Svelte: Usa writable para crear un store que gestione el estado del Alumno.
- Usar el Store en Componentes: Suscríbete al store en los componentes Svelte para mantener el estado sincronizado y reactivo.
- Guardar en la BD: Convierte la instancia de Alumno a JSON y guárdala en la base de datos cuando sea necesario.

Esta integración proporciona una forma eficiente de manejar el estado y la lógica de negocio en aplicaciones Svelte, aprovechando la reactividad y la simplicidad de los stores de Svelte junto con la estructura y encapsulación de las clases en JavaScript.


# Mejora del store alumno
Si defines el método para verificar si el alumno ha elegido una asignatura que conlleva el pago de una matrícula dentro de la clase Alumno, no necesitarás implementar esa lógica en el store. Esto permite que la lógica de negocio permanezca encapsulada dentro de la clase, manteniendo el store más limpio y enfocado únicamente en la gestión del estado.

Al mover la lógica de negocio, como la verificación de si el alumno debe pagar matrícula, a la clase Alumno, simplificas el store y mantienes una separación clara de responsabilidades. El store se encarga de la reactividad y la gestión del estado, mientras que la clase encapsula la lógica de negocio.

Esto no solo mejora la organización y el mantenimiento del código, sino que también permite aprovechar mejor las características de programación orientada a objetos, manteniendo el código más limpio y modular.

## Definir el Método en la Clase Alumno
Primero, actualizamos la clase Alumno para incluir el método verificarPagoMatricula.
```
class Alumno {
  constructor(
    codigoAlumno,
    nifAlumno,
    nombreAlumno,
    apellidosAlumno,
    fechaNacimiento,
    direccion,
    ciudad,
    provincia,
    codigoPostal,
    telefono,
    email,
    autorizacionFotos,
    codigoIban,
    dniTutor,
    nombreTutor,
    apellidosTutor,
    telefonoTutor,
    correoTutor,
    menorEdad,
    especialidades,
    sede,
    notas,
    pagoMatricula
  ) {
    this.codigoAlumno = codigoAlumno;
    this.nifAlumno = nifAlumno;
    this.nombreAlumno = nombreAlumno;
    this.apellidosAlumno = apellidosAlumno;
    this.fechaNacimiento = fechaNacimiento;
    this.direccion = direccion;
    this.ciudad = ciudad;
    this.provincia = provincia;
    this.codigoPostal = codigoPostal;
    this.telefono = telefono;
    this.email = email;
    this.autorizacionFotos = autorizacionFotos;
    this.codigoIban = codigoIban;
    this.dniTutor = dniTutor;
    this.nombreTutor = nombreTutor;
    this.apellidosTutor = apellidosTutor;
    this.telefonoTutor = telefonoTutor;
    this.correoTutor = correoTutor;
    this.menorEdad = menorEdad;
    this.especialidades = especialidades;
    this.sede = sede;
    this.notas = notas;
    this.pagoMatricula = this.verificarPagoMatricula();
  }

  // Método estático para crear una instancia desde un objeto JSON
  static fromJSON(json) {
    return new Alumno(
      json.codigoAlumno,
      json.nifAlumno,
      json.nombreAlumno,
      json.apellidosAlumno,
      json.fechaNacimiento,
      json.direccion,
      json.ciudad,
      json.provincia,
      json.codigoPostal,
      json.telefono,
      json.email,
      json.autorizacionFotos,
      json.codigoIban,
      json.dniTutor,
      json.nombreTutor,
      json.apellidosTutor,
      json.telefonoTutor,
      json.correoTutor,
      json.menorEdad,
      json.especialidades,
      json.sede,
      json.notas,
      json.pagoMatricula
    );
  }

  // Método para verificar si el alumno debe abonar la matrícula anual
  verificarPagoMatricula() {
    return this.especialidades.some(
      especialidad => especialidad.tipoMatricula && especialidad.tipoMatricula.includes('noExento')
    );
  }

  // Método para agregar una especialidad
  agregarEspecialidad(especialidad) {
    this.especialidades.push(especialidad);
    this.pagoMatricula = this.verificarPagoMatricula();
  }

  // Método para actualizar la información del alumno
  actualizarInfo(info) {
    Object.assign(this, info);
    this.pagoMatricula = this.verificarPagoMatricula();
  }

  // Método para convertir la instancia a un objeto JSON
  toJSON() {
    return {
      codigoAlumno: this.codigoAlumno,
      nifAlumno: this.nifAlumno,
      nombreAlumno: this.nombreAlumno,
      apellidosAlumno: this.apellidosAlumno,
      fechaNacimiento: this.fechaNacimiento,
      direccion: this.direccion,
      ciudad: this.ciudad,
      provincia: this.provincia,
      codigoPostal: this.codigoPostal,
      telefono: this.telefono,
      email: this.email,
      autorizacionFotos: this.autorizacionFotos,
      codigoIban: this.codigoIban,
      dniTutor: this.dniTutor,
      nombreTutor: this.nombreTutor,
      apellidosTutor: this.apellidosTutor,
      telefonoTutor: this.telefonoTutor,
      correoTutor: this.correoTutor,
      menorEdad: this.menorEdad,
      especialidades: this.especialidades,
      sede: this.sede,
      notas: this.notas,
      pagoMatricula: this.pagoMatricula
    };
  }
}
```

## Store para Usar la Clase Alumno
Luego, actualizamos el store para trabajar con la instancia de Alumno en lugar de un objeto JSON directamente.
```
// alumnoStore.js
import { writable } from 'svelte/store';
import { Alumno } from './Alumno'; // Asegúrate de importar la clase Alumno correctamente

// Definir el objeto inicial del alumno basado en la clase Alumno
const initialAlumnoData = {
  codigoAlumno: '',
  nifAlumno: '',
  nombreAlumno: '',
  apellidosAlumno: '',
  fechaNacimiento: '',
  direccion: '',
  ciudad: '',
  provincia: '',
  codigoPostal: '',
  telefono: null,
  email: '',
  autorizacionFotos: '',
  codigoIban: '',
  dniTutor: '',
  nombreTutor: '',
  apellidosTutor: '',
  telefonoTutor: null,
  correoTutor: '',
  menorEdad: null,
  especialidades: [],
  sede: 'Nigüelas',
  notas: '',
  pagoMatricula: false
};

// Crear una instancia inicial de Alumno
const initialAlumno = Alumno.fromJSON(initialAlumnoData);

// Crear el store de Svelte
export const alumnoStore = writable(initialAlumno);
```

##  Uso del Store en Componentes Svelte
En los componentes Svelte, puedes seguir utilizando el store como antes, pero ahora te beneficiarás de los métodos definidos en la clase Alumno.
```
<script>
  import { alumnoStore } from './alumnoStore';
  import { onDestroy } from 'svelte';

  let alumno;

  // Suscribirse al store de alumno
  const unsubscribe = alumnoStore.subscribe(value => {
    alumno = value;
  });

  // Limpiar la suscripción cuando el componente se desmonta
  onDestroy(() => {
    unsubscribe();
  });

  // Función para actualizar el nombre del alumno
  function actualizarNombre() {
    alumnoStore.update(current => {
      current.actualizarInfo({ nombreAlumno: 'Juan' });
      return current;
    });
  }

  // Función para agregar una especialidad
  function agregarEspecialidad() {
    const nuevaEspecialidad = {
      tipo: 'instrumento',
      codigo: 'IGuitarra',
      nombre: 'Guitarra',
      tipoCuota: 'instrumento1hora',
      nombreCuota: '1 Hora/Semana',
      precio: null,
      tipoMatricula: 'noExento'
    };
    alumnoStore.update(current => {
      current.agregarEspecialidad(nuevaEspecialidad);
      return current;
    });
  }
</script>

<div>
  <h1>Datos del Alumno</h1>
  <p>Nombre: {alumno.nombreAlumno}</p>
  <p>Apellidos: {alumno.apellidosAlumno}</p>
  <p>Pago Matrícula: {alumno.pagoMatricula ? 'Sí' : 'No'}</p>

  <button on:click={actualizarNombre}>Actualizar Nombre</button>
  <button on:click={agregarEspecialidad}>Agregar Especialidad</button>
</div>
```


