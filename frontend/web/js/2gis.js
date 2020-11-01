/**
 * Created by kox on 30.09.2020.
 */

var map;

DG.then(function () {
    map = DG.map('map', {
        center: [52.281789, 104.300396],
        zoom: 32
    });

    DG.marker([52.281789, 104.300396]).addTo(map).bindPopup('MoneyShop24');

    DG.Wkt.geoJsonLayer(polygonComponents).addTo(map);
});
