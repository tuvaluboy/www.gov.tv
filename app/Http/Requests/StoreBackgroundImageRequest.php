<?php

namespace App\Http\Requests;

use App\BackgroundImage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBackgroundImageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('background_image_create');
    }

    public function rules()
    {
        return [];
    }
}
