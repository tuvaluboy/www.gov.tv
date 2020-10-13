<?php

namespace App\Http\Requests;

use App\Tuvaluconstition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTuvaluconstitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tuvaluconstition_create');
    }

    public function rules()
    {
        return [
            'tittle' => [
                'string',
                'nullable',
            ],
        ];
    }
}
