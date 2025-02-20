
    1. Crear proyecto
    2. Configuracion de dependencias

Laravel new X(nombre del proyecto)
npm install
php artisan serve
npm run dev
php artisan serve
Gracias a esto podremos acceder a la web a través de php artisan serve que genera un localhost

Añado dentro de components todas las secciones de header, main, footer, nav

Si queremos podemos usar un tema gracias a el plugin de Tailwind (Daisyui) el cual hay que instalar; yo he decidido usar Valentines y asi es como se inserta el codigo, pero a partir de aquí cuando yo quiera usarlo lo tengo que implementar dentro de mi codigo de lo que hemos creado anteriormente
npm i -D dasyui @latest

Instalamos breeze

Breeze implementa características de autentificación (login, register)

Creamos dentro de header.blade.php un from en el que haya botones con login y/o registrer

Añadir estas lineas con @ para que solo los que esten logueados lo vean y cuando se desloguen se deje de ver

creamos una ruta logout en la que incluiremos un boton de logout que haga un metodo post, añadiendolo todo a web.php

creamos con php artisan make:Xcontroller Xcontroller.php
para generar un array que

añadimos boton hamburguesa sin js









