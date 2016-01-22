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
 * Archivo para sacar las publicaciones del usuario y mostrarlas en un mapa de Google
 *
 * (EN)
 * 
 * File to get publications of user and show them in Google Maps
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

	<script type="text/javascript">

	 function initialize()
	 {

		var mapOptions =
		{
			mapTypeId: google.maps.MapTypeId.ROADMAP  
		}

		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		var LatLongList = [
		                 
			<?php 

				/**
				* Recorremos el array donde tenemos todas las publicaciones del usuario y vamos insertando en un array javascript que luego leerá Google maps.
				* Read array with publications of Instagram user and add on a javascript array then read Google maps.
				**/

		    	$counter = 1;
		        $arraydata = "";

		        foreach ($userpublications->data as $feeddata)
		        {
			        if($feeddata->location) 
			        {
						$arraydata.= "['".str_replace("'", "\'", @$feeddata->caption->text)."',".@$feeddata->location->latitude.",".@$feeddata->location->longitude.",".$counter.",'".@$feeddata->images->low_resolution->url."',".@$feeddata->images->low_resolution->width.",".@$feeddata->images->low_resolution->height."],"; 

						$counter++;	
			        }
				}
		                 
				if($arraydata)
				{
					$arraydata = substr($arraydata, 0,strrpos($arraydata, ","));
				}
		               
				echo $arraydata;
		                 
			?>

		];
		
		<?php 
			
			if($counter==1)
			{
			
				/**
				* Si entramos aquí es porque no tiene ninguna publicación geolocalizada
				* If we are here is because user not have any publication with added location.
				*/
				echo "alert('No dispone de ninguna publicación con localización');";
			}

		?>	

				/**
				* Añadimos en el array todos los datos relacionados con las publicaciones geolocalizadas
				* Add in array all data with media geolocation
				*/

			  var image = 'http://googlemaps.googlermania.com/img/google-marker-big.png';
			  var shadow  = 'http://googlemaps.googlermania.com/img/google-marker-big-shadow.png';

			  var bounds = new google.maps.LatLngBounds ();
			  var markersArray = [];
			  
			  for (var i = 0; i < LatLongList.length; i++) {

				    var photolocation = LatLongList[i];

				    bounds.extend (new google.maps.LatLng (photolocation[1],photolocation[2]));
				    
				    var myLatLng = new google.maps.LatLng(photolocation[1], photolocation[2]);

				    var marker = new google.maps.Marker({
				        position: myLatLng,
				        map: map,
				        shadow: shadow,
				        icon: image,
				        title: photolocation[0],
				        zIndex: photolocation[3]
				    });

				    var contentString = '<div id="content">'+
				    '<div id="siteNotice">'+
				    '</div>'+
				    '<h2 id="firstHeading" class="firstHeading">'+photolocation[0]+'</h2>'+
				    '<div id="bodyContent"><img src="'+photolocation[4]+'" width='+photolocation[5]+' height='+photolocation[6]+'></div></div>';

				    marker.html = contentString;

				    markersArray.push(marker);    
			  }

			var infowindow = null;

			infowindow = new google.maps.InfoWindow({
				content: ""
			});

			for (var i = 0; i < markersArray.length; i++)
			{
				var marker = markersArray[i];

				google.maps.event.addListener(marker, 'click', function () {
					infowindow.setContent(this.html);
					infowindow.open(map, this);
				});

			}

			map.fitBounds (bounds);

		}

		/** 
		* Inicializamos el mapa de Google
		* Initialize Google Maps
		**/
	 
	 </script>

	<div id="map_canvas" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>

</div>

<?php 

/**
 * Requerimos pie de página
 * Require footer
**/

include_once '../src/_includes/footer.php';

?>