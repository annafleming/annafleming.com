<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\PracticalSkill;
use App\Category;
use App\Skill;
use App\Language;
use App\History;
use App\Config;
use Illuminate\Http\Response;

class ResumeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $practicalSkills = PracticalSkill::orderBy("order", "asc")->get(["name", "rank"]);
        $categories = Category::splitInHalf();
        $languages = Language::visible()->get();
        $records = History::visible()->get();
        $configs = Config::getConfigs(['currently-learning', 'resume']);
		return view('resume.index', compact('practicalSkills', 'categories', 'languages', 'records', 'configs'));
	}

    /**
     * Download resume file
     *
     * @return Response
     */

    public function download()
    {
        $configs = Config::getConfigs(['resume']);
        var_dump($configs['resume']);
        if ($configs['resume'])
            return response()->download($configs['resume'], 'Resume.docx');
        else
            redirect('cv');
    }

}
