<?php

namespace App\Http\Requests;

use App\DirectoryCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectoryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('directory_category_create');
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
