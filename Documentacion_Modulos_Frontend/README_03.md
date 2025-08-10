# Guía de Pruebas Frontend - Módulo 03\_patients\_diagnoses

## 1\. Descripción General

Este módulo gestiona la información de pacientes y sus diagnósticos. Esto incluye la creación, edición, visualización de historias clínicas y otros datos relevantes.

## 2\. Componentes Principales

### 2.1 Gestión de Pacientes

Este componente se encarga de la interfaz principal para la gestión de pacientes. Se encuentra en `<mcfile name="patients.jsx" path="src/features/patients/ui/patients.jsx"></mcfile>`.

  * **Funciones principales:**

      * `handleAction`: Gestiona las acciones como editar, ver información, ver historial o eliminar un paciente.
      * `handleSearch`: Maneja la búsqueda de pacientes.
      * `handleButton`: Controla la navegación a la página de registro.

  * **Funcionalidades a Probar:**

      * **Listado de Pacientes:**
          * Verificar la carga inicial de la lista.
          * Comprobar la paginación.
          * Validar el ordenamiento de las columnas.
      * **Búsqueda de Pacientes:**
          * Probar la búsqueda por nombre.
          * Probar la búsqueda por número de documento.
          * Validar que los resultados se actualicen en tiempo real.
      * **Gestión de Pacientes:**
          * Crear un nuevo paciente con datos válidos.
          * Editar la información de un paciente existente.
          * Eliminar un paciente.
          * Verificar los mensajes de confirmación correspondientes.

### 2.1.1 Historia de Pacientes

Este módulo se encarga de los estilos para la visualización de las historias clínicas.

  * **Ubicación**: `<mcfile name="PatientHistory.module.css" path="src/features/history/ui/PatientHistory.module.css"></mcfile>`

-----

## 2.2 Hooks Personalizados

### 2.2.1 Hook de Pacientes

Este *hook* se encarga de la lógica principal para la gestión de pacientes. Se encuentra en `<mcfile name="patientsHook.js" path="src\features\patients\hook\patientsHook.js"></mcfile>`.

  * **Funcionalidades:**
      * Gestión del estado de los pacientes.
      * Carga y actualización de datos.
      * Búsqueda y eliminación de pacientes.
      * Manejo de la paginación.
  * `handleAction` : Hook principal que maneja:
      * Carga de pacientes
      * Paginación
      * Búsqueda
      * Actualización de datos

### 2.2.2 Hook de Citas

Este *hook* contiene funciones para la carga y búsqueda de pacientes. Se encuentra en `<mcfile name="appointmentsHook.js" path="src\features\appointments\hook\appointmentsHook.js"></mcfile>`.

  * `loadPatients`: Carga pacientes con paginación.
  * `searchPatientsByTerm`: Realiza búsquedas de pacientes.

### 2.2.3 Servicios

Estos servicios contienen las funciones para interactuar con las APIs relacionadas a reportes. Se encuentran en `<mcfile name="reportsService.js" path="src\features\reports\service\reportsService.js"></mcfile>`.

  * `getPatientsByTherapist`: Obtiene la lista de pacientes por terapeuta.
  * `getAppointmentsforTherapist`: Obtiene la lista de citas por terapeuta.

-----

## 2.3 APIs

El frontend interactúa con las siguientes rutas de la API:

  * **Pacientes:**

      * `GET /api/patients`: Obtiene la lista de pacientes.
      * `GET /api/patients?search={term}`: Busca pacientes por un término específico.
      * `GET /api/patients/{id}`: Obtiene la información de un paciente en particular.
      * `PUT /api/patients/{id}`: Actualiza la información de un paciente.
      * `DELETE /api/patients/{id}`: Elimina a un paciente.

  * **Diagnósticos:**

      * `GET /api/diagnoses`: Obtiene la lista de diagnósticos.
      * `POST /api/diagnoses`: Crea un nuevo diagnóstico.

  * **Reportes:**

      * `GET /api/report/patientsByTherapist`: Obtiene pacientes por terapeuta.
      * `GET /api/report/appointmentsForTherapist`: Obtiene citas por terapeuta.

### 2.3.1 Historia Clínica

Este componente maneja la visualización y gestión de la historia clínica. Se encuentra en `<mcfile name="PatientHistory.jsx" path="src/features/history/ui/PatientHistory.jsx"></mcfile>`.

  * **Funcionalidades a Probar:**
      * **Información General:**
          * Verificar la carga correcta de los datos personales.
          * Comprobar la visualización del historial médico y las observaciones.
      * **Diagnósticos:**
          * Registrar un nuevo diagnóstico.
          * Actualizar diagnósticos existentes.
          * Validar que los campos requeridos no estén vacíos.
      * **Gestión de Terapeutas:**
          * Asignar un terapeuta a un paciente.
          * Cambiar el terapeuta asignado.
          * Eliminar el terapeuta asignado.

-----

## 3\. Casos de Prueba

### 3.1 Registro de Pacientes

1.  **Datos Válidos:**
      * Ingresar todos los campos requeridos con datos correctos.
      * Verificar que el paciente se crea exitosamente.
      * Comprobar la redirección a la página correspondiente.
2.  **Validaciones:**
      * Probar con campos obligatorios vacíos.
      * Ingresar formatos inválidos (ej. un correo electrónico o un número de teléfono incorrectos).
      * Intentar registrar un paciente con un documento ya existente.

### 3.2 Historia Clínica

1.  **Creación:**
      * Crear una nueva historia clínica.
      * Validar que todos los campos obligatorios sean llenados.
      * Verificar que la información se guarde correctamente.
2.  **Actualización:**
      * Modificar un diagnóstico existente.
      * Actualizar las observaciones.
      * Realizar cambios en la información médica del paciente.

### 3.3 Integración

1.  **Flujo Completo:**
      * Registrar un nuevo paciente.
      * Crear su historia clínica.
      * Asignarle un terapeuta.
      * Registrar un diagnóstico.
2.  **Manejo de Errores:**
      * Simular una pérdida de conexión.
      * Probar cómo reacciona la aplicación a los errores del servidor (códigos 500, 404, etc.).
      * Verificar el manejo de conflictos de datos.

-----

## 4\. Herramientas y Hooks

### 4.1 Hooks Principales

  * **`usePatients`**: Se encarga de la gestión del estado de los pacientes, las operaciones CRUD y el manejo de errores.
  * **`usePatientHistory`**: Carga la historia clínica de un paciente, gestiona sus actualizaciones y validaciones.

### 4.2 Servicios

  * Verificar que la integración con las APIs sea correcta.
  * Validar el manejo de las respuestas del servidor.
  * Comprobar que los errores sean gestionados adecuadamente.

-----

## 5\. Consideraciones Especiales

### 5.1 Rendimiento

  * Evaluar el tiempo de carga inicial de la lista de pacientes.
  * Comprobar la velocidad de respuesta en las búsquedas.
  * Probar el rendimiento con listas de pacientes grandes.

### 5.2 UX/UI

  * Verificar la claridad y visibilidad de los mensajes de retroalimentación.
  * Comprobar que se muestren estados de carga (ej. *spinners*).
  * Validar que las validaciones de los campos se muestren en tiempo real.

### 5.3 Seguridad

  * Verificar que los permisos de usuario sean respetados (ej. un usuario sin permisos no pueda eliminar un paciente).
  * Comprobar la protección de las rutas.
  * Validar el manejo correcto de las sesiones de usuario.

-----

## 6\. Documentación de Errores

Para cada prueba fallida, se debe documentar lo siguiente:

  * **Pasos para reproducir:** La secuencia de acciones que causaron el error.
  * **Comportamiento esperado:** Lo que la aplicación debería haber hecho.
  * **Comportamiento actual:** Lo que realmente sucedió.
  * **Evidencia:** Incluir capturas de pantalla, logs de la consola, etc.

-----

## 7\. Ambiente de Pruebas

### 7.1 Preparación

  * Asegurarse de que la base de datos esté limpia y lista para las pruebas.
  * Tener datos de prueba listos para ser utilizados.
  * Verificar que el usuario de prueba tenga los permisos correctos.

### 7.2 Herramientas Recomendadas

  * **React Developer Tools:** Para inspeccionar los componentes y su estado.
  * **Network Inspector:** Para monitorear las llamadas a la API.
  * **Console Logger:** Para revisar los logs de la aplicación.

-----

## 8\. Checklist de Pruebas

### 8.1 Pre-requisitos

  * [ ] El ambiente está configurado correctamente.
  * [ ] Los datos de prueba están listos.
  * [ ] Los permisos de usuario están configurados.

### 8.2 Pruebas Funcionales

  * [ ] Se ha probado el CRUD de pacientes.
  * [ ] Se ha probado la gestión de la historia clínica.
  * [ ] Se ha probado el manejo de diagnósticos.
  * [ ] Se ha probado la asignación de terapeutas.

### 8.3 Validaciones

  * [ ] Se han probado los campos requeridos.
  * [ ] Se han probado los formatos de datos.
  * [ ] Se han verificado los mensajes de error.
  * [ ] Se han verificado los mensajes de confirmación.

### 8.4 Integración

  * [ ] Se han probado los flujos completos.
  * [ ] Se ha verificado el manejo de errores.
  * [ ] Se ha comprobado la persistencia de los datos.
  * [ ] Se ha verificado la sincronización entre componentes.

-----

## 9\. Reporte de Pruebas

Al final de cada sesión de prueba, se debe documentar lo siguiente:

  * **Casos probados:** Qué pruebas se ejecutaron.
  * **Resultados obtenidos:** Si las pruebas pasaron o fallaron.
  * **Errores encontrados:** Una lista de los errores documentados.
  * **Evidencias recopiladas:** Enlaces o anexos a las capturas y logs.
  * **Recomendaciones:** Sugerencias para mejorar el módulo.

-----

# Flujo de Interacción Usuario-Sistema en el Módulo 03\_patients\_diagnoses

## 1\. Gestión de Pacientes

### 1.1 Listado de Pacientes

**Flujo de interacción:**

1.  El usuario accede a la vista de pacientes.
2.  El sistema:
      * Ejecuta la función `loadPatients()` en `<mcfile name="patientsHook.js" path="src/features/patients/hook/patientsHook.js"></mcfile>`.
      * Actualiza el estado con `setPatients()`.
      * Muestra la lista de pacientes en la interfaz.

### 1.2 Búsqueda de Pacientes

**Flujo de interacción:**

1.  El usuario ingresa un término en la barra de búsqueda.
2.  El sistema:
      * Activa la función `handleSearch()` en `<mcfile name="patients.jsx" path="src/features/patients/ui/patients.jsx"></mcfile>`.
      * Ejecuta `searchPatientsByTerm()` después de 1.2 segundos (debido al *debounce*).
      * Actualiza la lista de pacientes con los resultados de la búsqueda.

### 1.3 Registro de Nuevo Paciente

**Flujo de interacción:**

1.  El usuario hace clic en el botón "Registrar".
2.  El sistema navega a la vista de registro (`Maps('registrar')`).
3.  El usuario completa el formulario y lo envía.
4.  El sistema:
      * Ejecuta `submitNewPatient()`.
      * Muestra una notificación de éxito o error.
      * Actualiza la lista de pacientes con el nuevo registro.

### 1.4 Edición de Paciente

**Flujo de interacción:**

1.  El usuario selecciona la opción "Editar" para un paciente.
2.  El sistema:
      * Ejecuta `handleEdit()`.
      * Carga la información actual del paciente.
      * Muestra un formulario de edición con los datos precargados.
3.  El usuario modifica los datos y los guarda.
4.  El sistema:
      * Ejecuta `handleUpdatePatient()`.
      * Muestra una notificación.
      * Actualiza la lista de pacientes con la información modificada.

-----

## 2\. Historia Clínica

### 2.1 Acceso a Historia

**Flujo de interacción:**

1.  El usuario hace clic en el botón "Historia" para un paciente.
2.  El sistema:
      * Navega a la ruta `historia/${record.id}`.
      * Carga los datos de la historia clínica usando el *hook* `usePatientHistory(id)`.
      * Muestra el formulario de la historia con la información cargada.

### 2.2 Gestión de Terapeutas

**Flujo de interacción:**

1.  El usuario selecciona la opción "Asignar Terapeuta".
2.  El sistema:
      * Ejecuta `showTherapistModal()`.
      * Muestra una lista de terapeutas disponibles.
3.  El usuario selecciona un terapeuta.
4.  El sistema:
      * Ejecuta `handleSelectTherapist()`.
      * Actualiza el formulario con la asignación.

### 2.3 Actualización de Historia

**Flujo de interacción:**

1.  El usuario modifica los campos de la historia clínica.
2.  Al guardar, el sistema:
      * Valida la información ingresada.
      * Ejecuta las actualizaciones correspondientes en la base de datos.
      * Muestra una notificación con el resultado de la operación.

-----

## 3\. Manejo de Estados y Respuestas

### 3.1 Estados de Carga

El sistema muestra indicadores de carga durante las operaciones, como por ejemplo:

```jsx
{loadingEditId === record.id ? (
    <Spin size="small" style={{ color: '#fff' }} />
) : (
    'Editar'
)}
```

### 3.2 Notificaciones

El sistema utiliza un componente de *Toast* para dar retroalimentación visual al usuario en casos de:

  * Éxito en las operaciones.
  * Errores de validación.
  * Errores del sistema.

### 3.3 Manejo de Errores

1.  **Error en la carga de datos:**
      * El sistema muestra un mensaje de error.
      * Mantiene el estado anterior de la interfaz.
      * Permite al usuario reintentar la operación.
2.  **Error al guardar datos:**
      * El sistema muestra un mensaje de error específico.
      * Mantiene los datos en el formulario para que el usuario pueda corregirlos.
      * Permite al usuario reintentar el guardado.

-----

## 4\. Optimizaciones

### 4.1 Debounce en Búsqueda

Para evitar llamadas excesivas a la API, la función de búsqueda utiliza un *debounce*:

```javascript
useEffect(() => {
    const delayDebounce = setTimeout(() => {
        if (searchTerm.trim()) {
            searchPatientsByTerm(searchTerm.trim());
        } else {
            loadPatients(1);
        }
    }, 1200);

    return () => clearTimeout(delayDebounce);
}, [searchTerm]);
```

### 4.2 Caché de Datos

  * El sistema mantiene el estado local para operaciones frecuentes.
  * Actualiza los datos solo cuando es necesario.
  * Utiliza paginación para optimizar el tiempo de carga de listas grandes.

-----

## 5\. Validaciones

### 5.1 Campos Requeridos

  * El sistema valida los campos antes de enviar el formulario.
  * Muestra mensajes de error específicos para cada campo.
  * Mantiene el estado del formulario para que el usuario pueda corregir los errores.

### 5.2 Formato de Datos

  * Se validan los tipos de datos (ej. un campo numérico no puede contener letras).
  * Se verifica el formato de fechas.
  * Se asegura que los datos numéricos estén en el rango correcto.
