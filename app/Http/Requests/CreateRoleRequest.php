<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use illumiminate\Support\Facades\Auth;

class CreateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()->can(manage-role-crud))
        {
            return true;
        }

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
            'name' => 'required|regex:/^[a-zA-Z0-9\-_\.]+$/|unique:roles, name',
            'display_name' => 'required',
            'description' => 'required:min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required for the Role.',
            'display_name.required' => 'This field is required for displaying purpose.',
            'description.required' => 'Role description based on CRUD.'
        ];
    }
}
