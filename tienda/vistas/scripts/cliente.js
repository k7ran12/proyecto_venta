var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();
   listarArticulos();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   });

   $(".nav li").on("click", function(){
   		$(".nav li").removeClass("active");
   		$(this).addClass('active');
   		console.log($(this).text());
   		$("#factura_datos").empty();
   		if ($(this).text() == "Lunas") {
   			$("#tblarticulos").hide();
   			$("#tblarticulos_wrapper").hide();
   			$("#factura_datos").append('<div id="Lunas"><h1>Lunas</h1><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Nombre</label><input class="form-control" type="hidden" name="idcategoria" id="idcategoria">      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required></div><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Descripcion</label><input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripcion"></div><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button></div></div>');
   		}
   		else if ($(this).text() == "Consulta") {
   			$("#tblarticulos").hide();
   			$("#tblarticulos_wrapper").hide();
   			$("#factura_datos").append('<div id="Consulta"><h1>Consulta</h1><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Nombre</label><input class="form-control" type="hidden" name="idcategoria" id="idcategoria">      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required></div><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Descripcion</label><input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripcion"></div><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button></div></div>');
   		}
   		else if ($(this).text() == "Extras") {
   			$("#tblarticulos").hide();
   			$("#tblarticulos_wrapper").hide();
   			$("#factura_datos").append('<div id="Extras"><h1>Extras</h1><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Nombre</label><input class="form-control" type="hidden" name="idcategoria" id="idcategoria">      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required></div><div class="form-group col-lg-6 col-md-6 col-xs-12"><label for="">Descripcion</label><input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripcion"></div><div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"><button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button></div></div>');
   		}
   		else{	 			
   			$('#tblarticulos').show();
   			$("#tblarticulos_wrapper").show();   			
   		}
   })

   $( "#tipo_documento" ).change(function() {
   	//alert($(this).val());
	  if ($(this).val() == "RUC") {
	  	$("#ruc_dni").empty();
	  	$("#ruc_dni").html('<label for="">Nombre</label><input class="form-control" type="hidden" name="idpersonad" id="idpersona"><input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente"><input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required>');
	  	$("#direccion").val("");
	  	$("#num_documento").val("");
	  }else{
	  	$("#ruc_dni").empty();
	  	$("#ruc_dni").html('<div class="row"><div class="col-md-4"><label for="">Nombre</label><input class="form-control" type="hidden" name="idpersona" id="idpersona"><input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente"><input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required></div><div class="col-md-4"><label for="">Apellido Paterno</label><input class="form-control" type="text" name="apellido_p" id="apellido_p" maxlength="100" placeholder="Apellido Paterno" required></div><div class="col-md-4"><label for="">Apellido Materno</label><input class="form-control" type="text" name="apellido_m" id="apellido_m" maxlength="100" placeholder="Apellido Paterno" required></div></div>');
	  	$("#direccion").val("");

	  }
	});

   $( "#num_documento" ).keyup(function() {
   		console.log($(this).val());
   		if ($(this).val().length == 8) {
   			$("#tipo_documento").val("DNI");
   			$("#ruc_dni").empty();
		  	$("#ruc_dni").html('<div class="row"><div class="col-md-4"><label for="">Nombre</label><input class="form-control" type="hidden" name="idpersona" id="idpersona"><input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente"><input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required></div><div class="col-md-4"><label for="">Apellido Paterno</label><input class="form-control" type="text" name="apellido_p" id="apellido_p" maxlength="100" placeholder="Apellido Paterno" required></div><div class="col-md-4"><label for="">Apellido Materno</label><input class="form-control" type="text" name="apellido_m" id="apellido_m" maxlength="100" placeholder="Apellido Paterno" required></div></div>');
		  	$("#direccion").val("");

   		}
   		else if ($(this).val().length == 11) {
   			$("#tipo_documento").val("RUC");
   			$("#ruc_dni").empty();
		  	$("#ruc_dni").html('<label for="">Nombre</label><input class="form-control" type="hidden" name="idpersonad" i="idpersona"><input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente"><input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required>');
		  	$("#direccion").val("");
		  	//$("#num_documento").val("");
   		}
	});
}

function buscar_datos(){
	var v_num_documento = $("#num_documento").val();
	var v_tipo_documento = $("#tipo_documento option:selected").val();
	
	if (v_num_documento.length == 8 && v_tipo_documento == "DNI" || v_num_documento.length == 11 && v_tipo_documento == "RUC" ) {
			$.ajax({
		  url: "../../nombres/consulta.php",
		  type:"POST",
		  data: { num_documento : v_num_documento, tipo_documento : v_tipo_documento},
		  success: function(data){
		    console.log(JSON.stringify(data));    

		    if (data.retornar_datos == true) {
		    	 if (data.documento == "ruc") {
			    	$("#nombre").val(data.razon_social);
			    	$("#direccion").val(data.direccion);
		    	}else{
			    	$("#nombre").val(data.nombres);
				    $("#apellido_p").val(data.apellido_paterno);
				    $("#apellido_m").val(data.apellido_materno);
				    $("#direccion").val("");
		    	}
		    }
		    else{
		    	alert("No hay datos rata");
		    	$("#nombre").val("");
		    	$("#direccion").val("");
		    }
		   
		  }
		})
	}
	else{
		alert("Ingrese bien los digitos del documento")
	}
  
}

//funcion limpiar
function limpiar(){

	$("#nombre").val("");
	$("#num_documento").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#email").val("");
	$("#idpersona").val("");
}

//funcion mostrar formulario 
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#datos").hide();	
		$("#formularioregistros").hide();
		$("#btnagregar").show();
		$("#gcp").empty();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//Listar productos

//funcion listar
function listarArticulos(){
	tabla=$('#tblarticulos').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [

		],
		"ajax":
		{
			url:'../ajax/venta.php?op=listarArticulos',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/persona.php?op=listarc',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/persona.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}

function agregarDetalle(idarticulo,articulo,precio_venta){
	var cantidad=1;
	var descuento=0;
	var impuesto=18;
	var cont=0;
	var detalles=0;

	if (idarticulo!="") {
		var subtotal=cantidad*precio_venta;
		var fila='<tr class="filas" id="fila'+cont+'">'+
        '<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
        '<td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td>'+
        '<td><input type="number" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
        '<td><input type="number" name="precio_venta[]" id="precio_venta[]" value="'+precio_venta+'"></td>'+
        '<td><input type="number" name="descuento[]" value="'+descuento+'"></td>'+
        '<td><span id="subtotal'+cont+'" name="subtotal">'+subtotal+'</span></td>'+
        '<td><button type="button" onclick="modificarSubtotales()" class="btn btn-info"><i class="fa fa-refresh"></i></button></td>'+
		'</tr>';
		cont++;
		detalles++;
		$('#detalles').append(fila);
		modificarSubtotales();

	}else{
		alert("error al ingresar el detalle, revisar las datos del articulo ");
	}
}

function eliminarDetalle(indice){
$("#fila"+indice).remove();
calcularTotales();
detalles=detalles-1;

}
function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var total=0.0;

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
	}
	$("#total").html("S/." + total);
	$("#total_venta").val(total);
	evaluar();
}

function modificarSubtotales(){
	var cant=document.getElementsByName("cantidad[]");
	var prev=document.getElementsByName("precio_venta[]");
	var desc=document.getElementsByName("descuento[]");
	var sub=document.getElementsByName("subtotal");


	for (var i = 0; i < cant.length; i++) {
		var inpV=cant[i];
		var inpP=prev[i];
		var inpS=sub[i];
		var des=desc[i];


		inpS.value=(inpV.value*inpP.value)-des.value;
		document.getElementsByName("subtotal")[i].innerHTML=inpS.value;
	}

	calcularTotales();
}

function mostrar(idpersona){
	$("#datos").show();
	$("#gcp").html('<div class="btn-group" role="group" style="margin-top: 3%;"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#largeModal"><i class="fas fa-glasses"></i>&nbsp;Graduacion</button><button type="button" class="btn btn-default" data-toggle="modal" data-target="#registrar_consultas"><i class="fas fa-bullhorn"></i>&nbsp;Consultas</button><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_venta">Pedidos Fac. <i class="fas fa-dollar-sign"></i></button></div>');
	$.post("../ajax/persona.php?op=mostrar",{idpersona : idpersona},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			console.log(data);

			$("#nombre").val(data.nombre);
			$("#apellido_p").val(data.apellido_paterno);
			$("#apellido_m").val(data.apellido_materno);
			$("#tipo_documento").val(data.tipo_documento);
			$("#tipo_documento").selectpicker('refresh');
			$("#num_documento").val(data.num_documento);
			$("#direccion").val(data.direccion);
			$("#telefono").val(data.telefono);
			$("#email").val(data.email);
			$("#idpersona").val(data.idpersona);
		})
}


//funcion para desactivar
function eliminar(idpersona){
	bootbox.confirm("¿Esta seguro de eliminar este dato?", function(result){
		if (result) {

			$.post("../ajax/persona.php?op=eliminar", {idpersona : idpersona }, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}


init();