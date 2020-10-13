<?php

namespace App\Http\Requests;

use App\Budget;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('budget_edit');
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
