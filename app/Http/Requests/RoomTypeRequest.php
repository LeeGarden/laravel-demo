<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
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
        $id = $this->id;
        
        $rules = [
            //
            'typename'    => 'required|unique:roomtypes,typename,'.$this->id,
            'maxpeople'   => 'required|integer',
            'price'       => 'required|numeric',
            'utility'     => 'required'
        ];
        
        if(empty($id))
        {
            $photos = count($this->input('imageUpload'));
            foreach(range(0, $photos) as $index) {
                $rules['imageUpload.' . $index] = 'required';
            }
        }

        return $rules;
    }
    public function messages(){
        return [
            'typename.required'    => 'Please enter Type name',
            'typename.unique'      => 'Type name already exists',
            'maxpeople.required'   => 'Please enter Max people',
            'maxpeople.integer'    => 'Max people must be an integer',
            'price.required'       => 'Please enter Price for room type',
            'price.numeric'        => 'Price must be an number',
            'imageUpload.required' => 'Please select photos for Room type',
            'utility.required'     => 'Please select Utility for Room type',
        ];

    }
}
