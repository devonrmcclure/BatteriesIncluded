<?php

class DeleteFAQController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
        $this->beforeFilter('pass_expired');
    }

    /**
     * Get question to delete.
     * @return [View] [views/faq.blade.php]
     */
    public function getFAQ($id)
    {
        $faq = FAQ::find($id);

        return View::make('admin.delete.faq')
                    ->with('faq', $faq);
    }

    public function deleteFAQ($id)
    {
        $faq = FAQ::find($id);
        $faq->delete();

        return Redirect::to($_ENV['URL'] . '/admin/edit/faqs')
                        ->with('alert-class', 'success')
                        ->with('flash-message', 'FAQ has been deleted!');
    }
}