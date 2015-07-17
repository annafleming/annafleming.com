<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Skill;
use App\SkillCategory;

class SkillsController extends Controller {

    protected $skill;

    public function __construct(Skill $skill)
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
        $categories = SkillCategory::orderBy('order', 'asc')->get();
        return view('skills.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$skill = $this->skill;
        return view('skills.create', compact('skill'));
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
            'category_id' => 'required',
        ]);
        $skill = $this->skill->fill($request->all());
        $skill->setOrder();
        $skill->save();
        return redirect('skills');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
        return view('skills.edit', compact('skill'));
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
            'category_id' => 'required',
        ]);
        $skill = $this->skill->findOrFail($id);
        $skill->fill($request->all());
        $skill->update();
        return redirect('skills');
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

    public function move($id, $direction)
    {
        $skill = $this->skill->findOrFail($id);
        if ($direction == 'up')
            $result = $skill->up();
        elseif ($direction == 'down')
            $result = $skill->down();
        else
            abort(400);
        if ($result == 0)
            return $result;
        else {
            $categories = SkillCategory::orderBy('order', 'asc')->get();
            return view('skills.partials.table', compact('categories'));
        }
    }
}
