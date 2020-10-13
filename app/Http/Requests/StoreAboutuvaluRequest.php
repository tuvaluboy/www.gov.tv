<?php

namespace App\Http\Requests;

use App\Aboutuvalu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAboutuvaluRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('aboutuvalu_create');
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
