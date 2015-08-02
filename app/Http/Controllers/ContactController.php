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
        if ($values['birthday'] === ''){
            $email = Email::create($values);
            Mail::queue('emails.contact',  $email->attributesToArray(), function ($message) use ($email) {
                $message->to(env('MAIL_USERNAME'))->subject($email->subject)->replyTo($email->email);
            });
            Flash::message('Your email has been sent. Thank you!');
        }
        return redirect('contact');
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
