
//variables Globales

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