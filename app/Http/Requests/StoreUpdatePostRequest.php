<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePostRequest extends FormRequest
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
        $rules = [
            'thumbnail' => [
                'required',
                'image',
                'mimes:png,jpg,webp'
            ],
            'title' => [
                'required',
                'min:3',
                'max:255'
            ],
            'category' => [
                Rule::in('F', 'B', 'M', 'G')
            ],
            'body' => [
                'required',
                'min:3'
            ]
        ];

        if ($this->method() == 'PUT' || $this->method() == 'PATCH')
        {
            $rules['thumbnail'] = [
                'image',
                'mimes:png,jpg,webp'
            ];
        }

        return $rules;
    }
}
