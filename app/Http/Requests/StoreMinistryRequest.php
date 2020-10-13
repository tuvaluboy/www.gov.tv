<?php

namespace App\Http\Requests;

use App\Ministry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMinistryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ministry_create');
    }

    public function rules()
    {
        return [
            'name'  => [
                'string',
                'nullable',
            ],
            'color' => [
                'string',
                'nullable',
            ],
        ];
    }
}
