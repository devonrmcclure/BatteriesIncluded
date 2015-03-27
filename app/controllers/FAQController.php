<?php

class FAQController extends \BaseController {

    /**
     * Get questions and answers from the database and show them.
     * @return [View] [views/faq.blade.php]
     */
    public function showIndex()
    {
        // Get all FAQs and order them by the set priority.
        $faqs = FAQ::orderBy('priority', 'DESC')->get();

        return View::make('faq')
            ->with('faqs', $faqs);
    }
}