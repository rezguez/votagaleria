# votagaleria
Sistema para votar una galería de imágenes (máximo tres por categoría) en server.php $numvotos=2 controla el máximo.

En server.php se ponen los datos de conexión a la base de datos Mysql

En admin.php se entra con usuario y contraseña de la tabla users. En el fichero tablas.sql se puede editar el usuario por defecto o bien hacerlo a traves de phpmyadmin una vez creadas las tablas (No es el usuario root de la base de datos). Ofrece el listado ordenado por votos de las imágenes.

Las imágenes no se cargan en el directorio "images" a través de la base de datos, sino mediante ftp. Después se ejecuta el fichero carga_images.php y las introduce en la BD. Se pueden editar con phpmyadmin los campos auxiliares titulo, descripción... El campo "estado"=1 significa activo, 0 inactivo. El campo "orden" se refiere a un número que identifica las diferentes categorías.

Para lanzar las diferentes categorías se usan diferentes direcctorios modificando el valor de $orden. Por defecto, la categoría inicial es 1. No se muestran los campos titulo, descripción por defecto, para que la votación sea ciega, pero para otros fines, solo hay que editar un poco el código y añadir dichos campos.

Las hojas de estilo están basadas en la página web donde esta aplicación fue creada.

2 de noviembre de 2020 (Francisco Pérez)