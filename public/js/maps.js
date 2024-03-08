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