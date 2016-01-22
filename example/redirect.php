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
 * Este archivo tiene dos funcionalidades principales:
 * 1 - Si el usuario no se ha identificado o dado permiso a Instagram será redireccionado de nuevo a Instagram.
 * 2 - Una vez sea autorizado por la API de Instagram, la propia API le redirigirá a esta aplicación con el Access Token para poder guardar la sesión
 * Es necesario que Instagram le proporcione el Access Token para poder usar las funcionalidades de InstaLogin PHP.
 *
 * (EN)
 * 
 * This script servers two main functionalities
 * 1 - If user has not been autheticated by Instagram then it will redirect user to Instagram server
 * 2 - Once Instagram authrizes user then it will get code returned by instagram, get Access Token and save it into the session
 * It is necessary that Instagram provides the Access Token to use PHP InstaLogin functionality.
 * 
 */

session_start();

require_once '../src/_includes/config.php';
require_once '../src/class/Class.InstaLogin.php';


if(isset($_GET['error']) && $_GET['error'] != "")
{
	/**
	 * Comprobamos si existe algún error en la variable global GET para cortar el script.
	 * Here check if exists any error in global var GET to exit of script.
	*/

	echo "Necesita dar permiso a la aplicación para continuar ;)";
	exit();
}

if(isset($_GET['code']) && $_GET['code'] != "")
{
	
	/**
	 * Comprobamos si en la variable global GET vuelve de Instagram con el código de acceso (Access Token)
	 * Este Access Token lo necesitaremos durante todo el script para realizar las funciones sobre la API
	 * 
	 * Here check if var GET returns with Access Token
	 * So use this code to get Access Token from script for further opeartions with Instagram API
	 */

	/** 
	 * Inicializamos el objeto Instagram para comprobar si el código que viene por variable GET es una sesión válida
	 * Initialize Instagram object to check var GET code is a valid session.
	*/

	$instagram  = new Instagram();
	$accesstoken = $instagram->getAccessTokenFromCode($_GET['code']);

	if($accesstoken != "")
	{
		/** 
	 	* Si es correcta la sesión, guardaremos los datos principales que nos devuelve el API (Id usuario, Nombre, Imagen de perfil..)
	 	* 
	 	* If is valid session, we get data of Instagram API (User ID, Profile name, Image profile..)
		*/

		$_SESSION['AccessToken'] = $accesstoken;
		$_SESSION['UserId'] 	 = $instagram->getUserId();
		$_SESSION['FullName']	 = $instagram->getUserFullName();
		$_SESSION['Thumbnail'] 	 = $instagram->getUserThumb();
		
		header("Location: index.php");
		exit();
	}
	
}

/**
 * Si nos devuelve la variable 'op' con el valor getauth significa que el usuario no ha sido autorizado 
 * y debemos redirigirlo de nuevo al servidor de Instagram.
 * 
 * If op is set to "getauth" it means user has not been authorized so we need to redirect user to Instagram server
 * and get authorization code
 *
 */

if(isset($_GET['op']) && $_GET['op'] == "getauth")
{
	header("Location: ".sprintf($urlconfig['authorization_url'],$appconfig['client_id'],$appconfig['redirect_url']));
	exit();	
}

?>