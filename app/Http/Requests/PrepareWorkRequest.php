<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrepareWorkRequest extends Request {

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
			'link' => 'url',
            'name' => 'required',
            'description' => 'required',
            'my_role' => 'required',
            'image' => 'max:1000|mimes:jpg,png,gif',
		];
	}

}
