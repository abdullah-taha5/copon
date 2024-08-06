<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCouponRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !Gate::denies('coupon_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'coupon'    => 'nullable|string|max:20',
            'total_views_limit'    => 'nullable|integer',
            'daily_views_limit'    => 'nullable|integer',
            'started_at'    => 'nullable|date',
            'expire_at'    => 'nullable|date',
            'course_id'    => 'required|exists:courses,id',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = $this->expectsJson() ? $this->apiResponse($validator) : $this->webResponse($validator);

        throw new HttpResponseException($response);
    }
}
