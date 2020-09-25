<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Localização</h3>
    </div>
    <div class="panel-body">
        <div class="alert alert-primary">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <strong>Atenção!</strong> Para mudar a localização, clique com o <b><u>botão direito do mouse</u></b> sobre
            o mapa.
        </div>


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('latitude', 'Latitude:', ['class'=>'control-label']) !!}
                    {!! Form::text('latitude', null, ['class'=>'form-control', 'placeholder' => "Preenchida através do mapa", "readonly" => "true"]) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('longitude', 'Longitude:', ['class'=>'control-label']) !!}
                    {!! Form::text('longitude', null, ['class'=>'form-control', 'placeholder' => "Preenchida através do mapa", "readonly" => "true"]) !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-9">
                <div class="form-group">
                    <input type="text" placeholder="Busque pelo endereço..." class="form-control"
                           id="txtLocalizacaoPesquisa">
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <button type="button" onclick="buscarEndereco();" class="btn btn-purple" style="width: 100%"><i
                                class="demo-pli-magnifi-glass"></i> Pesquisar
                    </button>
                </div>
            </div>
        </div>

        <div id="mapa-localizacao" style="height:320px"></div>

    </div>
</div>

@push('scripts')

<script>

    $objLatitude = $("#latitude");
    $objLongitude = $("#longitude");

    var $posicaoCorrente = {
        lat: $objLatitude.val() == '' ? -14.235004 : parseFloat($objLatitude.val()),
        lng: $objLongitude.val() == '' ? -51.92528 : parseFloat($objLongitude.val())
    };

    var map = new google.maps.Map(document.getElementById('mapa-localizacao'), {
        center: $posicaoCorrente,
        zoom: 3,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.HYBRID
    });

    var infoWindow = new google.maps.InfoWindow({map: map});
    var $marker = new google.maps.Marker();

    function temLocalizacaoDefinida() {
        return $objLongitude.val() !== '' && $objLongitude.val() !== '';
    }

    if (temLocalizacaoDefinida()) {
        posicionaMapa($posicaoCorrente);
        adicionaPonteiro($posicaoCorrente)
    }
    else {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                $posicaoCorrente = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                posicionaInfo($posicaoCorrente);
                posicionaMapa($posicaoCorrente);

            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        }
        else {
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function posicionaInfo($posicaoCorrente) {
        infoWindow.setPosition($posicaoCorrente);

        $msgInfo = "Localização encontrada.<br/>" +
            "<a href='#' onclick='aceitarLocalizacao();'><b>Clique aqui</b></a> para definir como sendo a localização desejada.";

        infoWindow.setContent($msgInfo);
    }

    function posicionaMapa($posicao) {
        map.setZoom(14);
        map.setCenter($posicao);
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Atenção: Não conseguimos localizar você.<br/>' +
            'Marque a localização no mapa.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

    google.maps.event.addListener(map, 'rightclick', function (position) {
        setPosicao(position.latLng);
    });

    function aceitarLocalizacao() {
        adicionaPonteiro($posicaoCorrente);
        infoWindow.close();

        preencherLatitude($posicaoCorrente.lat);
        preencherLongitude($posicaoCorrente.lng);
    }

    function setPosicao(pos) {
        adicionaPonteiro(pos);
        preencherLatitude(pos.lat());
        preencherLongitude(pos.lng());
    }

    function adicionaPonteiro($posicao) {
        $marker.setMap(null);
        $marker = new google.maps.Marker({
            map: map,
            position: $posicao
        });

        $marker.setDraggable(true);
    }

    function preencherLatitude($latitude) {
        $("#latitude").val($latitude);
    }

    function preencherLongitude($longitude) {
        $("#longitude").val($longitude);
    }

    function buscarEndereco() {
        GMaps.geocode({
            address: $('#txtLocalizacaoPesquisa').val().trim(),
            callback: function (results, status) {
                if (status == 'OK') {
                    $posicaoCorrente = {
                        lat: results[0].geometry.location.lat(),
                        lng: results[0].geometry.location.lng()
                    };

                    setPosicao(results[0].geometry.location);
                    map.setCenter($posicaoCorrente);
                }
            }
        });
    }

</script>

@endpush