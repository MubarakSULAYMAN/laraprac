<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'address' => 'required|min:5',
            'email' => 'required|email',
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:204',
            'website' => 'required|url',
        ];
    }
}
