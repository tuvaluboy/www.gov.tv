<?php

namespace App\Http\Requests;

use App\ServicesSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServicesSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('services_sub_category_create');
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
