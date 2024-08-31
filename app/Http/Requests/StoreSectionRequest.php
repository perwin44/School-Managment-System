<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
        return [
            'Name_Section_Ar' => 'required',
            'Name_Section_En'  => 'required',
           
        ];
    }
    public function messages(): array
    {
    return [
        'Name_Section_Ar.required' => trans('validation.required'),
        'Name_Section_En.required' => trans('validation.required'),
      
    ];
    }
}
