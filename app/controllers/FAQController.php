<?php

class FAQController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('showIndex')));
        $this->beforeFilter('pass_expired', array('except' => array('showIndex')));
    }


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


    /**
     * Get questions and answers from the database and show them.
     * @return [View] [views/faq.blade.php]
     */
    public function editIndex()
    {
        // Get all FAQs and order them by the set priority.
        $faqs = FAQ::orderBy('priority', 'DESC')->get();

        return View::make('admin.edit.faqs')
            ->with('faqs', $faqs);
    }

    public function getEditFAQ($id)
    {
        if($faq = FAQ::find($id))
        {
            return View::make('admin.edit.editFAQ')
                    ->with('faq', $faq);
        } else {
            // Product doesn't exits (IE: User enters a number in the URL)
            return Redirect::to($_ENV['URL'] . '/admin/edit/faqs')
                            ->with('alert-class', 'error')
                            ->with('flash-message', 'The FAQ you requested does\'nt exist!');
        }
    }

    public function putEditFAQ($id)
    {
        $data = Input::all();
        $FAQ  = FAQ::find($id);

        if($data['faq-question'] != '' || $data['faq-answer'] != '')
        {
            // Update priority if it is set, otherwise don't update the priority.
            if($data['priority'] != 'select_priority')
            {
                $FAQ->question = $data['faq-question'];
                $FAQ->answer = $data['faq-answer'];
                $FAQ->priority = $data['priority'];
                $FAQ->updated_at = Carbon::now();
                $FAQ->save();
                return Redirect::to($_ENV['URL'] . '/admin/edit/faqs')
                                ->with('flash-message', 'FAQ has been successfully updated!')
                                ->with('alert-class', 'success');
            } else {
                $FAQ->question = $data['faq-question'];
                $FAQ->answer = $data['faq-answer'];
                $FAQ->updated_at = Carbon::now();
                $FAQ->save();
                return Redirect::to($_ENV['URL'] . '/admin/edit/faqs')
                                ->with('flash-message', 'FAQ has been successfully updated!')
                                ->with('alert-class', 'success');
            }
        } else {
            return Redirect::to($_ENV['URL'] . '/admin/edit/faqs/' . $faq->id)
                            ->with('flash-message', 'Please fill out all fields to update a FAQ!')
                            ->with('alert-class', 'error');
        }
    }
}