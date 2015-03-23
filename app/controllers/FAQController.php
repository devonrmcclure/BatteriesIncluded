<?php

class FAQController extends \BaseController {

    /**
     * Get questions and answers from the database and show them.
     * @return [View] [views/faq.blade.php]
     */
    public function showIndex()
    {
        return View::make('faq');
    }
}