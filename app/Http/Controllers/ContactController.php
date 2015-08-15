<?php namespace App\Http\Controllers;

use App\Email;
use App\Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\SendEmailRequest;
use Laracasts\Flash\Flash;
use Mail;
class ContactController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $configs = Config::getConfigs(['linkedin']);
		return view('contact.index', compact('configs'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SendEmailRequest $emailRequest)
    {
        $values = $emailRequest->all();
        $values['status'] = 1;
        if ($values['birthday'] === ''){
            Email::create($values);
            Flash::message('Your email has been sent. Thank you!');
        }
        return redirect('contact');
    }

    /**
     * Sends emails
     *
     * @return Response
     */
    public function send()
    {
        $emails = Email::notSent()->get();
        foreach($emails as $email)
        {
            $email->send();
        }
    }

}
