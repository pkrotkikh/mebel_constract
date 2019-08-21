<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKitchenParam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'depth_top' => 'required',
            'depth_bottom' => 'required',
            'kitchen_model_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'depth_top.required' => 'Заполните глубину вверха',
            'depth_bottom.required' => 'Заполните глубину низа',
            'kitchen_model_id.required' => 'Выбирите кухню',
        ];
    }
}
