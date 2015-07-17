<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\SkillCategory;

class SkillCategoryController extends Controller {

    protected $category;

    public function __construct(SkillCategory $category)
    {
        $this->category = $category;
        $this->middleware('auth');
    }

    public function create()
    {
        return view('skillcategory.create', ['category' => $this->category]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = $this->category->fill($request->all());
        $category->setOrder();
        $category->save();
        return redirect('skills');
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('skillcategory.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $category = $this->category->findOrFail($id);
        $category->fill($request->all());
        $category->update();
        return redirect('skills');
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        return ($category->delete()) ? 1 : 0;
    }

    public function move($id, $direction)
    {
        $category = $this->category->findOrFail($id);
        if ($direction == 'up')
            $result = $category->up();
        elseif ($direction == 'down')
            $result = $category->down();
        else
            abort(400);
        if ($result == 0)
            return $result;
        else {
            $categories = $this->category->orderBy('order', 'asc')->get();
            return view('skills.partials.table', compact('categories'));
        }
    }

}
