<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Config;

class ConfigController extends Controller {

    protected $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->config->field_type = 'text';
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('config.index', ['configs' => Config::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('config.create', ['config' => $this->config]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'field_type' => 'required',
        ]);
        $this->config->fillConfig($request)->save();
        return redirect('config');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $config = $this->config->findOrFail($id);
        return view('config.edit', compact('config'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'value' => 'required',
            'field_type' => 'required',
        ]);
        $config = $this->config->findOrFail($id);
        $config->fillConfig($request)->update();
        return redirect('config');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $config=  $this->config->findOrFail($id);
        if ($config->field_type == 'file')
            $config->deleteFile('value');
        return ($config->delete()) ? 1 : 0;
	}

}
