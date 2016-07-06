<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PetRequest extends Request {

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
		$allowedFileTypes = config('app.allowedFileTypes');
		$maxFileSize = config('app.maxFileSize');
		return [
		'qrCode' => 'required|max:30|unique:tblpet',
		'petName' => 'required|max:20',
		'petType' => 'required|max:20',
		'breed' => 'required|max:30',
		'gender' => 'required',
		'dob' => 'required',
		'colour' => 'required|max:10',
		'isAdopted' => 'required',
		'isNeutralized' => 'required',
		'adoptedDate' => '',
		'picturePath' => 'mimes:jpg,jpeg,bmp,png'.$allowedFileTypes.'|max:'.$maxFileSize
		];
	}
}
