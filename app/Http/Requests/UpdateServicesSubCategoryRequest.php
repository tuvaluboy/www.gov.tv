<?php

namespace App\Http\Requests;

use App\ServicesSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServicesSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('services_sub_category_edit');
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
