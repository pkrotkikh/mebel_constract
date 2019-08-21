<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\Kitchen_model;
use Illuminate\Foundation\Http\FormRequest;

class StoreKitchen extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'title' => 'sometimes|required|max:255|unique:kitchen_model,title,'.$this->id,
            'price' => 'sometimes|required',
            'image' => 'mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните заголовок',
            'title.unique' => 'Заголовок должен быть уникальным',
            'price.required' => 'Заполните цену',
            'image.mimes' => 'Загрузите изображения "Доступны форматы JPG и JPEG, PNG"',
        ];
    }
}
