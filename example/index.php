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
 * Incluimos el archivo core.php que es donde están todas las funciones y archivos comunes. Ponemos a true la variable que indica que creemos el objeto $instagram
 * Include file core.php with common files and functions. Set true the var $createObjectInstagram to create a object of this class.
*/

$createObjectInstagram = false;
include_once('../src/core/core.php');

?>
	
	
	<div id="content">
        
        
        <div id="content_top"></div>
        
        <div id="content_main">
        	<h2>Use los enlaces del menú para navegar por la demostración de la API de Instagram con PHP.</h2>
        	<p>&nbsp;</p>
           	<p>&nbsp;</p>       	  
			<p>&nbsp;</p>
        </div>
	
	
	
<?php 

/**
 * Requerimos pie de página
 * Require footer
**/

include_once '../src/_includes/footer.php';

?>