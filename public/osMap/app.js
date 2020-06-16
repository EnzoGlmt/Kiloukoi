let $map = document.querySelector('#map')

class LeafletMap {

    constructor() {
        this.map = null
        this.bounds = []
    }

    async load(element) {
        return new Promise((resolve, reject) => {
            $script('https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', () => {
                this.map = L.map(element)
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    maxZoom: 18,
                    id: 'mapbox/streets',
                    tileSize: 512,
                    zoomOffset: -1,
                    accessToken: 'your.mapbox.access.token'
                }).addTo(this.map)
                resolve()
            })
        })
    }
    addMarker(lat, lng, text) {
        let point = [lat, lng]
        this.bounds.push(point)
        return new leafletMarker(point, text, this.map)
    }
    center() {
        this.map.fitBound(this.bounds)
    }
}


class leafletMarker {
    constructor(point, text, map) {
        this.popup = L.popup({
            autoClose: false,
            closeOnEscapeKey: false,
            closeOnClick: false,
            closeButton: false,
            className: 'marker',
            maxWight: 400
        })
            .setLatLng(point)
            .setContent(text)
            .openOn(map)
    }

    setActive() {
        this.popup.getElement().classList.add('is-active')
    }

    unsetActive() {
        this.popup.getElement().classList.remove('is-active')
    }
}


const initMap = async function () {
    let map = new LeafletMap()
    let hoverMarker = null
    await map.load($map)
    Array.from(document.querySelectorAll('.js-marker')).forEach((item) => {
        let marker = map.addMarker(item.dataset.lat, item.dataset.lng, item.dataset.price + '€')
        item.addEventListener('mouseover', function () {
            if (hoverMarker !== null) {
                hoverMarker.unsetActive()
            }
            marker.setActive()
            hoverMarker = marker
        })
    })
    map.center()
}

if ($map !== null) {
    initMap()
}