<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|unique:task_statuses,name'
        ];
    }
}
