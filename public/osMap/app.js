// On initialise la latitude et la longitude de Paris (centre de la carte)
var macarte = null;



function geoloc() { // ou tout autre nom de fonction
    var geoSuccess = function (position) { // Ceci s'exécutera si l'utilisateur accepte la géolocalisation
        startPos = position;
        lat = startPos.coords.latitude;
        lon = startPos.coords.longitude;
        initMap(lat,lon);
        
    };
    var geoFail = function () { // Ceci s'exécutera si l'utilisateur refuse la géolocalisation
        console.log("refus");
    };
    // La ligne ci-dessous cherche la position de l'utilisateur et déclenchera la demande d'accord
    navigator.geolocation.getCurrentPosition(geoSuccess, geoFail);
    
}

// Fonction d'initialisation de la carte

function initMap(lat, lon) {
    // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
    macarte = L.map('map').setView([lat, lon], 11);
    // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(macarte);
}
window.onload = function () {
    // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé

    if ("geolocation" in navigator) {
        geoloc();
        console.log("lat: " + lat + " - lon: " + lon);
        
        /* la géolocalisation est disponible */
    } else {
        console.log("Vous n'avez pas accepter la geolocalisation")
        /* la géolocalisation n'est pas disponible */
    }
};