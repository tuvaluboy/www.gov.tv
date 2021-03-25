<?php

namespace App\Http\Requests;

use App\MinistryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMinistryContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ministry_content_edit');
    }

    public function rules()
    {
        return [
            'sub_categories.*' => [
                'integer',
            ],
            'sub_categories'   => [
                'array',
            ],
            'title'            => [
                'string',
                'nullable',
            ],
        ];
    }
}
