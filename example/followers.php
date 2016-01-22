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
 * Archivo para mostrar los seguidores del usuario
 *
 * (EN)
 * 
 * File to get all followers of user
 * 
 */

/**
 * Incluimos el archivo core.php que es donde están todas las funciones y archivos comunes. Ponemos a true la variable que indica que creemos el objeto $instagram
 * Include file core.php with common files and functions. Set true the var $createObjectInstagram to create a object of this class.
*/

$createObjectInstagram = true;
include_once('../src/core/core.php');

/**
 * Usamos el objeto $instagram creado en core.php y sacamos los usuarios que SIGUEN al usuario. El valor que le pasamos es el número de resultados que queremos.
 * Use object $instagram create in core.php and get last FOLLOWERS of user. The value in function is number of results.
**/

$followedbydata = json_decode($instagram->getFollowedBy(20));

?>
<div id="content">
	<div id="content_top"></div>

	<div id="content_main">

	<?php 

    /**
     * Recorremos el array donde tenemos todos los usuarios que siguen al usuario y los vamos imprimiendo.
     * Read array with all followers users of Instagram user and print on the body
    **/

	foreach ($followedbydata->data as $feeddata)
	{

	?>
		<h2>&nbsp; </h2>
		<p>&nbsp;</p>
	    <h3>
	    	<img src="<?php echo $feeddata->profile_picture; ?>" width="60" height="60" caption="Imagen de perfil" />&nbsp;&nbsp;<?php echo $feeddata->username; ?>
		</h3>
		<p>&nbsp;</p>
		<p><strong>Full Name: </strong><?php echo $feeddata->full_name; ?></p>
		<p>&nbsp;</p>

	<?php 

	}

	if(count($followedbydata->data)==0)
	{
		
		echo "<h2>Ahora mismo no tiene seguidores.</h2>";
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