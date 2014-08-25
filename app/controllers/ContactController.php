<?php

class ContactController extends \BaseController {

    public function showIndex()
    {
        return View::make('locations-contact');
    }

    //Contact Form
    public function postContact(){

        echo 'WOOOOO';
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

            //Send email using Laravel send function
            Mail::send('locations-contact', $data, function($message) use ($data)
            {
                //email 'From' field: Get users email add and name
                $message->from($data['email'] , $data['name']);
                //email 'To' field: change this to emails that you want to be notified.
                $message->to('whiterock@batteriesincluded.ca', 'Batteries Included')->cc('devon.r.mcclure@gmail.com')->subject($data['subject']);
            });

        return View::make('locations-contact');
        }else{
            //return contact form with errors
            return Redirect::to('http://batteriesincluded.dev/locations-contact')
                ->withErrors($validator)
                ->withInput();
        }
    }

}