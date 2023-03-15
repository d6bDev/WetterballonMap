var map = L.map('map').setView([51.505, -0.09], 14);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors', maxZoom: 18,
}).addTo(map);

map.on('click', onClick);

var popup = L.popup().setContent('<button>Confirm Position</button>');

var test = L.marker([51.505, -0.09]).addTo(map).bindPopup(popup);

function onClick(e) {
    test.setLatLng(e.latlng);

//put latlng in cookies
console.log(e.latlng);
const latlng = e.latlng;

document.cookie = "lat=" + latlng[0] + ";";
document.cookie = "lng=" + latlng[1] + ";";

}
