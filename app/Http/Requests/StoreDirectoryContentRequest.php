<?php

namespace App\Http\Requests;

use App\DirectoryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDirectoryContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('directory_content_create');
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
