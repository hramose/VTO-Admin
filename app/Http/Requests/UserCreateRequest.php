<?php namespace App\Http\Requests;

class UserCreateRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|max:70|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed|min:8',
			'imagex' => 'mimes:jpeg,bmp,png'
		];
	}

}