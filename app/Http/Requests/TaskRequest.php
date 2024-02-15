<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['nullable'],
            'long_description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
