<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller {

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create', ['category' => $this->category]);
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
        ]);
        $category = $this->category->fill($request->all());
        $category->setOrder();
        $category->save();
        return redirect('skills');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('categories.edit', compact('category'));
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
        ]);
        $category = $this->category->findOrFail($id);
        $category->fill($request->all());
        $category->update();
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
        $category = $this->category->findOrFail($id);
        return ($category->delete()) ? 1 : 0;
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
        $category = $this->category->findOrFail($id);
        if (0 == $result = $category->$direction()){
            return $result;
        }
        else {
            $categories = $this->category->orderBy('order', 'asc')->get();
            return view('skills.partials.table', compact('categories'));
        }
    }

}
