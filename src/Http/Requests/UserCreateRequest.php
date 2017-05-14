<?php

namespace Canvas\Http\Requests;

use Canvas\Helpers\CanvasHelper;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->sanitizeUser();

        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'display_name' => 'required',
            'email' => 'required|unique:'.CanvasHelper::TABLES['users'].'|email',
            'password' => 'required',
            'role' => 'required',
        ];
    }
}
