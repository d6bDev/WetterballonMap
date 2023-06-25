function loadmap() {
    let tempcoords = {lat: 52.70253708487367, lng: 7.294074558464667}

    var map = L.map('map').setView([52.70253708487367, 7.294074558464667], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors', maxZoom: 18,
    }).addTo(map);

    map.on('click', onClick);

    var test = L.marker([52.70253708487367, 7.294074558464667]).addTo(map)

    test.on('click', function(e) {
        var popup = L.popup();
        var container = L.DomUtil.create('div'),
            confirmButton = createButton('Confirm', container);

        popup
            .setLatLng(e.latlng)
            .setContent(confirmButton)
            .openOn(map);

        L.DomEvent.on(confirmButton, 'click', () => {
            makeCookies()
        });
    })

    function createButton(label, container) {
        var btn = L.DomUtil.create('button', '', container);
        btn.setAttribute('type', 'button');
        btn.innerHTML = label;
        return btn;
    }

    function onClick(e) {
        //move marker position to selected position
        test.setLatLng(e.latlng);

        //save selected lat & lng to temp storage
        console.log("latitude: " + e.latlng.lat + ", longitude: " + e.latlng.lng);
        
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
        
        tempcoords.lat = e.latlng.lat
        tempcoords.lng = e.latlng.lng
    }

    function setCookies(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function makeCookies() {
        //Geodata
        setCookies("lat", tempcoords.lat, 1);
        setCookies("lng", tempcoords.lng, 1);
        console.log("Button Pressed, Cookies Saved!")
    }
}

function init() {
    loadmap()
    console.log("Website geladen");
}
