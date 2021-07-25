<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'salary' => 'nullable|numeric',
            'department_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Укажите имя',
            'surname.required' => 'Укажите фамилию',
            'salary.numeric' => 'Введите корректно зарплату',
            'department_id.required' => 'Укажите хотя бы один отдел к которому относится сотрудник'
        ];
    }
}
