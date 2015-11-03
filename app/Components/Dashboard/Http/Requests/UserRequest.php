<?php namespace App\Components\Dashboard\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $valid = [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ];

        if ($this->method() == 'PUT') {
            // Update operation, exclude the record with id from the validation:
            $valid['email'] .= ',' . $this->get('id');
            $valid['password'] = 'confirmed|min:6';
        }
        return $valid;
    }

}
