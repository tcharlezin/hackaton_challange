<?php

namespace App\Http\Controllers\Admin\Component;

use App\Components\Uploads\UploadFileTmp;
use App\Dominio\Uploads\UploadImageTmp;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UploadController extends Controller
{
    public function uploadFotos(Request $request)
    {
        try
        {
            $name = $request->get("name");
            $uploadImgTmp = new UploadImageTmp($name, $request->all());
            $uploadImgTmp->execute();

            $filename = $uploadImgTmp->getFilename();

            return Response::json([
                "filename" => $filename
            ], 200);
        }
        catch (\Exception $ex)
        {
            return Response::json($ex->getMessage(), 400);
        }
    }

    public function uploadArquivos(Request $request)
    {
        try
        {
            $uploadImgTmp = new UploadFileTmp($request->all());
            $uploadImgTmp->execute();

            return Response::json([
                "filename" => $uploadImgTmp->getFilename()
            ], 200);
        }
        catch (\Exception $ex)
        {
            return Response::json($ex->getMessage(), 400);
        }
    }
}
