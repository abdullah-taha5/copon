<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && Gate::allows('lesson_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['exists:courses,id'],
            'thumbnail' => ['required', 'mimes:png,jpg,jpeg,webp'],
            'video' => ['nullable', 'mimes:mp4'],
            'iframe' => ['nullable'],
            'position' => ['required', 'integer'],

            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],

            'short_text_ar' => ['required', 'string', 'max:500'],
            'short_text_en' => ['required', 'string', 'max:500'],

            'long_text_ar' => ['required', 'string'],
            'long_text_en' => ['required', 'string'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = $this->expectsJson() ? $this->apiResponse($validator) : $this->webResponse($validator);

        throw new HttpResponseException($response);
    }
}
