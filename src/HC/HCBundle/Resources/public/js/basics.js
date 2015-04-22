$(function () {

  setTimeout(function(){
  
    $(".alert").fadeOut();
    
  }, 3000)

});
  

//variables Globales
var DataLanguage={
  "oLanguage": {
  "sProcessing": "Procesando...",
  "sLengthMenu": "Mostrar _MENU_ filas",
  "sZeroRecords": "No se encontraron resultados",
  "sEmptyTable": "Ningún dato disponible en esta tabla",
  "sInfo": "Mostrando filas del _START_ al _END_ de un total de _TOTAL_ filas",
  "sInfoEmpty": "Mostrando filas del 0 al 0 de un total de 0 filas",
  "sInfoFiltered": "(filtrado de un total de _MAX_ filas)",
  "sInfoPostFix": "",
  "sSearch": "Buscar:",
  "sUrl": "",
  "sInfoThousands": ",",
  "sLoadingRecords": "Cargando...",
  "oPaginate": {
  "sFirst": "Primero",
  "sLast": "Último",
  "sNext": "Siguiente",
  "sPrevious": "Anterior"
  }
}
            }
var datosModal={
      "IdModal": "modal",
      "ModalHeader": "Header",
      "ModalBody": "body",
      "ModalFooter": false,
      AccionModal: function(){
        
      }
}
var datosAjax={
    "url": null,
    "data": {},
     accionSuccess: null,
}

function CargarDatosAjax(datos){
    $.ajax({
      url: datos.url,
      type: 'get',
      beforeSend: console.log("Cargando"),
      data: {},
      success: function (data) {
        datos.accionSuccess(data);
      }
    });
}