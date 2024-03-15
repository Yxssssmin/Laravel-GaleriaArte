$(document).ready(function(){
    $('#importAndBindButton').click(function(){ 
        
        var cuadroId = $(this).data('id');
        var barcodeValue = $('#barcodeInput').val();

        // Realizas la llamada AJAX para enviar el valor al controlador
        $.ajax({
            url: "/cuadro/import-item/" + cuadroId,
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                barcode: barcodeValue
            },
            success: function(response) {
                // Maneja la respuesta si es necesario
                console.log(response);
            },
            error: function(error) {
                console.error('Error de importacion:', error);
            }
        });
    });
});
