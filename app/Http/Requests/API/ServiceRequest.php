<?php

namespace App\Http\Requests\API;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ( $this->is('api/*') )
        {
            $response = ApiResponse::sendResponse(422, 'Validation Errors', $validator->errors());
            throw new ValidationException( $validator, $response);
        }
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
            'icon' => 'required|string',
            'description' => 'required',
        ];
    }
    
    
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'icon' => 'Icon',
            'description' => 'Description',
        ];
    }
}
