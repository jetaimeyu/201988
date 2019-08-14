<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'picture' => 'bail|required|image|mimes:jpg,png,jpeg|max:1024',
        ];
    }

    public function messages()
    {

        return [
            'picture.required' => '请选择要上传的图片',
            'picture.image' => '只支持上传图片',
            'picture.mimes' => '只支持上传jpg/png/jpeg格式的图片',
            'picture.max' => '上传图片超过最大尺寸限制(1M)'
        ];
    }
}
