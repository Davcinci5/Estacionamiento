/****************************************
CONVERTIR A MAYÚSCULAS TEXTO DE INPUT
****************************************/
function mayus(e) {
  e.value = e.value.toUpperCase();
}

$("#INPUTplacas").keyup(function(){
  mayus(document.getElementById('INPUTplacas'));
});

/**************************************
* CAMBIO DE CLASE AL CHECKBOX LAVADO  *
* CUANDO SE DA CLICK SOBRE EL         *
***************************************/
$("#fancy-checkbox-danger-custom-icons").click( function(){
  if( $(this).is(':checked') ) {
    $("#labelLavado").removeClass( "btn-danger");
    $("#labelLavado").addClass( "btn-success");
  } else {
    $("#labelLavado").removeClass( "btn-success");
    $("#labelLavado").addClass( "btn-danger");
  }
});

/***************************************************
* verificamos que por lo menos el campo de placas  *
* este requisitado para poder ingresar el vehículo *
***************************************************/
$("#btnIngreso").click(function(event) {
  if ($("#INPUTplacas").val()=="" || $("#selectbasic").val()=="Seleccione") {
    event.preventDefault();
    alert("Ingrese las placas y el tipo de vehículo por favor!");
  } else {
    $("#loginForm").submit();
    $('#loginForm').trigger("reset");
  }
});

/*************************************************
* verificamos que el campo de folio esté         *
* requisitado para poder buscar el vehículo      *
**************************************************/
$("#btnBuscar").click(function(event) {
  if ($("#txtBuscar").val()=="") {
    alert("Ingrese el folio a buscar por favor!");
  }
  // limpiamos los campos
  $('#cobroForm').trigger("reset");
});

$("#btnCobrar").click(function(e) {
  var pago = parseFloat($('#txtPagaCon').val());
  if (isNaN(pago)) {
    e.preventDefault(); // detiene el envío del formulario
    alert("Ingrese el pago por favor!");
  }
});

$("#txtAdicional").keyup(function(){
  var importe = parseFloat($('#importe').val());
  var adicional = $("#txtAdicional").val();
  $("#txtAdicional").val() == '' ? adicional = 0 : adicional = parseFloat($("#txtAdicional").val());
  $("#precioLavado").val() == '' ? lavado = 0 : lavado = parseFloat($("#precioLavado").val());
  $("#total").val(importe + adicional + lavado);
  calcularCambio();
});

function calcularCambio() {
    if(parseFloat($('#txtPagaCon').val()) > 0) {
    var pago = parseFloat($('#txtPagaCon').val());
    var total = parseFloat($('#total').val());
    $("#txtPagaCon").val() == '' ? pago = 0 : pago = parseFloat($("#txtPagaCon").val());
    $("#cambio").val(pago - total);
    }
}

$("#txtPagaCon").keyup(function(){
  var pago = parseFloat($('#txtPagaCon').val());
  if(parseFloat(pago) > parseFloat($('#total').val())) {
  var total = parseFloat($('#total').val());
  $("#txtPagaCon").val() == '' ? pago = 0 : pago = parseFloat($("#txtPagaCon").val());
  $("#cambio").val(pago - total);
} else {
  $("#cambio").val(0);
}
});

function isNumero(texto){
  if(isNaN(texto) == true || "" === texto.trim()) {
      return false;
  }
  return true;
}
