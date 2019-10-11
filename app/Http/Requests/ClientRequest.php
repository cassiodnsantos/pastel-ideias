<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $id = $this->segment('3');

        return [
            'name'      => "required|max:191",
            'email'       => "required|unique:clients,email,{$id},id",
            'phone'     => "required|max:20",
            'address'     => "required|max:191",
            'neighborhood'     => "required|max:191",
            'zipecode'     => "required|max:191",
        ];
    }
}
