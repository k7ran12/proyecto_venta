<?php 
				$url = "http://negocioscastillo.com/php/servicesperu/sunatRUC/";
				$parametros_post = 'numero='.urlencode(20100070970).'&hdOpcion='.urlencode("ruc"). '&btnConsultar='.urlencode("Consultar RUC");
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_post);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
				curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
				$return1 = curl_exec($ch);
				$error = curl_error($ch);
				curl_close($ch);
				echo $error;


				preg_match_all("(<td>(.*)</td>)", $return1, $array_datos);

				$apellido_paterno = trim($array_datos[1][0]);
				$apellido_materno = trim($array_datos[1][1]);
				$nombres = trim($array_datos[1][2]);

				header('Content-Type: application/json');

				$devolver_datos = array("apellido_paterno"=>$apellido_paterno, "apellido_materno" => $apellido_materno, "nombres" => $nombres);


				echo json_encode($return1, JSON_FORCE_OBJECT);