<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddition extends FormRequest
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
            'title' => 'required|max:255',
            'type' => 'required',
            'kitchen_model_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните заголовок',
            'type.required' => 'Заполните тип',
            'kitchen_model_id.required' => 'Выберите кухню',
            'image.mimes' => 'Загрузите изображения "Доступны форматы JPG и JPEG, PNG"',
        ];
    }
}
