<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ValidationLogin extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        if ($this->routeIs('login')) {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
        }

        if ($this->routeIs('logout')) {
            return [
                'id' => 'required',
            ];
        }

        return [];
    }
}
