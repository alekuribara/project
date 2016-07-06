<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
			'signup_email' => 'required|email|max:100|unique:tbluser,email',
			'signup_password' => 'required|confirmed|min:6',
 			'firstName' => 'required|max:50',
			'lastName' => 'required|max:50',
			'address_st' =>'required|max:50',
			'address_sub' =>'max:50',
			'address_city' =>'required|max:50',
			'postcode' =>'required|max:4',
			'phone'=>'required|max:12',
		];
	}
}
