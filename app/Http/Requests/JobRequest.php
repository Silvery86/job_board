<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->employer !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|min:5000|numeric',
            'description' => 'required|string',
            'experience' => 'required|in:' . implode(',', Job::$experience),
            'category' => 'required|in:' . implode(',', Job::$category),
        ];
    }
}
