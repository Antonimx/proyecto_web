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

## Paleta de colores

```scss
$primary:   #13b7ce;
$secondary: #b4daa5;
$success:   #08d167;
$info:      #e09137;
$warning:   #f7d406;
$danger:    #ff2c3c;
$light:     #ffe0e9;
$dark:      #76c7ba;
```

## Vistas

### Home (`home.index`)
Página principal con cards para visualizar rápidamente usuarios, clientes, arriendos y vehículos.

### Arriendos (`arriendos.index`)
Página con cards de vehículos disponibles para arrendar, cada uno con un botón "Arrendar". Incluye un botón para gestionar arriendos.

### Crear Arriendo (`arriendos.create`)
Página para crear un nuevo arriendo con información del vehículo y formulario para elegir cliente y fecha de arriendo.

### Gestionar Arriendos (`arriendos.gestionar`)
Página con lista de arriendos activos y botones para editar.

### Editar Arriendo (`arriendos.edit`)
Página para editar un arriendo existente, incluye formulario para agregar fecha de entrega, hora de entrega e imagen de entrega.

### Clientes (`clientes.index`)
Lista de clientes con botones para eliminar, editar y ver arriendos. Incluye botón para agregar nuevo cliente.

### Crear Cliente (`clientes.create`)
Página con formulario para crear un nuevo cliente.

### Editar Cliente (`clientes.edit`)
Página con formulario para editar información de un cliente.

### Arriendos de Cliente (`clientes.arriendo`)
Página con tabla de arriendos vigentes e históricos de un cliente específico.

### Vehículos (`vehículos.index`)
Lista de vehículos con cards individuales que tienen botones para eliminar y editar. Incluye botón para ver tipos de vehículos.

### Crear Vehículo (`vehículos.create`)
Página con formulario para crear un nuevo vehículo.

### Editar Vehículo (`vehículos.edit`)
Página con formulario para editar información de un vehículo existente.

### Tipos de Vehículo (`tipos.index`)
Página con tabla de todos los tipos de vehículos, incluye botones para editar y eliminar.

### Editar Tipo de Vehículo (`tipos.edit`)
Página con formulario para editar un tipo de vehículo.

### Crear Tipo de Vehículo (`tipos.create`)
Página con formulario para crear un nuevo tipo de vehículo.

### Usuarios (`usuarios.index`)
Tabla con todos los usuarios, incluye botones para eliminar y editar.

### Editar Usuario (`usuarios.edit`)
Página con formulario para editar información de un usuario, incluyendo cambio de contraseña.

### Crear Usuario (`usuarios.create`)
Página con formulario para crear un nuevo usuario.

### Login de Usuarios (`usuarios.login`)
Página con formulario de login para acceder al sistema.



