<html>
<head>
<meta charset="utf-8">
<title>Consulta Reniec</title>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
</head>
 
	<body>
	 
	<form method="post">
		<input type="text" class="dni" id="dni" name="dni">
		<button id="buscar_nombre" class="botoncito">Enviar</button>
	</form>
	 
	<div id="mostrar_dni">Aqui se mostrara el dni Consultado</div>
	<div>APELLIDO PATERNO: <span id="paterno"></span></div>
	<div>APELLIDO MATERNO: <span id="materno"></span></div>
	<div>NOMBRES COMPLETOS: <span id="nombres"></span></div>
	 
	<script>

	$(document).ready(function() {
		$("#buscar_nombre").on('click', function() {
			event.preventDefault();
    		$.ajax({
			  method: "POST",
			  url: "consulta.php",
			  data: { dni: $("#dni").val()}
			})
			  .done(function( msg ) {
			    console.log(msg);
			  });
    	});
	});
	</script>
	 
	</body>
</html>