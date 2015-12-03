<?php namespace App\Components\OCS\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
	    if ($this->method() == 'PUT') {
		    $valid = [
		    ];
	    } else {
		    $valid = [
			    'order_code' => 'required|max:255',
			    'customer_id' => 'required|max:255',
		    ];
	    }
        return $valid;
    }

}
