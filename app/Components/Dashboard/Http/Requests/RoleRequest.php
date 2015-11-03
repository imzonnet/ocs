<?php namespace App\Components\Dashboard\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
            'name' => 'required|regex:#^[a-z]+$#|unique:roles,name',
        ];

        if ($this->method() == 'PUT') {
            // Update operation, exclude the record with id from the validation:
            $valid['name'] .= ',' . $this->get('id');
        }
        return $valid;
    }

}
