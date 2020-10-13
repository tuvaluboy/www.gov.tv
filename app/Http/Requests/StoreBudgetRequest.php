<?php

namespace App\Http\Requests;

use App\Budget;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBudgetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('budget_create');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
