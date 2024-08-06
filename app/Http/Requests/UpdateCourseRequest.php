<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('course_edit');
    }

    /**courses
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           /*  'title_en' => [
                'string',
                'required',
            ],
            'description_en' => [
                'string',
                'required',
            ],
            'title_ar' => [
                'string',
                'required',
            ],
            'description_ar' => [
                'string',
                'required',
            ],
            'price' => [
                'numeric',
                'nullable',
            ], */
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = $this->expectsJson() ? $this->apiResponse($validator) : $this->webResponse($validator);

        throw new HttpResponseException($response);
    }
}
