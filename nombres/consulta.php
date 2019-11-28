<?php 
	
	if ($_POST) {
		
		switch ($_POST['tipo_documento']) {
			case 'DNI':
				$dni = $_POST['num_documento'];

				$cookie_file = "tmp/".time();

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://rutificadorperu.com/');
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept-Language: es-es, en"));
				curl_setopt($ch, CURLOPT_TIMEOUT, 10);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
				curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
				$result = curl_exec($ch);
				$error = curl_error($ch);
				curl_close($ch);
				preg_match_all("(<input type=\"hidden\" name=\"csrf_token\" value=\"(.*)\" />)", $result, $matches1);
				$return = trim($matches1[1][0]);
				//echo ($return);

				//Iniciar session
				//
				$url = "https://rutificadorperu.com/dni/resultadoDNI/";
				$parametros_post = 'dni='.urlencode($dni).'&csrf_token='.urlencode($return);
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

				if ($apellido_paterno != "" && $apellido_materno != "" && $nombres != "") {
					//$retornar_datos = true;					
					$devolver_datos = array("apellido_paterno"=>$apellido_paterno, "apellido_materno" => $apellido_materno, "nombres" => $nombres, "documento"=> "dni", "retornar_datos"=> true);
				}
				else{
					//$retornar_datos = false;
					$devolver_datos = array("apellido_paterno"=> "No", "apellido_materno" => "No", "nombres" => "No", "documento"=> "dni", "retornar_datos"=> false);
				}

				


				echo json_encode($devolver_datos, JSON_FORCE_OBJECT);

				//echo $apellido_paterno;
				//
		break;
							
		case 'RUC':
			
				$ruc = $_POST['num_documento'];
				
				$url = "http://negocioscastillo.com/php/servicesperu/sunatRUC/";
				$parametros_post = 'numero='.urlencode($ruc).'&hdOpcion='.urlencode("ruc"). '&btnConsultar='.urlencode("Consultar RUC");
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros_post);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);	
				$return1 = curl_exec($ch);
				$error = curl_error($ch);
				curl_close($ch);
				echo $error;


				preg_match_all("(id=\"txtRazonSocial\" class=\"form-control input-sm\" value=\"(.*)\" />)", $return1, $array_datos);

				preg_match_all("(id=\"txtDirecionDomicilioFiscal\" class=\"form-control input-sm\" value=\"(.*)\" />)", $return1, $array_datos_direccion);

				$razon_social = trim($array_datos[1][0]);
				$direccion = trim($array_datos_direccion[1][0]);

				header('Content-Type: application/json');

				if ($razon_social != "" && $direccion != "") {
					$retornar_datos = true;
				}
				else{
					$retornar_datos = false;
				}

				$devolver_datos = array("razon_social"=>$razon_social, "direccion" => $direccion, "documento"=>"ruc", "retornar_datos"=> $retornar_datos);


				echo json_encode($devolver_datos, JSON_FORCE_OBJECT);

			break;
		}				

	}


