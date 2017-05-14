<?php

namespace Canvas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    /**
     * Sanitize post input.
     *
     * @return void
     */
    public function sanitizePost()
    {
        $input = array_map('trim', $this->all());
        if (!count($input)) return;

        $input['title'] = strip_tags($input['title']);
        $input['subtitle'] = strip_tags($input['subtitle']);
        $input['meta_description'] = strip_tags($input['meta_description']);

        $this->replace($input);
    }

    /**
     * Sanitize tag input.
     *
     * @return void
     */
    public function sanitizeTag()
    {
        $input = array_map('trim', $this->all());
        if (!count($input)) return;

        $input['tag'] = strip_tags($input['tag']);
        $input['title'] = strip_tags($input['title']);
        $input['subtitle'] = strip_tags($input['subtitle']);
        $input['meta_description'] = strip_tags($input['meta_description']);

        $this->replace($input);
    }

    /**
     * Sanitize user input.
     *
     * @return void
     */
    public function sanitizeUser()
    {
        $input = array_map('trim', $this->all());
        if (!count($input)) return;

        $input['bio'] = strip_tags($this['bio']);
        $input['url'] = strip_tags($this['url']);
        $input['job'] = strip_tags($this['job']);
        $input['city'] = strip_tags($this['city']);
        $input['address'] = strip_tags($this['address']);
        $input['country'] = strip_tags($this['country']);
        $input['last_name'] = strip_tags($this['last_name']);
        $input['first_name'] = strip_tags($this['first_name']);
        $input['display_name'] = strip_tags($this['display_name']);

        $this->replace($input);
    }
}