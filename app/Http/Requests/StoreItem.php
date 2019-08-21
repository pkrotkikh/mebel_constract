<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItem extends FormRequest
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
            'description' => 'required',
            'price' => 'required',
            'parameters_models_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните заголовок',
            'description.required' => 'Заполните описание',
            'price.required' => 'Заполните цену',
            'parameters_models_id.required' => 'Выберите тип модели',
            'image.mimes' => 'Загрузите изображения "Доступны форматы JPG, JPEG, PNG"',
        ];
    }
}
