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
 * Archivo para mostrar las publicaciones de un usuario concreto.
 *
 * (EN)
 * 
 * File to get publications of an User.
 * 
 */

/**
 * Incluimos el archivo core.php que es donde están todas las funciones y archivos comunes. Ponemos a true la variable que indica que creemos el objeto $instagram
 * Include file core.php with common files and functions. Set true the var $createObjectInstagram to create a object of this class.
*/

$createObjectInstagram = true;
include_once('../src/core/core.php');

/**
 * Usamos el objeto $instagram creado en core.php y sacamos las últimas publicaciones del usuario. El valor que le pasamos es el número de resultados que queremos.
 * Use object $instagram create in core.php and get last publications of user. The value in function is number of results.
**/

$userpublications = json_decode($instagram->getUserPublications(5));

?>

<div id="content">

	<div id="content_top"></div>

	<div id="content_main">

	<?php

    /**
     * Recorremos el array donde tenemos todas las publicaciones que nos ha devuelto Instagram API y lo vamos imprimiendo.
     * Read array with most popular publications of Instagram and print on the body
    **/

	foreach ($userpublications->data as $feeddata)
	{

	?>

		<h2>&nbsp; </h2>
		<p>&nbsp;</p>
		<h3>
			<img src="<?php echo $feeddata->user->profile_picture; ?>" width="60" height="60" caption="Imagen de perfil" />&nbsp;&nbsp;<?php echo $feeddata->user->username; ?>
		</h3>
		
		<br>
		
		<img src="<?php echo $feeddata->images->low_resolution->url; ?>" width="<?php echo $feeddata->images->low_resolution->width; ?>" height="<?php echo $feeddata->images->low_resolution->height; ?>" />
		
		<p>&nbsp;</p>
		<p><strong>Título: </strong><?php echo @$feeddata->caption->text; ?></p>
		<p><strong>Comentarios: </strong><br>

		<?php 

		/**
		 * Recorremos el array donde tenemos los comentarios de las publicaciones.
		 * Read and print array with comments of publications.
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

	if(count($userpublications->data)==0)
	{
		echo "<h2>No existen datos del usuario</h2>";
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