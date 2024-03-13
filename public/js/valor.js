function valorMoneda(precioId) {

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $.ajax({
        url: `/cuadro/${precioId}/obtener-precio-dolar`,
        method: 'GET',
        success: function(response) {
            var tipoDeCambio = response.tipoDeCambio;
            console.log('Tipo de cambio (EUR a USD): ' + tipoDeCambio);

            $('#tipoDeCambio').text(tipoDeCambio);
        },
        error: function(error) {
            console.error('Error al obtener el tipo de cambio:', error);
        }
    });

}