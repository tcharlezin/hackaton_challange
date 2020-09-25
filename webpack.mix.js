const mix = require('laravel-mix');

mix.copyDirectory('resources/assets/admin/img', 'public/admin/img');

mix.copyDirectory('resources/assets/admin/css/themes/', 'public/admin/css/themes');
mix.copyDirectory('resources/assets/admin/css/demo/fonts', 'public/admin/css/fonts');
mix.copyDirectory('resources/assets/admin/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/assets/admin/plugins/font-awesome/fonts', 'public/admin/fonts');
mix.copyDirectory('resources/assets/admin/plugins/datatables/media/images', 'public/admin/images');

mix.copyDirectory('resources/assets/site/fonts/profession/fonts', 'public/site/css/fonts');
mix.copyDirectory('resources/assets/site/img', 'public/site/img');


mix.styles([
    "resources/assets/admin/css/bootstrap.min.css",
    "resources/assets/admin/css/nifty.css",
    "resources/assets/admin/css/demo/nifty-demo-icons.min.css",
    "resources/assets/admin/css/demo/nifty-demo.min.css",
], 'public/admin/css/style.css');

mix.styles([
    "resources/assets/admin/premium/icon-sets/icons/line-icons/premium-line-icons.min.css",
    "resources/assets/admin/premium/icon-sets/icons/solid-icons/premium-solid-icons.css",
], 'public/admin/css/premium.css');

mix.styles([
    "resources/assets/admin/plugins/font-awesome/css/font-awesome.min.css",
    "resources/assets/admin/plugins/datatables/media/css/dataTables.bootstrap.css",
    "resources/assets/admin/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css",
    "resources/assets/admin/plugins/pace/pace.min.css",
    "resources/assets/admin/plugins/animate-css/animate.min.css",
    "resources/assets/admin/plugins/select2/css/select2.min.css",
    "resources/assets/admin/plugins/magic-check/css/magic-check.min.css",
    "resources/assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css",
    "resources/assets/admin/plugins/dropzone/dropzone.min.css",
    "resources/assets/admin/plugins/noUiSlider/nouislider.min.css",
    "resources/assets/admin/plugins/css-loaders/css/css-loaders.css",
    "resources/assets/admin/plugins/jquery-ui/jquery-ui.min.css"
], 'public/admin/css/plugins.css');

mix.copy("resources/assets/admin/js/jquery.min.js", 'public/admin/js/jquery.js');
mix.copy("resources/assets/admin/js/nifty.js", 'public/admin/js/nifty.js');

mix.js([
    "resources/assets/admin/plugins/pace/pace.js",
    "resources/assets/admin/js/bootstrap.js",
    "resources/assets/admin/js/demo/icons.js",
    "resources/assets/admin/js/demo/nifty-demo.min.js",
], 'public/admin/js/script.js');


mix.copy("resources/assets/admin/js/jquery.mask.js",                                                          'public/admin/js/jquery.mask.js');
mix.copy("resources/assets/admin/js/jquery.maskMoney.js",                                                     'public/admin/js/jquery.maskMoney.js');

mix.copy("resources/assets/admin/plugins/select2/js/select2.js",                                              'public/admin/js/select2.js');
mix.copy("resources/assets/admin/plugins/select2/js/i18n/pt-BR.js",                                           'public/admin/js/select2-pt-BR.js');

mix.copy("resources/assets/admin/plugins/bootbox/bootbox.js",                                                 'public/admin/js/bootbox.js');
mix.copy("resources/assets/admin/plugins/jquery-ui/jquery-ui.min.js",                                         'public/admin/js/jquery-ui.js');
mix.copy("resources/assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.js",                       'public/admin/js/bootstrap-datepicker.js');
mix.copy("resources/assets/admin/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js",     'public/admin/js/bootstrap-datepicker.pt-BR.js');
mix.copy("resources/assets/admin/plugins/dropzone/dropzone.js",                                               'public/admin/js/dropzone.js');
mix.copy("resources/assets/admin/plugins/noUiSlider/nouislider.js",                                           'public/admin/js/nouislider.js');
mix.copy("resources/assets/admin/plugins/moment/moment.min.js",                                               'public/admin/js/moment.min.js');

mix.copy("resources/assets/admin/plugins/datatables/media/js/jquery.dataTables.js",                           'public/admin/js/jquery.dataTables.js');
mix.copy("resources/assets/admin/plugins/datatables/media/js/dataTables.bootstrap.js",                        'public/admin/js/dataTables.bootstrap.js');
mix.copy("resources/assets/admin/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js",   'public/admin/js/dataTables.responsive.js');
mix.copy("resources/assets/admin/plugins/datatables/media/js/pt-BR.json",                                     'public/admin/plugins/datatables/media/js/pt-BR.json');


mix.styles([
    "resources/assets/site/fonts/profession/style.css",
    "resources/assets/site/libraries/font-awesome/css/font-awesome.min.css",
    "resources/assets/site/libraries/bootstrap-fileinput/css/fileinput.min.css",
    "resources/assets/site/libraries/bootstrap-select/css/bootstrap-select.min.css",
    "resources/assets/site/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.css"
], 'public/site/css/style.css');

mix.copy("resources/assets/site/css/blue-navy.css",                                            'public/site/css/blue-navy.css');
mix.copy("resources/assets/site/favicon.png",                                                  'public/site/favicon.png');

mix.copy("resources/assets/site/js/jquery.js",                                                 "public/site/js/jquery.js");
mix.copy("resources/assets/site/js/jquery.ezmark.js",                                          "public/site/js/jquery.ezmark.js");
mix.copy("resources/assets/site/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js",   "public/site/js/bootstrap.collapse.js");
mix.copy("resources/assets/site/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js",   "public/site/js/bootstrap.dropdown.js");
mix.copy("resources/assets/site/libraries/bootstrap-sass/javascripts/bootstrap/tab.js",        "public/site/js/bootstrap.tab.js");
mix.copy("resources/assets/site/libraries/bootstrap-sass/javascripts/bootstrap/transition.js", "public/site/js/bootstrap.transition.js");
mix.copy("resources/assets/site/libraries/bootstrap-fileinput/js/fileinput.min.js",            "public/site/js/bootstrap.fileinput.min.js");
mix.copy("resources/assets/site/libraries/bootstrap-select/js/bootstrap-select.min.js",        "public/site/js/bootstrap.bootstrap-select.min.js");
mix.copy("resources/assets/site/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js",         "public/site/js/bootstrap.bootstrap-wysiwyg.min.js");
mix.copy("resources/assets/site/libraries/cycle2/jquery.cycle2.min.js",                        "public/site/js/cycle2.jquery.cycle2.min.js");
mix.copy("resources/assets/site/libraries/cycle2/jquery.cycle2.carousel.min.js",               "public/site/js/cycle2.jquery.cycle2.carousel.min.js");
mix.copy("resources/assets/site/libraries/countup/countup.min.js",                             "public/site/js/countup.countup.min.js");
mix.copy("resources/assets/site/js/profession.js",                                             "public/site/js/profession.js");
