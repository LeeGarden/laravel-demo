<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        return [
            'roomnumber' => 'required|unique:rooms,roomnumber,'.$this->id,
            'roomtype'   => 'required'
        ];
    }
    public function messages()
    {
        return[
            'roomnumber.required' => 'Please enter room number',
            'roomnumber.unique' => 'Room number already exist',
            'roomtype.required' => 'Please select room type'
        ];
    }
}
