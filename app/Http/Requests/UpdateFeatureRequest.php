<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'icon' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'icon' => __('keywords.icon'),
            'description' => __('keywords.description'),
        ];
    }
}
