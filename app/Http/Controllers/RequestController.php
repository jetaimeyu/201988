<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadFormRequest;
use App\Http\Requests\SubmitFormRequest;

class RequestController extends Controller
{
    //
    public function formPage()
    {
        return view('request.form');
    }

    public function fileUpload(UploadFormRequest $request)
    {

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            if (!$picture->isValid()) {
                abort(400, '无效的上传文件');
            }
            //文件扩展名
            $extension = $picture->getClientOriginalExtension();
            //文件名
            $fileName = $picture->getClientOriginalName();
            //生成统一格式文件名
            $newFileName = md5($fileName . time() . mt_rand(1, 10000)) . '.' . $extension;
            //图片保存路径
            $savePath = 'images/' . $newFileName;
            //web访问路径
            $webPath = '/storage/' . $savePath;
            //将文件保存在本地storage/app/public/images目录下，先判断文件名是否存在，  存在则直接返回，
            if (Storage::disk('public')->has($savePath)) {
                return response()->json(['path' => $webPath]);
            }
            //否则执行文件上传操作， 保存成功将返回路径给调用方
            if ($picture->storePubliclyAs('images', $newFileName, ['disk' => 'public'])) {
                return response()->json(['path' => $webPath]);
            }
            abort(500, '文件上传失败');
        } else {
            abort(400, '请选择要上传的文件');
        }
    }

    public function form(SubmitFormRequest  $request)
    {
        return \response('表单验证通过');
    }
}
