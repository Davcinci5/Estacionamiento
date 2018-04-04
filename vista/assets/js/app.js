//$(document).ready(function() {

  $("#loginForm").on("submit", function(e){
    e.preventDefault();
    setLogoTicket('logoEstacionamiento');
  })

  $("#cobroForm").on("submit", function(e){
    e.preventDefault();
    setLogoTicket('logoEstacionamientoCliente');
    $('.gris').each(function(e) {
        $(this).removeAttr('disabled');
    })
  })

  $("#buscaCortesForm").on("submit", function(e){
    e.preventDefault();
  })

  /******************************************************
  * asociamos un evento al formulario, en este caso el *
  * evento generado al presionar el botón submit e     *
  * indicamos el codigo que se ejecutará cada vez que  *
  * ocurra tal evento                                  *
  ******************************************************/
  $("#loginForm").bind("submit", function() {

    if($(this).attr("action") === "ingresoCode.php") {
      $.ajax({

        /****************************************************
        * this se refiere al formulario, del cual tomamos  *
        * el valor del atributo que necesesitamos          *
        ****************************************************/
        type: $(this).attr("method"),
        url: $(this).attr("action"),

        ///////////////////////////////////////////////////////
        // Enviamos todos los campos que tenga el formulario //
        ///////////////////////////////////////////////////////
        data: $(this).serialize(),
        beforeSend: function() {
          $("#loginForm button[type=submit]").html("enviando...");
          $("#loginForm button[type=submit]").attr("disabled", "disabled");
        },
        ////////////////////////////////////////////////////////////
        // En caso de que la peticion se haya realizado con éxito //
        ////////////////////////////////////////////////////////////
        success: function(data, textStatus, jqXHR) {
          if(data.estado == 'true') {
            /*
            Ingresamos los datos de la configuracion actual para el ticket
            en la vista de ficha de ingreso e imprimimos la ficha
            */
            $("#encabezado").html(data.encabezado);
            $("#folio").html(data.folio);
            $("#placas").html(data.placas);
            $("#cajon").html(data.cajon);
            $("#tipo").html(data.tipo);
            $("#modelo").html(data.modelo);
            $("#color").html(data.color);
            $("#hora").html(data.hora);
            $("#fecha").html(data.fecha);
            if(data.lavado == 1) {
              $("#lavado").html('Si');
            } else {
              $("#lavado").html('No');
            }
            $("#observaciones").html(data.observaciones);
            $("#pie").html(data.pie);

            $("#miFicha").removeClass("vacia");
            $("#miFicha").addClass("ficha");
            window.print();
            $("#miFicha").removeClass("ficha");
            $("#miFicha").addClass("vacia");

            $("#encabezado").html("");
            $("#folio").html("");
            $("#placas").html("");
            $("#cajon").html("");
            $("#tipo").html("");
            $("#modelo").html("");
            $("#color").html("");
            $("#hora").html("");
            $("#fecha").html("");
            $("#lavado").html("");
            $("#observaciones").html("");
            $("#pie").html("");

            $("body").overhang({
              type: "success",
              message: "Vehículo ingresado!"
            });

            $("#labelLavado").removeClass( "btn-success");
            $("#labelLavado").addClass( "btn-danger");

            // Actualizamos el folio disponible a mostrar en la vista de vehiculos
            $("#txtFolio").val(parseInt(data.folio) + 1);

          } else {
            $("body").overhang({
              type: "error",
              message: "No se ha podido ingresar el vehículo"
            });
          }
          $("#loginForm button[type=submit]").html("Ingresar");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          $("body").overhang({
            type: "error",
            message: "Servidor no responde!"
          });
          $("#loginForm button[type=submit]").html("Ingresar");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        }
      });
    }

    if($(this).attr("action") === "validarCode.php") {
      $.ajax( {

        type: $(this).attr("method"),
        url: $(this).attr("action"),

        data: $(this).serialize(),
        beforeSend: function() {
          $("#loginForm button[type=submit]").html("enviando...");
          $("#loginForm button[type=submit]").attr("disabled", "disabled");
        },
        success: function(data, textStatus, jqXHR) {
          if(data.estado == 'true') {
            $("body").overhang({
              type: "success",
              message: "Usuario encontrado, te estamos redirigiendo ...",
              callback: function() {
                window.location.href = "vehiculos.php";
              }
            });
          } else {
            $("body").overhang({
              type: "error",
              message: "Usuario o password incorrecto!"
            });
          }
          $("#loginForm button[type=submit]").html("Ingresar");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
          console.log(jqXHR);
          $("body").overhang({
            type: "error",
            message: "Servidor no responde!"
          });
          $("#loginForm button[type=submit]").html("Ingresar");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        }
      } );
    }

  } )
  /////////////////////////////////////////////////////////////////////////
  // Procesamos la busqueda del folio para la salida de un vehiculo      //
  /////////////////////////////////////////////////////////////////////////

  $("#salidaForm").bind("submit", function() {
    if($(this).attr("action") === "buscarCode.php") {
      $.ajax({

        /****************************************************
        * this se refiere al formulario, del cual tomamos  *
        * el valor del atributo que necesesitamos          *
        ****************************************************/
        type: $(this).attr("method"),
        url: $(this).attr("action"),

        ///////////////////////////////////////////////////////
        // Enviamos todos los campos que tenga el formulario //
        ///////////////////////////////////////////////////////
        data: $(this).serialize(),
        beforeSend: function() {
        $("#salidaForm button[type=submit]").html("enviando...");
        $("#salidaForm button[type=submit]").attr("disabled", "disabled");
      },
      ////////////////////////////////////////////////////////////
      // En caso de que la peticion se haya realizado con éxito //
      ////////////////////////////////////////////////////////////
      success: function(data, textStatus, jqXHR) {
        console.log(data);
        $('#salidaForm').trigger("reset");
        if(data.estado == 'true') {
          $('#modalOculto').modal('show');
          /*
          Ingresamos los datos de salida preliminares para el ticket
          en la vista de ticket de cobro
          */
          $("#folioSalida").val(data.folio);
          $("#placasSalida").val(data.placas);
          $("#horaEntradaPreliminar").val(data.hora_entrada);
          $("#fechaEntradaPreliminar").val(data.fecha_entrada);
          $("#horaSalidaPreliminar").val(data.hora_salida);
          $("#fechaSalidaPreliminar").val(data.fecha_salida);
          $("#tiempo").val(data.tiempo);
          $("#importe").val(data.cobro['importe']);
          $("#total").val(data.cobro['importe']);
          if(data.lavado === '1'){
            $("#isLavado").val("Si");
            $("#precioLavado").val(data.cobro['lavado']);
            $("#total").val(parseFloat(data.cobro['importe']) + parseFloat(data.cobro['lavado']));
          } else {
            $("#isLavado").val("No");
            $("#precioLavado").val('0');
          }
        } else {
          $("#folioSalida").val("");
          $("#placasSalida").val("");
          $("#horaSalida").val("");
          $("#fechaSalida").val("");
          $("body").overhang({
            type: "error",
            message: data.error
          });
        }
        $("#salidaForm button[type=submit]").html("Buscar");
        $("#salidaForm button[type=submit]").removeAttr("disabled");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        $("body").overhang({
          type: "error",
          message: "Servidor no responde!"
        });
        $("#salidaForm button[type=submit]").html("Buscar");
        $("#salidaForm button[type=submit]").removeAttr("disabled");
      }
    });
  }

  /////////////////////////////////////
  // Cancela el envio del formulario //
  /////////////////////////////////////
  return false;
}
)

/**
* FORMULARIO DE COBRO DE TICKET
*/
$("#cobroForm").on("submit", function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById("cobroForm"));

  $('.gris').each(function(e) {
      $(".gris").attr("disabled", true);
  });

  $.ajax( {
    type: 'post',
    url: 'cobroCode.php',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function() {
      $("#cobroForm button[type=submit]").html("enviando...");
      $("#cobroForm button[type=submit]").attr("disabled", "disabled");
    },
    success: function(data, textStatus, jqXHR) {
      $('#cobroForm').trigger("reset");
      if(data.estado == 'true') {
        $('#modalOculto').modal('hide');

        /*
        Ingresamos los datos en el ticket
        en la vista de ticketCobroCliente e imprimimos el ticket
        */
        $("#encabezadoCliente").html(data.encabezado);
        $("#folioCliente").html(data.folio);
        $("#placasCliente").html(data.placas);
        $("#cajonCliente").html(data.cajon);
        $("#tipoCliente").html(data.tipo);
        $("#modeloCliente").html(data.modelo);
        $("#colorCliente").html(data.color);
        $("#horaCliente").html(data.hora_entrada);
        $("#fechaCliente").html(data.fecha_entrada);
        $("#horaSalidaCliente").html(data.hora_salida);
        $("#fechaSalidaCliente").html(data.fecha_salida);
        $("#tiempoCliente").html(data.tiempo);
        $("#adicionalDescripcionCliente").html(data.adicionalDescripcion);
        data.adicionalMonto === '' ? $("#adicionalMontoCliente").html('0') : $("#adicionalMontoCliente").html(data.adicionalMonto)
        $("#importeCliente").html(data.importe);
        $("#lavadoPrecioCliente").html(data.precioLavado);
        $("#totalCliente").html(data.total);
        $("#pagoCliente").html(data.pago);
        $("#cambioCliente").html(data.cambio);

        if(data.lavado == 1) {
          $("#lavadoCliente").html('Si');
        } else {
          $("#lavadoCliente").html('No');
        }
        $("#observacionesCliente").html(data.observaciones);
        $("#pieSalidaCliente").html(data.pie_salida);

        $("#miTicket").removeClass("vacia");
        $("#miTicket").addClass("ficha");
        window.print();
        $("#miTicket").removeClass("ficha");
        $("#miTicket").addClass("vacia");

        $("#encabezadoCliente").html("");
        $("#folioCliente").html("");
        $("#placasCliente").html("");
        $("#cajonCliente").html("");
        $("#tipoCliente").html("");
        $("#modeloCliente").html("");
        $("#colorCliente").html("");
        $("#horaCliente").html("");
        $("#fechaCliente").html("");
        $("#lavadoCliente").html("");
        $("#observacionesCliente").html("");
        $("#pieSalidaCliente").html("");

        $("body").overhang({
          type: "success",
          message: "Pago realizado!"
        });
      } else {
        $("body").overhang({
          type: "error",
          message: "No se ha podido realizar el pago"
        });
      }
      $("#cobroForm button[type=submit]").html("Cobrar");
      $("#cobroForm button[type=submit]").removeAttr("disabled");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      $("body").overhang({
        type: "error",
        message: "Servidor no responde!"
      });
      $("#cobroForm button[type=submit]").html("Cobrar");
      $("#cobroForm button[type=submit]").removeAttr("disabled");
    }
  } );

  return false;
}
)

//* Al cargar la página mostramos el siguiente folio disponible
$.ajax( {

  /****************************************************
  * this se refiere al formulario, del cual tomamos  *
  * el valor del atributo que necesesitamos          *
  ****************************************************/
  type: "GET",
  url: "../controlador/VehiculoControlador.php",

  ///////////////////////////////////////////////////////
  // Enviamos todos los campos que tenga el formulario //
  ///////////////////////////////////////////////////////
  data: {"funcion" : "getUltimo()"},

  ////////////////////////////////////////////////////////////
  // En caso de que la peticion se haya realizado con éxito //
  ////////////////////////////////////////////////////////////
  success: function(data, textStatus, jqXHR) {
    if(data == "") {
      $("#txtFolio").val(1);}
      else {
        $("#txtFolio").val(parseInt(data) + 1);
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });

  /**
  * FORMULARIO DE CONFIGURACIÓN DE TICKET
  */
  $("#ticketForm").on("submit", function(e) {
    e.preventDefault();
    var formData = new FormData(document.getElementById("ticketForm") );

    $.ajax( {
      type: 'post',
      url: 'configCode.php',
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function() {
        $("#ticketForm button[type=submit]").html("enviando...");
        $("#ticketForm button[type=submit]").attr("disabled", "disabled");
      },
      success: function(data, textStatus, jqXHR) {
        if(data.estado == 'true') {
          mostrarDatosTicket();
          $("body").overhang({
            type: "success",
            message: "Ticket actualizado!"
          });
        } else {
          $("body").overhang({
            type: "error",
            message: "No se ha podido actualizar el ticket"
          });
        }
        $("#ticketForm button[type=submit]").html("Guardar");
        $("#ticketForm button[type=submit]").removeAttr("disabled");
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        $("body").overhang({
          type: "error",
          message: "Servidor no responde!"
        });
        $("#ticketForm button[type=submit]").html("Guardar");
        $("#ticketForm button[type=submit]").removeAttr("disabled");
      }
    } );

    return false;
  }
)

/**
* FORMULARIO DE CONFIGURACIÓN DE PRECIOS
*/
$("#preciosForm").on("submit", function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById("preciosForm") );

  $.ajax( {
    type: 'post',
    url: 'preciosCode.php',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function() {
      $("#preciosForm button[type=submit]").html("enviando...");
      $("#preciosForm button[type=submit]").attr("disabled", "disabled");
    },
    success: function(data, textStatus, jqXHR) {
      listar();
      if(data.estado == 'true') {
        $("body").overhang({
          type: "success",
          message: "Precio actualizado!"
        });
      } else {
        $("body").overhang({
          type: "error",
          message: data.error
        });
      }
      $("#preciosForm button[type=submit]").html("Guardar");
      $("#preciosForm button[type=submit]").removeAttr("disabled");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      $("body").overhang({
        type: "error",
        message: "Servidor no responde!"
      });
      $("#preciosForm button[type=submit]").html("Guardar");
      $("#preciosForm button[type=submit]").removeAttr("disabled");
    }
  } );

  return false;
}
)

/**
* FORMULARIO DE CONFIGURACIÓN DE CUENTA
*/
$("#updateCuentaForm").on("submit", function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById("updateCuentaForm") );

  $.ajax( {
    type: 'post',
    url: 'updateCuentaCode.php',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function() {
      $("#updateCuentaForm button[type=submit]").html("enviando...");
      $("#updateCuentaForm button[type=submit]").attr("disabled", "disabled");
    },
    success: function(data, textStatus, jqXHR) {
      if(data.estado == 'true') {
        $("body").overhang({
          type: "success",
          message: "Sus datos han sido actualizados!"
        });
      } else {
        $("body").overhang({
          type: "error",
          message: "No se han podido actualizar sus datos"
        });
      }
      $("#updateCuentaForm button[type=submit]").html("Guardar");
      $("#updateCuentaForm button[type=submit]").removeAttr("disabled");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      $("body").overhang({
        type: "error",
        message: "Servidor no responde!"
      });
      $("#updateCuentaForm button[type=submit]").html("Guardar");
      $("#updateCuentaForm button[type=submit]").removeAttr("disabled");
    }
  } );

  return false;
}
)

/**
* FORMULARIO DE GENERACION DE CORTE
*/
$("#corteForm").on("submit", function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById("corteForm") );

  $.ajax( {
    type: 'post',
    url: 'corteCode.php',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function() {
      $("#corteForm button[type=submit]").html("enviando...");
      $("#corteForm button[type=submit]").attr("disabled", "disabled");
    },
    success: function(data, textStatus, jqXHR) {
      if(data.estado == 'true') {
        getCorteImprimible(data);
      } else {
        $("body").overhang({
          type: "error",
          message: data.error
        });
      }
      $("#corteForm button[type=submit]").html("Generar corte");
      $("#corteForm button[type=submit]").removeAttr("disabled");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      $("body").overhang({
        type: "error",
        message: "Servidor no responde!"
      });
      $("#corteForm button[type=submit]").html("Generar corte");
      $("#corteForm button[type=submit]").removeAttr("disabled");
    }
  } );

  return false;
}
)

/**
* FORMULARIO DE BUSQUEDA DE CORTES
*/
$("#buscaCortesForm").on("submit", function(e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById("buscaCortesForm") );

  $.ajax( {
    type: 'post',
    dataType: "json",
    url:   'listarCortes.php',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function() {
      $("#buscaCortesForm button[type=submit]").html("enviando...");
      $("#buscaCortesForm button[type=submit]").attr("disabled", "disabled");
    },
    success: function(data, textStatus, jqXHR) {
      if(data.estado == 'true') {
        crearTabla(data.datos, "miTabla", "miDiv");
      } else {
        $("#miTabla").remove();
        $("body").overhang({
          type: "error",
          message: data.error
        });
      }
      $("#buscaCortesForm button[type=submit]").html("Buscar");
      $("#buscaCortesForm button[type=submit]").removeAttr("disabled");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      $("body").overhang({
        type: "error",
        message: "Servidor no responde!"
      });
      $("#buscaCortesForm button[type=submit]").html("Buscar");
      $("#buscaCortesForm button[type=submit]").removeAttr("disabled");
    }
  } );

  //$('#buscaCortesForm').trigger("reset");

  return false;
}
)

//* Al cargar la vista de configuracion del ticket mostramos la configuracion actual
function mostrarDatosTicket () {
  $.ajax( {

    type: "GET",
    cache: false,
    dataType: "json",
    url: "../controlador/ConfigTicketControlador.php",
    data: {"funcion" : "getConfig()"},

    ////////////////////////////////////////////////////////////
    // En caso de que la peticion se haya realizado con éxito //
    ////////////////////////////////////////////////////////////
    success: function(data, textStatus, jqXHR) {
      $("#txtEncabezado").text(data.encabezado);
      $("#txtPie").text(data.pie_pagina);
      $("#txtPieSalida").text(data.pie_pagina_salida);
      $("#fileLogo").val(data.logotipo);
      $("#imgLogo").attr('src', 'assets/images/'+data.logotipo);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

mostrarDatosTicket();

//* obtenemos los datos de el ultimo corte realizado
function getCorteImprimible (data_detalle) {
  var datos;
  if(!isNaN(arguments[0])) {
    datos = {"funcion" : "getCorte()", "id_corte" : arguments[0]};
  } else {
    datos = {"funcion" : "getCorteUltimo()"};
  }
  $.ajax( {
    type: "GET",
    cache: false,
    dataType: "json",
    url: "../controlador/CorteControlador.php",
    data: datos,

    ////////////////////////////////////////////////////////////
    // En caso de que la peticion se haya realizado con éxito //
    ////////////////////////////////////////////////////////////
    success: function(data, textStatus, jqXHR) {
      crearTabla(data.vehiculos_con_diferencia, "miTablaVehiculos", "miDivVehiculos");
      $("#numCorte").html(data.id_corte);
      $("#atendidosCorte").html(data.atendidos);
      $("#fechaCorte").html(data.fecha);
      $("#horaCorte").html(data.hora);
      $("#usuarioCorte").html(data.usuario);
      $("#efectivoCorte").html(data.efectivo);
      $("#otrosCorte").html(data.otros);
      $("#total_ingresosCorte").html(data.total_ingresos);
      $("#egresos_descripcionCorte").html(data.egresos_descripcion);
      $("#egresos_montoCorte").html(data.egresos_monto);
      $("#cajaCorte").html(data.en_caja);
      $("#entregadoCorte").html(data.entregado);
      $("#diferenciaCorte").html(data.diferencia);
      $("#importeCorte").html(data.importe);
      $("#adicionalCorte").html(data.adicional);

      $("#miCorte").removeClass("vacia");
      $("#miCorte").addClass("ficha");
      window.print();
      $("#miCorte").removeClass("ficha");
      $("#miCorte").addClass("vacia");
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

//* Al cargar la vista de configuracion de la cuenta de usuario mostramos la configuracion actual
function mostrarDatosUsuario () {
  $.ajax( {
    type: "GET",
    cache: false,
    dataType: "json",
    url: "updateCuentaCode.php",
    data: {"funcion" : "getUser()"},

    ////////////////////////////////////////////////////////////
    // En caso de que la peticion se haya realizado con éxito //
    ////////////////////////////////////////////////////////////
    success: function(data, textStatus, jqXHR) {
      $('#txtUsuario').val(data.usuario);
      $('#txtPassword').val(data.password);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      //console.log(textStatus);
    }
  });
}

//* establecemos el logotipo en el ticket a imprimir
function setLogoTicket(idElement) {
  $.ajax( {

    type: "GET",
    cache: false,
    dataType: "json",
    url: "../controlador/ConfigTicketControlador.php",
    data: {"funcion" : "getConfig()"},

    ////////////////////////////////////////////////////////////
    // En caso de que la peticion se haya realizado con éxito //
    ////////////////////////////////////////////////////////////
    success: function(data, textStatus, jqXHR) {
      $("#"+idElement).attr('src', 'assets/images/'+data.logotipo);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
    }
  });
}

//} )
