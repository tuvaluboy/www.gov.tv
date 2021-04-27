<?php

namespace App\Http\Requests;

use App\MenuMessage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMenuMessageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('menu_message_create');
    }

    public function rules()
    {
        return [];
    }
}
