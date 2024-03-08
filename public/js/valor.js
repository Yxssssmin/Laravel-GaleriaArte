$(document).ready(function() {
    $.ajax({
        url: '/ruta-a-tu-controlador/obtener-tipo-de-cambio',
        method: 'GET',
        success: function(response) {
            var tipoDeCambio = response.tipoDeCambio;
            console.log('Tipo de cambio (EUR a USD): ' + tipoDeCambio);
        },
        error: function(error) {
            console.error('Error al obtener el tipo de cambio:', error);
        }
    });
});