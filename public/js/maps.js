let autocomplete;
let map;
let service;
let infowindow;

function initAutocomplete() {
    let locationText = document.getElementById("ubicacion");
    if (!locationText) {
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("autocomplete"),
            {
                types: ["establishment"],
                //componentRestrictions: { country: ["ES"] },
                fields: ["place_id", "geometry", "name"],
            }
        );
    } else {
        let geocoder = new google.maps.Geocoder();
        // Ubicación en      de texto
        console.log(locationText.innerText);
        // Llamada al servicio de geocodificación
        geocoder.geocode({ address: locationText.innerText }, function (results, status) {
            if (status === "OK") {
                // Obtenemos las coordenadas de la primera coincidencia
                let location = results[0].geometry.location;
                // Creamos el mapa centrado en la ubicación
                let map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14, // Puedes ajustar el nivel de zoom según tu preferencia
                    center: location,
                    scrollwheel: true,
                });
                // Creamos el marcador en la ubicación
                let marker = new google.maps.Marker({
                    map: map,
                    position: location,
                });
            } else {
                console.error("Error al geocodificar la ubicación:", status);
            }
        });
    }
}

let contador = 0;

function calificar(item) {
    console.log(item);
    contador = item.id[0];
    let nombre = item.id.substring(1);

    for (let i = 0; i < 5; i++) {

        if (i < contador) {
            document.getElementById((i + 1) + nombre).style.color = 'orange';
        } else {
            document.getElementById((i + 1) + nombre).style.color = 'black';
        }
    }
}

function calificarEstrellas(cuadroId) {
    const voto = contador; // Utiliza el contador que se actualiza en la función calificar

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Realizar la solicitud AJAX utilizando jQuery
    $.ajax({
        url: `/cuadro/${cuadroId}/votar`,
        method: 'POST',
        data: { voto: voto, _token: token },
        success: function (data) {
            // Manejar la respuesta del servidor si es necesario
            console.log("Valoración con exito!");

            // Actualizar la interfaz con la nueva información
            $('#mediaVotos').text(data.mediaVotos);
            $('#totalVotos').text(data.totalVotos);

            contador = 0;
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
