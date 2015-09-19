<?php

class ContactController extends \BaseController {

    /**
     * Create the locations-contact page view.
     * @return [View] [load the view for the locations-contact page]
     */
    public function showIndex()
    {
        return View::make('locations-contact');
    }
}