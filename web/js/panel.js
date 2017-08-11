(function($){
    $.fn.mapPanel = function(options) {
        options = $.extend({
            id: null,
            table: null,
            operationToken:null,
            routeUrl: null,
            aoColumns: null,
            dom: null,
            multiScript : true
        }, options);

        var __map;

        var _modal = $(".weatherModal");

        var initMap = function() {
            __map = new GMaps({
                div: '.googleMap',
                zoom: 6,
                lat: 52.1194514,
                lng: 19.4770191,
                click: function(e) {
                    catchClick(e);
                }
            });
        };

        var catchClick = function(event) {
            $(".googleMap").block({
                message : "Przetwarzanie danych"
            });

            var clickedLat = event.latLng.lat();
            var clickedLon = event.latLng.lng();

            $.ajax({
                "type": "POST",
                "url": Routing.generate("weather_information"),
                "data": {
                    'coordinates' : {
                        'lat' : clickedLat,
                        'lon' : clickedLon
                    }
                },
                "success": function (json) {
                    $(".googleMap").unblock();

                    displayDataModal(json);
                },
                "error" : function(error) {
                    $(".googleMap").unblock();
                }
            });
        };

        var displayDataModal = function(data) {
            $("#lat", _modal).html(data.lat);
            $("#lon", _modal).html(data.lon);
            $("#clouds", _modal).html(data.clouds);
            $("#city", _modal).html(data.city);
            $("#temperature", _modal).html("\
                Teraz: "+data.temperature.now+"C <br/>\
                Minimalna: "+data.temperature.min+"C <br/>\
                Maksymalna: "+data.temperature.max+"C \
            ");
            $("#wind", _modal).html("\
                Kierunek: "+data.wind.direction+" <br/>\
                Prędkość: "+data.wind.speed+"\
            ");

            _modal.modal("show");
        };

        return this.each(function() {
            $(document).ready(function() {
                initMap();
            });
        });
    }
})(jQuery);