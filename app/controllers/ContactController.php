<?php

class ContactController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }


    public function showIndex()
    {
        return View::make('locations-contact');
    }

    //Contact Form
    public function postContact(){

        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array (
            'name' => 'required|alpha',
            'phone'=>'numeric|min:8',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:20'
        );


        //Validate data
        $validator = Validator::make ($data, $rules);

        //If everything is correct than run passes.
        if ($validator -> passes()){

            switch($data['location'])
            {
                case 'surrey':
                    $data['location'] = 'guildford@batteriesincluded.ca';
                    break;
                case 'richmond':
                    $data['location'] = 'lansdowne@batteriesincluded.ca';
                    break;
                case 'white rock':
                    $data['location'] = 'whiterock@batteriesincluded.ca';
                    break;
                case 'nanaimo':
                    $data['location'] = 'nanaimo@batteriesincluded.ca';
                    break;
                default:
                    $data['location'] = '';
            }

            //Send email using Laravel send function
            Mail::send('emails.test', $data, function($message) use ($data)
            {
                //email 'From' field: Get users email add and name
                $message->from($data['email'] , $data['name']);
                //email 'To' field: change this to emails that you want to be notified.
                $message->to($data['location'], 'Batteries Included')->subject($data['subject']);
            });

            return Redirect::to('http://batteriesincluded.dev/locations-contact')->with('flash-message', 'Your message has been sent! Someone will get back to you shortly!');
        }else{
            //return contact form with errors
            return Redirect::to('http://batteriesincluded.dev/locations-contact')
                ->withErrors($validator)
                ->withInput();
        }
    }

}