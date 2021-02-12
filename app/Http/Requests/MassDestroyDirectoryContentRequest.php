<?php

namespace App\Http\Requests;

use App\DirectoryContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDirectoryContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('directory_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:directory_contents,id',
        ];
    }
}
