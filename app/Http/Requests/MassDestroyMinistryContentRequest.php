<?php

namespace App\Http\Requests;

use App\MinistryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMinistryContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ministry_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ministry_contents,id',
        ];
    }
}
