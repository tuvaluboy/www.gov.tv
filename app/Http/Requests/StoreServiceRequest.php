<?php

namespace App\Http\Requests;

use App\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'title'      => [
                'string',
                'nullable',
            ],
            'contacts.*' => [
                'integer',
            ],
            'contacts'   => [
                'array',
            ],
            'tags.*'     => [
                'integer',
            ],
            'tags'       => [
                'array',
            ],
        ];
    }
}
