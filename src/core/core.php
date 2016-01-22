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
 * Aquí recogemos todos los archivos comunes en todas las pantallas.
 *
 * (EN)
 * 
 * Here are common files.
 * 
 */

/*
 * Iniciamos la sesión y requerimos el archivo que comprueba el AccessToken necesario para cualquier acción.
 * Initialize session and require the file that checks the Access Token necessary for any action.
*/

session_start();

require_once '../_includes/checkAuth.php';

/**
 * Requerimos la clase InstaLogin y creamos el objeto Instagram.
 * Require InstaLogin class and create Instagram object
**/

if(isset($createObjectInstagram) && $createObjectInstagram == true)
{
	require_once '../class/Class.InstaLogin.php';
	$instagram  = new Instagram();
}

include_once '../_includes/header.php';
include_once '../_includes/leftmenu.php';