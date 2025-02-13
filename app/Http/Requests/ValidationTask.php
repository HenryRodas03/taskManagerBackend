<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ValidationTask extends FormRequest
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

        if ($this->routeIs('listAllTasks')) {
            return [
                'user_id' => 'required',
            ];
        }

        if ($this->routeIs('saveOrUpdateTask')) {
            return [
                'user_id' => 'required',
                'id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'status' => 'required',
                'date' => 'required',
            ];
        }

        if ($this->routeIs('deleteTask')) {
            return [
                'user_id' => 'required',
                'taskId' => 'required',
            ];
        }

        return [];
    }
}
