<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
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
        return [
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'required|mimes:png,jpg',
            'facebook' => 'required|string',
            'twitter' => 'required|string',
            'linkedin' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'position' => __('keywords.position'),
            'image' => __('keywords.image'),
            'facebook' => __('keywords.facebook'),
            'twitter' => __('keywords.twitter'),
            'linkedin' => __('keywords.linkedin'),
        ];
    }
}
