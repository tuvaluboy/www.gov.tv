<?php

namespace App\Http\Requests;

use App\DirectorySubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDirectorySubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('directory_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:directory_sub_categories,id',
        ];
    }
}
