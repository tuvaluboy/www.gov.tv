<?php

namespace App\Http\Requests;

use App\Content;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('content_create');
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
