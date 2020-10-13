<?php

namespace App\Http\Requests;

use App\Tuvaludevelopmentplan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTuvaludevelopmentplanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tuvaludevelopmentplan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tuvaludevelopmentplans,id',
        ];
    }
}
