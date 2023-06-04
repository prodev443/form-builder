# Constructor de Formulario HTML
*Preparado para Bootstrap 4 / 5*
*Este proyecto está en desarrollo*

## Documentación

1. Abrir el archivo *docs/index.html* para ver la documentación en el navegador web.
2. *Nota:* Los métodos para agregar distintos tipos de campos comienzan con *add*- y son métodos que pueden ejecutarse en cadena. Para obtener el formulario HTML se debe ejecutar el método *get*.

## Ejemplo
1. Ejecutar en [http://localhost:8000](Entorno local)
```
php -S localhost:8000
```
2. Consultar el formulario de ejemplo en el archivo *index.php*

## Asignación automática de Ids del DOM

1. input de texto (text, email, password, etc.): Se toma el mismo valor que el atributo "name"
2. input checkbox: Se toma el mismo valor que el atributo "name"
3. input de radio: Se toma el mismo valor que el atributo "name" y se le añade un sufijo definido por el usuario, el cual debe ser único para cada elemento radio de entre el conjunto que compartan el mismo atributo "name"
4. textarea: Se toma el mismo valor que el atributo "name"
5. select: Se toma el mismo valor que el atributo "name"

## Limitaciones

1. No se puede personalizar el Id de cada campo por separado, de hecho la intención es que la generación de Ids sea automática
2. Para personalizar la clase css de solo un campo / label / contenedor y mantener el estilo en los demás campos sería necesario configurar la clase a través del setter correspondiente y después restaurarlo a su valor por defecto