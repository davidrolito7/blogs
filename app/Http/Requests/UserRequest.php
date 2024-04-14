<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Importa la clase Rule

class UserRequest extends FormRequest
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
        $userId=$this->route('user')->id ?? null;
        return [
            'name'=>'required|max:255',
            'email'=>[
                'required',
                Rule::unique('users','email')->ignore($userId),

        ],
            'password'=>'required|min:8|max:12'
        ];
    }
}
