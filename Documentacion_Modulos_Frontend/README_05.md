# Guía de Pruebas Frontend – Módulo **05\_appointments\_status**

## Índice

1. [Descripción General](#1-descripción-general)  
    1.1 [Componentes Principales](#11-componentes-principales)  
    1.2 [Componentes de Citas Completadas](#12-componentes-de-citas-completadas)  
    1.3 [Componentes de Calendario](#13-componentes-de-calendario)  
    1.4 [Hooks Personalizados](#14-hooks-personalizados)  
    1.5 [Componentes de UI Reutilizables](#15-componentes-de-ui-reutilizables)  
    1.6 [Servicios y Utilidades](#16-servicios-y-utilidades)  
    1.7 [Funcionalidades Principales](#17-funcionalidades-principales)  
    1.8 [Interacciones con API Backend](#18-interacciones-con-api-backend)  
    1.9 [Estilos](#19-estilos)  

2. [Flujo de Interacción Usuario–Sistema](#2-flujo-de-interacción-usuario–sistema)  
    2.1 [Listado de Citas](#21-listado-de-citas-vista-principal)  
    2.2 [Creación de Citas](#22-creación-de-citas)  
    2.3 [Edición de Citas](#23-edición-de-citas)  
    2.4 [Calendario de Citas](#24-calendario-de-citas)  
    2.5 [Generación de Documentos](#25-generación-de-documentos)  
    2.6 [Citas Completadas](#26-citas-completadas)  

---

## 1. Descripción General

Este módulo maneja la gestión de citas y sus estados, incluyendo la creación, actualización, visualización y eliminación de citas, así como la generación de tickets y reportes.

### 1.1 Componentes Principales

1. **`src/features/appointments/ui/appointments.jsx`** – Componente principal para la gestión de citas.
    **Pruebas que se pueden realizar:**
    1.1.1 Paginación de resultados.
    1.1.2 Filtros de búsqueda.
    1.1.3 Ordenamiento de columnas.
    1.1.4 Actualización en tiempo real.

2. **`src/features/appointments/ui/RegisterAppointment/NewAppointment.jsx`** – Manejo del registro de nuevas citas.
    **Pruebas que se pueden realizar:**
    1.1.5 Crear cita con todos los campos obligatorios.
    1.1.6 Validar selección de paciente.
    1.1.7 Verificar fecha y hora.
    1.1.8 Comprobar estado inicial.
    1.1.9 Validar cálculo de pagos.

3. **`src/features/appointments/ui/EditAppointment/EditAppointment.jsx`** – Edición de citas existentes.
    **Pruebas que se pueden realizar:**
    1.1.10 Modificar fecha/hora.
    1.1.11 Cambiar estado de la cita.
    1.1.12 Actualizar información de pago.
    1.1.13 Verificar persistencia de cambios.

### 1.2 Componentes de Citas Completadas

* **`src/features/appointmentsComplete/ui/appointmentsComplete.jsx`** – Vista de citas completadas.
* **`src/features/appointmentsComplete/service/appointmentsCompleteService.js`** – Servicios de citas completadas.
* **`src/features/appointmentsComplete/hook/appointmentsCompleteHook.js`** – Hook personalizado para citas completadas.

### 1.3 Componentes de Calendario

* **`src/features/calendar/ui/Calendar.jsx`** – Vista de calendario.
   **Pruebas que se pueden realizar:**
   1.3.1 Mostrar citas por estado.
   1.3.2 Navegación entre fechas.
   1.3.3 Interacción con eventos.
   1.3.4 Actualización en tiempo real.

* **`src/features/calendar/service/calendarService.js`** – Servicios del calendario.

* **`src/features/calendar/hook/calendarHook.js`** – Hook para calendario.

* **`src/features/calendar/ui/CalendarOverrides.css`** – Estilos personalizados del calendario.

### 1.4 Hooks Personalizados

* **`src/features/appointments/hook/appointmentsHook.js`**
   - `useAppointments`: Maneja el estado y lógica de citas.
   - `usePatients`: Gestiona la información de pacientes.

### 1.5 Componentes de UI Reutilizables

* **`src/components/DateSearch/CustomTimeFilter.jsx`** – Filtro de tiempo.

* **`src/components/Search/CustomSearch.jsx`** – Búsqueda personalizada.

* **`src/components/Table/Tabla.jsx`** – Tabla reutilizable.

* **`src/components/PdfTemplates/ExcelPreviewTable.jsx`** – Vista previa de Excel.

* **`src/components/PdfTemplates/TicketPDF.jsx`** – Generación de tickets.
   **Pruebas que se pueden realizar:**
   1.5.1 Generación de PDF.
   1.5.2 Datos correctos.
   1.5.3 Formato adecuado.

* **`src/components/PdfTemplates/FichaPDF.jsx`** – Generación de fichas.
   **Pruebas que se pueden realizar:**
   1.5.4 Generación de ficha.
   1.5.5 Información completa.
   1.5.6 Formato correcto.

### 1.6 Servicios y Utilidades

* **`src/services/toastify/ToastContext.jsx`** – Sistema de notificaciones.
* **`src/services/toastify/Toast.jsx`** – Componente de notificaciones.

### 1.7 Funcionalidades Principales

* 1.7.1 Gestión de citas (CRUD completo).
* 1.7.2 Manejo de estados de citas.
* 1.7.3 Generación de documentos (tickets y fichas).
* 1.7.4 Búsqueda y filtrado.
* 1.7.5 Validaciones de formularios.
* 1.7.6 Notificaciones del sistema.
* 1.7.7 Integración con módulo de pacientes.

### 1.8 Interacciones con API Backend

* `GET/POST/PUT /api/appointments` – Gestión de citas.
* `GET/POST /api/patients` – Integración con pacientes.
* `PUT /api/appointments/status` – Manejo de estados.

### 1.9 Estilos

* **`src/features/appointments/ui/appointments.module.css`**
* **`src/features/appointments/ui/RegisterAppointment/NewAppointment.module.css`**
* **`src/features/appointmentsComplete/ui/appointmentsComplete.module.css`**

---

## 2. Flujo de Interacción Usuario–Sistema

### 2.1 Listado de Citas (Vista Principal)

**Usuario → Frontend**

* Accede a `appointments.jsx`.
* Usa filtros (`CustomSearch.jsx`) y filtros de tiempo (`CustomTimeFilter.jsx`).
* Navega por paginación.

**Frontend → Backend**

* `appointmentsHook.js` envía solicitudes a `/api/appointments` con búsqueda, filtros y paginación.

**Backend → Frontend → Usuario**

* Devuelve datos paginados.
* `useAppointments` actualiza estado.
* Muestra en `Tabla.jsx`.
* Notificaciones con `Toast.jsx`.

---

### 2.2 Creación de Citas

**Usuario → Frontend**

* Accede a `NewAppointment.jsx`.
* Completa datos obligatorios.

**Frontend → Backend**

* Validaciones.
* Envía **POST** a `/api/appointments`.
* Si es nuevo paciente: `/api/patients`.

**Backend → Frontend → Usuario**

* Confirma creación.
* Actualiza lista.
* Notifica con `ToastContext.jsx`.
* Redirige a vista principal.

---

### 2.3 Edición de Citas

**Usuario → Frontend**

* Accede a `EditAppointment.jsx`.
* Modifica datos.

**Frontend → Backend**

* Validaciones.
* **PUT** a `/api/appointments/{id}`.
* Cambios de estado: `/api/appointments/status/{id}`.

**Backend → Frontend → Usuario**

* Confirma cambios.
* Actualiza vista.
* Notifica cambios.

---

### 2.4 Calendario de Citas

**Usuario → Frontend**

* Usa `Calendar.jsx`.
* Filtra por estado y fecha.

**Frontend → Backend**

* `calendarService.js` consulta citas pendientes y completadas.

**Backend → Frontend → Usuario**

* Devuelve datos filtrados.
* Actualiza vista con `CalendarOverrides.css`.

---

### 2.5 Generación de Documentos

**Usuario → Frontend**

* Solicita ticket (`TicketPDF.jsx`).
* Solicita ficha (`FichaPDF.jsx`).

**Frontend → Backend**

* Pide datos a los endpoints.

**Backend → Frontend → Usuario**

* Devuelve datos.
* Genera PDF y descarga.

---

### 2.6 Citas Completadas

**Usuario → Frontend**

* Accede a `appointmentsComplete.jsx`.
* Filtra y busca.

**Frontend → Backend**

* `appointmentsCompleteService.js` envía solicitud filtrada.

**Backend → Frontend → Usuario**

* Devuelve lista de citas completadas.
* Actualiza vista.
* Exporta a Excel (`ExcelPreviewTable.jsx`).

---
## APOYARSE DE LA PAGINA DE REFLEXO PARA VER COMO ESTA ESTABLECIDO SU FUNCIONAMIENTO