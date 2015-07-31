<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Config;

use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $configs = Config::getConfigs(['my-photo', 'about-me-head', 'about-me-body']);
		return view('home.index', compact('configs'));
	}
}
