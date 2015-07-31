<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Language;

class LanguagesController extends Controller {

    protected $language;

    public function __construct(Language $language)
    {
        $this->language = $language;
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$languages = $this->language->orderBy('order', 'asc')->get();
        return view('languages.index', compact('languages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('languages.create', ['language' => $this->language]);
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
            'image' => 'mimes:jpg,png,gif',
        ]);
        $language = $this->language->fill($request->all());
        $language->setOrder();
        $language->manageFile($request->file('image'));
        $language->save();
        return redirect('languages');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$language = $this->language->findOrFail($id);
        return view('languages.edit', compact('language'));
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
            'image' => 'mimes:jpg,png,gif',
        ]);
        $language =  $this->language->findOrFail($id);
        $language->fill($request->all());
        $language->manageFile($request->file('image'));
        $language->update();
        return redirect('languages');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $language =  $this->language->findOrFail($id);
        $language->deleteFile();
        return ($language->delete()) ? 1 : 0;
	}

    /**
     * Change the order of the resources.
     *
     * @param  int  $id
     * @param  str  $direction
     * @return Response
     */
    public function move($id, $direction)
    {
        $language = $this->language->findOrFail($id);
        if (0 == $result = $language->$direction()){
            return $result;
        }
        else {
            $languages = $this->language->orderBy('order', 'asc')->get();
            return view('languages.partials.table', compact('languages'));
        }
    }
}
