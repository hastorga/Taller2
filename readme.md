# Taller: Todo Listo! y MVC a mano

En este taller se agregarán funcionalidades a la aplicación Todo Listo! dada una implementación base hecha en PHP. 

Respecto a la instalación:
  * Se debe tener instalado Xampp 7.2.4 y evitar uso de Xampp virtualizado.
  * Luego de instalar Xampp se deben activar los servicios de Apache y MySQL
  * Ir a la ruta http://localhost/phpmyadmin/ y crear una base de datos haciendo click en "Nueva".
  * Nombrar a la base de datos como "TODOLISTO" y usar cotejamiento utf8_spanish2_ci
  * Dentro de la nueva base de datos vacía, importar el archivo SQL "TODOLISTO.sql" para cargar las tablas y datos.
  * Asegurarse que el código fuente del taller de encuentre en la carpeta htdocs de Xampp.

  # IMPORTANTE Ejecutar con Chrome o Edge.

Respecto al funcionamiento y las Rutas: 

  * la ruta principal es http://localhost/todolisto_mvc/mainController.php/index en la cual se encuentra el login
    * Los usuarios predefinidos son admin y juanin (ambos sin password)
  * Al ingresar se redirecciona a la ruta http://localhost/todolisto_mvc/mainController.php/tareas en la cual vemos el listado de las tareas existentes y tambíen podemos crear más, indicando un título, una descripción y un estado.
  * Al ingresar como admin se puede ver la cantidad de tareas de los demás usuarios. Se llevará es esta ruta: http://localhost/todolisto_mvc/mainController.php/tareasUsuarios
  * Dentro del listado de tareas existe un botón para ver el calendario con las tareas. Nos llevará la ruta: http://localhost/todolisto_mvc/mainController.php/calendario
  * En la tabla, al costado de la tarea, existe un botón dedicado para eliminarla.
  * Al pinchar sobre el hipervinculo en el título de una tarea, se llevará al detalle en una ruta de este tipo: http://localhost/todolisto_mvc/mainController.php/tarea?id= idTarea
  * Dentro del detalle de una tarea, existe un botón dedicado para editarla y cambiar sus atributos (menos el id). La ruta es de tipo: http://localhost/todolisto_mvc/mainController.php/editarTarea?id=idTarea
  * En la vista para modificar se encuentra un formulario con placeholders con los valores actuales de la tarea. Se dispone de un botón para ir atrás hacia el detalle.
  * Por último, existe un hipervinculo para cerrar la sesión.
 

Respecto a los controladores:

  * Se tiene el controlador principal `mainController.php` que traduce las URLs en rutas internas de la aplicación
  * Se tiene el controlador `LoginController.php` que se encarga de hacer login y logout
  * Se tiene el controlador `TareaController.php` que se encarga de mostrar el listado de tareas asociadas a un usuario, y de recibir los parámetros de creación de una nueva tarea

Respecto a los modelos se provee una base de datos `TODOLISTO.sql`, lista para ser importada en MySQL,  para soportar los modelos de la aplicación, en base a esto:

  * Se tienen las clases `Usuario`, `Tarea`, `Rol`, `EstadoTarea` y `TipoTarea`
  * El `mainController.php` se conecta a la base de datos, y almacena el _handle_ en una propiedad estática de la clase `Config`
  * Las clases mencionadas hacen uso de la conexión a la base de datos para buscar y crear según corresponda. 

Respecto a las vistas:

  * Se proveen seis vistas: `Login.view.php` y `Tareas.view.php`, `Tarea.view.php`, `EditarTarea.view.php`, `calendar.view.php` y `Admin.view.php` .
  * Dentro de vistas hay una carpeta resources con archivos Javascript y CSS. Esto incluye Full Calendar. 



Respecto a los datos iniciales en la base de datos:

  * Hay 2 usuarios ya creados: `Juanin`, que es un usuario normal, y `admin` que, sorprendentemente, es un administrador.
  * Hay estados  de tarea ya definidos. Estos valores pueden cambiar, en general al agregar nuevos valores de manera externa a la aplicación.
  * Hay roles de usuario ya definidos, y no se deben considerar roles adicionales.

# Integrantes: Héctor Astorga - Samuel Carrasco 