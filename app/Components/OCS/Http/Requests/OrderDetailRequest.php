<?php namespace App\Components\OCS\Http\Requests;

use App\Http\Requests\Request;

class OrderDetailRequest extends Request
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
			    'quantity' => 'required',
			    'price' => 'required',
		    ];
	    } else {
		    $valid = [
			    'product_id' => 'required',
			    'service_id' => 'required',
			    'quantity' => 'required',
			    'price' => 'required',
		    ];
	    }
        return $valid;
    }

}
