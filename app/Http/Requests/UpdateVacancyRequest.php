<?php

namespace App\Http\Requests;

use App\Vacancy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVacancyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacancy_edit');
    }

    public function rules()
    {
        return [
            'title'   => [
                'string',
                'nullable',
            ],
            'level'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'duedate' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
