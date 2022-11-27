# Data_Dashboard_ADIIU
La práctica consiste en crear un panel de datos (Data Dashboard). Este panel cogería los datos de una base de datos de su elección en PhPMyAdmin, Xampp. Es un ejemplo de una aplicación web distribuida que tiene un front-end y un back-end.

Los datos que se utilizan son los resultados de las pasadas elecciones en Castilla y León, donde se montrarán datos como los votos totales, los avances o el número de votos por provincia.

## Creación base de datos
Los datos que componen la base de datos pueden encontrarse en la carpeta [csv](https://github.com/joanmarto/Data_Dashboard_ADIIU/tree/main/csv). Ahí no solo se encuentra el csv con los datos originales, sino también un csv para cada una de las tablas de la base de datos. Dichos archivos son generados por el script de pyhon incluido en el proyecto.

La base de datos está montada sobre Xampp. Puede instalarse [aquí](https://www.apachefriends.org/es/index.html). El código sql para montar las tablas está incluido en este proyecto. Una vez creadas las tablas de la base de datos podremos importar los datos de los archivos csv.

## Interfaz
Para configurar el front-end se ha utilizado Bootstrap y CSS, así como JavaScript para modificar el DOM de la página y generar los Highcharts. Para el servidor web utilizamos Xampp, como hemos mencionado antes, y PHP para realizar las consultas a la base de datos.
