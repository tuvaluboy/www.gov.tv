<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\BackgroundImage;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBackgroundImageRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('background_image_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:background_images,id',
]
    
}

}