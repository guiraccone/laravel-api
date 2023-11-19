<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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

        switch ($this->method()) {

            case 'POST':
                $rules = [
                    'name' => 'required|min:3|max:255',
                    'email' => [
                        'required',
                        'email',
                        'max:255',
                        Rule::unique('users'),
                    ],
                    'password' => [
                        'required',
                        'min:6',
                        'max:100',
                    ]
                ];
                break;

            case 'PUT':
                $rules = [
                    'name' => 'required|min:3|max:255',
                    'email' => [
                        'required',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore($this->id)
                    ],
                    'password' => [
                        'required',
                        'min:6',
                        'max:100',
                    ]
                ];
                break;
               
            case 'PATCH':
                $rules = [
                    'name' => 'nullable|min:3|max:255',
                    'email' => [
                        'nullable',
                        'email',
                        'max:255',
                        Rule::unique('users')->ignore($this->id)
                    ],
                    'password' => [
                        'nullable',
                        'min:6',
                        'max:100',
                    ]
                ];
                break;

        }
        return $rules;
    }
}
