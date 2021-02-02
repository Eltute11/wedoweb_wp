# We Do Web - Challenge!

## Maquetación del sitio
En la primer instancia pasamos de un archivo Adobe XD a HTML. El código del mismo pueden encontrarlo en este [repositorio](https://github.com/Eltute11/wedoweb). El sitio se encuentra online para visualizar desde [aquí](https://eltute11.github.io/wedoweb/index.html).

## HTML a Wordpress
En esta segunda instancia tomamos el código generado anteriormente para hacerlo compatible con Wordpress y crear un custom theme.

## Pasos para la implementación

1- Realizar una instalación limpia de Wordpress en un servidor local u online.

2- Descargar este repositorio que contiene el theme.

3- Dentro del administrador del Wordpress, ir a la sección de **Apariencia** -> **Tema** y subir el archivo .zip del repositorio. Una vez subido activar el nuevo theme.

4- Descargar el plugin [Advanced Custom Fields](https://es.wordpress.org/plugins/advanced-custom-fields/) desde la sección de **Plugins** y activarlo

5- Una vez activado el plugin, debemos ir a **Campos personalizados** -> **Herramientas**, e importamos el archivo de configuración [.json](https://github.com/Eltute11/wedoweb_wp/blob/master/export%20files/acf-export-2021-02-02.json) 

6- Crear la cantidad de usuarios que desee con el rol **Gallery author**

>**Realizados los pasos anteriores, ya pueden comenzar a subir sus post en la Galería**

7- **[Opcional]** Descargar [.json](https://github.com/Eltute11/wedoweb_wp/blob/master/export%20files/mywordpress.WordPress.2021-02-02.xml) e importar post de galería desde **Herramientas** -> **Importar**

## Ver el sitio online
 Pueden ver el sitio funcionando desde este [link](https://rayway.co/wedoweb/).
Acceso al administrador: [https://rayway.co/wedoweb/wp-admin](https://rayway.co/wedoweb/wp-admin)

|ROL             |USUARIO                         |CONTRASEÑA                    |
|----------------|-------------------------------|-----------------------------|
|`admin`	     |wedoweb                    |wedoweb123            |
|`gallery author`|Sam Jerremy            |wedoweb123            |
|`gallery author`|Chandler Smith |wedoweb123|
|`gallery author`|Mads Schmidt |wedoweb123|