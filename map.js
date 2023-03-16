function loadmap(){
    var map = L.map('map').setView([51.505, -0.09], 14);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors', maxZoom: 18,
    }).addTo(map);

    map.on('click', onClick);

    var popup = L.popup().setContent('<button>Confirm Position</button>');

    var test = L.marker([51.505, -0.09]).addTo(map).bindPopup(popup);
}

function onClick(e) {
    test.setLatLng(e.latlng);

    //put latlng in cookies
    console.log(e.latlng);
    const latlng = e.latlng;
    console.log(latlng);
    /*
    window.sessionStorage.setItem("lat",e.lating);
    window.sessionStorage.setItem("lng",e.lating);
    */
}

//createcokies
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
function makeCookies(){
    //getVal();
    
    var latlng;
    //Geodata
    setCookies("lat", latlng,1);// Muss noch heraus finden welcher data typ e.latlng hat 
    setCookies("lng", latlng,1);


}



function inti(){
    loadmap();

    console.log("Website geladen");
}