<?php

namespace App\Http\Requests;

use App\ServicesSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyServicesSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('services_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:services_sub_categories,id',
        ];
    }
}
