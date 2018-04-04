<?php
/***********************************
* VENTANA MODAL PARA MOSTRAR EL   *
* TICKET DE COBRO                 *
***********************************/
?>

<div class="modal fade" id="modalOculto" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalles de cobro</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="cobroCode.php" method="post" id="cobroForm">
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >FOLIO:</label>
            <div class="col-md-3">
              <input id="folioSalida" name="miFolio" type="text" placeholder="" class="form-control input-md gris" disabled>
            </div>
            <label class="col-md-2 control-label" for="name" >Placas:</label>
            <div class="col-md-3">
              <input id="placasSalida" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >Entrada:</label>
            <div class="col-md-3">
              <input id="fechaEntradaPreliminar" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
            <label class="col-md-2 control-label" for="name" >Hora:</label>
            <div class="col-md-3">
              <input id="horaEntradaPreliminar" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >Salida:</label>
            <div class="col-md-3">
              <input id="fechaSalidaPreliminar" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
            <label class="col-md-2 control-label" for="name" >Hora:</label>
            <div class="col-md-3">
              <input id="horaSalidaPreliminar" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >Lavado:</label>
            <div class="col-md-3">
              <input id="isLavado" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
            <label class="col-md-2 control-label" for="name" >Precio:</label>
            <div class="col-md-3">
              <input id="precioLavado" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >Tiempo:</label>
            <div class="col-md-3">
              <input id="tiempo" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
            <label class="col-md-2 control-label" for="name" >Importe:</label>
            <div class="col-md-3">
              <input id="importe" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name" >Adicional:</label>
            <div class="col-md-3">
              <input id="descripcionAdicional" name="descripcionAdicional" type="text" placeholder="descripción" class="form-control input-md" >
            </div>
            <label class="col-md-2 control-label" for="name" >Adicional:</label>
            <div class="col-md-3">
              <input id="txtAdicional" name="txtAdicional" type="text" placeholder="monto" class="form-control input-md" value=0 >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label" for="name">Paga con:</label>
            <div class="col-md-3">
              <input id="txtPagaCon" name="txtPagaCon" type="text" placeholder="" class="form-control input-md" required="" value=0>
            </div>
            <label class="col-md-2 control-label" for="name" >Total:</label>
            <div class="col-md-3">
              <input id="total" name="name" type="text" placeholder="" class="form-control input-md" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 col-md-offset-5 control-label" for="name" >Cambio:</label>
            <div class="col-md-3">
              <input id="cambio" name="name" type="text" placeholder="" class="form-control input-md" disabled value=0>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success form-control" id="btnCobrar">Cobrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
