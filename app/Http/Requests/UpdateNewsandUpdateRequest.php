<?php

namespace App\Http\Requests;

use App\NewsandUpdate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsandUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('newsand_update_edit');
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
