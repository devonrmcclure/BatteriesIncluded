<?php

class CreateFAQController extends \BaseController {

    /**
     * Show the create FAQ page.
     * @return [View] [views/admin/faq.blade.php]
     */
    public function showIndex()
    {
        return View::make('admin.add.faq');
    }

    /**
     * Add a question and answer to the FAQ from the Admin page.
     * @return [Redirect] [Redirect to the add FAQ Admin page.]
     */
    public function postAddFAQ()
    {
        // > Get information
        // > Check for completeness
        // > Post to DB
        // > Redirect to add FAQ page with success or error message.
    }
}