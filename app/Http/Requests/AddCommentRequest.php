<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AddCommentRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();
        switch (strtolower($this->method()))
        {
            case 'post':
                $rules['film_guid'] = 'required|max:255';
                $rules['name'] = 'required|max:255';
                $rules['comment'] = 'required|max:1255';
                break;
        }
        return $rules;
    }

}
