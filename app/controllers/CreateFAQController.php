<?php

class CreateFAQController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /**
     * Show the create FAQ page.
     * @return [View] [views/admin/faq.blade.php]
     */
    public function showIndex()
    {
        return View::make('admin.add.faqs');
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
        $data = Input::all();
        if($data['faq-question'] == '' || $data['faq-answer'] == '')
        {
            return Redirect::to($_ENV['URL'] . '/admin/add/faqs')
                            ->with('flash-message', 'Please fill out all fields to add a FAQ!')
                            ->with('alert-class', 'alert-danger');
        } else {
            $FAQ = new FAQ;
            $FAQ->question = $data['faq-question'];
            $FAQ->answer = $data['faq-answer'];
            $FAQ->priority = $data['priority'];
            $FAQ->created_at = Carbon::now();
            $FAQ->updated_at = Carbon::now();
            $FAQ->save();
            return Redirect::to($_ENV['URL'] . '/admin/add/faqs')
                            ->with('flash-message', 'FAQ has been successfully added!')
                            ->with('alert-class', 'alert-success');
        }
    }
}