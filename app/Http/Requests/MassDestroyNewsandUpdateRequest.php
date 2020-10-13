<?php

namespace App\Http\Requests;

use App\NewsandUpdate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNewsandUpdateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('newsand_update_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:newsand_updates,id',
        ];
    }
}
