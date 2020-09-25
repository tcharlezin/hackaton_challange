<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Alterar foto do perfil</h3>
    </div>
    <div class="panel-body">
        <div class="row">
        </div>

        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2">

                @include("admin.cadastro.foto.style")

                @push("scripts")
                    @include("admin.cadastro.foto.script")
                @endpush

                <div class="foto-avatar">
                    <img src="{{ Auth::user()->getProfilePicture() }}" alt="Profile Picture"
                         class="image img-border img-circle" style="width:100%; max-width: 100%" id="avatar-profile">
                    <div class="texto-avatar">
                        <a href="#" data-toggle="modal" data-target="#myModal">
                            <div class="row">
                                <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">

                                <div id="modaldialog" class="html5imageupload"
                                     data-button-edit="false"
                                     data-ghost="true"
                                     data-canvas="true"
                                     data-originalsize="false"
                                     data-ajax="false"
                                     data-resize="true"
                                     data-width="300"
                                     data-height="300"
                                     style="width: 100%; height: 100%;">
                                    <input type="file" name="avatar-picture"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @push("scripts")
                <script type="text/javascript">
                    $objUpload = null;

                    $("#myModal").on('shown.bs.modal', function ()
                    {
                        $('#modaldialog').html5imageupload({
                            onAfterProcessImage: function ()
                            {
                                $objUpload = this;
                                $("#myModal").modal('toggle');

                                var mime = $objUpload.image[0].src.match(/data:([a-zA-Z0-9]+\/[a-zA-Z0-9-.+]+).*,.*/);
                                if (mime && mime.length)
                                {
                                    result = mime[1];
                                }

                                $("#avatar-profile").attr("src", $($objUpload.element).find('canvas.final')[0].toDataURL(result));
                            }
                        });
                    });
                </script>
                @endpush
            </div>
            <div class="col-md-5"></div>

        </div>
    </div>
</div>
