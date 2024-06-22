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

// Ejemplo de uso de la clase Alumno
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


- Clase Alumno: Representa la estructura del objeto alumno con métodos para manejar sus propiedades.
- Métodos:
  - fromJSON: Crea una instancia de Alumno a partir de un objeto JSON.
  - verificarPagoMatricula: Verifica si el alumno debe pagar matrícula.
  - agregarEspecialidad: Agrega una especialidad al alumno y actualiza el estado de pagoMatricula.
  - actualizarInfo: Actualiza la información del alumno.
  - toJSON: Convierte la instancia de Alumno a un objeto JSON.

Esta implementación permite trabajar de manera más estructurada y orientada a objetos con los datos del alumno en tu aplicación.

