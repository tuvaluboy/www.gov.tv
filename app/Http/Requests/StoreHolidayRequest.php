<?php

namespace App\Http\Requests;

use App\Holiday;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHolidayRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('holiday_create');
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
