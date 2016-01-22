<?php

if (!isset($_SESSION['AccessToken']))
{
	/**
	* Si no existe la sesión AccessToken, lo redirigiremos al archivo correspondiente para llevarlo a la Api de Instagram
	* If not exists AccessToken session, redirect to file redirect.php to Instagram API.
	**/

	header('Location: ../redirect.php?op=getauth');
	die();
}

?>