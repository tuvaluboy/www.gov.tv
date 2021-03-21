<?php

namespace App\Http\Requests;

use App\DirectoryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDirectoryContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('directory_content_edit');
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
