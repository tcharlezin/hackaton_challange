<div id="divError">
</div>

<div id="divArquivosAdicionados">
</div>

<div class="dropzone" id="fileUpload">
    <div class="dz-default dz-message">
        <div class="dz-icon">
            <i class="demo-pli-upload-to-cloud icon-5x"></i>
        </div>
        <div>
            <span class="dz-text">Arraste aqui os arquivos</span>
            <p class="text-sm text-muted">ou clique para abrir a seleção</p>
        </div>
    </div>
    <div class="fallback">
        <input name="{{$name}}" type="file" multiple/>
    </div>
    <div class="dropzone-previews" id="dropzonePreview"></div>

</div>

@push('scripts')
<script type="text/javascript">

    // var $listaArquivos = [];

    Dropzone.autoDiscover = false;
    var token = '{{ csrf_token() }}';
    var myDropzone = new Dropzone("div#fileUpload",
            {
                url: "{{route("admin.fotos.".$rota)}}",
                params: {
                    _token: token,
                    name: "{{$identifier}}",
                },
                acceptedFiles: 'image/*',

                @if(isset($registro))
                    init: function ()
                    {
                        @foreach($registro->getFiles() as $propriedade)

                            var mockFile = { name: "{{$propriedade['name']}}", size: "{{$propriedade['size']}}", type: "{{$propriedade['mime_type']}}" };
                            this.options.addedfile.call(this, mockFile);
                            this.options.thumbnail.call(this, mockFile, "{{$propriedade['url']}}");
                            mockFile.previewElement.classList.add('dz-success');
                            mockFile.previewElement.classList.add('dz-complete');

                        @endforeach
                    }
                @endif
            });

    myDropzone.on('success', function (file, response)
    {
        $('#divArquivosAdicionados').append('<input type="hidden" name="fotos[]" value="' + response.filename +'" />');
    });

    myDropzone.on('error', function (file, response)
    {
        myDropzone.removeFile(file);

        $.niftyNoty({
            type: 'danger',
            container: 'floating',
            title: 'Erro ao subir arquivo',
            message: 'Não foi possível subir o arquivo <b><u>' + file.name + '</u></b>.',
            closeBtn: true,
            timer: 8000
        });

    });

</script>
@endpush
