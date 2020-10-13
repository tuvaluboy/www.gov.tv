<?php

namespace App\Http\Requests;

use App\Tuvaludevelopmentplan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTuvaludevelopmentplanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tuvaludevelopmentplan_edit');
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
