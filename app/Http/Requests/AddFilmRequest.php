<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class AddFilmRequest extends FormRequest {

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
                $rules['name'] = 'required|max:255';
                $rules['description'] = 'required|max:1255';
                $rules['release_date'] = 'required|date';
                $rules['rating'] = 'required';
                $rules['ticket_price'] = 'required';
                $rules['country'] = 'required';
                $rules['genre'] = 'required';
                $rules['photo'] = 'required';
                break;
        }
        return $rules;
    }

}
