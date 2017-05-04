<?php

namespace Canvas\Http\Requests;

use Canvas\Helpers\CanvasHelper;

class TagCreateRequest extends FormRequest
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
        $this->sanitizeTag();

        return [
            'tag' => 'required|unique:'.CanvasHelper::TABLES['tags'].',tag',
            'title' => 'required',
            'subtitle' => 'required',
        ];
    }
}
