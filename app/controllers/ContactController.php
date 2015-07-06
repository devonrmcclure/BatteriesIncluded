<?php

class ContactController extends \BaseController {

    /**
     * Apply a beforeFilter of csfr to prevent csfr.
     */
    public function __construct()
    {
        $this->beforeFilter('csfr', array('on' => 'post'));
    }

    /**
     * Create the locations-contact page view.
     * @return [View] [load the view for the locations-contact page]
     */
    public function showIndex()
    {
        return View::make('locations-contact');
    }

    /**
     * Procress the contact form and validate it again (it will already have been validated by javascript by this point) and return to the locations-contact page with any errors.
     * @return [Redirect] [Redirect back to the locaitons-contact page]
     */
    public function postContact(){

        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array (
            'name' => 'required',
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

            // Send email using Mandrill
            Mail::send('emails.contact', $data, function($message) use ($data)
            {
                // Message from information using the customers input Email and Name.
                $message->from($data['email'] , $data['name']);
                $message->to($data['location'], 'Batteries Included')->subject($data['subject']);
            });

            return Redirect::to($_ENV['URL'] . '/locations-contact')
                            ->with('alert-class', 'success')
                            ->with('flash-message', 'Your message has been sent! Someone will get back to you shortly!');
        }else{
            // Return contact form with errors
            return Redirect::to($_ENV['URL'] . '/locations-contact')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'There was an error! Please look over your message and try again!')
                            ->withInput();
        }
    }

}