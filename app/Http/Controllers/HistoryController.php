<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\MakeHistoryRecordRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\History;

class HistoryController extends Controller {

    protected $record;

    public function __construct(History $record)
    {
        $this->record = $record;
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $records = $this->record->visible()->get();
        return view('history.index', compact('records'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('history.create', ['record' => $this->record]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(MakeHistoryRecordRequest $request)
	{
		$record = $this->record->fill($request->all());
        $record->setOrder();
        $record->save();
        return redirect('history');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$record = $this->record->findOrFail($id);
        return view('history.edit', compact('record'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, MakeHistoryRecordRequest $request)
	{
        $record = $this->record->findOrFail($id);
        $record = $record->fill($request->all());
        $record->update();
        return redirect('history');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $record =  $this->record->findOrFail($id);
        return ($record->delete()) ? 1 : 0;
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
        $record = $this->record->findOrFail($id);
        if (0 == $result = $record->$direction()){
            return $result;
        }
        else {
            $records = $this->record->orderBy('order', 'asc')->get();
            return view('history.partials.table', compact('records'));
        }
    }
}
