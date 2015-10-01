<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RuRequest extends Request {

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
			'headline' => 'required|min:3|max:30',
            'info' => 'required|min:3|max:500',
                       
            
		];
	}

}
