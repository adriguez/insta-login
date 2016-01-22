<?php
/**
 * Instagram PHP login
 *
 * This file is part of InstaLogin PHP.
 *
 * InstaLogin PHP is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * InstaLogin PHP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with InstaLogin PHP.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * (ES)
 * 
 * Archivo para mostrar las publicaciones más populares
 *
 * (EN)
 * 
 * File to get most popular publications of Instagram
 * 
 */


/**
 * Incluimos el archivo core.php que es donde están todas las funciones y archivos comunes. Ponemos a true la variable que indica que creemos el objeto $instagram
 * Include file core.php with common files and functions. Set true the var $createObjectInstagram to create a object of this class.
*/

$createObjectInstagram = true;
include_once('../src/core/core.php');

/**
 * Usamos el objeto $instagram creado en core.php y sacamos las publicaciones más populares. El valor que le pasamos es el número de resultados que queremos.
 * Use object $instagram create in core.php and get last popular publications. The value in function is number of results.
**/

$populardata = json_decode($instagram->getMostPoular(10));

?>

<div id="content">

    <div id="content_top"></div>

    <div id="content_main">

    <?php 
    
    /**
     * Recorremos el array donde tenemos todas las publicaciones más populares que nos ha devuelto Instagram API y lo vamos imprimiendo.
     * Read array with most popular publications of Instagram and print on the body
    **/

    foreach ($populardata->data as $feeddata)
    {

    ?>
        <h2>&nbsp; </h2>
        <p>&nbsp;</p>
       	
        <h3>
            <img src="<?php echo $feeddata->user->profile_picture; ?>" width="60" height="60" caption="Imagen de perfil" />&nbsp;&nbsp;<?php echo $feeddata->user->username; ?>
        </h3>

       	<br />

        <img src="<?php echo $feeddata->images->low_resolution->url; ?>" width="<?php echo $feeddata->images->low_resolution->width; ?>" height="<?php echo $feeddata->images->low_resolution->height; ?>" caption="Feed Image" />
        
        <p>&nbsp;</p>
        <p>
            <strong>Caption: </strong><?php echo @$feeddata->caption->text; ?>
        </p>
        <p>
            <strong>Comments: </strong><br>
            <?php 
            
            /**
             * Recorremos el array donde tenemos todos los comentarios de cada publicación.
             * Read array with comments of each publication.
            **/

            foreach ($feeddata->comments->data as $commentsdata)
            {
            	echo  "<strong>".$commentsdata->from->username.":</strong> ". $commentsdata->text."<br>";
            }
         ?>
        </p>
        <p>&nbsp;</p>
        	
        
    <?php 
    }

    /**
     * Sino encontramos datos, mostramos aquí el error.
     * If data is empty, show here the error.
    **/

    if(count($populardata->data)==0)
    {
    	echo "<h2>No hay publicaciones populares</h2>";
    }
?>
</div>

<?php 

/**
 * Requerimos pie de página
 * Require footer
**/

include_once '../src/_includes/footer.php';

?>