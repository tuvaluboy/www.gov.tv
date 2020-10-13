<?php

namespace App\Http\Requests;

use App\Aboutuvalu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAboutuvaluRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('aboutuvalu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:aboutuvalus,id',
        ];
    }
}
