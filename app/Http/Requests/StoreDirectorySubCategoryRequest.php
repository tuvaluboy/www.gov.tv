<?php

namespace App\Http\Requests;

use App\DirectorySubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectorySubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('directory_sub_category_create');
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
