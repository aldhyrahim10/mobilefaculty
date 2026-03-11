<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'academic_category_id' => 'required|integer|exists:academic_categories,id',
            'instructor_id' => 'required|integer|exists:instructors,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required',
            'level' => 'required',
            'method' => 'required',
            'duration' => 'required',
            'certificate_type' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'tags' => 'required|string'
        ];
    }
}
