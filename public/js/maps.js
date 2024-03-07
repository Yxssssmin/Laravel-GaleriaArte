// maps.js

let map;
let autocomplete;

function initAutocomplete() {
    console.log('hola');
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete"),
        {
            types: ['establishment'],
            // componentRestrictions: {'country': ['AU']},
            fields: ['place_id', 'geometry', 'name']
        });

        // autocomplete.addListener('place_changed', onPlaceChanged);
}

// function onPlaceChanged(){
//     var place = autocomplete.getPlace();

//     if(!place.geometry) {
//         document.getElementById('autocomplete').placeholder = 'Enter a place';
//     } else {
//         document.getElementById('details').innerHTML = place.name;
//     }
// }

// async function initMap() {
//   //@ts-ignore
//   const { Map } = await google.maps.importLibrary("maps");

//   map = new Map(document.getElementById("map"), {
//     center: { lat: -34.397, lng: 150.644 },
//     zoom: 8,
//   });
// }

// initMap();

function initMap() {
    // Obtener la ubicación desde el input
    var ubicacion = document.getElementById('exampleInputEmail1').value;
    
    // Crear un objeto geocoder
    var geocoder = new google.maps.Geocoder();

    // Obtener la ubicación en coordenadas
    geocoder.geocode({ 'address': ubicacion }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            // Inicializar el mapa
            var mapOptions = {
                center: results[0].geometry.location,
                zoom: 15
            };
            var map = new google.maps.Map(document.getElementById('mapa'), mapOptions);

            // Colocar un marcador en la ubicación
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                title: 'Nombre del cuadro'
            });
        } else {
            console.error('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// Llamar a la función de inicialización cuando se abra el modal
document.addEventListener('DOMContentLoaded', function () {
    initMap();
});
