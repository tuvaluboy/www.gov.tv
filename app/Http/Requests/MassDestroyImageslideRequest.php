<?php

namespace App\Http\Requests;

use App\Imageslide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyImageslideRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('imageslide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:imageslides,id',
        ];
    }
}
