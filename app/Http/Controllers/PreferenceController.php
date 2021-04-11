<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public const STATUS_KEY = 'status';
    public const MESSAGE_KEY = 'message';

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactForm()
    {
        return inertia("Contact", [
            PreferenceController::STATUS_KEY => session(PreferenceController::STATUS_KEY),
            PreferenceController::MESSAGE_KEY => session(PreferenceController::MESSAGE_KEY),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        // Send Email here "name", "email", "message"
        return back()->with([
            PreferenceController::STATUS_KEY => 'contact-email-sent',
            PreferenceController::MESSAGE_KEY => "Thanks! We received your e-mail.",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        dd($request->all());
        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return inertia("About");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        $faqs = Faq::all();
        return inertia("FAQ", ['faqs' => $faqs]);
    }
}
