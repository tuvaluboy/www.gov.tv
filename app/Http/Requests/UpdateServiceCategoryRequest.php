<?php

namespace App\Http\Requests;

use App\ServiceCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_category_edit');
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
