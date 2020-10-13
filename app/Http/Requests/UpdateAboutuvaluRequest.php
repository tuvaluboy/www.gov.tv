<?php

namespace App\Http\Requests;

use App\Aboutuvalu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAboutuvaluRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('aboutuvalu_edit');
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
