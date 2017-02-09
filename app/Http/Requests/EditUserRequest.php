<?php

namespace Melenquizz\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !is_null($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->route('user')->id],
        ];

        if ($this->get('password') != '') {
            $rules['password'] = ['required', 'confirmed'];
        }

        return $rules;
    }
}
