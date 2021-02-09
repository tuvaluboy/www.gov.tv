<?php

namespace App\Http\Requests;

use App\Picture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePictureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('picture_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
