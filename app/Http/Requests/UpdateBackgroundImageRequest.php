<?php

namespace App\Http\Requests;

use App\BackgroundImage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBackgroundImageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('background_image_edit');
    }

    public function rules()
    {
        return [];
    }
}
