<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
if ($_SESSION['ventas']==1) {
 ?>
    <style type="text/css">
      fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
input{
  width: 100%;
}

    </style>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Clientes <button id="agregar" class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right" id="gcp">
    
  </div>
</div>

<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registrar graduacion de ojo</h4>
      </div>
      <div class="modal-body">
          <div class="row">             
            <div class="container">
              <div class="col-md-2">
                <label>Cod Cliente</label> 
            </div>
            <div class="col-md-10"> 
                <label>100024</label>
            </div>
              <div class="col-md-2">
                <label>Cliente</label> 
              </div>
              <div class="col-md-10"> 
                <label>JUAN MENDES BARBOZA</label>
              </div>
              <div class="col-md-2">
                <label>Agente</label> 
              </div>
              <div class="col-md-10"> 
                <label>BRAYAN ESPINOZA PORRAS</label>
              </div>
            </div>

            <div class="col-md-8"> 
              <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Graduacion del Cliente</legend>
                  <label>OPTOMETRA</label>
                     <select class="form-control select-picker" name="optometra" id="optometra">
                       <option value="DNI">DNI</option>
                       <option value="RUC">RUC</option>
                     </select><br>
                  <div class="control-group">
                     <table class="table">
                       <tr style="text-align: center;background-color: #DFF0D8">
                         <td style="width: 50px;"></td>
                         <td style="width: 50px;">Esfera</td>
                         <td style="width: 50px;">Cilindro</td>
                         <td style="width: 50px;">Eje</td>
                         <td style="width: 50px;">ADD</td>
                         <td style="width: 50px;">Esf.Cerc</td>
                         <td style="width: 50px;">DIP</td>
                         <td style="width: 50px;">DIP.Cerc</td>
                         <td style="width: 50px;">AV</td>
                       </tr>
                       <tr>
                         <td>O.D:</td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                       </tr>
                       <tr>
                         <td>O.I:</td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                         <td style="width: 50px;"><input type="" name=""></td>
                       </tr>
                     </table>                                    
                  </div>
              </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Registros</legend>
                  <div class="control-group">
                     <table class="table">
                       <tr style="text-align: center;background-color: #DFF0D8">
                         <td>#</td>
                         <td>Fechas</td>
                         <td></td>
                       </tr>
                       <tr>
                         <td>1</td>
                         <td>2016-11-18 00:31:38</td>
                         <td><i class="fas fa-eye"></i></td>
                       </tr>
                     </table>
                  </div>
              </fieldset>
            </div>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="registrar_consultas" tabindex="-1" role="dialog" aria-labelledby="registrar_consultas" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Registrar Consultas</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5">
            <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Registros</legend>
                     <table class="table">
                       <tr>
                         <td align="right">Tienda:</td>
                         <td>Optica Huancayo</td>
                       </tr>
                       <tr>
                         <td align="right">Cliente:</td>
                         <td>JUAN MENDES BARBOZA</td>
                       </tr>
                       <tr>
                         <td align="right">Agente:</td>
                         <td>BRAYAN ESPINOZA PORRAS</td>
                       </tr>
                       <tr>
                         <td align="right">Tipo de consulta:</td>
                         <td style="width: 299px;">
                           <select style="width: 200px;">
                             <option>Seleccionar</option>
                             <option>Medida de la vista | s/.20</option>
                             <option>Consulta Oftalmologica | s/. 39</option>
                             <option>Extraccion de cuerpo extra�o | s/. 60</option>
                             <option>Examenes | s/. 0</option>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td align="right">Optometra:</td>
                         <td style="width: 299px;">
                           <select style="width: 200px;">
                             <option>Seleccionar</option>
                             <option>DIANA </option>
                             <option>Jose Miguel</option>
                             <option>ROMARIO ALEXIS</option>
                             <option>ROSMERY</option>
                           </select>
                         </td>
                       </tr>
                     </table>
              </fieldset>
          </div>
          <div class="col-md-7">
            <fieldset class="scheduler-border">
                  <legend class="scheduler-border">Registros</legend>
                     <table class="table">
                       <tr>
                         <td align="right">Tienda:</td>
                         <td>Optica Huancayo</td>
                       </tr>
                       <tr>
                         <td align="right">Cliente:</td>
                         <td>JUAN MENDES BARBOZA</td>
                       </tr>
                       <tr>
                         <td align="right">Agente:</td>
                         <td>BRAYAN ESPINOZA PORRAS</td>
                       </tr>
                       <tr>
                         <td align="right">Tipo de consulta:</td>
                         <td style="width: 299px;">
                           <select style="width: 200px;">
                             <option>Seleccionar</option>
                             <option>Medida de la vista | s/.20</option>
                             <option>Consulta Oftalmologica | s/. 39</option>
                             <option>Extraccion de cuerpo extra�o | s/. 60</option>
                             <option>Examenes | s/. 0</option>
                           </select>
                         </td>
                       </tr>
                       <tr>
                         <td align="right">Optometra:</td>
                         <td style="width: 299px;">
                           <select style="width: 200px;">
                             <option>Seleccionar</option>
                             <option>DIANA </option>
                             <option>Jose Miguel</option>
                             <option>ROMARIO ALEXIS</option>
                             <option>ROSMERY</option>
                           </select>
                         </td>
                       </tr>
                     </table>
              </fieldset>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="generar_factura" tabindex="-1" role="dialog" aria-labelledby="generar_factura" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Generar Factura</h4>
      </div>
      <div class="modal-body">
        <h3>Modal Body</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Documento</th>
      <th>Numero</th>
      <th>Telefono</th>
      <th>Email</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Documento</th>
      <th>Numero</th>
      <th>Telefono</th>
      <th>Email</th>
    </tfoot>   
  </table>
</div>
<div class="row" id="datos" style="display: none;">
  <div class="col-md-8">
    <fieldset class="scheduler-border">
      <legend class="scheduler-border">Datos Cliente</legend>
      <div class="panel-body" style="height: 400px;" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Número Documento</label>
      <input class="form-control" type="text" name="num_documento" id="num_documento" maxlength="11" placeholder="Número de Documento">
    </div>
     <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo Dcumento</label>
     <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
       <option value="DNI">DNI</option>
       <option value="RUC">RUC</option>
     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12" id="ruc_dni">     
          <label for="">Nombre</label>
          <input class="form-control" type="hidden" name="idpersona" id="idpersona">
          <input class="form-control" type="hidden" name="tipo_persona" id="tipo_persona" value="Cliente">
          <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del cliente" required>         
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12" id="ruc_dni">     
          <label for="">Apellido Paterno</label>
          <input class="form-control" type="text" name="apellido_p" id="apellido_p" maxlength="100" placeholder="Apellido Paterno" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12" id="ruc_dni">     
          <label for="">Apellido Materno</label>
          <input class="form-control" type="text" name="apellido_m" id="apellido_m" maxlength="100" placeholder="Apellido Paterno" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Direccion</label>
      <input class="form-control" type="text" name="direccion" id="direccion" maxlength="70" placeholder="Direccion">
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Telefono</label>
      <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="Número de Telefono">
    </div>
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Email</label>
      <input class="form-control" type="email" name="email" id="email" maxlength="50" placeholder="Email">
    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>

      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>

      <button class="btn btn-success" type="button" id="buscar_persona" onclick="buscar_datos()"><i class="fas fa-search"></i> Buscar</button>
    </div>
  </form>
</div>
  </fieldset>
    
  </div>
  <div class="col-md-4">
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Factura/Pedidos:</legend>
    <table class="table">
        <tr style="text-align: center;background-color: #DFF0D8">
            <td>#</td>
            <td>Fechas</td>
            <td></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2016-11-18 00:31:38</td>
            <td><i class="fas fa-eye"></i></td>
        </tr>
    </table>
</fieldset>
  </div>
</div>
<!--fin centro-->
      </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 
}else{
 require 'noacceso.php'; 
}
require 'footer.php';
 ?>
 <script src="scripts/cliente.js"></script>
 <?php 
}

ob_end_flush();
  ?>
