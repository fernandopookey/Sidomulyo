<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return true;
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'      => 'required|string|max:50',
            'username'      => 'required|string|max:50',
            'email'         => 'required|email',
            'roles'         => 'nullable|string|in:ADMIN,USER,CS',
            'address'       => 'required',
            'phone_number'  => 'required',
            'status'        => 'boolean'
        ];
    }
}
