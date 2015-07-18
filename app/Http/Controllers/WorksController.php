<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PrepareWorkRequest;
use App\Work;

use Illuminate\Support\Facades\File;
class WorksController extends Controller {

    protected $work;

    public function __construct(Work $work)
    {
        $this->work = $work;
        $this->middleware('auth', ['except' =>'index']);
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('works.index', ['works' => $this->work->visible()->get()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('works.create', ['work' => $this->work]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param PrepareWorkRequest $workRequest
     * @return Response
     */
	public function store(PrepareWorkRequest $workRequest)
	{
        $work = $this->work->fill($workRequest->all());
        $work->manageWorkImage($workRequest->file('image'));
        $work->save();
        return redirect('works/manage');

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$work = $this->work->findOrFail($id);
        return view('works.edit', compact('work'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PrepareWorkRequest $workRequest)
	{
        $work = $this->work->findOrFail($id);
        $work->fill($workRequest->all());
        $work->manageWorkImage($workRequest->file('image'));
        $work->update();
        return redirect('works/manage');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $work = $this->work->findOrFail($id);
        $work->deleteImage();
        return ($work->delete()) ? 1 : 0;
	}

    /**
     *  Displays table of the resources for admin
     *
     * @return Response
     */
    public function manage()
    {
        $works = Work::all();
        return view('works.manage', compact('works'));
    }

}
