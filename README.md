# proyecto_web


# Sistema de Gestión de Arriendos de Vehículos

## Funcionalidades
### Vehículos (Estado)
Los vehículos tienen un estado que puede ser seleccionado mediante un ComboBox o RadioButtons:

- **0: De baja**
- **1: Disponible**
- **2: Arrendado**
- **3: En mantenimiento**

### Usuarios (Perfil)
Los usuarios tienen un perfil que se selecciona desde un ComboBox o RadioButtons:

- **1. Administrador**
- **2. Ejecutivo**

## Gestión
El sistema permite gestionar las siguientes entidades:

1. Usuarios
2. Tipos de Vehículos
3. Vehículos
4. Clientes

## Anotaciones
- Un administrador no puede eliminar su propia cuenta.
- El ejecutivo NO PUEDE gestionar usuarios, gestionar tipos de vehiculos, gestionar vehiculos (excepto cambiar el estado de un vehiculo).
- Falta agregar campo de hora de inicio de las migraciones y editar sus respectivas tablas.

## Vistas
- Listas 8/12

### Home (`home.index`) LISTO
Página principal con cards para visualizar rápidamente usuarios, clientes, arriendos y vehículos.

### Arriendos (`arriendos.index`) LISTO
Página con cards de vehículos disponibles para arrendar, cada uno con un botón "Arrendar". Incluye un botón para gestionar arriendos.

### Crear Arriendo (`arriendos.create`) LISTO
Página para crear un nuevo arriendo con información del vehículo y formulario para elegir cliente y fecha de arriendo.

### Gestionar Arriendos (`arriendos.gestionar`) LISTO
Página con lista de arriendos activos y botones para editar.

### Clientes (`clientes.index`) 
Lista de clientes con botones para eliminar, editar y ver arriendos. Incluye botón para agregar nuevo cliente.    
- Falta modal para editar cliente
- Añadir a la tabla un campo para contar cuantos arriendos tiene el cliente?

### Arriendos de Cliente (`clientes.show`) LISTO
Página con tabla de arriendos vigentes e históricos de un cliente específico.

### Vehículos (`vehículos.index`) LISTO
Lista de vehículos con cards individuales que tienen botones para eliminar y editar. Incluye botón para ver tipos de vehículos.

### Crear Vehículo (`vehículos.create`) LISTO
Página con formulario para crear un nuevo vehículo.

### Editar Vehículo (`vehículos.edit`) 
Página con formulario para editar información de un vehículo existente.
- Falta agregar al form el cambiar un estado del vehiculo.

### Tipos de Vehículo (`tipos.index`) LISTO
Página con tabla de todos los tipos de vehículos, incluye botones para editar y eliminar.

### Usuarios (`usuarios.index`)
Tabla con todos los usuarios.
- Falta el modal para eliminar.
- Falta el modal para editar. ¿se puede editar la contraseña y email de otros usuarios?
- Falta formulario para agregar un nuevo Usuario

### Configuracion de cuenta (`usuarios.me`)
Debe permitir cambiar propios datos de usuario, incluido contraseña
- No se ha empezado

### Login de Usuarios (`usuarios.login`) LISTO
Página con formulario de login para acceder al sistema.

## Paleta de colores

```scss
$primary:       #3d4044;
$secondary:     #b4daa5;
$success:       #07a75b;
$info:          #feb5ce;
$warning:       #e6cb07;
$danger:        #f60205;
$light:         #d7e9ff;
$dark:          #51c6e6;
```

