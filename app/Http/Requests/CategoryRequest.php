<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       
        $arr = ['category_name' => ['required', 'max:50', 'min:2']];

        if ($this->category_id)
            $arr['category_id'] = "exists:App\Models\Category,id";

        return $arr;

    }

    public function messages(): array
    {
        return [
            'required' => ':attribute zorunludur.',
            'max' => ':attribute :max karakteri aşmamalıdır.',
            'min' => ':attribute :min karakterin altında olmamalıdır.',
            'exists' => ':attribute bulunamadı.'
        ];
    }

    public function attributes(): array
    {
        return [
            "category_name" => 'Kategori adı',
            'category_id' => 'Üst ktegory'
        ];
    }
}
