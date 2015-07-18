<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PracticalSkill;
use Illuminate\Http\Request;
use App\Http\Requests\PracticalSkillRequest;

class PracticalSkillsController extends Controller {

    protected $skill;

    public function __construct(PracticalSkill $skill)
    {
        $this->skill = $skill;
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $skills = $this->skill->orderBy('order', 'asc')->get();
		return view('practical.index', compact('skills'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('practical.create', ['skill' => $this->skill]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PracticalSkillRequest $request)
	{
        $skill = $this->skill->fill($request->all());
		$skill->setOrder();
        $skill->save();
        return redirect('practical');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$skill = $this->skill->findOrFail($id);
        return view('practical.edit', compact('skill'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, PracticalSkillRequest $request)
	{
        $skill = $this->skill->findOrFail($id);
        $skill->fill($request->all());
        $skill->update();
        return redirect('practical');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $skill = $this->skill->findOrFail($id);
        return ($skill->delete()) ? 1 : 0;
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
        $skill = $this->skill->findOrFail($id);
        if (0 == $result = $skill->$direction()){
            return $result;
        }
        else {
            $skills = $this->skill->orderBy('order', 'asc')->get();
            return view('practical.partials.table', compact('skills'));
        }
    }

}
