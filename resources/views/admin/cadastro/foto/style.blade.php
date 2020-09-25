<style type="text/css">
    .image {
        opacity: 1;
        display: block;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .texto-avatar {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .foto-avatar:hover .image {
        opacity: 0.1;
    }

    .foto-avatar:hover .texto-avatar {
        opacity: 1;
    }

    html, body {
        font-family: arial;
    }

    .dropzone {
        background-color: #eeeeee;
        text-align: center;
        position: relative;
        border: 1px solid #dddddd;
        display: inline-block;
    }

    .dropzone:after {
        content: 'Arraste a imagem aqui, ou clique para selecionar!';
        font-size: 30px;
        color: #bbbbbb;
        position: absolute;
        bottom: 60%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    .dropzone:before {
        content: '';
        font-family: "Glyphicons Halflings";
        font-size: 60px;
        color: #dbdbdb;
        position: absolute;
        top: 40%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    /*[data-i18n]::after {
       content: attr(data-i18n);
    }*/

    .dropzone.loading:after {
        content: 'Please wait, image is loading';
    }

    .dropzone.loading:before {
        content: '';
    }

    .dropzone.done:after {
        content: '';
    }

    .dropzone.done:before {
        content: '';
    }

    /* not an image */
    .dropzone.notAnImage {
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .dropzone.notAnImage:after {
        content: 'Arquivo selecionado não é uma imagem!';
        color: #a94442;
    }

    .dropzone.notAnImage:before {
        content: '';
        color: #ebccd1;
    }

    .dropzone.alert-danger {
        background-color: #f2dede;
    }

    .dropzone.alert-danger:after {
        content: '';
    }

    .dropzone.smalltext:after {
        font-size: 20px;
    }

    .dropzone > span {
        font-size: 30px;
        color: #bbbbbb;
        position: absolute;
        top: 35%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    .dropzone > span.loader {
        display: none;
    }

    .dropzone > input[type=file] {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
        height: 100% /* IE HACK*/
    }

    .dropzone > input[type=text] {
        display: none;
    }

    .dropzone .progress {
        bottom: 10px;
        left: 10px;
        right: 10px;
        display: none;
    }

    .dropzone .cropWrapper {
        overflow: hidden;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
        background-color: #eeeeee;
        text-align: left;
    }

    /*.dropzone canvas.final			{ background-color: #eeeeee;}*/

    .dropzone img {
        z-index: 5;
        position: relative;
    }

    .dropzone img.ghost {
        opacity: .2;
        z-index: auto;
        float: left /* HACK for not scrolling*/;
    }

    .dropzone img.main {
        cursor: move;
    }

    .dropzone .final img.main {
        cursor: auto;
    }

    .dropzone img.preview {
        width: 100%;
    }

    .dropzone canvas {
        z-index: 5;
        position: relative;
    }

    .dropzone canvas.ghost {
        opacity: .2;
        z-index: auto;
        float: left /* HACK for not scrolling*/;
    }

    .dropzone canvas.main {
        cursor: move;
    }

    .dropzone .final canvas.main {
        cursor: auto;
    }

    .dropzone canvas.h5iu_preview {
        width: 100%;
    }

    .dropzone .tools {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 999;
        display: inline-block;
    }

    .dropzone .tools > * {
        margin: 0 0 0 5px;
    }

    .dropzone.smalltools .tools .btn {
        padding: 1px 4px;
        font-size: 12px;
    }

    .dropzone .download {
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 999;
        display: inline-block;
    }

    .dropzone .download > * {
        margin: 0 0 0 5px;
    }

    .dropzone .alert {
        z-index: 100;
        position: absolute;
        bottom: 0px;
        left: 20px;
        right: 20px;
    }

    .icon-flipped {
        transform: scaleX(-1);
        -moz-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        -ms-transform: scaleX(-1);
    }

    .rotate_90 { /*General*/
        transform: rotate(90deg);
        /*Firefox*/
        -moz-transform: rotate(90deg);
        /*Microsoft Internet Explorer*/
        -ms-transform: rotate(90deg);
        /*Chrome, Safari*/
        -webkit-transform: rotate(90deg);
        /*Opera*/
        -o-transform: rotate(90deg);
    }

    .html5imageupload {
        background-color: #eeeeee;
        text-align: center;
        position: relative;
        border: 1px solid #dddddd;
        display: inline-block;
    }

    .html5imageupload:after {
        content: 'Arraste a imagem aqui ou clique para adicionar!';
        font-size: 30px;
        color: #bbbbbb;
        position: absolute;
        bottom: 60%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    .html5imageupload:before {
        content: '';
        font-family: "Glyphicons Halflings";
        font-size: 60px;
        color: #dbdbdb;
        position: absolute;
        top: 40%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    .html5imageupload.loading:after {
        content: 'Please wait, image is loading';
    }

    .html5imageupload.loading:before {
        content: '';
    }

    .html5imageupload.done:after {
        content: '';
    }

    .html5imageupload.done:before {
        content: '';
    }

    /* not an image */
    .html5imageupload.notAnImage {
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .html5imageupload.notAnImage:after {
        content: 'Arquivo selecionado não é uma imagem!';
        color: #a94442;
    }

    .html5imageupload.notAnImage:before {
        content: '';
        color: #ebccd1;
    }

    .html5imageupload.alert-danger {
        background-color: #f2dede;
    }

    .html5imageupload.alert-danger:after {
        content: '';
    }

    .html5imageupload.smalltext:after {
        font-size: 20px;
    }

    .html5imageupload > span {
        font-size: 30px;
        color: #bbbbbb;
        position: absolute;
        top: 35%;
        left: 0;
        width: 100%;
        text-align: center;
        z-index: 0;
    }

    .html5imageupload > span.loader {
        display: none;
    }

    .html5imageupload > input[type=file] {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        opacity: 0;
        cursor: pointer;
        z-index: 2;
        height: 100% /* IE HACK*/
    }

    .html5imageupload > input[type=text] {
        display: none;
    }

    .html5imageupload .progress {
        bottom: 10px;
        left: 10px;
        right: 10px;
        display: none;
    }

    .html5imageupload .cropWrapper {
        overflow: hidden;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 10;
        background-color: #eeeeee
    }

    /*.html5imageupload canvas.final			{ background-color: #eeeeee;}*/

    .html5imageupload img {
        z-index: 20;
        position: relative;
    }

    .html5imageupload img.ghost {
        opacity: .2;
        z-index: auto;
        float: left /* HACK for not scrolling*/;
    }

    .html5imageupload img.main {
        cursor: move;
    }

    .html5imageupload .final img.main {
        cursor: auto;
    }

    .html5imageupload img.h5iu_preview {
        width: 100%;
    }

    .html5imageupload .tools {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 999;
        display: inline-block;
    }

    .html5imageupload .tools > * {
        margin: 0 0 0 5px;
    }

    .html5imageupload .download {
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 999;
        display: inline-block;
    }

    .html5imageupload .download > * {
        margin: 0 0 0 5px;
    }

    .html5imageupload.smalltools .tools .btn {
        padding: 1px 4px;
        font-size: 12px;
    }

</style>