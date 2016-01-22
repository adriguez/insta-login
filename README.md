#InstaLogin PHP

(EN)

This sample project demonstrates the integration of instagram apis with PHP. To work this script, User authentication with Instagram server is necessary.

- It can show user's Feed (user wall), user comments, uploaded media by a user.
- Show user's uploaded photos on Google map with Pins and information windows showing photo.
- List of users who are following current user.
- List of users followed by current user.
- Most popular photos on instagram with comments and users.

(ES)

Este proyecto de ejemplo muestra la integración PHP con la API de Instagram. Para el funcionamiento, es necesaria la autentificación con el servidor de Instagram por el usuario.

- Se puede mostrar todo el 'timeline' de un usuario, los comentarios y las fotos y vídeos subidas por el usuario.
- Muestra las fotos en Google maps con Información y sus respectivos 'pin'.
- Lista de usuarios que están siguiente al usuario que ejecuta y da permiso a la aplicación
- Lista de usuarios que son seguidos por el usuario.
- Fotografías y vídeos más populares en instagram con sus respectivos comentarios y usuarios.

=============================================================================================================

(EN)

Follow the following instructions:

1) Upload all files to a publically access able web server so that instagram can redirect user to your server after authentication.

2) Register an application at https://www.instagram.com/developer/

3) On the registration form enter http://yourwebsite.com/instagram/redirect.php as redirect URI for "OAuth redirect_uri" field.

4) Remember redirect uri should point to http://yourwebsite.com/instagram/redirect.php otherwise this application is not going to work. 

5) After creating the application you will get "CLIENT ID", "CLIENT SECRET" and "REDIRECT URI".

6) Copy those values and open config.php

7) Replace these values in appconfig array. Remember redirect_url in appconfig should be same as "OAuth redirect_uri".

8) Open index.php

=============================================================================================================

(ES)

Siga las siguientes instrucciones:

1) Suba todos los archivos a su servidor en una carpeta pública desde la que luego poder acceder para la autentificación.

2) Debe registrar una aplicación en: https://www.instagram.com/developer/

3) En el formulario de registro debe introducir su dirección pública: http://dominio.com/instagram/redirect.php como URL de redirección en el campo "OAuth redirect_uri".

4) Recuerde que para que la aplicación funcione la URL debe ser el archivo redirect.php, ej: http://yourwebsite.com/instagram/redirect.php

5) Después de crear la aplicación, debe guardar los campos:  "CLIENT ID", "CLIENT SECRET" y "REDIRECT URI".

6) Introduzca esos valores en el archivo config.php

7) Reemplace los valores del array appconfig. Recuerde que el campo 'redirect_url' en el archivo de configuración debe ser el mismo que 'OAuth redirect_uri'.

8) Abra index.php
