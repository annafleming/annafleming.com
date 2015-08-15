<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Email extends Model {

    protected $fillable = ['email', 'subject', 'body', 'status'];

    /**
     * Select resources with status=1
     *
     * @param  $query
     * @return
     */
    public function scopeNotSent($query)
    {
        return $query->where('status', '=', 1);
    }
    /**
     * Sends emails with status=1
     *
     */
    public function send()
    {
        $this->status = 2;
        $this->update();
        Mail::queue('emails.contact',  $this->attributesToArray(), function ($message) {
            $message->to(env('MAIL_USERNAME'))->subject($this->subject)->replyTo($this->email);
        });
        $this->status = 3;
        $this->update();
    }
}
