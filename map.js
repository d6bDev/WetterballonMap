var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

map.on('click', onClick);

var popup = L.popup().setContent('<button>Confirm Position</button>');

var test = L.marker([51.505, -0.09]).addTo(map)
    .bindPopup(popup)
    .openPopup();

function onClick(e) {
    test.setLatLng(e.latlng);
}
