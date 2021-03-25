<?php

namespace App\Http\Requests;

use App\Item;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_create');
    }

    public function rules()
    {
        return [
            'title'  => [
                'string',
                'nullable',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags'   => [
                'array',
            ],
        ];
    }
}
