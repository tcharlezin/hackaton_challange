<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}} - {{env("APP_SLOGAN")}}</title>

    {{-- Block --}}
    {{--<script type="text/javascript" src="{{ asset("site/libraries/block/block.js") }}"></script>--}}

    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <link href="{{ asset("admin/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/css/premium.css") }}" rel="stylesheet">
    <link href="{{ asset("admin/css/plugins.css") }}" rel="stylesheet">

    <link href="{{ asset("admin/css/themes/type-a/theme-dark.min.css") }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="container" class="effect aside-float aside-bright {{ Auth::user()->IsPerfilCompleto() ? "mainnav-lg" : ""  }}">
        @include('admin.layouts.header')

        <div class="boxed">
            @include('admin.layouts.content')

            @if(Auth::user()->IsPerfilCompleto())
                @include('admin.layouts.aside')
                @include('admin.layouts.sidebar')
            @endif
        </div>

        @include('admin.layouts.footer')

        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>

        @include('admin.layouts.settings')

        @stack("final")

    </div>

    <script src="{{ asset("admin/js/jquery.js") }}"></script>
    <script src="{{ asset("admin/js/nifty.js") }}"></script>
    <script src="{{ asset("admin/js/script.js") }}"></script>

    <script src="{{ asset("admin/js/jquery.mask.js") }}"></script>
    <script src="{{ asset("admin/js/jquery.maskMoney.js") }}"></script>
    <script src="{{ asset("admin/js/select2.js") }}"></script>
    <script src="{{ asset("admin/js/select2-pt-BR.js") }}"></script>
    <script src="{{ asset("admin/js/bootbox.js") }}"></script>
    <script src="{{ asset("admin/js/jquery-ui.js") }}"></script>
    <script src="{{ asset("admin/js/bootstrap-datepicker.js") }}"></script>
    <script src="{{ asset("admin/js/bootstrap-datepicker.pt-BR.js") }}"></script>
    <script src="{{ asset("admin/js/dropzone.js") }}"></script>
    <script src="{{ asset("admin/js/nouislider.js") }}"></script>
    <script src="{{ asset("admin/js/moment.min.js") }}"></script>
    <script src="{{ asset("admin/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("admin/js/dataTables.bootstrap.js") }}"></script>
    <script src="{{ asset("admin/js/dataTables.responsive.js") }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN'    : $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
    </script>

@stack('scripts')

</body>
</html>
